<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Restaurant') }}|Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/app.css">

     <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/iCheck/square/blue.css')}}"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{asset('admin-lte/dist/css/adminlte.min.css')}}"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

@yield('home')

<!-- AdminLTE App -->
<script src="{{asset('js/app.js')}}"></script>
{{-- <script src="{{asset('admin-lte/plugins/chart.js/Chart.min.js')}}"></script> --}}
{{-- <script src="{{asset('admin-lte/dist/js/demo.js')}}"></script> --}}
{{-- <script src="{{asset('admin-lte/dist/js/pages/dashboard3.js')}}"></script> --}}
{{-- <script src="{{asset('admin-lte/plugins/iCheck/icheck.min.js')}}"></script> --}}

<script>
        // $(function () {
        //   $('input').iCheck({
        //     checkboxClass: 'icheckbox_square-blue',
        //     radioClass   : 'iradio_square-blue',
        //     increaseArea : '20%' // optional
        //   })
        // })
</script>

</body>

</html>
