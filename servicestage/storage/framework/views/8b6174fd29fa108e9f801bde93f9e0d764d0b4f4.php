 
 <?php $__env->startSection('title', 'Encadrement PFE'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Encadrement PFE</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Encadrement PFE</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Encadrant</th>
                                <th>Etudiant</th>
                                <th>Groupe</th>
                                <th>Stage</th>
                                <th>Binôme</th>
                                <th>Soutenance</th>
                                <th>Sujet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $Stagespfe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfeElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                                <td><span><?php echo e($pfeElement->encadrant_pfe); ?></span></td>
                            <td><?php echo e($pfeElement->student->full_name); ?></td>
                            <td><span><?php echo e($pfeElement->classe->abbreviation); ?></span></td>
                            
                            <?php if($pfeElement->sous_type=='اقتراح مشروع تخرج في شركة'): ?>
                                <td>Industriel</td>
                            <?php else: ?>
                                <td>Didactique</td>
                            <?php endif; ?>
                            <td><span><?php echo e($pfeElement->binome_pfe); ?></span></td>
                            <td><span><?php echo e($pfeElement->soutenance_pfe); ?> </span></td>
                            <td>
                                <span><?php echo e($pfeElement->nom_pfe); ?></span>
                            
                            </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Encadrant</th>
                                <th>Etudiant</th>
                                <th>Groupe</th>
                                <th>Stage</th>
                                <th>Binôme</th>
                                <th>Soutenance</th>
                                <th>Sujet</th>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicestage/resources/views/encadrement/index.blade.php ENDPATH**/ ?>