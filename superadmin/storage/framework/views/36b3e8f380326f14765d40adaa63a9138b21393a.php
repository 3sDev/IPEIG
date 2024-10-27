<?php $__env->startSection('title', 'Pointage Enseignants'); ?>
<?php $__env->startSection('contentPage'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Liste des pointages enseignants</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Liste des pointages</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


<style>
.demandEnvoyee {
    background-color: #d9f00e85;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 10%;
}

.demandEncours {
    background-color: #f0550e8c;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 10%;
}

.demandTraitee {
    background-color: #43f00e83;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 10%;
}
.btn-link{color: white;}
.btn-link:hover{color: white;}
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
                <div class="card-body">
                    <div class="container" >
                       
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Enseignant</th>
                                    <th>Matière</th>
                                    <th>Jour</th>
                                    <th>Séance</th>
                                    <th>Salle</th>
                                    <th>Date Saisie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pointages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td>
                                        <?php if($pointage->lat): ?>
                                            <span class="demandEncours">Enseignant</span>
                                        <?php else: ?> 
                                            <span class="demandTraitee">Chef département</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($pointage->teacher->full_name); ?></td>
                                    <td><?php echo e($pointage->nom_matiere); ?>  (<?php echo e($pointage->type_matiere); ?>)</td>
                                    <td><?php echo e($pointage->jour); ?></td>
                                    <td><?php echo e($pointage->heure_debut); ?>-<?php echo e($pointage->heure_fin); ?></td>
                                    <td><?php echo e($pointage->salle); ?></td>
                                    <td><?php echo e(date('Y-m-d | H:i', strtotime($pointage->created_at))); ?></td>
                                </tr>
    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Enseignant</th>
                                    <th>Matière</th>
                                    <th>Jour</th>
                                    <th>Séance</th>
                                    <th>Salle</th>
                                    <th>Date Saisie</th>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $('select option').each(
        function () {
            $(this).attr("title", $(this).text());
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/pointage/class.blade.php ENDPATH**/ ?>