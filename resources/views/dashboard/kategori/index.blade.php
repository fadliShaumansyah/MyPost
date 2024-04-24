@extends('dashboard.layout.main')

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">List Category</h1>
</div>


    <div class="table-responsive small col-lg-6">
      @if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
      <a href="/dashboard/kategori/create" Class="btn btn-primary mb-4">Create New Kategori</a>
      <a href="/categories" Class="btn btn-info text-white mb-4">View Category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach($kategoris as $kategori)
            <tr>
              <td>{{ $kategori->iteration }}</td>
              <td>{{ $kategori->nama }}</td>
              <td><a href="/dashboard/kategori/{{ $kategori->slug }}/edit" Class=" badge bg-warning text-decoration-none">Edit</a>
                  <form action="/dashboard/kategori/{{ $kategori->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0 " onclick="return confirm('Are You Sure ?')">Hapus</button>
                  </form>
                 
              </td>
            </tr>
        @endforeach
          </tbody>
        </table>
    </div>
 
 



@endsection