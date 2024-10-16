<?php $__env->startSection('title', 'Liste enseignants'); ?>
<?php $__env->startSection('contentPage'); ?>

<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
<style>
.btn-link{
  color:white;
}
.statutEnsOld{
  background-color: rgb(198, 198, 198);
  color: rgb(0, 0, 0);
  padding: 5px 12px;
  border-radius: 6px;
}

#active{
  background-color: rgb(33, 145, 25);
  color: rgb(255, 255, 255);
  padding: 5px 12px;
  border-radius: 6px;
}

#disactive{
  background-color: rgb(206, 182, 26);
  color: rgb(255, 255, 255);
  padding: 5px 12px;
  border-radius: 6px;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Gestion des enseignants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion des enseignants</li>
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
                      <h3 class="card-title">Liste de tous les enseignants
                      </h3>
                      
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Nom et Prénom</th>
                                  <th>Grade</th>
                                  <th>Poste</th>
                                  <th>Tél</th>
                                  <th>Email</th>
                                  <th>Département</th>
                                  <th width="10%">Activation</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                            <tr>
                              
                              <td><?php echo e($item->prenom .' '. $item->nom); ?></td>
                              <td><?php echo e($item->type_enseignant); ?></td>
                              <td><?php echo e($item->poste); ?></td>
                              <td><?php echo e($item->tel1_teacher); ?></td>
                              <td><?php echo e($item->email); ?></td>
                              <td><?php echo e($item->departement->departmentLabel); ?></td>
                              
                              <td  align="center">
                                <input type="text" style="display: none;" name="active" value="<?php echo e($item->active); ?>">

                                  <?php if(($item->active == '0')): ?>
                                    <span id="active" class="statutEns">Désactivé</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '1')): ?>
                                    <span id="disactive" class="statutEns">Activé</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '2')): ?>
                                    <span class="statutEns">Fin Vacation</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '3')): ?>
                                    <span class="statutEns">Fin Contractuel</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '4')): ?>
                                    <span class="statutEns">Fin Expert</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '5')): ?>
                                    <span class="statutEns">Mutation</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '6')): ?>
                                    <span class="statutEns">Retraite</span>
                                  <?php endif; ?>
                                  <?php if(($item->active == '7')): ?>
                                    <span class="statutEns">Coopération</span>
                                  <?php endif; ?>
                              </td>
                              
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>Nom et Prénom</th>
                                  <th>Grade</th>
                                  <th>Poste</th>
                                  <th>Tél</th>
                                  <th>Email</th>
                                  <th>Département</th>
                                  <th width="10%">Activation</th>
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
<?php echo $__env->make('adminlayoutenseignant.layoutdatatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/chefdepartement/resources/views/teacher/index.blade.php ENDPATH**/ ?>