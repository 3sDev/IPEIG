 
 <?php $__env->startSection('title', 'Liste enseignants'); ?>
 <?php $__env->startSection('contentPage'); ?>

 <link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
 <style>
  .btn-link{
    color:white;
  }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Gestion emploi de temps pour les enseignants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Emploi de temps pour les enseignants</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Liste des enseignants
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="5%">ID</th>
                                  <th>Nom et Prénom</th>
                                  <th>Email</th>
                                  <th>Télephone</th>
                                  <th>Département</th>
                                  
                                  <th width="7%" style="text-align: center">S 1</th>
                                  <th width="7%" style="text-align: center">S 2</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                            <tr>
                              
                              <td align="center"><?php echo e($item->id); ?></td>
                              <td><?php echo e($item->prenom .' '. $item->nom); ?></td>
                              <td><?php echo e($item->email); ?></td>
                              <td><?php echo e($item->tel1_teacher); ?></td>
                              <td><?php echo e($item->departement->departmentLabel); ?></td>
                              
                              
                              <td align="center">
                                <a href="<?php echo e(url('teachers-schedule/'.$item->id.'/1')); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-calendar"></i></a>
                              </td>
                              <td align="center">
                                <a href="<?php echo e(url('teachers-schedule/'.$item->id.'/2')); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-calendar"></i></a>
                              </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                <th>ID</th>
                                <th>Nom et Prénom</th>
                                <th>Email</th>
                                <th>Télephone</th>
                                <th>Département</th>
                                
                                <th style="text-align: center">S 1</th>
                                <th style="text-align: center">S 2</th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/chefdepartement/resources/views/teacher/scheduleteacher.blade.php ENDPATH**/ ?>