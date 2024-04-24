
@extends('layout.main')

@section('container')
<h1 class=" mb-5">Post Kategori</h1>

    <div class="container ">
        <div class="row">
        @foreach($kategoris as $kategori)
            <div class="col-md-4">
                <a href="/blog?kategori={{ $kategori->slug }}">
                <div class="card text-bg-dark">
                    <img src="https://source.unsplash.com/500x500?{{ $kategori->nama }}" class="card-img" alt="{{ $kategori->nama }}">
                    <div class="card-img-overlay d-flex align-items-center ">
                    <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $kategori->nama }}</h5>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
    
            
@endsection