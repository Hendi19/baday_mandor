@extends('superadmin.layout.main')

@section('content')

<div class="col-lg-8">

    <form action="{{ route('superadmin.post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label " >Slug :</label>
            <input type="text" class="form-control "  id="slug" placeholder="Masukan slug" name="slug">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category :</label>
            <select name="category_id" id="category_id" class="form-control">
                <option disabled selected>Pilih Kategori</option>
                @foreach($category as $row)
                <option value="{{ $row->id }}">{{ $row->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Gambar :</label>
            <input type="file" class="form-control" id="img" placeholder="Masukan Judul" name="img">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body :</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
        </div>


        <button type="submit" class="btn btn-primary">Buat Data</button>
    </form>
</div>
<script>
    // //    ambil titlenya dan id
    //    const title = document.querySelector('#title');
    // //ambil slugnya
    //     const slug = document.querySelector('#slug');

    //     title.addEventListener('change', function(){
    //         fetch('/superadmin/content/posts/CheckSlug?title='+ title.value)
    //             .then(response => response.json())
    //             .then(data => slug.value = data.slug)
    //     });
    //         // untuk menghilangkan icon file pada trix editor
    //     document.addEventListener('trix-file-accept', function(e){
    //         e.preventDefault();
    //     })

        // fungsi script untuk preview gambar
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display ='block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
        

   </script>

@endsection