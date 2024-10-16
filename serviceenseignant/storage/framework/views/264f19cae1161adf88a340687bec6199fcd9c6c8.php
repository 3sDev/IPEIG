 
 <?php $__env->startSection('title', 'Liste enseignants'); ?>
 <?php $__env->startSection('contentPage'); ?>

 <link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
 <style>
  .btn-link{
    color:white;
  }
</style>

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
                      <a href="<?php echo e(url('teachers/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Spécialité</th>
                                <th>Département</th>
                                 <th>Grade</th>
                                <th>Tél</th>
                                <th>Activation</th>
                                <th width="10%">Actions</th>
                                <th>Supp</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                            <tr>
                           
                              <td><?php echo e($teacher->matricule); ?></td>
                              <td><?php echo e($teacher->prenom .' '. $teacher->nom); ?></td>
                              <td><?php echo e($teacher->specialite_ens); ?></td>
                              <td><?php echo e($teacher->departement->departmentLabel); ?></td>
                               <td><?php echo e($teacher->poste); ?></td>
                              <td><?php echo e($teacher->tel1_teacher); ?></td>
                              
                              <td  align="center">
                                <form action="<?php echo e(url('update-teacher-account/'.$teacher->id)); ?>" method="POST" onsubmit="return confirm('Confirmation!')">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <input type="text" style="display: none;" name="active" value="<?php echo e($teacher->active); ?>">

                                  <?php if(($teacher->active == '0')): ?>
                                  <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Désactivé</button>
                                  <?php endif; ?>
                                  <?php if(($teacher->active == '1')): ?>
                                  <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Activé</button>
                                  <?php endif; ?>

                                </form>
                              </td>
                              <td class="text-center">
                                <a href="<?php echo e(url('teachers/'.$teacher->id)); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="<?php echo e(url('teachers/'.$teacher->id.'/edit')); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                              <td align="center">
                                <form action="<?php echo e(url('delete-teacher/'.$teacher->id)); ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces données?')">
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
                                <th>Spécialité</th>
                                <th>Département</th>
                                  <th>Grade</th>
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

<?php echo $__env->make('adminlayoutenseignant.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceenseignant/resources/views/teacher/index.blade.php ENDPATH**/ ?>