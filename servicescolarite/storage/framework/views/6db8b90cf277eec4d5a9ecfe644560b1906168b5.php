<?php $__env->startSection('title', 'Rechercher étudiants'); ?>
<?php $__env->startSection('contentPage'); ?>
<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Filtrage des Etudiants</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Rechercher un étudiant</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<link rel="stylesheet" href="<?php echo e(URL::asset('css/ajaxSelect.css')); ?>" />
<style>
.btn-link{
    color:white;
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
                    <a href="<?php echo e(url('dashboards')); ?>" class="btn btn-danger float-right">Back</a>
                </div>
                <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Cin</th>
                                <th>Nom et Prénom</th>
                                <th>Classe</th>
                                <th>Département</th>
                                <th>Niveau</th>
                                <th>Genre</th>
                                <th>Type Inscription</th>
                                <th>Annee Bac</th>
                                <th>Session Bac</th>
                                <th>Section Bac</th>
                                <th>Moyenne Bac</th>
                                <th>Gouvernorat </th>
                                <th>Tel </th>
                            
                                <th class="disabled-sorting text-center">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                                 <td><a href="<?php echo e(url('students/'.$item->id)); ?>" target="_blank"><img src="<?php echo e(asset($upload.'/students/'.$item->profile_image)); ?>" style="width:50px;height:50px"></a></td>
                                 <td><?php echo e($item->cin); ?></td>
                                <td><?php echo e($item->prenom .' '. $item->nom); ?></td>
                                <td><?php echo e($item->classe->abbreviation); ?></td>
                                <td><?php echo e($item->filiere); ?></td>
                                <td><?php echo e($item->diplome); ?></td>
                                <td><?php echo e($item->genre); ?></td>
                                <td><?php echo e($item->type_inscription); ?></td>
                                <td><?php echo e($item->annee_bac); ?></td>
                                <td><?php echo e($item->session_bac); ?></td>
                                <td><?php echo e($item->section_bac); ?></td>
                                <td><?php echo e($item->moyenne_bac); ?></td>
                                 <td><?php echo e($item->gov); ?></td>
                               <td><?php echo e($item->tel1_etudiant); ?></td>
                             

                                   
                                <td align="center">

                                <?php if(($item->active == '0')): ?>
                                <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Désactivé</button>
                                <?php endif; ?>
                                <?php if(($item->active == '1')): ?>
                                <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Inscrit / Activé</button>
                                <?php endif; ?>
                                <?php if(($item->active == '2')): ?>
                                <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Non inscrit</button>
                                <?php endif; ?>
                                <?php if(($item->active == '3')): ?>
                                <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm">Retrait Inscrit</button>
                                <?php endif; ?>
                                <?php if(($item->active == '4')): ?>
                                <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Mutation</button>
                                <?php endif; ?>
                            </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Cin</th>
                                <th>Nom et Prénom</th>
                                <th>Classe</th>
                                <th>Département</th>
                                <th>Niveau</th>
                                <th>Genre</th>
                                <th>Type Inscription</th>
                                <th>Annee Bac</th>
                                <th>Session Bac</th>
                                <th>Section Bac</th>
                                <th>Moyenne Bac</th>
                                <th>Gouvernorat </th>
                                <th>Tel </th>
                                <th class="disabled-sorting text-center">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/student/search.blade.php ENDPATH**/ ?>