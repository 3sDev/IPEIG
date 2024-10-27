 
 <?php $__env->startSection('title', 'Liste des ordres et missions'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ordres et missions</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Ordres et missions</li>
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
                <div class="card-header">
                    <h3 class="card-title">Liste des ordres et missions</h3>
                    <a href="<?php echo e(url('missions/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Titre</th>
                                <th width="10%">Date début</th>
                                <th width="10%">Date fin</th>
                                <th>Nom et Prénom</th>
                                <th>Fichier</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $missions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $missionElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><?php echo e($missionElement->id); ?></td>
                            <td><span><?php echo e($missionElement->titre); ?></span></td>
                            
                            <td><span><?php echo e($missionElement->date_debut); ?></span></td>
                            <td><span><?php echo e($missionElement->date_fin); ?></span></td>
                            <td><span><?php echo e($missionElement->personnel->nom.' '.$missionElement->personnel->prenom); ?></span></td>
                            <td align="center">
                                <?php if($missionElement->fichier): ?>
                                    <a href=<?php echo e(asset($upload.'/missions/'.$missionElement->fichier)); ?> target="_blank">
                                        <img src="https://smartschools.tn/isamgf/servicestage/public/upload/file.png" alt="" style="width:30px">
                                    </a>
                                <?php endif; ?>   
                            </td>
                            <td class="text-right">
                                
                                <a href="<?php echo e(url('missions/'.$missionElement->id.'/edit')); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                <form action="<?php echo e(url('delete-missions/'.$missionElement->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Nom et Prénom</th>
                                <th>Fichier</th>
                                <th></th>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/mission/index.blade.php ENDPATH**/ ?>