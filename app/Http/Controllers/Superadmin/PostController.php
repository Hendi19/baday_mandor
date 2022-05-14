<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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
        // $category = Post::select("posts.*",'categories.name as category')
        // ->join('categories','categories.id', '=','posts.category_id')->orderBy('posts.id')->get();

        // return view('superadmin/content/posts/create', compact('category'));
        $category = Category::all();

        return view('superadmin/content/posts/create', compact('category'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
             'category_id' => 'required',
             'image' => 'image|file|max:1024',
             'body' => 'required'
           
        ]);
        // untuk mengecek apakah ada gambar atau tidak
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200); 
        Post::create ($validateData);
 

        try {
          
            return redirect(route('superadmin.posts.index'))->with('pesan-berhasil', 'Postingan Berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect(route('superadmin.posts.index'))->with('pesan-gagal', 'Anda gagal menambah data');
        }       
    }

    public function  edit($id){
        // Session::put('title', 'Form Tambah Produk');
        // //jangan lupa panggil table yang di joinkan terlebih dahulu
        // $category = Category::all();
        // $post = Post::findOrFail($id);
        // return view('superadmin/content/posts/edit', compact('post','category'));

        return view('superadmin/content/posts/edit',[
            'post' => Post::findOrFail($id),
            'categories' => Category::all()
        ]);
        
    }


    public function update(Request $request,$id)
    {
        $post= Post::find($id); 
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->image = $request->image;
        $post->body = $request->body;
         
        // pengecekan slug jika ada perubahan saat melakukan edit
        if($request->slug != $post->slug){
           
            $rules['slug'] = 'required|unique:posts';
        }
        if($request->file('image')){
            // cek dulu apakah gambar lama ada jika ada dihapus
             if($request->oldImage){
                 Storage::delete($request->oldImage);
             }
             $post['image'] = $request->file('image')->store('post-images');
             $post['excerpt'] = Str::limit(strip_tags($request->body), 200);
     }
        try {
            $post->update();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.posts.index'))->with('pesan-berhasil', 'Anda berhasil mengubah data');
        } catch (\Exception $e) {
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.posts.index'))->with('pesan-gagal', 'Anda gagal mengubah data');
        }

        
    }

    public function delete($id){
        //pastikan ada data
        $post = Post::findOrFail($id);
        try{
            $post->delete();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.posts.index'))->with('pesan-berhasil','Anda berhasil menghapus data');

        }catch (\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.posts.index'))->with('pesan-gagal','Anda gagal menghapus data');
        }
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
       
        return view('superadmin/content/posts/show', compact('post'));
        
        
    }

  
    // public function CheckSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->title);


    //     return response()->json(['slug' => $slug]);
    // }
}