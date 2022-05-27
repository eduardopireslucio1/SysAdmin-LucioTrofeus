
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lucio Troféus</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
  @include('layouts.partials.navbar')
  @include('layouts.partials.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section>
      @include('layouts.partials.alert.sucess')
      @include('layouts.partials.alert.error')
      @yield('content')

    </section>
  </div>
 
  @include('layouts.partials.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<script src="{{asset('js/app.js')}}"></script>
@yield('js')
  <style>
    .main-sidebar .lucio_logo{
      max-width:175px;
      max-height:120px;
      width: auto;
      height: auto;
    }
  </style>
</body>
</html>
