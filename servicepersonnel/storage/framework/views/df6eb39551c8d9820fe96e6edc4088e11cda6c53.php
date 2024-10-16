<?php $__env->startSection('title', 'Liste des demandes pour les personnels'); ?>

<?php $__env->startSection('contentPage'); ?>

<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Gestion des demandes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Demandes Personnels</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste de tous les demandes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th width="12%">Statut</th>
                                <th>Personnels</th>
                                <th>Poste</th>
                                <th>Téléphone</th>
                                <th>Date</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $demandepersonnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><?php echo e($demand->id); ?></td>
                            <td><?php echo e($demand->type); ?></td>

                            <?php if(($demand->statut=='En cours')): ?>
                            <td><span class="demandEncours"><?php echo e($demand->statut); ?></span></td>
                            <?php endif; ?>
                            <?php if(($demand->statut=='Traitée')): ?>
                            <td><span class="demandTraitee"><?php echo e($demand->statut); ?></span></td>
                            <?php endif; ?>
                            
                            <td><?php echo e($demand->personnel->prenom.' '.$demand->personnel->nom); ?></td>
                            <td><?php echo e($demand->personnel->poste); ?></td>
                            <td><?php echo e($demand->personnel->tel1_personnel); ?></td>
                            <td><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></td>
                            
                            
                            <td class="text-center">
                                <a href="<?php echo e(url('edit-demandepersonnel/'.$demand->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="nav-icon fas fa-edit"></i></a>
                                
                            </td>
                            
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Statut</th>
                                <th>Personnels</th>
                                <th>Poste</th>
                                <th>Téléphone</th>
                                <th>Date</th>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/demandepersonnel/index.blade.php ENDPATH**/ ?>