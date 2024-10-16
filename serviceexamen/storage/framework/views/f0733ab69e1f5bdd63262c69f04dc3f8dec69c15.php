<?php $__env->startSection('title', 'Modifier avis'); ?>
<?php $__env->startSection('contentPage'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Modifier un avis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('avis')); ?>">Liste des avis</a></li>
            <li class="breadcrumb-item active">Modifier un avis</li>
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
                          <div class="col-md-12">
                              <label for="">Titre</label>
                              <input type="text" name="titre" value="<?php echo e($avisElement->titre); ?>" class="form-control" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <label for="">Description</label>
                              <textarea name="description" cols="30" rows="5" class="form-control">
                                <?php echo e($avisElement->description); ?>

                              </textarea>
                          </div>
                      </div>
                      <br><hr><br>
                      <div class="row">
                          <div class="col-md-6">
                              <label for="">Date</label>
                              <input type="date" name="date" value="<?php echo e($avisElement->date); ?>" class="form-control">
                          </div>
                          <div class="col-md-4" style="display:none">
                              <label for="">Adresse</label>
                              <input type="text" name="adresse" value="<?php echo e($avisElement->adresse); ?>" class="form-control">
                          </div>
                          <div class="col-md-6">
                              <label for="">Type</label>
                              <select name="type" class="form-control" required>

                                <?php if($avisElement->type =='Scolarité'): ?>         
                                  <option value="<?php echo e($avisElement->type); ?>" selected><?php echo e($avisElement->type); ?></option>
                                  <option value="Enseignant">Enseignant</option>
                                  <option value="Personnel">Personnel</option>
                                <?php endif; ?>
                                <?php if($avisElement->type =='Enseignant'): ?>         
                                  <option value="<?php echo e($avisElement->type); ?>" selected><?php echo e($avisElement->type); ?></option>
                                  <option value="Scolarité">Scolarité</option>
                                  <option value="Personnel">Personnel</option>
                                <?php endif; ?>
                                <?php if($avisElement->type =='Personnel'): ?>  
                                  <option value="<?php echo e($avisElement->type); ?>" selected><?php echo e($avisElement->type); ?></option>
                                  <option value="Scolarité">Scolarité</option>        
                                  <option value="Enseignant">Enseignant</option>        
                                <?php endif; ?>

                              </select>
                          </div>
                      </div>
                      <br><hr><br>
                      <div class="row">
                        <div class="col-md-6">
                            <label for="">Views</label>
                            <input type="text" name="views" value="<?php echo e($avisElement->views); ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Rating</label>
                            <input type="text" name="rating" value="<?php echo e($avisElement->rating); ?>" class="form-control" readonly>
                        </div>
                      </div>

                      <br><br>
                      <div class="mb-12">
                        <center>
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </center><br>
                      </div>
                  </form>
                  <br><hr><br><br>
                  <div class="row">
                    <div class="col-md-5">
                        <form action="<?php echo e(url('update-photoAvis/'.$avisElement->id)); ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de modifier ces données?')" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-input-steps" style="text-align: left;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <img src=<?php echo e(asset($upload.'/avis/images/'.$avisElement->image)); ?> style="width:350px !important; height: 240px;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Image d'avis</label>
                                        <input type="file" value="<?php echo e($avisElement->image); ?>" id="" class="form-control" name="image" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3" class="text-left">
                                    <button type="submit" class="btn btn-warning">Modifier Image</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <form action="<?php echo e(url('update-photoPdf/'.$avisElement->id)); ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de modifier ces données?')" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-input-steps" style="text-align: left;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <?php if($avisElement->fichier): ?>
                                                <iframe
                                                src=<?php echo e(asset($upload.'/avis/files/'.$avisElement->fichier)); ?>

                                                width="100%"
                                                height="400">
                                                </iframe>   
                                            <?php else: ?>
                                            <img src="/upload/notfound.png" alt="" style="width:300px !important; height: 240px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>fichier d'avis (PDF)</label>
                                        <input type="file" value="<?php echo e($avisElement->fichier); ?>" id="" class="form-control" name="fichier">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3" class="text-left">
                                    <button type="submit" class="btn btn-warning">Modifier Fichier</button>
                            </div>
                        </form>
                    </div>
                </div>    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceexamen/resources/views/avis/edit.blade.php ENDPATH**/ ?>