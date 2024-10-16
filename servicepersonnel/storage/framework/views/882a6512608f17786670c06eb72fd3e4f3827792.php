<?php $__env->startSection('title', 'Liste personnels'); ?>
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
        <h1 class="m-0">Gestion des personnels</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion des personnels</li>
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
                      <a href="<?php echo e(url('personnels/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Poste</th>
                                <th>Tél</th>
                                <th>Activation</th>
                                <th width="12%">Actions</th>
                                <th>Supp</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                            <tr>
                              
                              <td><?php echo e($personnel->matricule); ?></td>
                              <td><?php echo e($personnel->prenom .' '. $personnel->nom); ?></td>
                              <td><?php echo e($personnel->poste); ?></td>
                              <td><?php echo e($personnel->tel1_personnel); ?></td>
                              
                              <td  align="center">
                                <?php if(($personnel->active == 'Désactivé  / حساب مغلق')): ?>
                                <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><?php echo e($personnel->active); ?></button>
                                <?php endif; ?>
                                <?php if(($personnel->active == 'Activé  / حساب مفعل')): ?>
                                <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm"><?php echo e($personnel->active); ?></button>
                                <?php endif; ?>
                                <?php if(($personnel->active != 'Désactivé  / حساب مغلق') && ($personnel->active != 'Activé  / حساب مفعل' )): ?>
                                <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm"><?php echo e($personnel->active); ?></button>
                                <?php endif; ?>
                             
                                
                              </td>
                              
                              <td class="text-center">
                                <a href="<?php echo e(url('personnels/'.$personnel->id)); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="<?php echo e(url('personnels/'.$personnel->id.'/edit')); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                              <td align="center">
                                <form action="<?php echo e(url('delete-personnel/'.$personnel->id)); ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces données?')">
                                  <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                              </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Poste</th>
                                <th>Tél</th>
                                <th>Activation</th>
                                <th width="10%">Actions</th>
                                <th>Supp</th>
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


<?php echo $__env->make('adminlayoutenseignant.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/personnel/index.blade.php ENDPATH**/ ?>