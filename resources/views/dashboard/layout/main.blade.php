<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | My Post</title>
    <link href="/aset/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aset/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/aset/css/trix.css" rel="stylesheet">   
    <link href="/aset/css/mystyle.css" rel="stylesheet">   
    <style>
      trix-toolbar[data-trix-mutable].attachment.attachment--file{
        display: none;
      }
    </style>
    </head>
  <body>

@include('dashboard.layout.header')

<div class="container-fluid">
  <div class="row">

@include('dashboard.layout.sidebar')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>

  </div>
</div>
<script src="/aset/js/bootstrap.bundle.min.js"></script>
<script src="/aset/js/Trix.js"></script>

</body>
</html>
