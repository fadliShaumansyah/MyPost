@extends('dashboard.layout.main');


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Edit Category</h2>
  </div>
  <div class="col-lg-8">
    <form action="/dashboard/kategori/{{ $kategoris->slug }}" method="post" class="mb-5">
        @method('put')
      @csrf
      <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $kategoris->nama) }}" autofocus required>
            @error('nama')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
      </div>
      
      <div class="mb-3">
        <label for="slug" class="form-label @error ('slug') is-invalid @enderror">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $kategoris->slug) }}" required>
        @error('slug')
        <div class="invalid-feedback">
        {{ $message }}
      </div>
        @enderror
      </div>     
      <button type="submit" class="btn btn-primary">Create Category</button>
    </form> 
  </div>
    
  <script>
    const nama = document.querySelector('#nama');
  const slug = document.querySelector('#slug');

  nama.addEventListener('change', function(){
    fetch('/dashboard/kategori/checkSlug?nama='+ nama.value)
    .then(response=> response.json())
    .then(data=>slug.value= data.slug)
  });

  </script>
@endsection