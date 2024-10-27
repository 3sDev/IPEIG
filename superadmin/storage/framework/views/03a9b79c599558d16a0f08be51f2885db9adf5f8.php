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
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo \Livewire\Livewire::styles(); ?>

  <!-- Scripts -->
  <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
  <title>
    <?php echo $__env->yieldContent('title'); ?>
  </title>
  
  <!-- Css -->
  <?php $__env->startComponent('adminlayoutenseignant.css'); ?>
  <?php echo $__env->renderComponent(); ?>
   <!-- /.Css -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="80" width="80">
    
  </div>
  
  <!-- Navbar -->
 <?php $__env->startComponent('adminlayoutenseignant.topmenu'); ?>
 <?php echo $__env->renderComponent(); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $__env->startComponent('adminlayoutenseignant.leftmenu'); ?>
  <?php echo $__env->renderComponent(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <?php echo $__env->yieldContent('contentPage'); ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
<?php $__env->startComponent('adminlayoutenseignant.footer'); ?>
<?php echo $__env->renderComponent(); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $__env->startComponent('adminlayoutenseignant.datatable'); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->yieldPushContent('modals'); ?>
<?php echo \Livewire\Livewire::scripts(); ?>


</body>
</html>
<?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/adminlayoutenseignant/layoutdatatable.blade.php ENDPATH**/ ?>