<?php $__env->startSection('title', 'Modifier variable'); ?>
<?php $__env->startSection('contentPage'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Modifier variables</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Modifier les variables</li>
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

                <div class="card-body">
                  <?php $__currentLoopData = $variable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <form action="<?php echo e(url('update-variable')); ?>" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">

                  <?php echo csrf_field(); ?>
                  
                        <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom université (ar)</label>
                            <input type="text" name="nom_universite_ar" value="<?php echo e($var->nom_universite_ar); ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Nom université (fr)</label>
                            <input type="text" name="nom_universite_fr" value="<?php echo e($var->nom_universite_fr); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom établissement (ar)</label>
                            <input type="text" name="nom_etab_ar" value="<?php echo e($var->nom_etab_ar); ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Nom établissement (fr)</label>
                            <input type="text" name="nom_etab_fr" value="<?php echo e($var->nom_etab_fr); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                        <div class="row">
                        <div class="col-md-6">
                            <label for="">Adresse (ar)</label>
                            <input type="text" name="adresse_ar" value="<?php echo e($var->adresse_ar); ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Adresse (fr)</label>
                            <input type="text" name="adresse_fr" value="<?php echo e($var->adresse_fr); ?>" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Année universitaire </label>
                            <input type="text" name="annee_universitaire" value="<?php echo e($var->annee_universitaire); ?>" class="form-control">
                        </div>
                           <div class="col-md-3">
                            <label for="">Abréviation Etablissement</label>
                            <input type="text" name="etab_abrv" value="<?php echo e($var->etab_abrv); ?>" class="form-control">
                        </div>
                    
                    </div>
                      
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom directeur (ar)</label>
                            <input type="text" name="directeur_ar" value="<?php echo e($var->directeur_ar); ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Nom directeur (fr)</label>
                            <input type="text" name="directeur_fr" value="<?php echo e($var->directeur_fr); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom secrétaire générale (ar)</label>
                            <input type="text" name="secretaire_ar" value="<?php echo e($var->secretaire_ar); ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Nom secrétaire générale (fr)</label>
                            <input type="text" name="secretaire_fr" value="<?php echo e($var->secretaire_fr); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                
                      <div class="row">
                              <div class="col-md-3">
                            <label for="">Numéro Tel</label>
                            <input type="text" name="tel" value="<?php echo e($var->tel); ?>" class="form-control">
                        </div>
                              <div class="col-md-3">
                           <label for="">Numéro Fax</label>
                            <input type="text" name="fax" value="<?php echo e($var->fax); ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Place(ar)</label>
                            <input type="text" name="place_ar" value="<?php echo e($var->place_ar); ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Place(fr)</label>
                            <input type="text" name="place_fr" value="<?php echo e($var->place_fr); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h3>Position 1:</h3><br> 
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Longitude</label>
                            <input type="text" name="long" value="<?php echo e($var->long); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Latitude</label>
                            <input type="text" name="lat" value="<?php echo e($var->lat); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Rayon</label>
                            <input type="text" name="rayon" value="<?php echo e($var->rayon); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h3>Position 2:</h3><br> 
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Longitude (2)</label>
                            <input type="text" name="long_2" value="<?php echo e($var->long_2); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Latitude (2)</label>
                            <input type="text" name="lat_2" value="<?php echo e($var->lat_2); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Rayon (2)</label>
                            <input type="text" name="rayon_2" value="<?php echo e($var->rayon_2); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                      <hr>
                    <h3>Position 3:</h3><br> 
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Longitude (3)</label>
                            <input type="text" name="long_3" value="<?php echo e($var->long_3); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Latitude (3)</label>
                            <input type="text" name="lat_3" value="<?php echo e($var->lat_3); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Rayon (3)</label>
                            <input type="text" name="rayon_3" value="<?php echo e($var->rayon_3); ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success float-right">Modifier</button>
                    </div>
                </form>
                <br><hr><br>
   <form action="<?php echo e(url('update-signChefDep')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-input-steps" style="text-align: left;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="float: left;">Logo Université</label>
                                <input type="file" value="<?php echo e($var->logo_universite); ?>" class="form-control" name="logo_universite" required><br>
                                <button type="submit" class="btn btn-warning">Modifier fichier</button>
                            </div>
                            <div class="form-group col-md-6">
                                <center>
                                    <img src=<?php echo e(asset($upload.'/variables/'.$var->logo_universite)); ?> style="width:200px !important; height: 160px;">
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
                <br><hr><br>
                        <form action="<?php echo e(url('update-logoVariable')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-input-steps" style="text-align: left;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="float: left;">Logo Etablissement</label>
                                <input type="file" value="<?php echo e($var->logo); ?>" class="form-control" name="logo" required><br>
                                <button type="submit" class="btn btn-warning">Modifier fichier</button>
                            </div>
                            <div class="form-group col-md-6">
                                <center>
                                    <img src=<?php echo e(asset($upload.'/variables/'.$var->logo)); ?> style="width:160px !important; height: 160px;">
                                </center>
                            </div>
                        </div>
                    </div>
                          
                </form>
                     <br><hr><br>
                   <form action="<?php echo e(url('update-image')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-input-steps" style="text-align: left;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="float: left;">Logo Etablissement Coloré</label>
                                <input type="file" value="<?php echo e($var->upim); ?>" class="form-control" name="upim" required><br>
                                <button type="submit" class="btn btn-warning">Modifier fichier</button>
                            </div>
                            <div class="form-group col-md-6">
                                <center>
                                    <img src=<?php echo e(asset($upload.'/variables/'.$var->upim)); ?> style="width:160px !important; height: 160px;">
                                </center>
                            </div>
                        </div>
                    </div>
                          
                </form>
                     <br><hr><br>
                  
                <form action="<?php echo e(url('update-signDirecteur')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-input-steps" style="text-align: left;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="float: left;">Signature Directeur</label>
                                <input type="file" value="<?php echo e($var->signature_directeur); ?>" class="form-control" name="signature_directeur" required><br>
                                <button type="submit" class="btn btn-warning">Modifier fichier</button>
                            </div>
                            <div class="form-group col-md-6">
                                <center>
                                    <img src=<?php echo e(asset($upload.'/variables/'.$var->signature_directeur)); ?> style="width:200px !important; height: 160px;">
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
                <br><hr><br>
                  
                <form action="<?php echo e(url('update-signSecretaire')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-input-steps" style="text-align: left;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="float: left;">Signature Secretaire Général</label>
                                <input type="file" value="<?php echo e($var->signature_secretaire); ?>" class="form-control" name="signature_secretaire" required><br>
                                <button type="submit" class="btn btn-warning">Modifier fichier</button>
                            </div>
                            <div class="form-group col-md-6">
                                <center>
                                    <img src=<?php echo e(asset($upload.'/variables/'.$var->signature_secretaire)); ?> style="width:160px !important; height: 160px;">
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
                <br><hr><br>
             
          
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/variable/edit.blade.php ENDPATH**/ ?>