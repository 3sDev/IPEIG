 
 <?php $__env->startSection('title', 'Liste des PFE'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des PFE + Mémoire Mastère</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des PFE</li>
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
                                <th>Etudiant</th>
                                <th>Groupe</th>
                                <th>Type</th>
                                <th>Stage</th>
                                <th>Binôme</th>
                                <th>Encadrant</th>
                                <th>Société</th>
                                <th>Statut</th>
                                <th width="14%">D.Demande</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $Stagespfe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfeElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><?php echo e($pfeElement->student->full_name); ?></td>
                            <td><span><?php echo e($pfeElement->classe->abbreviation); ?></span></td>
                            <td><span><?php echo e($pfeElement->classe->category); ?></span></td>

                            <?php if($pfeElement->sous_type=='اقتراح مشروع تخرج في شركة'): ?>
                                <td>Industriel</td>
                            <?php else: ?>
                                <td>Didactique</td>
                            <?php endif; ?>

                            <td><span><?php echo e($pfeElement->binome_pfe); ?></span></td>
                            <td><span><?php echo e($pfeElement->encadrant_pfe); ?></span></td>
                            <td><span><?php echo e($pfeElement->nom_societe_pfe); ?> </span></td>
                            <td><span><?php echo e($pfeElement->statut); ?> </span></td>
                            <td>
                                <?php echo e(date('Y-m-d | H:i', strtotime($pfeElement->created_at))); ?>


                                
                            </td>
                            
                            <td class="text-right">
                                
                                <a href="<?php echo e(url('pfe/'.$pfeElement->id.'/edit')); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                <form action="<?php echo e(url('delete-pfeDirection/'.$pfeElement->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Etudiant</th>
                                <th>Groupe</th>
                                <th>Type</th>
                                <th>Stage</th>
                                <th>Binôme</th>
                                <th>Encadrant</th>
                                <th>Société</th>
                                <th>D.Demande</th>
                                <th>Statut</th>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicestage/resources/views/stagepfe/index.blade.php ENDPATH**/ ?>