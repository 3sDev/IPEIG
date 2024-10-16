<?php $__env->startSection('title', 'Créer notes'); ?>
<?php $__env->startSection('contentPage'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Ajouter notes pour un Groupe</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('notes')); ?>">Liste des notes pour les Groupes</a></li>
                <li class="breadcrumb-item active">Créer notes</li>
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
                    <form action="<?php echo e(url('notes')); ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter notes?')" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Titre</label>
                                <input type="text" name="titre" class="form-control">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Classe(Groupe)</label>
                                <select name="classe_id" id="classes" class="form-control" required>
                                    <option value="" selected disabled>Selectionner Classe</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($classe->id); ?>"> <?php echo e($classe->abbreviation); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label for="">Fichier</label>
                                    <input type="file" name="fichier" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br><hr>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Année universitaire</label>
                                <input type="text" value="" name="annee" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">Semestre</label>
                                <select name="semestre" id="semestre" class="form-control" required>
                                    <option value="" selected disabled>Selectionner semestre</option>
                                    <option value="1">S1</option>
                                    <option value="2">S2</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected disabled>Selectionner type</option>
                                    <option value="DS">DS</option>
                                    <option value="Examen">Examen</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Session</label>
                                <select name="session" id="session" class="form-control">
                                    <option value="" selected disabled>Selectionner session</option>
                                    <option value="Principale">Principale</option>
                                    <option value="Controle">Controle</option>
                                </select>
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

<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceexamen/resources/views/note_student/create.blade.php ENDPATH**/ ?>