<?php $__env->startSection('title', 'Liste des demandes pour les étudiants'); ?>

<?php $__env->startSection('contentPage'); ?>

<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Demandes Etudiants</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des demandes étudiants</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Sous Type</th>
                                <th width="11%">Statut</th>
                                <th>Etudiant</th>
                                <th>Classe</th>
                                <th>Date Envoi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $demandestudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><?php echo e($demand->id); ?></td>
                            <td><?php echo e($demand->type); ?></td>
                            <td><?php echo e($demand->sous_type); ?></td>

                            <?php if(($demand->statut=='En cours')): ?>
                            <td><span class="demandEncours"><?php echo e($demand->statut); ?></span></td>
                            <?php endif; ?>
                            <?php if(($demand->statut=='Traitée')): ?>
                            <td><span class="demandTraitee"><?php echo e($demand->statut); ?></span></td>
                            <?php endif; ?>
                            
                            <td><?php echo e($demand->student->prenom.' '.$demand->student->nom); ?></td>
                            <td><?php echo e($demand->classe->abbreviation); ?></td>
                            <td><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></td>
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
<?php echo $__env->make('adminlayoutenseignant.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/demandestudent/index.blade.php ENDPATH**/ ?>