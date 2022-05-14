@extends('superadmin.layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="my-3">{{ $post->title }}</h2>
            <a href="{{ route('superadmin.posts.index') }}" class="btn btn-success mb-3"><span data-feather="arrow-left">
                </span> Kembali ke Posts
            </a>
            <a href="" class="btn btn-warning mb-3">
                <span data-feather="edit"></span> Edit
            </a>
            <form action="" method="post" class="d-inline">
                @csrf
                <button class="btn btn-danger mb-3" onclick="return confirm('Anda Yakin.?')">
                    <span data-feather="x-circle"></span>Delete</button>
            </form>
            @if($post->image)
            <div style="max-height: 350px; overflow:hidden;">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category }}" class="img-fluid">
            </div>
            @else
                <img src="http://source.unsplash.com/1200x400?{{ $post->category}}"
                class="card-img-top" alt="{{ $post->category}}" class="img-fluid">
            @endif
            <article class="my-3 fs-5">
                            {!! $post->body !!}
            </article>
            
        </div>
        <article class="my-3 fs-5">

        </article>
    </div>
</div>
@endsection