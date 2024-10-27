<!--
=========================================================
Smart Institute - v1.0
=========================================================

Product Page: https://www.sss.com.tn
Copyright 2022 3S
Coded by MMB

=========================================================
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @livewireStyles
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  <title>
    @yield('title')
  </title>

  <!-- Css -->
  @component('adminlayoutscolarite.css')
  @endcomponent
   <!-- /.Css -->
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="80" width="80">
  </div> --}}

  <!-- Navbar -->
 @component('adminlayoutscolarite.topmenu')
 @endcomponent
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @component('adminlayoutscolarite.leftmenu')
  @endcomponent

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @component('adminlayoutscolarite.header')
    @endcomponent
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        @yield('contentPage')
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
@component('adminlayoutscolarite.footer')
@endcomponent

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Script Files -->
@component('adminlayoutscolarite.jsfile')
@endcomponent

@stack('modals')
@livewireScripts

</body>
</html>