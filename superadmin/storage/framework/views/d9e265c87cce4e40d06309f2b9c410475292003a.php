<?php $__env->startSection('title', 'Liste des réclamations'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste des réclamations étudiants</li>
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
                                <th>Description</th>
                                <th>Etudiant</th>
                                <th>Classe</th>
                                <th width="12%">Statut</th>
                                <th>Date d'envoi</th>
                                <th>Date d'exécution</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                                <td><span class="textable"><?php echo e($reclam->descriptionReclamation); ?></span></td>
                                <td><?php echo e($reclam->fullNameStudent); ?></td>
                                <td><?php echo e($reclam->classeStudent); ?></td>
                                
                                <?php if(($reclam->statutReclamation=='En cours')): ?>
                                <td><span class="demandEncours"><?php echo e($reclam->statutReclamation); ?></span></td>
                                <?php endif; ?>
                                <?php if(($reclam->statutReclamation=='Traitée')): ?>
                                <td><span class="demandTraitee"><?php echo e($reclam->statutReclamation); ?></span></td>
                                <?php endif; ?>

                                <td><?php echo e(date('Y-m-d | H:i', strtotime($reclam->dateCreationReclamation))); ?></td>
                                <td><?php echo e(date('Y-m-d | H:i', strtotime($reclam->dateUpdateReclamation))); ?></td>
                                
                                <td class="text-right">
                                    
                                    <a href="<?php echo e(url('edit-reclamationStudent/'.$reclam->idReclamation)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/reclamationStudent/index.blade.php ENDPATH**/ ?>