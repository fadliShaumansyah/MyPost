<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} </title>
    <link href="/aset/css/bootstrap.css" rel="stylesheet">
    <link href="/aset/css/mystyle.css" rel="stylesheet">
    <link href="/aset/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body>
        @include('partial.navbar')
  
    <div class="container mt-4">
    @yield('container')
    </div>
    <script src="/aset/js/bootstrap.bundle.min.js"></script>
  </body>
</html>