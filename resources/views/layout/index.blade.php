<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
 {{--  <link rel="stylesheet" href="{{ asset('crop/croppie.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('layout.header');
  <!-- =============================================== -->
  @include('layout.sidebar');
  <!-- =============================================== -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
    @yield('content')
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href=""></a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
{{-- <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('tinymce/config.js') }}"></script> --}}
{{-- <script src="{{ asset('crop/croppie.min.js') }}"></script>
<script src="{{ asset('crop/crop.js') }}"></script> --}}
</body>
</html>