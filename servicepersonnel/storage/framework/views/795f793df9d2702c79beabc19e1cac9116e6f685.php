<?php $__env->startSection('title', 'Profil Personnel'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profil Personnel</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('personnels')); ?>">Liste des personnels</a></li>
          <li class="breadcrumb-item active">Profil Personnel</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />

<div class="row">
  <div class="col-md-3">
    <?php if(session('message')): ?>
      <h5><?php echo e(session('message')); ?></h5>
    <?php endif; ?>
    <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <?php if($profile->profile_image): ?>
              <img src=<?php echo e(asset($upload.'/personnels/'.$profile->profile_image)); ?> class="profile-user-img img-fluid img-circle" >
            <?php else: ?>
              <img class="profile-user-img img-fluid img-circle"
              src=<?php echo e(asset('https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png')); ?>

              alt="Teacher profile picture">
            <?php endif; ?>
          </div>
          <h3 class="profile-username text-center"><?php echo e($profile->prenom.' '.$profile->nom); ?></h3>

          <p class="text-muted text-center"><?php echo e($profile->prenom_ar.' '.$profile->nom_ar); ?></p>

          <ul class="list-group list-group-unbordered mb-3">
            
            <li class="list-group-item">
              <b>Matricule</b> <a class="float-right"><?php echo e($profile->mat_cnrps); ?></a>
            </li>
            <li class="list-group-item">
              <b>CIN</b> <a class="float-right"><?php echo e($profile->cin); ?></a>
            </li>
            <li class="list-group-item">
              <b>Email</b> <a class="float-right"><?php echo e($profile->email); ?></a>
            </li>
          </ul>

          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#infos" data-toggle="tab">Informations personnel</a></li>
          <li class="nav-item"><a class="nav-link" href="#demande" data-toggle="tab">Demandes</a></li>
          <li class="nav-item"><a class="nav-link" href="#attendance" data-toggle="tab">Attendance</a></li>
          <li class="nav-item"><a class="nav-link" href="#reclamation" data-toggle="tab">Réclamations</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <!-- /.tab-pane -->
          <div class="active tab-pane" id="infos">
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-6 invoice-col">
                <p class="lead">Informations personnels</p>
                <address>
                  <strong>Genre :</strong> <?php echo e($profile->genre); ?><br>
                  <strong>Nationnalité :</strong> <?php echo e($profile->nationnalite); ?><br>
                  
                  
                  <strong>Téléphone 1 :</strong> <?php echo e($profile->tel1_personnel); ?><br>
                  <strong>Téléphone 2 :</strong> <?php echo e($profile->tel2_personnel); ?><br>
                  <strong>RIB :</strong> <?php echo e($profile->rib_perso); ?><br>
                  
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 invoice-col">
                <p class="lead">Service</p>
                <address>
                  <strong>Catégorie :</strong> <?php echo e($profile->categorie); ?><br>
                  <strong>Fonction :</strong> <?php echo e($profile->grade); ?><br>
                  <strong>Grade :</strong> <?php echo e($profile->poste); ?><br>
                  <strong>Date Grade :</strong> <?php echo e($profile->grade_date); ?><br>
                  <strong>Date récrutement :</strong> <?php echo e($profile->date_recrutement); ?><br>
                 
                  
                </address>
              </div>
            </div>
            <!-- /.row -->
            <div class="row invoice-info">
              <div class="col-sm-6 invoice-col">
                <p class="lead">Adresse</p>
                <address>
                  <strong>Adresse (FR) :</strong> <?php echo e($profile->rue_personnel); ?><br>
                  <strong>Adresse (AR) :</strong> <?php echo e($profile->rue_personnel_ar); ?><br>
                  <strong>Nom Garant :</strong> <?php echo e($profile->nom_garant); ?><br>
                  <strong>Profession garant:</strong> <?php echo e($profile->profession_garant); ?><br>
                  <strong>Nombre des enfants:</strong> <?php echo e($profile->nbr_enfant); ?><br>
                  
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 invoice-col">
            
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="demande">
            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Statut</th>
                    <th>Langue</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $demandepersonnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <tr>
                <td><?php echo e($demand->id); ?></td>
                <td><?php echo e($demand->type); ?></td>

                <?php if(($demand->statut=='En cours')): ?>
                <td><span class="demandEncours"><?php echo e($demand->statut); ?></span></td>
                <?php endif; ?>
                <?php if(($demand->statut=='Traitée')): ?>
                <td><span class="demandTraitee"><?php echo e($demand->statut); ?></span></td>
                <?php endif; ?>
                
                <td><?php echo e($demand->langue); ?></td>
                <td><?php echo e(date('Y-m-d / H:i', strtotime($demand->created_at))); ?></td>
                
                
                
                <td class="text-right">
                    <a href="<?php echo e(url('show-demandepersonnel/'.$demand->id)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="<?php echo e(url('edit-demandepersonnel/'.$demand->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                </td>
               
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Statut</th>
                    <th>Langue</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
              </tfoot>
            </table>

          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="attendance">
            
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jour</th>
                    <th>Date absence</th>
                    <th>Statut absence</th>
                    <th>Justification</th>
                    <th>Date Justification</th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $attendancepersonnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($attendance->id); ?></td>
                    <td><?php echo e($attendance->jour); ?></td>
                    <td><?php echo e($attendance->attendance_date); ?></td>
                    <td><?php echo e($attendance->attendance_statut); ?></td>
                    <td><?php echo e($attendance->justification); ?></td>
                    <td><?php echo e($attendance->date_justification); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Jour</th>
                    <th>Date absence</th>
                    <th>Statut absence</th>
                    <th>Justification</th>
                    <th>Date Justification</th>
                  </tr>
              </tfoot>
            </table>

          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="reclamation">
            
            <table id="example3" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Reclamation</th>
                    <th>Statut</th>
                    <th>Date création</th>
                    <th></th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $reclamationpersonnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $reclam->reclamationspersonnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($element->id); ?></td>
                    <td><?php echo e($element->description); ?></td>

                    <?php if(($element->statut=='En cours')): ?>
                    <td><span class="demandEncours"><?php echo e($element->statut); ?></span></td>
                    <?php endif; ?>
                    <?php if(($element->statut=='Traitée')): ?>
                    <td><span class="demandTraitee"><?php echo e($element->statut); ?></span></td>
                    <?php endif; ?>

                    <td><?php echo e(date('Y-m-d', strtotime($element->created_at))); ?></td>
                    <td class="text-right">
                      
                      <a href="<?php echo e(url('edit-reclamation/'.$element->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="nav-icon fas fa-user"></i></a>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Reclamation</th>
                    <th>Statut</th>
                    <th>Date création</th>
                    <th></th>
                  </tr>
              </tfoot>
            </table>

          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/personnel/show.blade.php ENDPATH**/ ?>