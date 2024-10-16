<?php $__env->startSection('title', 'Modifier Demande'); ?>
<?php $__env->startSection('contentPage'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Gestion la demande du l'étudiant</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('demandestudent')); ?>">Demandes Etudiants</a></li>
            <li class="breadcrumb-item active">Traiter la demande</li>
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
.titreDemande{
    background-color: rgb(235, 235, 235);
    padding: 10px 22px;
    border-radius: 12px;
    color: orangered;
    text-align: left;
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
                <h4>Modifier la demande du l'étudiant
                    <a href="<?php echo e(url('demandestudent')); ?>" class="btn btn-danger float-right">Retour</a>
                </h4>
            </div>

            <div class="card-body">

                <?php $__currentLoopData = $demandestudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <form action="<?php echo e(url('update-demandestudent/'.$demand->id)); ?>" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    

                            <div class="row">
                                <div class="col-md-2" style="margin-top:2%;">
                                    <div class="text-center">
                                        <img src=<?php echo e(asset($upload.'/students/'.$demand->student->profile_image)); ?> style="width:150px !important; height: 160px;" class="profile-user-img img-fluid img-circle imgPhoto">
                                    </div>
                                </div>
                                <div class="col-md-5" style="border-left: 1px solid #ccc">
                                    <h5 class="titreDemande">Etudiant </h5>
                                    <div class="profile-head">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>CIN </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($demand->student->cin); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nom et prénom </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($demand->student->prenom.' '.$demand->student->nom); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Classe</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($demand->classe->abbreviation); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Numéro Tél </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p><?php echo e($demand->student->tel1_etudiant); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="border-left: 1px solid #ccc">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h5 class="titreDemande">Demande </h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Type </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo e($demand->sous_type); ?> / <?php echo e($demand->type); ?></p>
                                                </div>
                                            </div>
                                            <?php if($demand->raison): ?>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nbr copie(s) </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo e($demand->raison); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Langue</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php if($demand->langue=='ar'): ?>
                                                        <p>Arabe</p>
                                                    <?php endif; ?>
                                                    <?php if($demand->langue=='fr'): ?>
                                                        <p>Français</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Date Création</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo e(date('Y-m-d - H:i', strtotime($demand->created_at))); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Date Exécution</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo e(date('Y-m-d - H:i', strtotime($demand->updated_at))); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Statut </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="statut" data-style="btn btn-primary btn-round" class="form-control" required>

                                                        <?php if($demand->statut=='En cours'): ?>
                                                            <option value="<?php echo e($demand->statut); ?>"><?php echo e($demand->statut); ?></option>
                                                            <option value="Traitée">Traitée</option>
                                                        <?php endif; ?>
                                                        <?php if($demand->statut=='Traitée'): ?>
                                                            <option value="<?php echo e($demand->statut); ?>"><?php echo e($demand->statut); ?></option>
                                                            <option value="En cours">En cours</option>
                                                        <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="mb-3">
                            <br><br>
                            <a href="<?php echo e(url('students/'.$demand->student->id)); ?>" class="btn btn-link btn-dark btn-just-icon like float-right"><i class="nav-icon fas fa-user"></i></a>
                            <a href="<?php echo e(url('show-demandestudent/'.$demand->id)); ?>" class="btn btn-link btn-info btn-just-icon edit float-right"  style="margin-right:1.4%;" target="_blank"><i class="nav-icon fas fa-eye"></i></a>
                            <button type="submit" class="btn btn-success float-right" style="margin-right:1.4%;">Modifier</button>
                        </div>
                    </form>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/demandestudent/edit.blade.php ENDPATH**/ ?>