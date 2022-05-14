@extends('superadmin.layout.main')

@section('content')

    <form action="{{ route('superadmin.category.update',$category->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
        @csrf
       
        <div class="form-group">
            <label for="inputAddress">Nama Kategori Kegiatan</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Slug Kategori Kegiatan</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

@endsection