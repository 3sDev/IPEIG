<?php $__env->startSection('title', 'Profil Enseignant'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profil Enseignant</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('teachers')); ?>">Liste des enseignants</a></li>
          <li class="breadcrumb-item active">Profil Enseignant</li>
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
              <img src=<?php echo e(asset($upload.'/teachers/'.$profile->profile_image)); ?> class="profile-user-img img-fluid img-circle" >
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
              <b>Poste</b> <a class="float-right"><?php echo e($profile->type_enseignant); ?></a>
            </li>
            <li class="list-group-item">
              <b>Matricule</b> <a class="float-right"><?php echo e($profile->mat_cnrps); ?></a>
            </li>
            <li class="list-group-item">
              <b>CIN</b> <a class="float-right"><?php echo e($profile->cin); ?></a>
            </li>
            <li class="list-group-item">
              <b>Satus Compte</b> <a class="float-right"><?php echo e($profile->active); ?></a>
            </li>
          </ul>

          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- About Me Box -->
    
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
                  
                  <strong>Etat civil :</strong> <?php echo e($profile->etat_civil); ?><br>
                  <strong>Date naissance :</strong> <?php echo e($profile->ddn); ?><br>
                  <strong>Lieu naissance :</strong> <?php echo e($profile->gov); ?><br>
                    <strong>Adresse :</strong> <?php echo e($profile->rue_teacher); ?><br>
                    <strong>Code Postale:</strong> <?php echo e($profile->codepostal_teacher); ?><br>
                        <strong>Nom Conjoint:</strong> <?php echo e($profile->nom_garant); ?><br>
                  <strong>Profession Conjoint:</strong> <?php echo e($profile->profession_garant); ?><br>
                  <strong>Nombre des enfants:</strong> <?php echo e($profile->nbr_enfant); ?><br>
                    <strong>Email:</strong> <?php echo e($profile->email); ?><br>
                  <strong>Téléphone 1 :</strong> <?php echo e($profile->tel1_teacher); ?><br>
                  <strong>Téléphone 2 :</strong> <?php echo e($profile->tel2_ens); ?><br>
                  <strong>RIB :</strong> <?php echo e($profile->rib_ens); ?><br>
               
                  
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 invoice-col">
                <p class="lead">Enseignant</p>
                <address>

                  <strong>Spécialité :</strong> <?php echo e($profile->specialite_ens); ?><br>
                  <strong>Département :</strong> <?php echo e($profile->departement->departmentLabel); ?><br>
                  <strong>Diplome :</strong> <?php echo e($profile->diplome1); ?><br>
                  <strong>Année diplome:</strong> <?php echo e($profile->diplome_annee1); ?><br>
                  <strong>Etablissement diplome:</strong> <?php echo e($profile->diplome_etab1); ?><br>
                  
                </address>
              </div>
            </div>
            <!-- /.row -->
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
                    <th></th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $demandetachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
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
                    <a href="<?php echo e(url('show-demandeteacher/'.$demand->id)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="<?php echo e(url('edit-demandeteacher/'.$demand->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <form action="<?php echo e(url('delete-demandeteacher/'.$demand->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                    
                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
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
                    <th>Date absence</th>
                    <th>Statut absence</th>
                    <th>Justification</th>
                    <th>Date Justification</th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $attendanceteachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $teacher->attendances_teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($attendance->id); ?></td>
                    <td><?php echo e($attendance->attendance_date); ?></td>
                    <td><?php echo e($attendance->attendance_statut); ?></td>
                    <td><?php echo e($attendance->justification); ?></td>
                    <td><?php echo e($attendance->date_justification); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
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
                    <th></th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $reclamationteacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $teacher->reclamationsteachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($reclam->id); ?></td>
                    <td><?php echo e($reclam->description); ?></td>

                    <?php if(($reclam->statut=='En cours')): ?>
                    <td><span class="demandEncours"><?php echo e($reclam->statut); ?></span></td>
                    <?php endif; ?>
                    <?php if(($reclam->statut=='Traitée')): ?>
                    <td><span class="demandTraitee"><?php echo e($reclam->statut); ?></span></td>
                    <?php endif; ?>

                    <td><?php echo e(date('Y-m-d', strtotime($reclam->created_at))); ?></td>
                    <td class="text-right">
                      
                      <a href="<?php echo e(url('edit-reclamation/'.$reclam->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="nav-icon fas fa-user"></i></a>
                    </td>
                    <td>
                        <form action="<?php echo e(url('delete-reclamation/'.$reclam->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                            <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </form>
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

<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceenseignant/resources/views/teacher/show.blade.php ENDPATH**/ ?>