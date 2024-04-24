@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">My Post | {{ auth()->user()->name }}</h1>
</div>


    <div class="table-responsive small col-lg-8">
      @if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
      <a href="/dashboard/posts/create" Class="btn btn-primary mb-4">Create New Post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->kategori->nama }}</td>
              <td><a href="/dashboard/posts/{{ $post->slug }}" Class=" badge bg-info text-decoration-none">Lihat</a>
                  <a href="/dashboard/posts/{{ $post->slug }}/edit" Class=" badge bg-warning text-decoration-none">Edit</a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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