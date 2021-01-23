<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinglePostController extends Controller
{
    public function single_post_show($title){
        return view('blog.single')->with('post',Post::where('slug',$title)->first());
    }
}
