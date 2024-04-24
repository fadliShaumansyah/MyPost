@extends('dashboard.layout.main')

@section('container')

<div class="container my-3">
    <div class="row ">

        <div class="col-lg-8">
        <h1 class='mb-5'>{{ $post->title }}</h1>
        <p >
            <a href="/dashboard/posts" Class="btn btn-success">Back To All Post</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" Class="btn btn-warning">Edit</a> 
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0 " onclick="return confirm('Are You Sure ?')">Hapus</button>
                </form>
        
        </p>
        @if ($post->images)
        <div style="max-height:350px; overflow:hidden;">
        <img src="{{ asset('storage/'. $post->images) }}" class="card-img-top img-fluid " alt="{{ $post->kategori->nama}}">
    </div>
        @else
        <img src="https://source.unsplash.com/1200x500?{{ $post->kategori->nama}}" class="card-img-top img-fluid " alt="{{ $post->kategori->nama}}">
        @endif
   
        <p fs-5>{!! $post->body !!}</p>
     
        </div>
    </div>
</div>

 
 

@endsection