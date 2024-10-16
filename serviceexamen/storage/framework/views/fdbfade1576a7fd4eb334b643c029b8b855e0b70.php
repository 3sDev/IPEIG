<?php $__env->startSection('title', 'Liste des examens'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Liste des examens</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des examens</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

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
.custom-tooltip {
    --bs-tooltip-bg: var(--bs-primary);
}
.teacherNote{
    background-color: rgb(230, 248, 222);
    font-weight: bold;
    color: rgb(44, 172, 57);
}
.teacherNoNote{
    background-color: rgb(245, 236, 215);
    font-weight: bold;
    color: rgb(120, 15, 15);
}
.teacherNote span{
    color: rgb(44, 172, 57);
}
.teacherNoNote span{
    color: rgb(120, 15, 15);
}
</style>

<div class="row">
    <?php if(session('message')): ?>
    <h5><?php echo e(session('message')); ?></h5>
        <?php endif; ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo e(url('AddExamen/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Année</th>
                            <th>Semestre</th>
                            <th>Session</th>
                            <th>Groupe</th>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $examens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                        <td><?php echo e($examen->annee); ?></td>
                        <td><?php echo e($examen->semestre); ?></td>
                        <td><?php echo e($examen->session); ?></td>
                        <td><?php echo e($examen->classe->abbreviation); ?></td>
                        <td><?php echo e($examen->matiere->subjectLabel); ?> <b>(<?php echo e($examen->matiere->description); ?>)</b></td>
                            
                        <?php if($examen->statut == '1'): ?>
                            <td class="teacherNote">
                                <a href="<?php echo e(url('saisir-note/'.$examen->id.'/'.$examen->classe_id)); ?>"><span><?php echo e($examen->teacher->full_name); ?></span></a>
                            </td>
                        <?php else: ?>
                            <td class="teacherNoNote">
                                <a href="<?php echo e(url('saisir-note/'.$examen->id.'/'.$examen->classe_id)); ?>"><span><?php echo e($examen->teacher->full_name); ?></span></a>
                            </td>
                        <?php endif; ?>

                        <td><?php echo e(date('Y-m-d | H:i', strtotime($examen->created_at))); ?></td>
                        
                        <td class="text-center">
                            <?php if($examen->students): ?>
                                <a href="<?php echo e(url('modif-examen/'.$examen->id.'/'.$examen->classe_id)); ?>" class="btn btn-link btn-dark btn-just-icon like btn-sm"><i class="nav-icon fas fa-bars"></i></a>
                            <?php else: ?>
                                <a href="<?php echo e(url('affecter-examen/'.$examen->id.'/'.$examen->classe_id)); ?>" class="btn btn-link btn-success btn-just-icon like btn-sm"><i class="nav-icon fas fa-cog"></i></a>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo e(url('edit-examen/'.$examen->id)); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <?php if($examen->statut == '0'): ?>
                            <td class="text-center">
                                <form action="<?php echo e(url('delete-examenNote/'.$examen->id)); ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces données?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        <?php else: ?>
                            <td class="text-center">
                                --
                            </td>
                        <?php endif; ?>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Année</th>
                            <th>Semestre</th>
                            <th>Session</th>
                            <th>Groupe</th>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Date</th>
                            <th></th>
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
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceexamen/resources/views/examen/index.blade.php ENDPATH**/ ?>