
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lucio Troféus e Brindes | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  @yield('css')
</head>
<body class="hold-transition login-page">

<div class="login-logo">
    <a href="../../index2.html">Lucio Troféus e Brindes</a>
</div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        @yield('content')
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>
