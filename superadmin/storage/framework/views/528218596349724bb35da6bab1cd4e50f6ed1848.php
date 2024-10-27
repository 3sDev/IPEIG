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
        <h1 class="m-0">Gestion des enseignants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion des enseignants</li>
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
                      <h3 class="card-title">Liste de tous les enseignants
                      </h3>
                      
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Nom et Prénom</th>
                                  <th>Grade</th>
                                  <th>Poste</th>
                                  <th>Tél</th>
                                  <th>Email</th>
                                  <th width="10%">Activation</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                            <tr>
                              
                              <td><?php echo e($item->prenom .' '. $item->nom); ?></td>
                              <td><?php echo e($item->type_enseignant); ?></td>
                              <td><?php echo e($item->poste); ?></td>
                              <td><?php echo e($item->tel1_teacher); ?></td>
                              <td><?php echo e($item->email); ?></td>
                              
                              <td  align="center">
                                <input type="text" style="display: none;" name="active" value="<?php echo e($item->active); ?>">

                                  <?php if(($item->active == '0')): ?>
                                  <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Désactivé</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '1')): ?>
                                  <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Activé</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '2')): ?>
                                  <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Fin Vacation</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '3')): ?>
                                  <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Fin Contractuel</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '4')): ?>
                                  <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Fin Expert</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '5')): ?>
                                  <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Mutation</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '6')): ?>
                                  <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm">Retraite</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '7')): ?>
                                  <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Coopération</button>
                                  <?php endif; ?>
                              </td>
                              
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>Nom et Prénom</th>
                                  <th>Grade</th>
                                  <th>Poste</th>
                                  <th>Tél</th>
                                  <th>Email</th>
                                  <th width="10%">Activation</th>
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
<?php echo $__env->make('adminlayoutenseignant.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/teacher/index.blade.php ENDPATH**/ ?>