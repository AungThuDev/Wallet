<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!--Data Table-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

  <!--Style for icon-->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  


  @yield('external_css')
  <title>@yield('title')</title>
</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('backend.layout.navbar')

  @include('backend.layout.sidebar')
  
  @yield('content')
  
  

  

  @include('backend.layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>

<!--DataTable-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<!--Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
  $(document).ready(function(){
    let token = document.head.querySelector('meta[name = "csrf-token"]');
    if(token)
    {
      $.ajaxSetup({
        headers : {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
      });
    }

    $('.back-btn').on('click',function(){
      window.history.go(-1);
      return false;
    });
  });

  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

@if(session('create'))
Toast.fire({
  icon: 'success',
  title: "{{session('create')}}"
})
@endif

@if(session('update'))
Toast.fire({
  icon: 'success',
  title: "{{session('update')}}"
})
@endif
</script>

@yield('scripts')
</body>
</html>
