 
 <?php $__env->startSection('title', 'Les courriers entrants'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des courriers entrants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des courriers entrants</li>
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
.badge{
    font-size: 15px;
}
</style>

    <div class="row">
        <?php if(session('message')): ?>
        <h5><?php echo e(session('message')); ?></h5>
            <?php endif; ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(url('entrants/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Num. Ordre</th>
                                <th>Date arrivée</th>
                                <th>Sujet</th>
                                <th>Destinataire</th>
                                <th>Date livraison</th>
                                <th width="11%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $entrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><?php echo e($element->id); ?></td>
                            <td><span><?php echo e($element->numero_ordre); ?></span></td>
                            <td><span><?php echo e($element->date_arrivee); ?></span></td>
                            <td><span class="textable"><?php echo e($element->sujet); ?></span></td>
                            <td><span><?php echo e($element->destinataire); ?></span></td>
                            <td><span><?php echo e($element->date_livraison); ?></span></td>
                            
                            <td class="text-center">
                                <a href="<?php echo e(url('show-entrant/'.$element->id)); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="<?php echo e(url('edit-entrant/'.$element->id)); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td class="text-center">
                                <form action="<?php echo e(url('delete-entrant/'.$element->id)); ?>" onsubmit="return confirm('Confirmation de supprimer ce courrier?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Num. Ordre</th>
                                <th>Date arrivée</th>
                                <th>Sujet</th>
                                <th>Destinataire</th>
                                <th>Date livraison</th>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/bureaudordre/resources/views/entrant/index.blade.php ENDPATH**/ ?>