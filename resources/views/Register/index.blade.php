@extends('layout.main');

@section('container');
<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-Registration w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
      <form action="/Register" method="post">  

        @csrf

        <div class="form-floating">
            <input 
            type="text" 
            name="name" 
            class="form-control rounded-top @error ('name') is-invalid @enderror" 
            id="name" 
            placeholder="Nama" 
            required
            value="{{ old('name') }}">
            <label for="floatingInput">Nama</label>
            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

        <div class="form-floating">
          <input 
          type="text" 
          class="form-control @error ('username') is-invalid @enderror" 
          id="username"
          name="username" 
          placeholder="Username"
          required
          value="{{ old('username') }}">
          <label for="floatingInput">Username</label>
          @error ('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-floating">
          <input 
          type="email" 
          class="form-control @error ('email') is-invalid @enderror" 
          id="email"
          name="email"
          placeholder="name@example.com"
          required
          value="{{ old('email') }}">
          <label for="floatingInput">Email address</label>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-floating">
          <input 
          type="password" 
          name="password" 
          class="form-control rounded-bottom @error ('password') is-invalid @enderror" 
          id="password" 
          placeholder="password" 
          required>
          <label for="floatingPassword">Password</label>
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>        
      </form>
      <small class="d-block text-center">Already Registered ? <a href="/Login" class="text-decoration-none">Login</a></small>
    </main>
  </div>
</div>

  
@endsection