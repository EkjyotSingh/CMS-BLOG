<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware(['category_count'])->only(['edit','create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.manage')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:posts',
            'image'=>'required|image',
            'description'=>'required',
            'content'=>'required',
            'published_at'=>'required:date',
            'category_id'=>'required',
            'user_id'=>'required',
            'slug'=>'required',

        ]);
        $image=$request->image->store('post');
        $post=Post::create([
            'title'=>$request->title,
            'image'=>$image,
            'description'=>$request->description,
            'content'=>$request->content,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::id(),
            'slug'=>Str::slug($request->title),

        ]);
        if($request->tag){
            $post->tags()->attach($request->tag);
        }
        Session::flash('success','Post added successfully');
        return redirect()->route('post.index');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.manage')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title'=>'required|unique:posts',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        $data=$request->only(['title','content','description','category_id']);
        if($request->hasFile('image')){
            $image=$request->image->store('post');
            $data['image']=$image;
            Storage::delete($post->image);
        }
        $post->update($data);

        if($request->tag){
            $post->tags()->sync($request->tag);
        }

        Session::flash('success','Post updated successfully');
        return redirect()->route('post.index');    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::withTrashed()->first();
        if($post->trashed()){
            Storage::delete($post->image);
            $post->forceDelete();
        }
        else{
            $post->delete();
        }
        Session::flash('success','Post deleted successfully');
        return redirect()->route('post.index');
    }

    public function trash_show(){
        return view('post.index')->with('posts',Post::onlyTrashed()->get());
    }

    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post restored successfully');
        return redirect()->route('post.index');
    }
}
