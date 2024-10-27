 
 <?php $__env->startSection('title', 'Gestion des états des enseignants'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="m-0">Gestion des états des enseignants </h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion des états des enseignants </li>
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
          <div class="alert alert-success">
        <h5> <?php echo e(session('message')); ?></h5>
    </div>
<?php endif; ?>
       
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="container-tab">
                              
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <hr><br>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane show fade active" id="pills-categorie" role="tabpanel" aria-labelledby="pills-categorie-tab">
                            <div class="col-lg-12" style="text-align:left !important;">
                                <div class="form-group">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                            <a href="<?php echo e(url('enseignantEtat/create')); ?>" target="_blank" class="btn btn-success float-right">Ajouter</a><br><br>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">ID</th>
                                                        <th>Value</th>
                                                        <th>Etat Enseignant</th>
                                                        
                                                        <th>حالة الاستاذ</th>
                                                      <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $Enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <tr>
                                                        <td><?php echo e($cat->id); ?></td>
                                                         <td><?php echo e($cat->value); ?></td>
                                                        <td><?php echo e($cat->Etat_fr); ?></td>
                                                        <td><?php echo e($cat->Etat_ar); ?></td>
                                                        
                                                        
                                                        <td class="text-center">
                                                            <form action="<?php echo e(route('enseignantEtat.destroy',$cat->id)); ?>" method="POST">
                                                               <?php echo csrf_field(); ?>
                                                              <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                 

                    

                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/enseignantEtat/show.blade.php ENDPATH**/ ?>