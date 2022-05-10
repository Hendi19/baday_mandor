<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
        Session::put('title', 'Data Post');

        $post = Post::select("posts.*",'categories.name as category')
        ->join('categories','categories.id', '=','posts.category_id')->orderBy('posts.id')->get();
        $category = Category::all();

        return view('superadmin/content/posts/list', compact('post'));
    }

    public function create()
    {
        Session::put('title', 'Form Tambah Produk');
        //jangan lupa panggil table yang di joinkan terlebih dahulu
        $category = Post::select("posts.*",'categories.name as category')
        ->join('categories','categories.id', '=','posts.category_id')->orderBy('posts.id')->get();

        return view('superadmin/content/posts/create', compact('category'));
    }

    public function store(Request $request)
    {
        $category = Category::all();

        $image = $request->file('img');
        $nama_file = $image->getClientOriginalName();
        $image->move('data_gambar_post', $image->getClientOriginalName());
        
        $post = new post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->excerpt = $request->body;
        $post->image = $nama_file;
        $post->body = $request->body;
        $post->category_id = $request->category_id;


        // dd($post);
        $post->save();
        return redirect(route('superadmin.posts.index'))->with('pesan-berhasil','Anda berhasil menambah data posts');

        
    }

    // public function CheckSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->title);


    //     return response()->json(['slug' => $slug]);
    // }
}