@extends('superadmin.layout.main')

@section('content')
<a href="{{ route('superadmin.post.create') }}" class="btn btn-primary mb-3">Tambah data</a>
<table class="table  col-lg-10">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @php $no = 1; @endphp
    <tbody>
        @foreach($post as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->category }}</td>
                <td><a href="# " class="badge bg-primary text-white"><i class="fa fa-edit"></i></a> |
                    <a href="# " class="badge bg-warning text-white"><i class="fa fa-eye"></i></a> |
                    <a href="#" class="badge bg-danger text-white"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection