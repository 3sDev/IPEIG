<?php $__env->startSection('title', 'Liste des emploi de temps'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Liste des emploi de temps pour les étudiants</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des emploi de temps des Groupes</li>
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
.emploiTemps{
width: 60px;
height: 40px;
border: 1px solid #ccc;
transition: transform .2s; /* Animation */
margin: 0 auto;
}
.emploiTemps:hover {
transform: scale(4.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
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
                            <th width="16%">Emploi</th>
                            <th width="9%">Année</th>
                            <th width="7%">Semestre</th>
                            <th>Classe</th>
                            <th width="12%">Date</th>
                            <th width="5%">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $emploiStudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                        <td class="text-center">
                            <div class="filtr-item">
                                <a href=<?php echo e(asset($upload.'/emploi-student-file/'.$emploi->fichier)); ?> target="_blank" data-toggle="lightbox" data-title="sample 4 - red">
                                <img class="emploiTemps" src=<?php echo e(asset($upload.'/emploi-student-file/'.$emploi->fichier)); ?> alt="Emploi"/>
                                </a>
                            </div>
                        </td>
                        <td><?php echo e($emploi->annee_universitaire); ?></td>
                        <td class="text-center"><?php echo e($emploi->semestre); ?></td>
                        <td><?php echo e($emploi->classe->abbreviation); ?></td>
                        <td><?php echo e(date('F d, Y', strtotime($emploi->created_at))); ?></td>
                        
                        <td class="text-center">
                            <a href="<?php echo e(url('show-emploiStudent/'.$emploi->id)); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                            
                        </td>
                        
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Emploi</th>
                            <th>Année</th>
                            <th>Semestre</th>
                            <th>Classe</th>
                            <th>Date</th>
                            <th>Action</th>
                            
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
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/emploi_student/index.blade.php ENDPATH**/ ?>