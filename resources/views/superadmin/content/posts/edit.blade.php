@extends('superadmin.layout.main')

@section('content')

<div class="col-lg-8">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class=" h2">Edit Data Postingan</h1>
    </div>
    <form action="{{ route('superadmin.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Postingan :</label>
            <input type="text" class="form-control" id="title" name="title"  value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label " >Slug :</label>
            <input type="text" class="form-control "  id="slug" placeholder="Masukan slug" name="slug"  value="{{ $post->slug }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category :</label>
            <select name="category_id" id="category_id" class="form-control">
                <option disabled value="{{ $post->category_id }}">{{ $post->name }}</option>
                @foreach($categories as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
       

        <div class="mb-3">
                <label for="image" class="form-label ">Masukan Gambar</label>
                <!-- untuk memberi tahu bahwa gambar lama ada atau tidak -->
                <input type="hidden" name="oldImage" value="{{ $post->image}} ">
                @if($post->image)
                 <img src="{{ asset('storage/'.$post->image) }}"
                  class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <!-- preview gambar -->
               
                <input class="form-control @error('image') is-invalid @enderror"" type="file" 
                id="image" name="image" onchange="previewImage()">
                    @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
            </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body :</label>
            <input id="body" type="hidden" name="body" value="{{ $post->body }}" required>
            <trix-editor input="body"></trix-editor>
        </div>


        <button type="submit" class="btn btn-primary">Edit Data</button>
    </form>
</div>

@endsection