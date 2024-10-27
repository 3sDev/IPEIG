<?php $__env->startSection('title', 'Détails avis enseignants'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Détails Avis</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('avis')); ?>">Liste des avis</a></li>
          <li class="breadcrumb-item active">Détails Avis Enseignant</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="row">
        <div class="col-md-12">

            <?php if($errors->any()): ?>
                <ul class="alert alert-warning">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="<?php echo e(url('avis')); ?>" class="btn btn-danger float-right">Retour</a>
                    </h4>
                </div>

                <div class="card-body">

                    <?php $__currentLoopData = $avis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avisElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <form action="<?php echo e(url('update-avis/'.$avisElement->id)); ?>" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <!-- Box Comment -->
                              <div class="card card-widget">
                                <div class="card-header">
                                  <div class="user-block">
                                    <img class="img-circle" src=<?php echo e(URL('upload/admin11.png')); ?> alt="User Image">
                                    <span class="username"><a href="<?php echo e(URL('profile.show')); ?>"><?php echo e(Auth::user()->name); ?></a></span>
                                    <span class="description"><?php echo e(Auth::user()->role); ?></span>
                                  </div>
                                  <!-- /.user-block -->
                                  <div class="card-tools">
                                    <span class="float-right text-muted"><?php echo e($avisElement->date); ?></span>
                                  </div>
                                  <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <img src=<?php echo e(asset($upload.'/avis/images/'.$avisElement->image)); ?> class="img-fluid" >
                  
                                  <h3><?php echo e($avisElement->titre); ?></h3>
                                  <p><?php echo e($avisElement->description); ?></p>
                                  <button type="button" style="display:none;" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Fichier</button>
                                  <br>
                                  <?php if($avisElement->fichier): ?>
                                    <iframe
                                    src=<?php echo e(asset($upload.'/avis/files/'.$avisElement->fichier )); ?>

                                    width="100%"
                                    height="678">
                                    </iframe>
                                  <?php endif; ?>
                                  
                                </div>
                              </div>
                              <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-2"></div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                                
                                <br><br>
                            <div class="mb-3">
                                 <!--button type="submit" class="btn btn-success float-right">Modifier</button-->
                            </div>
                        </form>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/avis/show.blade.php ENDPATH**/ ?>