<?php $__env->startSection('title', 'Liste étudiants'); ?>
<?php $__env->startSection('contentPage'); ?>

<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
<style>
  .btn-link{
    color:white;
  }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Gestion des étudiants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion des étudiants</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Liste de tous les étudiants (Inscription en ligne)
                      </h3>
                      
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                        
                                  <th>CIN</th>
                                  <th>Nom et Prénom</th>
                                  <th>Classe</th>
                                  <th>Genre</th>
                                  <th>Date Inscription</th>
                                  <th>Active</th>
                                  <th class="disabled-sorting text-right">Actions</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                            <tr>
                              
                        
                              <td><?php echo e($item->cin); ?></td>
                              <td><?php echo e($item->prenom .' '. $item->nom); ?></td>
                              <td><?php echo e($item->classe->abbreviation); ?></td>
                              <td><?php echo e($item->genre); ?></td>
                              <td><?php echo e(date('Y-m-d - H:i', strtotime($item->created_at))); ?></td>
                              <td>

                                
                                  <input type="text" style="display: none;" name="active" value="<?php echo e($item->active); ?>">

                                  <?php if(($item->active == '0')): ?>
                                  <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Désactivé</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '1')): ?>
                                  <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Inscrit / Activé</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '2')): ?>
                                  <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Non inscrit</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '3')): ?>
                                  <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm">Retrait Inscrit</button>
                                  <?php endif; ?>
                                  <?php if(($item->active == '4')): ?>
                                  <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Mutation</button>
                                  <?php endif; ?>
                                
                            
                              </td>
                              <td class="text-right">
                                <a href="<?php echo e(url('students/'.$item->id)); ?>" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="<?php echo e(url('students/'.$item->id.'/edit')); ?>" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                              
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                          <tfoot>
                              <tr>
                           
                                <th>CIN</th>
                                <th>Nom et Prénom</th>
                                <th>Classe</th>
                                <th>Genre</th>
                                <th>Date Inscription</th>
                                <th>Active</th>
                                <th class="disabled-sorting text-right">Actions</th>
                                
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
  </div>
  <!-- /.container-fluid -->
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlayoutscolarite.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/student/index.blade.php ENDPATH**/ ?>