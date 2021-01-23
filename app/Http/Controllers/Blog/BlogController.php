<?php

namespace App\Http\Controllers\Blog;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        return view('blog.main')->with('categories',Category::all())
                                ->with('tags',Tag::all())
                                ->with('posts',Post::latest()->with('category')->Searched()->simplePaginate(2))
                                ->with('latestposts',Post::latest()->take(5)->get());
    }

    public function tag_based(Tag $tag){
        return view('blog.tag')->with('categories',Category::all())
                                ->with('tag',$tag)
                                ->with('tags',Tag::all())
                                ->with('posts',$tag->posts()->with('category')->Searched()->latest()->simplePaginate(2))
                                ->with('latestposts',Post::latest()->take(5)->get());
    }

    public function category_based(Category $category){
        return view('blog.category')->with('categories',Category::all())
                                    ->with('category',$category)
                                    ->with('tags',Tag::all())
                                    ->with('posts',$category->posts()->with('category')->Searched()->latest()->simplePaginate(2))
                                    ->with('latestposts',Post::latest()->take(5)->get());                                }
}
