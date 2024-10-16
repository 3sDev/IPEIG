<?php $__env->startSection('title', 'Profil Etudiant'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profil Etudiant</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('students')); ?>">Liste des étudiants</a></li>
          <li class="breadcrumb-item active">Profil Etudiant</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<style>
.invoice-col img{
  width: 100%;
  transition: 0.5s all ease-in-out;
}
.invoice-col:hover img {
        transform: scale(1.5);
    }
</style>
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
                <img src=<?php echo e(asset($upload.'/students/'.$profile->profile_image)); ?> class="profile-user-img img-fluid img-circle" >
              </div>

              <h3 class="profile-username text-center"><?php echo e($profile->prenom.' '.$profile->nom); ?></h3>

              <p class="text-muted text-center"><?php echo e($profile->prenom_ar.' '.$profile->nom_ar); ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <b>Type Inscription</b>   <a class="float-right">
                
                                <?php if(($profile->active == '0')): ?>
                                <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Désactivé</button>
                                <?php endif; ?>
                                <?php if(($profile->active == '1')): ?>
                                <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Inscrit / Activé</button>
                                <?php endif; ?>
                                <?php if(($profile->active == '2')): ?>
                                <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Non inscrit</button>
                                <?php endif; ?>
                                <?php if(($profile->active == '3')): ?>
                                <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm">Retrait Inscrit</button>
                                <?php endif; ?>
                                <?php if(($profile->active == '4')): ?>
                                <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Mutation</button>
                  <?php endif; ?></a>
                    </li>
                <li class="list-group-item">
                  <b>CIN</b> <a class="float-right"><?php echo e($profile->cin); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Téléphone</b> <a class="float-right"><?php echo e($profile->tel1_etudiant); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Type Inscrit</b> <a class="float-right"><?php echo e($profile->type_inscription); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Niveau</b> <a class="float-right"><?php echo e($profile->diplome); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Filière</b> <a class="float-right"><?php echo e($profile->filiere); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Groupe</b> <a class="float-right"><?php echo e($profile->classe->abbreviation); ?></a>
                </li>
                    <li class="list-group-item">
                  <b>Compte Vérifiée</b> <a class="float-right">                 
                    <?php if(($profile->verify == '1')): ?>Oui <?php endif; ?>
                     <?php if(($profile->verify == '0')): ?>Non <?php endif; ?></a>
                           
                
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
              <li class="nav-item"><a class="nav-link" href="#attendance" data-toggle="tab">Absences</a></li>
              <li class="nav-item"><a class="nav-link" href="#reclamation" data-toggle="tab">Réclamations</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane" id="demande">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Année</th>
                        <th width="13%">Statut</th>
                        <th>Langue</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $__currentLoopData = $demandestudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <tr>
                    <td><?php echo e($demand->id); ?></td>
                    <td><?php echo e($demand->type); ?></td>
                    <td><?php echo e($demand->sous_type); ?></td>

                    <?php if(($demand->statut=='En cours')): ?>
                    <td><span class="demandEncours"><?php echo e($demand->statut); ?></span></td>
                    <?php endif; ?>
                    <?php if(($demand->statut=='Traitée')): ?>
                    <td><span class="demandTraitee"><?php echo e($demand->statut); ?></span></td>
                    <?php endif; ?>
                    
                    <td><?php echo e($demand->langue); ?></td>
                  
                    <td><?php echo e(date('Y-m-d - H:i', strtotime($demand->created_at))); ?></td> 
                    
                    <td class="text-right">
                        <a href="<?php echo e(url('edit-demandestudent/'.$demand->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td class="text-right">
                        <a href="<?php echo e(url('show-demandestudent/'.$demand->id)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                    </td>
                    <td>
                        <form action="<?php echo e(url('delete-demandestudent/'.$demand->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                        
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
                        <th>Année</th>
                        <th>Statut</th>
                        <th>Langue</th>
                        <th>Date</th>
                        <th></th>
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
                      <th>Date d'absence</th>
                        <th>Séance</th>
                        <th>Matiere</th>
                        <th>Enseignant</th>
                     
                         <th>Saisie Par</th>
                         <th>Justification</th>
                       
                      </tr>
                  </thead>
                  <tbody>
    
                    <?php $__currentLoopData = $attendancestudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $student->attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                      <tr>
                        
                    
              <td><?php echo e($attendance->attendance_date); ?></td>
               <td><?php echo e($attendance->attendance_seance_debut.'--'.$attendance->attendance_seance_fin); ?></td>
                      <?php $__currentLoopData = $matieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                           <?php if($attendance->matiere_id==$m->id): ?>
                        <td><?php echo e($m->subjectLabel); ?></td>
               
                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                           <?php if($attendance->teacher_id==$t->id): ?>
                        <td><?php echo e($t->nom.' '.$t->prenom); ?></td>
               
                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                          <td><?php echo e($attendance->qui_save_absent); ?></td>
                        <td><?php echo e($attendance->justification); ?></td>
                    
                      </tr>
                       
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                  <tfoot>
                      <tr>
                     <th>Date d'absence</th>
                        <th>Séance</th>
                        <th>Matiere</th>
                        <th>Enseignant</th>
                        <th>Saisie Par</th>
                         <th>Justification</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="reclamation">
                
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Date réclam.</th>
                        <th>Text réclam.</th>
                        <th>Etat réclam.</th>
                   
                        <th></th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $__currentLoopData = $reclamationstudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $student->reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                       <td><?php echo e(date('Y-m-d', strtotime($reclam->created_at))); ?></td>
                        <td><?php echo e($reclam->description); ?></td>

                        <?php if(($reclam->statut=='En cours')): ?>
                        <td><span class="demandEncours"><?php echo e($reclam->statut); ?></span></td>
                        <?php endif; ?>
                        <?php if(($reclam->statut=='Traitée')): ?>
                        <td><span class="demandTraitee"><?php echo e($reclam->statut); ?></span></td>
                        <?php endif; ?>

                       
                        <td class="text-right">
                          
                          <a href="<?php echo e(url('edit-reclamation/'.$reclam->id)); ?>" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="nav-icon fas fa-eye"></i></a>
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
                         <th>Date réclam.</th>
                        <th>Text réclam.</th>
                        <th>Etat réclam.</th>
                      
                        <th></th>
                        <th></th>
                      </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="infos">
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Informations personnels</p>
                    <address>
                      <strong>Genre :</strong> <?php echo e($profile->genre); ?><br>
                      <strong>Etat civil :</strong> <?php echo e($profile->etat_civil); ?><br>
                      <strong>Date naissance :</strong> <?php echo e($profile->ddn); ?><br>
                      <strong>Lieu de naissance :</strong> <?php echo e($profile->lieu_naissance); ?><br>
                      <strong>Téléphone Etudiant :</strong> <?php echo e($profile->tel1_etudiant); ?><br>
                      <strong>Email :</strong> <?php echo e($profile->email); ?>

                      
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Adresse d'étudiant</p>
                    <address>
                      <strong>Nationalité :</strong> <?php echo e($profile->nationalite); ?><br>
                      <strong>Gouvernorat :</strong> <?php echo e($profile->gov); ?><br>
                      <strong>Municipalité :</strong> <?php echo e($profile->municipality); ?><br>
                      <strong>Adresse Domicile FR :</strong> <?php echo e($profile->rue_etudiant); ?><br>
                      <strong>Adresse Domicile AR:</strong> <?php echo e($profile->rue_etudiant_ar); ?><br>
                      <strong>Code Postal:</strong> <?php echo e($profile->codepostal_etudiant); ?><br>
                      
                    </address>
                  </div>
                </div>
                <!-- /.row -->
                <hr>
                <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Parents</p>
                    <address>
                      <strong>Nom et prénom père :</strong> <?php echo e($profile->prenom_pere); ?><br>
                      <strong>Profession de père :</strong> <?php echo e($profile->profession_pere); ?><br>
                      <strong>Nom et prénom mère :</strong> <?php echo e($profile->prenom_mere); ?><br>
                      <strong>Téléphone famille :</strong> <?php echo e($profile->tel2_etudiant); ?><br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Baccalauréat</p>
                    <address>
                      <strong>Année :</strong> <?php echo e($profile->annee_bac); ?><br>
                      <strong>Section :</strong> <?php echo e($profile->section_bac); ?><br>
                      <strong>Session :</strong> <?php echo e($profile->session_bac); ?><br>
                      <strong>Moyenne :</strong> <?php echo e($profile->moyenne_bac); ?><br>
                    </address>
                  </div>
                </div>

                <hr>
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Cin face 1</p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/cin/'.$profile->cin_file)); ?> title="Carte identité nationale Face 1">
                      <img src=<?php echo e(asset($upload.'/students/cin/'.$profile->cin_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Cin face 2</p>
                    <a download="CIN2.png" target="_blank" href=<?php echo e(asset($upload.'/students/cinFace2/'.$profile->cin_file_2)); ?> title="Carte identité nationale Face 2">
                      <img src=<?php echo e(asset($upload.'/students/cinFace2/'.$profile->cin_file_2)); ?> class="img-fluid cinFace2" >
                    </a>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Fiche Inscription (Inscription.tn)</p>
                    <a download="paiement.png" target="_blank" href=<?php echo e(asset($upload.'/students/inscription/'.$profile->paiement_file)); ?> title="Fiche d'incription en ligne">
                      <img src=<?php echo e(asset($upload.'/students/inscription/'.$profile->paiement_file)); ?> class="img-fluid inscription" >
                    </a>
                  </div>
                </div>

              <div class="row invoice-info">

                <?php if(!is_null($profile->derniere_relevee_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Redoublant </p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/derniereReleveeNotes/'.$profile->derniere_relevee_file)); ?> title="Rélevée des notes">
                      <img src=<?php echo e(asset($upload.'/students/derniereReleveeNotes/'.$profile->derniere_relevee_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

                <?php if(!is_null($profile->mutation_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Mutation </p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/mutation/'.$profile->mutation_file)); ?> title="Mutation">
                      <img src=<?php echo e(asset($upload.'/students/mutation/'.$profile->mutation_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

                <?php if(!is_null($profile->sortie_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Attestation de sortie</p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/quiteInstitut/'.$profile->sortie_file)); ?> title="Attestation de sortie">
                      <img src=<?php echo e(asset($upload.'/students/quiteInstitut/'.$profile->sortie_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

                <?php if(!is_null($profile->reorientation_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Réorientation</p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/reorientation/'.$profile->reorientation_file)); ?> title="Réorientation">
                      <img src=<?php echo e(asset($upload.'/students/reorientation/'.$profile->reorientation_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

                <?php if(!is_null($profile->reintegration_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Réintégration </p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/reintegration/'.$profile->reintegration_file)); ?> title="Reintegration">
                      <img src=<?php echo e(asset($upload.'/students/reintegration/'.$profile->reintegration_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

                <?php if(!is_null($profile->demande_ecrit_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Demande Ecrite </p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/demandeEcrite/'.$profile->demande_ecrit_file)); ?> title="demande ecrite">
                      <img src=<?php echo e(asset($upload.'/students/demandeEcrite/'.$profile->demande_ecrit_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

                <?php if(!is_null($profile->recu_paiement_file)): ?>
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Fiche inscription complète </p>
                    <a download="CIN1.png" target="_blank" href=<?php echo e(asset($upload.'/students/recuPaimentComplet/'.$profile->recu_paiement_file)); ?> title="Fiche inscription complète">
                      <img src=<?php echo e(asset($upload.'/students/recuPaimentComplet/'.$profile->recu_paiement_file)); ?> class="img-fluid cinFace1" >
                    </a>
                  </div>
                <?php endif; ?>

              </div>

              </div>
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



<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/student/show.blade.php ENDPATH**/ ?>