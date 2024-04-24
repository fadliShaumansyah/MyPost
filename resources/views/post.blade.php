
@extends('layout.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row mb-3">
        <div class="col-mb-6">
            <form action="/blog">
                @if(request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori')}}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ...." name="search" value="{{request('search') }}">
                    <button class="btn btn-warning " type="submit"  >Search</button>
                </div>
            </form>
        </div>
    </div>


@if($post->count())
<div class="card mb-3">
    @if ($post[0]->images)
        <div style="max-height:350px; overflow:hidden;">
        <img src="{{ asset('storage/'. $post[0]->images) }}" class="card-img-top img-fluid " alt="{{ $post[0]->kategori->nama}}">
    </div>
        @else
        <img src="https://source.unsplash.com/1200x400?{{ $post[0]->kategori->nama}}" class="card-img-top" alt="{{ $post[0]->kategori->nama}}">
        @endif
        
 
  <div class="card-body text-center">
    <h5 class="card-title"><a href="/posts/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->title }}</a></h5>
    <p><small class="text-body-secondary">By : <a href="/blog?author={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name}}</a> in
            <a href="/blog?kategori={{$post[0]->kategori->slug }}" class="text-decoration-none">{{ $post[0]->kategori->nama }}</a>
    
    {{ $post[0]->created_at->diffForHumans() }}

    </small>
    </p>
    <p class="card-text">{{ $post[0]->excerpt }}</p>
    <a href="/posts/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
  </div>
</div>


<div class="container">
    <div class="row">
    @foreach($post->skip(1) as $posts)
        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0" >
                     <div class="card-body">    
                     <div class="position-absolute bg-info px-3 py-2  rounded-end"><a href="/blog?kategori={{$posts->kategori->slug }}" class="text-white text-decoration-none">{{ $posts->kategori->nama }}</a>    </div>

                     @if ($posts->images)
                    
                     <img src="{{ asset('storage/'. $posts->images) }}" class="card-img-top img-fluid " alt="{{ $posts->kategori->nama}}">
               
                     @else
                     <img src="https://source.unsplash.com/320x150?{{ $posts->kategori->nama}}" class="img-fluid " alt="{{ $posts->kategori->nama }}">
                     @endif
                         
               
                
                
                        <h5 class="card-title"><a href="/posts/{{ $posts->slug }}" class="text-decoration-none">{{ $posts->title }}</a></h5>
                        <p class="card-text">{{ $posts->excerpt }}</p>
                    
                        By : <a href="/blog?author={{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name}}</a>
                        <p class="card-text"><small class="text-body-secondary">{{ $posts->created_at->diffForHumans() }}</small></p>
                        <a href="/posts/{{ $posts->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
                    </div>
                </div>   
            </div>   
        </div>
    @endforeach
    </div>
</div>
   
@else
<p class="text-center fs-4">Post tidak di temukan</p>
@endif  
<div class="d-flex justify-content-end">
{{ $post->links() }}
</div> 
@endsection