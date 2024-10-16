 
 <?php $__env->startSection('title', 'Liste des congés'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des congés</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des congés</li>
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
.duree {
    background-color: rgb(255, 242, 242);
    font-weight: bold;
    color: rgb(32, 31, 29);
}
.reste {
    background-color: rgb(242, 255, 244);
    font-weight: bold;
    color: rgb(32, 31, 29);
}
.category{
    background-color: rgb(239, 229, 255);
    color: rgb(107, 4, 107);
    padding: 5px 10px;
    border-radius: 6px;
}
</style>

    <div class="row">
        <?php if(session('message')): ?>
        <h5><?php echo e(session('message')); ?></h5>
            <?php endif; ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(url('conges/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="18%">Personnel</th>
                                <th width="8%">Téléphone</th>
                                <th width="8%">Année</th>
                                <th width="16%">Période</th>
                                <th width="8%">Durée</th>
                                <th width="15%">Catégorie</th>
                                <th width="10%">Statut</th>
                                <th width="10%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $conges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><span><?php echo e($element->personnel->nom.' '.$element->personnel->prenom); ?></span></td>
                            <td><span><?php echo e($element->personnel->tel1_personnel); ?></span></td>
                            <td><span><?php echo e($element->annee); ?></span></td>
                            <td><span><?php echo e($element->date_debut.' | '.$element->date_fin); ?></span></td>
                            <td class="text-center"><b><?php echo e($element->duree); ?></b> jour(s)</td>
                            <td><span class="category"><?php echo e($element->categorie->nom); ?></span></td>

                            <?php if(($element->statut=='En cours')): ?>
                            <td><span class="demandEnvoyee"><?php echo e($element->statut); ?></span></td>
                            <?php endif; ?>
                            <?php if(($element->statut=='Accepté')): ?>
                            <td><span class="demandTraitee"><?php echo e($element->statut); ?></span></td>
                            <?php endif; ?>
                            <?php if(($element->statut=='Réfusé')): ?>
                            <td><span class="demandEncours"><?php echo e($element->statut); ?></span></td>
                            <?php endif; ?>
                            
                            <td class="text-center">
                                
                                <a href="<?php echo e(url('edit-conge/'.$element->id.'/'.$element->personnel->id)); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?php echo e(url('show-DemandeConge/'.$element->id.'/'.$element->personnel->id)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm" target="_blank"><i class="nav-icon fas fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                                <?php if(($element->statut=='En cours')): ?>
                                    <form action="<?php echo e(url('delete-conge/'.$element->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                                        <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>
                                <?php else: ?>
                                    <span>--</span>
                                <?php endif; ?>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/conge/index.blade.php ENDPATH**/ ?>