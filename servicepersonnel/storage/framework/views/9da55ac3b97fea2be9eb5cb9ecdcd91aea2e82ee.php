 
 <?php $__env->startSection('title', 'Liste des avis'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des avis</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des avis</li>
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
.downloadImage {
    width: 20px;
    height: 20px;
    border-radius: 50%;
}

.downloadTitre {
    border: 1px solid #ccc;
    padding: 3px 4px;
    border-radius: 10px;
    margin-left: 2%;
}
.downloadTitre label{
    cursor: pointer;
}
</style>

    <div class="row">
        <?php if(session('message')): ?>
        <h5><?php echo e(session('message')); ?></h5>
            <?php endif; ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des avis</h3>
                    <a download="avis1.jpg" href="<?php echo e(url('upload/avis1.jpg')); ?>" title="بلاغ" class="downloadTitre">
                        <label for="">بلاغ</label>
                        <img alt="بلاغ" src=<?php echo e(url('upload/avis1.jpg')); ?> class="downloadImage">
                    </a>
                    <a download="avis2.jpg" href="<?php echo e(url('upload/avis2.jpg')); ?>" title="إعلام" class="downloadTitre">
                        <label for="">إعلام</label>
                        <img alt="إعلام" src=<?php echo e(url('upload/avis2.jpg')); ?> class="downloadImage">
                    </a>
                    <a download="avis3.jpg" href="<?php echo e(url('upload/avis3.jpg')); ?>" title="عاجل" class="downloadTitre">
                        <label for="">عاجل</label>
                        <img alt="عاجل" src=<?php echo e(url('upload/avis3.jpg')); ?> class="downloadImage">
                    </a>
                    <a href="<?php echo e(url('avis/create')); ?>" class="btn btn-primary float-right">Ajouter</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="6%">Image</th>
                                <th width="20%">titre</th>
                                <th width="45%">Description</th>
                                <th width="10%">Date</th>
                                <th width="4%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $avis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avisElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                            <td><?php echo e($avisElement->id); ?></td>
                            <td class="text-center">
                                <div class="filter-container p-0 row">
                                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                        <a href=<?php echo e(asset($upload.'/avis/images/'.$avisElement->image)); ?> target="_blank" data-toggle="lightbox" data-title="sample 4 - red">
                                        <img class="img-circle" src=<?php echo e(asset($upload.'/avis/images/'.$avisElement->image)); ?> width="60px" height="60px" alt="avis"/>
                                        </a>
                                    </div>
                                </div>  
                            </td>
                            <td><span class="textable"><?php echo e($avisElement->titre); ?></span></td>
                            <td><span class="textable"><?php echo e($avisElement->description); ?></span></td>
                            <td><?php echo e($avisElement->date); ?></td>
                            
                            <td class="text-center">
                                <a href="<?php echo e(url('show-avis/'.$avisElement->id)); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="<?php echo e(url('avis/'.$avisElement->id.'/edit')); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td class="text-center">
                                <form action="<?php echo e(url('delete-avis/'.$avisElement->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="6%">Image</th>
                                <th width="10%">titre</th>
                                <th width="35%">Description</th>
                                <th width="5%">Date</th>
                                <th width="10%"></th>
                                <th width="5%"></th>
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/avis/index.blade.php ENDPATH**/ ?>