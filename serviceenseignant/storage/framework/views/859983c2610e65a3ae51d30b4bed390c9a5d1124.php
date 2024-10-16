 
 <?php $__env->startSection('title', 'Liste des réclamations'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des réclamations</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des réclamations</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
<style>
.textable {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>

    <div class="row">
        <?php if(session('message')): ?>
        <h5><?php echo e(session('message')); ?></h5>
            <?php endif; ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste de réclamations</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th width="30%">Description</th>
                                <th width="10%">Enseignant</th>
                                <th width="10%">Télephone</th>
                                <th width="12%">Statut</th>
                                <th width="11%">Date</th>
                                <th width="5%"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            
                            <td><span class="textable"><?php echo e($reclam->description); ?></span></td>
                            <td><?php echo e($reclam->teacher->prenom.' '.$reclam->teacher->nom); ?></td>
                            <td><?php echo e($reclam->teacher->tel1_teacher); ?></td>

                            
                            <?php if(($reclam->statut=='En cours')): ?>
                            <td><span class="demandEncours"><?php echo e($reclam->statut); ?></span></td>
                            <?php endif; ?>
                            <?php if(($reclam->statut=='Traitée')): ?>
                            <td><span class="demandTraitee"><?php echo e($reclam->statut); ?></span></td>
                            <?php endif; ?>

                            <td><?php echo e(date('Y-m-d | H:i', strtotime($reclam->created_at))); ?></td>
                            
                            
                            <td class="text-center">
                                
                                <a href="<?php echo e(url('edit-reclamation/'.$reclam->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="nav-icon fas fa-user"></i></a>
                            </td>
                            
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Description</th>
                                <th>Enseignant</th>
                                <th>Téléphone</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th></th>
                                
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceenseignant/resources/views/reclamation/index.blade.php ENDPATH**/ ?>