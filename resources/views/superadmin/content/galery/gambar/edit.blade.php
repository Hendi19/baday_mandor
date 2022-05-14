@extends('superadmin.layout.main')

@section('content')

<form action="{{ route('superadmin.gambar.update',$gambar->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
    @csrf

    <div class="mb-3">
        <label for="image" class="form-label ">Masukan Gambar</label>
        <!-- untuk memberi tahu bahwa gambar lama ada atau tidak -->
        <input type="hidden" name="oldImage" value="{{ $gambar->image}}">
        @if($gambar->image)
        <img src="{{ asset('storage/'.$gambar->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        <!-- preview gambar -->
        <input class="form-control @error('image') is-invalid @enderror" type="file" 
            id="image1" name="image" onchange="previewImage()">
        <!-- <input class="form-control @error('image') is-invalid @enderror" type=" file" id="image" name="image" onchange="previewImage()"> -->
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Edit Gambar</button>
</form>

@endsection