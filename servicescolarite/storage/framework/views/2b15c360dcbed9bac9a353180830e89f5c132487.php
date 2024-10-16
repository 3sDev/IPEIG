 
 <?php $__env->startSection('title', 'Liste des rattrapages'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des rattrapages</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des rattrapages</li>
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
                                <th width="5%">ID</th>
                                <th>Date</th>
                                <th>Séance</th>
                                <th>Durée</th>
                                <th>Matière</th>
                                <th>Enseignant</th>
                                <th>Classe</th>
                                <th>Salle</th>
                                <th>Statut</th>
                                <th>D.Création</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rattrapages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rattrapage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(Carbon\Carbon::now() > $rattrapage->date ): ?>
                                <tr style="background: rgb(255, 209, 193)">
                            <?php else: ?>
                                <tr style="background: rgb(225, 255, 211)">
                            <?php endif; ?>
                            <td><?php echo e($rattrapage->id); ?></td>
                            <td><?php echo e($rattrapage->date); ?></td>
                            <td><?php echo e($rattrapage->heure_debut.' - '.$rattrapage->heure_fin); ?></td>
                            <td><?php echo e($rattrapage->duree); ?></td>
                            <td><?php echo e($rattrapage->matieres->subjectLabel); ?> <b>(<?php echo e($rattrapage->matieres->description); ?>)</b></td>
                            <td><?php echo e($rattrapage->teacher->full_name); ?></td>
                            <td><?php echo e($rattrapage->classes->abbreviation); ?></td>
                            <td><?php echo e($rattrapage->salles->fullName); ?></td>
                            <td><?php echo e($rattrapage->statut); ?></td>
                            <td><?php echo e(date('Y-m-d | H:i', strtotime($rattrapage->created_at))); ?></td>
                            
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Séance</th>
                                <th>Durée</th>
                                <th>Matière</th>
                                <th>Enseignant</th>
                                <th>Classe</th>
                                <th>Salle</th>
                                <th>Statut</th>
                                <th>D.Création</th>
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
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/rattrapage/index.blade.php ENDPATH**/ ?>