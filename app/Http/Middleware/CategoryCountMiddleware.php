<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Category::all()->count()<=0){
            Session::flash('error','Add Category before making post');
            return redirect()->route('category.create');
        }
        return $next($request);
    }
}
