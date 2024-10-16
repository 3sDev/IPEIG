<?php $__env->startSection('title', 'Modifier Réclamation'); ?>
<?php $__env->startSection('contentPage'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Gestion de réclamation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('reclamations')); ?>">Liste des réclamations</a></li>
            <li class="breadcrumb-item active">Traiter la réclamation</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<style>
.titreDemande{
    background-color: rgb(235, 235, 235);
    padding: 10px 22px;
    border-radius: 12px;
}
.profile-img img {
    width: 180px !important;
    height: 180px !important;
    margin-left: 10%;
    margin-top: 7%;
}
.rotation {
    animation: zoom-in-zoom-out 3s ease infinite;
}

@keyframes zoom-in-zoom-out {
  0% {
    transform: scale(1, 1);
  }
  50% {
    transform: scale(1.5, 1.5);
  }
  100% {
    transform: scale(1, 1);
  }
}
</style>
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
                    <h4>Traiter la réclamation
                        <a href="<?php echo e(url('reclamations')); ?>" class="btn btn-danger float-right">Retour</a>
                    </h4>
                </div>

                <div class="card-body">

                    <?php $__currentLoopData = $reclamationstudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <form action="<?php echo e(url('update-reclamation/'.$reclam->idReclamation)); ?>" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="profile-img">
                                        <img src=<?php echo e(asset($upload.'/students/'.$reclam->photoStudent)); ?> style="width:170px !important; height: 160px;" class="profile-user-img img-fluid img-circle imgPhoto"" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="titreDemande">Etudiant </h5>
                                    <div class="profile-head">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>CIN </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($reclam->cinStudent); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nom et prénom </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($reclam->fullNameStudent); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Classe</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($reclam->classeStudent); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Numéro Tél </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($reclam->telStudent); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="border-left: 1px solid #ccc">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h5 class="titreDemande">Reclamation : 
                                                <?php if($reclam->fileReclamation): ?>
                                                <a href="<?php echo e(asset($upload.'/reclamations/'.$reclam->fileReclamation)); ?>" target="_blank">
                                                    <img class="rotation" src="<?php echo e(asset('dist/img/fichier.png')); ?>" width="30px" height="30px" alt="" style="float: right; margin-top: -.5%;">
                                                </a>
                                                <?php endif; ?>
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Description :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <p><?php echo e($reclam->descriptionReclamation); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Date Création</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <p><?php echo e(date('Y-m-d H:i', strtotime($reclam->dateCreationReclamation))); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Date Exécution</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <p><?php echo e(date('Y-m-d H:i', strtotime($reclam->dateCreationReclamation))); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Réponse :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="reponse" value="<?php echo e($reclam->reponseReclamation); ?>">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:2.5%;">
                                                <div class="col-md-3">
                                                    <label>Statut :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="statut" data-style="btn btn-primary btn-round" class="form-control" required>

                                                            <?php if($reclam->statutReclamation=='En cours'): ?>
                                                                <option value="<?php echo e($reclam->statutReclamation); ?>"><?php echo e($reclam->statutReclamation); ?></option>
                                                                <option value="Traitée">Traitée</option>
                                                            <?php endif; ?>
                                                            <?php if($reclam->statutReclamation=='Traitée'): ?>
                                                                <option value="<?php echo e($reclam->statutReclamation); ?>"><?php echo e($reclam->statutReclamation); ?></option>
                                                                <option value="En cours">En cours</option>
                                                            <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success float-right">Modifier</button>
                            </div>
                        </form>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/reclamation/edit.blade.php ENDPATH**/ ?>