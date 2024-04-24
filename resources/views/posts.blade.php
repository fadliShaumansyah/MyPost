@extends('layout.main')

@section('container')
    <div class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-md-8">
            <h1 class='mb-5'>{{ $post->title }}</h1>
            <p>By : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a>in
            <a href="/blog?kategori={{$post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a> </p>
            @if ($post->images)
            <div style="max-height:350px; overflow:hidden;">
            <img src="{{ asset('storage/'. $post->images) }}" class="card-img-top img-fluid " alt="{{ $post->kategori->nama}}">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x500?{{ $post->kategori->nama}}" class="card-img-top img-fluid " alt="{{ $post->kategori->nama}}">
            @endif
          
            
            <p fs-5>{!! $post->body !!}</p>
            <br>
            <a href="/blog" class="text-decoration-non btn btn-primary">Back To Post</a>
            </div>
        </div>
    </div>
    
    
@endsection