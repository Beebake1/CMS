<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>CMS</title>

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.css')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
   <link rel="stylesheet" href="{{ asset('plugins/font-awsome/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/dropify/css/dropify.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        <button class="nav-link" type="submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
      </li>

    </ul>
  </nav>

  @include('layouts.sidebar')

  @yield('content')
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>


<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.js')}}"></script>
<script src="{{ asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{ asset('js/adminlte.js')}}"></script>
<script src="{{ asset('js/cms.js')}}"></script>
@yield('javascript')

</body>
</html>
