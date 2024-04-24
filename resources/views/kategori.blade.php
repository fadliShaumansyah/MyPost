
@extends('layout.main')

@section('container')
    <h1 >Kategori {{ $kategori }}</h1>
    @foreach($post as $post)
        <article class="mb-5">
            <h2>
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <h5>By : {{ $post->penulis }}</h5>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
    <a href="/categories"> Daftar Kategori</a>
@endsection