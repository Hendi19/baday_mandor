<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{

    public function index()
    {
    
        $posts = Post::select("posts.*",'categories.name as category')
            ->join('categories','categories.id', '=','posts.category_id')->orderBy('posts.id')->get();
        $terbaru = Post::latest()->get();
        return view('tampilan.home',compact('posts','terbaru'));
    }

}
