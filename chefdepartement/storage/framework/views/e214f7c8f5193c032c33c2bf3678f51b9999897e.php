<?php $__env->startSection('title', 'Créer nouveau livre'); ?>
<?php $__env->startSection('contentPage'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Nouveau livre</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('bibliotheques')); ?>">Liste des livres</a></li>
                <li class="breadcrumb-item active">Nouveau livre</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



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

                    <form action="<?php echo e(url('bibliotheques')); ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cet element?')" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Titre</label>
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <br><hr><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Auteur</label>
                                    <input type="text" name="auteur" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nombre des page</label>
                                    <input type="number" name="nbrPage" class="form-control">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 3%">
                                <div class="col-md-6">
                                    <label for="">Catégorie de livre</label>
                                    <div class="select">
                                        <select name="category" class="form-control" data-style="btn btn-primary" required>
                                            <option value="" selected disabled>Selectionner catégorie</option>
                                            <option value="Culture">Culture</option>
                                            <option value="Musique">Musique</option>
                                            <option value="Design">Design</option>
                                            <option value="Mécanique">Mécanique</option>
                                            <option value="Eléctronique">Eléctronique</option>
                                            <option value="Informatique">Informatique</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Langue</label>
                                    <div class="select">
                                        <select name="langue" class="form-control" data-style="btn btn-primary" required>
                                            <option value="" selected disabled>Selectionner la langue</option>
                                            <option value="Français">Français</option>
                                            <option value="Anglais">Anglais</option>
                                            <option value="Arabe">Arabe</option>
                                            <option value="Espagnol">Espagnol</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br><hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Fichier (PDF)</label>
                                    <input type="file" name="fichier" class="form-control" required>                                
                                </div>
                            </div>
                            <br><br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/chefdepartement/resources/views/bibliotheque/create.blade.php ENDPATH**/ ?>