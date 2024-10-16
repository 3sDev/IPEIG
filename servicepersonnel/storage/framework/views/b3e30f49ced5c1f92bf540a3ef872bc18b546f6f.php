<?php $__env->startSection('title', 'Gestion des soldes'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
 <div class="container-fluid">
   <div class="row mb-2">
     <div class="col-sm-6">
       <h1 class="m-0">Gestion des soldes</h1>
     </div><!-- /.col -->
     <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
         <li class="breadcrumb-item active">Gestion des soldes</li>
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
</style>

<div class="row">
   <?php if(session('message')): ?>
   <h5><?php echo e(session('message')); ?></h5>
       <?php endif; ?>
   <div class="col-12">
       <div class="card">
           <br>
           <!-- /.card-header -->
           <div class="card-body">
               <form action="<?php echo e(url('addSoldeAndAnnee')); ?>" method="POST" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>
                   <div class="row">
                       <div class="col-md-4"></div>
                       <div class="col-md-4">
                           <label for="">Ajout solde + année de personnel</label>
                           <select name="personnel_id" id="personnel_id" data-style="btn btn-primary" style="width: 100% !important;" required class="form-control" required>
                               <option value="" selected disabled>Selectionner personnel</option>
                               <?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($perso->id); ?>"> <?php echo e($perso->nom.' '.$perso->prenom); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select><br>
                           <center>
                               <button type="submit" class="btn btn-primary">Accéder</button>
                           </center>
                       </div>
                       <div class="col-md-4">
                       </div>
                   </div>
               </form>
               <br><hr><br>
               <h4>Liste des soldes personnels</h4>
               <table id="example1" class="table table-bordered table-striped text-right">
                   <thead>
                       <tr>
                           <th>عطلة مرض</th>
                           <th>عطلة تعويضية</th>
                           <th>عطلة استثنائية</th>
                           <th>عطلة سنوية</th>
                           <th width="10%">الهاتف</th>
                           <th width="18%">الأعوان</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $__currentLoopData = $soldes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                       <tr>
                           <td><span><?php echo e($element->conge_maladie); ?></span></td>
                           <td><span><?php echo e($element->conge_compensatoire); ?></span></td>
                           <td><span><?php echo e($element->conge_exceptionnel); ?></span></td>
                           <td><span><?php echo e($element->conge_annual); ?></span></td>
                           <td><span><?php echo e($element->personnel->tel1_personnel); ?></span></td>
                           <td><span><?php echo e($element->personnel->nom.' '.$element->personnel->prenom); ?></span></td>
                           
                           
                           
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/conge/indexSolde.blade.php ENDPATH**/ ?>