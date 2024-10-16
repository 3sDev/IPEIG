<?php $__env->startSection('title', 'Emploi de temps Enseignant'); ?>
<?php $__env->startSection('contentPage'); ?>

<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
<style>
.btn-link{
  color:white;
}
#div1{
  margin:auto;
  width:100%;
  margin-top: 5% !important;
  /* padding:100px; */
}

#t1 {
  display: inline-block;
  vertical-align: top;
}

.table-emploi{
  border-collapse: collapse;
 }

th, td {
  border: 1px solid #272727;
  padding: 7px;
  text-align: center;
  color:#6e83e0;
  font-weight:bold;
}

th {
  color: White;
  background-color: #575d77;
  
}

th.horaire{
  background-color: #696969;
  color:
}


.silver {
  background-color: rgb(230, 230, 230);}
.vide{
  background-color: #696969;
  width:5px;
}

td:first-child,td.lundi {
  background-color:#575d77;
  color: white;
  font-weight: bold;
  text-align: center;
  width:100px;
  
}

td.jours{
  background-color: #696969;
  width : 30px;
}

code {
   
   display: inline-block;
  vertical-align: middle;
  font-size:20px; 
}

.form-control{
  width: 100% !important;
}

div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em !important;
    /* display: inline-block; */
    width: 70% !important;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #ff7b00 !important;
}
/**********   style séance    ***************/
.styleMatiere{
  font-size: 14px;
  font-weight: 600;
  color: black;
  margin-bottom: -1%;
  line-height: 12pt;
}
.styleProf{
  font-size: 14px;
  font-weight: 400;
  color: rgb(167, 167, 167);
  margin-bottom: -1%;
}
.styleSalle{
  font-size: 13px;
  font-weight: 600;
  color: rgb(197, 70, 12);
  margin-bottom: -2%;
}
.typeMatiere{
  color: #399216;
}
/********* Imprimer emploi du temps **********/
@media print {
    .myDivToPrint {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
}
/**************************************************/
.rotation {
    animation: zoom-in-zoom-out 3s ease infinite;
}

@keyframes zoom-in-zoom-out {
  0% {
    transform: scale(1, 1);
  }
  50% {
    transform: scale(1.5, 1.5);
  }
  100% {
    transform: scale(1, 1);
  }
}
/*************************************************/
.crossed
{
  background-image: linear-gradient(to bottom right,  transparent calc(50% - 1px), rgb(173, 173, 173), transparent calc(50% + 1px)); 
}

.styleSemestre{
  color: #ff7b00;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Emploi de temps Enseignant</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Emploi de temps Enseignant</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-12">
                      <!-- Main content -->
                      <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                          <div class="col-12">
                            <h4>
                              <i class="fas fa-briefcase"></i> Enseignant
                              <small class="float-right"> </small>
                            </h4>
                            <br>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                            <address>
                              <strong>Nom et prénom(Fr) :</strong> <?php echo e($item->prenom.' '.$item->nom); ?><br>
                              <strong>Type compte :</strong> <?php if(($item->active == '0')): ?>
                              <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Désactivé</button>
                              <?php endif; ?>
                              <?php if(($item->active == '1')): ?>
                              <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Activé</button>
                              <?php endif; ?>
                              <?php if(($item->active == '2')): ?>
                              <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Fin Vacation</button>
                              <?php endif; ?>
                              <?php if(($item->active == '3')): ?>
                              <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Fin Contractuel</button>
                              <?php endif; ?>
                              <?php if(($item->active == '4')): ?>
                              <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Fin Expert</button>
                              <?php endif; ?>
                              <?php if(($item->active == '5')): ?>
                              <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Mutation</button>
                              <?php endif; ?>
                              <?php if(($item->active == '6')): ?>
                              <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm">Retraite</button>
                              <?php endif; ?>
                              <?php if(($item->active == '7')): ?>
                              <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Coopération</button>
                              <?php endif; ?>
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            <address>
                              <strong>Email :</strong> <?php echo e($item->email); ?><br>
                              <strong>Téléphone :</strong> <?php echo e($item->tel1_teacher); ?><br>
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            <img class="img-circle" src=<?php echo e(asset($upload.'/teachers/'.$item->profile_image)); ?> width="60px" alt="">
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                            <br><hr><br>
                            <div class="row">
                              <div class="col-12">
                                <h4>
                                  <i class="fas fa-calendar"></i> Emploi de Temps -  <span class="styleSemestre">Semestre <?php echo e($mySemestre); ?></span>
                                  <small class="float-right"> </small>
                                </h4>
                              </div>
                            </div><br>
                                  <div class="container-tab">
                                    <ul class="nav nav-pills mb-6" id="pills-tab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Emploi de temps</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="pills-emploi-tab" data-toggle="pill" href="#pills-emploi" role="tab" aria-controls="pills-emploi" aria-selected="false">Emploi de temps (image)</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="pills-seance-tab" data-toggle="pill" href="#pills-seance" role="tab" aria-controls="pills-seance" aria-selected="false">Liste des séances</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="pills-voeux-tab" data-toggle="pill" href="#pills-voeux" role="tab" aria-controls="pills-voeux" aria-selected="false">Fiche des voeux</a>
                                      </li>

                                    </ul>
                                </div>

                                  <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                      <div class="col-lg-12" style="text-align:left !important;">      
                                            <div class="form-group" id="myPrint" style="background-color: white">
                      
                                              <div id="div1">
                                                <div id="t1" class="myDivToPrint ">
                                                  <br>
                                                  <center><h4>Emploi du temps enseignant: <b><?php echo e($item->prenom.' '.$item->nom); ?></b></h4></center>      
                                                  <br>
                                                  <table class="table-emploi" style="100% !important;">
                                                    
                                                    <tr>
                                                      <td class= "jours"
                                                          rowspan ="6"><code>j<br/>o<br/>u
                                                        <br/>r<br/>s</code></td>
                                                        <td class="lundi"> Lundi </td>
                                                        
                                                        <?php $__currentLoopData = $teacherEmploiLundi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiLundi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if(!is_null($emploiLundi)): ?>
                                                          <?php if($emploiLundi->type_seance == '15'): ?>
                                                            <td class="crossed">
                                                          <?php else: ?>
                                                            <td>
                                                          <?php endif; ?>
                                                            <span class="styleHeure"><?php echo e($emploiLundi->heure_debut); ?> - <?php echo e($emploiLundi->heure_fin); ?></span>
                                                            <p class="styleMatiere"><?php echo e($emploiLundi->matiere->subjectLabel); ?> <span class="typeMatiere"><?php echo e($emploiLundi->matiere->description); ?> / <?php echo e($emploiLundi->matiere->semestre); ?></span></p>
                                                            <p class="styleProf"><?php echo e($emploiLundi->classe->abbreviation); ?></p>
                                                            <p class="styleSalle"><?php echo e($emploiLundi->salle->fullName); ?></p>
                                                          </td>
                                                        <?php else: ?>
                                                          <td class="silver"><br><br><br></td>
                                                        <?php endif; ?>
                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                      </tr>
                                                      <tr>
                                                        <td class="mardi"> Mardi </td>
  
                                                        <?php $__currentLoopData = $teacherEmploiMardi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiMardi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                        <?php if(!is_null($emploiMardi) ): ?>
                                                          <?php if($emploiMardi->type_seance == '15'): ?>
                                                            <td class="crossed">
                                                          <?php else: ?>
                                                            <td>
                                                          <?php endif; ?>
                                                            <span class="styleHeure"><?php echo e($emploiMardi->heure_debut); ?> - <?php echo e($emploiMardi->heure_fin); ?></span>
                                                            <p class="styleMatiere"><?php echo e($emploiMardi->matiere->subjectLabel); ?> <span class="typeMatiere"><?php echo e($emploiMardi->matiere->description); ?> / <?php echo e($emploiMardi->matiere->semestre); ?></span></p>
                                                            <p class="styleProf"><?php echo e($emploiMardi->classe->abbreviation); ?></p>
                                                            <p class="styleSalle"><?php echo e($emploiMardi->salle->fullName); ?></p>
                                                          </td>
                                                        <?php else: ?>
                                                          <td class="silver"><br><br><br></td>
                                                        <?php endif; ?>
                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                      </tr>
                                                      <tr>
                                                        <td class="mercredi"> Mercredi </td>
  
                                                        <?php $__currentLoopData = $teacherEmploiMercredi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiMercredi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                        <?php if(!is_null($emploiMercredi) ): ?>
                                                          <?php if($emploiMercredi->type_seance == '15'): ?>
                                                            <td class="crossed">
                                                          <?php else: ?>
                                                            <td>
                                                          <?php endif; ?>
                                                            <span class="styleHeure"><?php echo e($emploiMercredi->heure_debut); ?> - <?php echo e($emploiMercredi->heure_fin); ?></span>
                                                            <p class="styleMatiere"><?php echo e($emploiMercredi->matiere->subjectLabel); ?> <span class="typeMatiere"><?php echo e($emploiMercredi->matiere->description); ?> / <?php echo e($emploiMercredi->matiere->semestre); ?></span></p>
                                                            <p class="styleProf"><?php echo e($emploiMercredi->classe->abbreviation); ?></p>
                                                            <p class="styleSalle"><?php echo e($emploiMercredi->salle->fullName); ?></p>
                                                          </td>
                                                        <?php else: ?>
                                                          <td class="silver"><br><br><br></td>
                                                        <?php endif; ?>
                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                      </tr>
                                                      <tr>
                                                        <td class="jeudi"> Jeudi </td>
  
                                                        <?php $__currentLoopData = $teacherEmploiJeudi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiJeudi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                        <?php if(!is_null($emploiJeudi) ): ?>
                                                          <?php if($emploiJeudi->type_seance == '15'): ?>
                                                            <td class="crossed">
                                                          <?php else: ?>
                                                            <td>
                                                          <?php endif; ?>
                                                            <span class="styleHeure"><?php echo e($emploiJeudi->heure_debut); ?> - <?php echo e($emploiJeudi->heure_fin); ?></span>
                                                            <p class="styleMatiere"><?php echo e($emploiJeudi->matiere->subjectLabel); ?> <span class="typeMatiere"><?php echo e($emploiJeudi->matiere->description); ?> / <?php echo e($emploiJeudi->matiere->semestre); ?></span></p>
                                                            <p class="styleProf"><?php echo e($emploiJeudi->classe->abbreviation); ?></p>
                                                            <p class="styleSalle"><?php echo e($emploiJeudi->salle->fullName); ?></p>
                                                          </td>
                                                        <?php else: ?>
                                                          <td class="silver"><br><br><br></td>
                                                        <?php endif; ?>
                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  
                                                      </tr>
                                                      <tr>
                                                        <td class="vendredi"> Vendredi </td>
  
                                                        <?php $__currentLoopData = $teacherEmploiVendredi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiVendredi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                        <?php if(!is_null($emploiVendredi) ): ?>
                                                          <?php if($emploiVendredi->type_seance == '15'): ?>
                                                            <td class="crossed">
                                                          <?php else: ?>
                                                            <td>
                                                          <?php endif; ?>
                                                            <span class="styleHeure"><?php echo e($emploiVendredi->heure_debut); ?> - <?php echo e($emploiVendredi->heure_fin); ?></span>
                                                            <p class="styleMatiere"><?php echo e($emploiVendredi->matiere->subjectLabel); ?> <span class="typeMatiere"><?php echo e($emploiVendredi->matiere->description); ?> / <?php echo e($emploiVendredi->matiere->semestre); ?></span></p>
                                                            <p class="styleProf"><?php echo e($emploiVendredi->classe->abbreviation); ?></p>
                                                            <p class="styleSalle"><?php echo e($emploiVendredi->salle->fullName); ?></p>
                                                          </td>
                                                        <?php else: ?>
                                                          <td class="silver"><br><br><br></td>
                                                        <?php endif; ?>
                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  
                                                      </tr>
                                                      <tr>
                                                        <td class="samedi"> Samedi </td>
  
                                                        <?php $__currentLoopData = $teacherEmploiSamedi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiSamedi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                        <?php if(!is_null($emploiSamedi) ): ?>
                                                          <?php if($emploiSamedi->type_seance == '15'): ?>
                                                            <td class="crossed">
                                                          <?php else: ?>
                                                            <td>
                                                          <?php endif; ?>
                                                            <span class="styleHeure"><?php echo e($emploiSamedi->heure_debut); ?> - <?php echo e($emploiSamedi->heure_fin); ?></span>
                                                            <p class="styleMatiere"><?php echo e($emploiSamedi->matiere->subjectLabel); ?> <span class="typeMatiere"><?php echo e($emploiSamedi->matiere->description); ?> / <?php echo e($emploiSamedi->matiere->semestre); ?></span></p>
                                                            <p class="styleProf"><?php echo e($emploiSamedi->classe->abbreviation); ?></p>
                                                            <p class="styleSalle"><?php echo e($emploiSamedi->salle->fullName); ?></p>
                                                          </td>
                                                        <?php else: ?>
                                                        <td class="silver"><br><br><br></td>
                                                        <?php endif; ?>
                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                      </tr>
                                                    </table>
                                                    <br><br>
                                                </div>  
                                                </div>
                                                <!-- partial -->
                                              </div>
                                                <button id="convert" class="btn btn-success">
                                                  Télécharger Emploi
                                                  </button>
                                                  <div id="result">
                                                      <!-- Result will appear be here -->
                                                  </div>
                                          </div>
                                    </div>

                                    <div class="tab-pane show fade" id="pills-emploi" role="tabpanel" aria-labelledby="pills-emploi-tab">
                                      <div class="col-lg-12" style="text-align:left !important;">
                                        <div class="form-group">
                                          <br><br><br>
                                          <?php $__currentLoopData = $emploiTeacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploiFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($emploiFile->fichier): ?>
                                              <center>
                                                <img class="" src=<?php echo e(asset($upload.'/emploi-teacher-file/'.$emploiFile->fichier)); ?> width="70%" alt=""><br>
                                              </center>
                                            <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <center>
                                            <b>Pour ajouter/modifier un emploi de temps de type image <a href="<?php echo e(url('emploi')); ?>" class="rotation">cliquer ici</a></b>
                                          </center>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="tab-pane show fade" id="pills-seance" role="tabpanel" aria-labelledby="pills-seance-tab">
                                      <div class="col-lg-12" style="text-align:left !important;">
                                        <div class="form-group">
                                          <br><br><br>
                                          <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th>Classe</th>
                                                    <th>Matières</th>
                                                    <th>Salle</th> 
                                                    <th>Jour</th> 
                                                    <th>Heure_D</th> 
                                                    <th>Heure_F</th> 
                                                    <th>Type Séance</th> 
                                                    
                                                    <th width="5%">Supprimer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $__currentLoopData = $teacherEmploi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emploit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                              <tr>
                                                
                                                <td><?php echo e($emploit->id); ?></td>
                                                <td><?php echo e($emploit->classe->abbreviation); ?></td>
                                                <td><?php echo e($emploit->matiere->subjectLabel); ?></td>
                                                <td><?php echo e($emploit->salle->fullName); ?></td>
                                                <td><?php echo e($emploit->jour); ?></td>
                                                <td><?php echo e($emploit->heure_debut); ?></td>
                                                <td><?php echo e($emploit->heure_fin); ?></td>
                                                <td><?php echo e($emploit->type_seance); ?></td>

                                                
                                                <td align="center">
                                                  <form action="<?php echo e(url('deleteSeanceSemestre/'.$emploit->id)); ?>" method="POST" onsubmit="return confirm('Are you sure to delete this data?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fas fa-trash"></i></button>
                                                  </form>
                                                </td>
                                                
                                              </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            
                                        </table>
                    
                                        </div>
                                      </div>
                                    </div>

                                    <div class="tab-pane show fade" id="pills-voeux" role="tabpanel" aria-labelledby="pills-voeux-tab">
                                      <div class="col-lg-12" style="text-align:left !important;">
                                        <div class="form-group">
                                          <div class="row">
                                            <center>
                                              <h5>
                                                Fiche de voeux
                                              </h5>
                                            </center><br>
                                            <div class="col-12 table-responsive">
                                              <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                  <th width="15%">Année universitaire</th>
                                                  <th width="10%">Semestre</th>
                                                  <th width="25%">Jour(s) préferé(s)</th>
                                                  <th width="50%">Matière(s) préferé(s)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                  <?php $__currentLoopData = $voeuxTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voeu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($loop->first): ?>
                                                    <td><?php echo e($voeu->anneeUniversitaire); ?></td>
                                                    <td><?php echo e($voeu->semestre); ?></td>
                                                    <td><?php echo e($voeu->jourPrefere); ?></td>
                                                    <td>
                                                  <?php endif; ?>
                                                    <?php echo e($voeu->nomMatiere); ?><span style="color: orangered">(<?php echo e($voeu->typeMatiere); ?>)</span><br>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>

                                  <br><hr><br>
                                  <!-- Table row -->
                                  <div class="row">
                                    <div class="col-12">
                                      <h4>
                                        <i class="fas fa-file"></i> Ajouter une séance
                                        <small class="float-right"> </small>
                                      </h4><br>
                                    </div>
                                    <div class="col-12">
                                      
                                      <form action="<?php echo e(url('seance-teacher')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Confirmation!')">
          
                                        <?php echo csrf_field(); ?>
                                        
                                            <div class="row">
                                              <div class="col-md-2">
                                                <label for="">Semestre</label>
                                                <input type="text" id="semestre" name="semestre" value="<?php echo e($mySemestre); ?>" class="form-control" readonly>
                                              </div>
                                                <div class="col-md-3">
                                                  <label for="">Choisir classe</label>
                                                  <select name="classe_id" id="classes" class="form-control" required>
                                                    <option value="" selected disabled>Selectionner Classe</option>
                                                      <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <option value="<?php echo e($classe->id); ?>"> <?php echo e($classe->abbreviation); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Choisir matière</label>
                                                    <select name="matiere_id" id="matiere" data-style="btn btn-primary" required class="form-control" required>
                                                      <option value="">Selectionner Matière</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                  <label for="">Type Séance</label>
                                                  <select id="type_seance" name="type_seance" class="form-control" required>
                                                    <option value="">Selectionner Type</option>
                                                    <option value="" disabled>---------------------</option>
                                                    <option value="1">full-time</option>
                                                    <option value="15">1/2 time</option>
                                                  </select>
                                                  
                                                </div>
                                            </div>
                                            <br><hr>
                                            <div class="row">
                                              <div class="col-md-3">
                                                <label for="">Heure Debut</label>
                                                <select id="heure_debut" name="heure_debut" class="form-control" required>
                                                  <option value="">Séléctionner heure début</option>
                                                  <option value="08:30">08:30</option>
                                                  
                                                  <option value="10:05">10:05</option>
                                                  
                                                  <option value="11:40">11:40</option>
                                                  
                                                  <option value="13:15">13:15</option>
                                                  
                                                  <option value="14:50">14:50</option>
                                                  
                                                  <option value="16:25">16:25</option>
                                                </select>
                                                
                                              </div>
                                              <div class="col-md-3">
                                                <label for="">Heure Fin</label>
                                                <select id="heure_fin" name="heure_fin" class="form-control" required>
                                                  <option value="">Séléctionner heure début</option>
                                                  <option value="10:00">10:00</option>
                                                  
                                                  <option value="11:35">11:35</option>
                                                  
                                                  <option value="13:10">13:10</option>
                                                  
                                                  <option value="14:45">14:45</option>
                                                  
                                                  <option value="16:20">16:20</option>
                                                  
                                                  <option value="17:55">17:55</option>
                                                </select>
                                                
                                              </div>
                                              <div class="col-md-3">
                                                <label for="">Jour</label>
                                                <select name="jour" id="jour" class="form-control" data-dependent="heure" required>
                                                  <option value="">Selectionner Jour</option>
                                                  <option value="Lundi">Lundi</option>
                                                  <option value="Mardi">Mardi</option>
                                                  <option value="Mercredi">Mercredi</option>
                                                  <option value="Jeudi">Jeudi</option>
                                                  <option value="Vendredi">Vendredi</option>
                                                  <option value="Samedi">Samedi</option>
                                                </select>
                                              </div>
                                                <div class="col-md-3">
                                                  <label for="">Choisir salle</label>
                                                  <select name="salle" id="salle" class="form-control" required>
                                                    <option value="">Selectionner Salle</option>
                                                    
                                                  </select>
                                                </div>
                                                <?php echo e(csrf_field()); ?>

                                            </div>
                                            <br><br>
                                            <input type="text" name="teacher_id" style="display: none;" value="<?php echo e($item->id); ?>" id="teacher_id">
                                            <div class="mb-3">
                                              <center>
                                                <button type="submit" class="btn btn-primary float-center">Ajouter</button>
                                              </center>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
        
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <!-- Script to print the content of a div -->
<script>
  $(document).ready(function() {   
      function verifyInputSeance() {
  
          //get values
          var valuestart = $("select[name='heure_debut']").val();
          var valuestop = $("select[name='heure_fin']").val();
  
          var splitted1 = valuestart.split(":");
          var splitted2 = valuestop.split(":");
  
          var splitted1ToIntP1 = parseFloat(splitted1[0]);
          var splitted1ToIntP2 = parseFloat(splitted1[1]);
  
          var splitted2ToIntP1 = parseFloat(splitted2[0]);
          var splitted2ToIntP2 = parseFloat(splitted2[1]);
  
          if (splitted1ToIntP1 > splitted2ToIntP1) {
              alert('Erreur: Date début du séance est supérieur à la date fin!!');
          }
          else{
              $("#messageTestSeance").html('<span></span>' )  
          }
      }
      $("select").change(verifyInputSeance);
      verifyInputSeance();
  });
</script>
<script>
    $(document).ready(function() {   
      function calculateTime() {
  
          //get values
          var valuestart = $("select[name='heure_debut']").val();
          var valuestop = $("select[name='heure_fin']").val();
  
          var splitted1 = valuestart.split(":");
          var splitted2 = valuestop.split(":");
  
          var splitted1ToIntP1 = parseFloat(splitted1[0]);
          var splitted1ToIntP2 = parseFloat(splitted1[1]);
  
          var splitted2ToIntP1 = parseFloat(splitted2[0]);
          var splitted2ToIntP2 = parseFloat(splitted2[1]);
  
          var sommeSplite1 = (splitted1ToIntP1 * 60) + splitted1ToIntP2;
          var sommeSplite2 = (splitted2ToIntP1 * 60) + splitted2ToIntP2;
  
          var resf = (sommeSplite2 - sommeSplite1) / 60;
          var resFinal = parseFloat(resf.toFixed(1));
  
      $("#iputresult").html('<input type="text" name="duree" id="result" value="'+resFinal+'" class="form-control" readonly>' )             
  
      }
      $("select").change(calculateTime);
      calculateTime();
  });
</script>
<script>
  // when classes dropdown changes
  $('#classes').change(function() {
      var classeID       = $(this).val();
      var semestreSelect = $("#semestre").val();
      
      if (semestreSelect == 1) {
        semestre = "S1";
      }
      if (semestreSelect == 2) {
        semestre = "S2";
      }

      if (classeID) {

        $.ajax({
            type: "GET",
            url: "<?php echo e(url('getMatiere')); ?>?classe_id=" + classeID+"&semestre=" + semestre,
            success: function(res) {

                if (res) {

                    $("#matiere").empty();
                    $("#matiere").append('<option value="" selected disabled>Selectionner Matière</option>');

                    res.map(element=>{
                      $("#matiere").append('<option value="'+element.matiere_id+'">' + element.subjectLabel +'<b>('+element.description+'/'+element.semestre+')</b></option>');
                    });

                } else {
                    $("#matiere").empty();
                }
            }
        });
      } else {
          $("#matiere").empty();
      }
  });

// when séance dropdown changes
$('#jour').change(function() {
    var day = $("#jour").val();
    var heure_debut = $("#heure_debut").val();
    var heure_fin   = $("#heure_fin").val();
    var type_seance = $("#type_seance").val();
    var semestre    = $("#semestre").val();

    if(!heure_debut){alert('Saisir Heure Début'); return;}
    if(!heure_fin){alert('Saisir Heure Fin'); return;}
    if(!type_seance){alert('Saisir le type de séance'); return;}
    console.log("semestre is:"+semestre);

    $.ajax({
        type: "GET",
        url: "<?php echo e(url('disponibiliteSallesSeancesSemestre')); ?>/"+ heure_debut+"/" + heure_fin+"/" + day+"/" + type_seance+"/" + semestre,
        success: function(res) {

            if (res) {
            console.log(res);
                $("#salle").empty();
                $("#salle").append('<option value="" selected disabled>Selectionner Salle</option>');
                
                res.map(element=>{
                $("#salle").append('<option value="'+element.id+'">' + element.fullNAme + '</option>');
                })

            } else {
                $("#salle").empty();
            }
        }
    });
    
});
</script>

<script type="text/javascript" src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
<script>
    //convert table to image            
    function convertToImage() {
      var resultDiv = document.getElementById("result");
      html2canvas(document.getElementById("myPrint"), {
          onrendered: function(canvas) {
              var img = canvas.toDataURL("image/jpeg");
              result.innerHTML = '<a download="<?php echo e($item->prenom.' '.$item->nom); ?>.jpeg" href="'+img+'"><?php echo e($item->prenom.' '.$item->nom); ?></a>';
              }
      });
    }        
    //click event
    var convertBtn = document.getElementById("convert");
    convertBtn.addEventListener('click', convertToImage);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/chefdepartement/resources/views/teacher/scheduledetails.blade.php ENDPATH**/ ?>