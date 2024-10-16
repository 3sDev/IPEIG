<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<style>
*{
  font-family: 'Cairo';
  font-size: 17px;
}
.salima{
    margin-left: 20%;
    margin-top:10%;
}
.salima img{
    width:70%;
}
</style>

<div id="printme" class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- partial:index.partial.html -->
                <div class="invoice-body">
                    <?php $__currentLoopData = $demandestudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($demand->sous_type == 'شهادة نجاح' || $demand->sous_type == 'شهادة ترسيم' || $demand->sous_type == 'كشف اعداد' || $demand->sous_type == 'شهادة حضور'): ?>
                            <div class="row">
                                <div class="salima">
                                    
                                    <img src="<?php echo e(URL::asset('/upload/salima.jpg')); ?>" class="">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($demand->sous_type == 'اصلاح وثيقة ادارية'): ?>
                          <!-- partial -->
                          <div class="container" style="margin-top: 5%; margin-left: 10%;">
                            <div class="row">
                              <div class="col-md-8" >
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <h3 class="text-center">اصلاح وثيقة ادارية</h3>
                                  </div>
                                  <div class="panel-body">
                                    <div class="row">

                                      <div class=" col-md-9 col-lg-9 "> 
                                        <table class="table table-user-information text-right">
                                          <tbody>
                                            <tr>
                                              <td><b><?php echo e($demand->student->prenom_ar.' '.$demand->student->nom_ar); ?></b></td>
                                              <td>الإسم و اللقب</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->classe->abbreviation); ?></b></td>
                                              <td>القسم</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->student->ddn); ?></b></td>
                                              <td>تاريخ الولادة</td>
                                            </tr>
                                        
                                            <tr>
                                              <tr>
                                              <td><b><?php echo e($demand->student->rue_etudiant_ar); ?></b></td>
                                              <td>العنوان</td>
                                            </tr>
                                              <tr>
                                              <td><b><?php echo e($demand->student->email); ?></b></td>
                                              <td>البريد الإلكتروني</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->student->tel1_etudiant); ?></b></td>
                                              <td>رقم الهاتف</td>
                                            </tr>
                                              <td><b><?php echo e($demand->student->cin); ?></b></td>
                                              <td>رقم ب.ت.و</td>
                                            </tr>

                                            <tr>
                                              <td><b><?php echo e($demand->type_document); ?></b></td>
                                              <td>الوثيقة المراد إصلاحها</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->correction_faute); ?></b></td>
                                              <td>الخطأ المراد إصلاحه</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></b></td>
                                              <td>تاريخ الإرسال</td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                        
                                      </div>

                                      <div class="col-md-3 col-lg-3 " align="center"> <img alt="Student Pic" src=<?php echo e(asset($upload.'/students/'.$demand->student->profile_image)); ?> style="width:150px !important; height:150px !important" class="img-circle img-responsive"> </div>

                                    </div>
                                  </div>
                                    <div class="panel-footer">
                                      <a href="<?php echo e(asset($upload.'/demandesStudents/documentFausse/'.$demand->document_fausse)); ?>" target="_blank" class="btn btn-primary">النسخة الأصلية من الوثيقة المراد إصلاحها</a>

                                    </div>
                                  
                                </div>
                              </div>
                              <div class="col-md-4"></div>
                            </div>
                          </div>
                          <!-- partial -->
                        <?php endif; ?>

                        <?php if($demand->sous_type == 'نظير من وثيقة ادارية'): ?>
                          <!-- partial -->
                          <div class="container" style="margin-top: 5%; margin-left: 10%;">
                              <div class="row">
                                <div class="col-md-8" >
                                  <div class="panel panel-info">
                                    <div class="panel-heading">
                                      <h3 class="text-center">نظير من وثيقة ادارية</h3>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">

                                        <div class=" col-md-9 col-lg-9 "> 
                                          <table class="table table-user-information text-right">
                                            <tbody>
                                              <tr>
                                                <td><b><?php echo e($demand->student->prenom_ar.' '.$demand->student->nom_ar); ?></b></td>
                                                <td>الإسم و اللقب</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->classe->abbreviation); ?></b></td>
                                                <td>القسم</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->student->ddn); ?></b></td>
                                                <td>تاريخ الولادة</td>
                                              </tr>
                                          
                                              <tr>
                                                <tr>
                                                <td><b><?php echo e($demand->student->rue_etudiant_ar); ?></b></td>
                                                <td>العنوان</td>
                                              </tr>
                                                <tr>
                                                <td><b><?php echo e($demand->student->email); ?></b></td>
                                                <td>البريد الإلكتروني</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->student->tel1_etudiant); ?></b></td>
                                                <td>رقم الهاتف</td>
                                              </tr>
                                                <td><b><?php echo e($demand->student->cin); ?></b></td>
                                                <td>رقم ب.ت.و</td>
                                              </tr>

                                              <tr>
                                                <tr>
                                                <td><b><?php echo e($demand->type_document); ?></b></td>
                                                <td>الوثيقة المراد إصلاحها</td>
                                              </tr>
                                                <tr>
                                                <td><b><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></b></td>
                                                <td>تاريخ الإرسال</td>
                                              </tr>
                                              
                                            </tbody>
                                          </table>
                                          
                                        </div>

                                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="Student Pic" src=<?php echo e(asset($upload.'/students/'.$demand->student->profile_image)); ?>  style="width:150px !important; height:150px !important"  class="img-circle img-responsive"> </div>

                                      </div>
                                    </div>
                                      <div class="panel-footer">
                                        <a href="<?php echo e(asset($upload.'/demandesStudents/attestationPerdue/'.$demand->attestation_perdue)); ?>" target="_blank" class="btn btn-primary"> الوثيقة المصاحبة / شهادة ضياع</a>

                                      </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </div>
                          <!-- partial -->
                        <?php endif; ?>

                        <?php if($demand->sous_type == 'التثبت من ورقة امتحان'): ?>
                          <!-- partial -->
                          <div class="container" style="margin-top: 5%; margin-left: 10%;">
                            <div class="row">
                              <div class="col-md-8" >
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <h3 class="text-center"><?php echo e($demand->sous_type); ?></h3>
                                  </div>
                                  <div class="panel-body">
                                    <div class="row">

                                      <div class=" col-md-9 col-lg-9 "> 
                                        <table class="table table-user-information text-right">
                                          <tbody>
                                            <tr>
                                              <td><b><?php echo e($demand->student->prenom_ar.' '.$demand->student->nom_ar); ?></b></td>
                                              <td>الإسم و اللقب</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->classe->abbreviation); ?></b></td>
                                              <td>القسم</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->student->ddn); ?></b></td>
                                              <td>تاريخ الولادة</td>
                                            </tr>
                                        
                                            <tr>
                                              <tr>
                                              <td><b><?php echo e($demand->student->rue_etudiant_ar); ?></b></td>
                                              <td>العنوان</td>
                                            </tr>
                                              <tr>
                                              <td><b><?php echo e($demand->student->email); ?></b></td>
                                              <td>البريد الإلكتروني</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->student->tel1_etudiant); ?></b></td>
                                              <td>رقم الهاتف</td>
                                            </tr>
                                              <td><b><?php echo e($demand->student->cin); ?></b></td>
                                              <td>رقم ب.ت.و</td>
                                            </tr>

                                            <tr>
                                              <tr>
                                              <td><b><?php echo e($demand->nom_examen); ?></b></td>
                                              <td>إصلاح الخطأ في الوثيقة</td>
                                            </tr>
                                              <tr>
                                              <td><b><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></b></td>
                                              <td>تاريخ الإرسال</td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                        
                                      </div>

                                      <div class="col-md-3 col-lg-3 " align="center"> <img alt="Student Pic" src=<?php echo e(asset($upload.'/students/'.$demand->student->profile_image)); ?> style="width:150px !important; height:150px !important" class="img-circle img-responsive"> </div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4"></div>
                            </div>
                          </div>
                          <!-- partial -->
                        <?php endif; ?>

                        <?php if($demand->sous_type == 'اعادة اصلاح ورقة امتحان'): ?>
                          <!-- partial -->
                          <div class="container" style="margin-top: 5%; margin-left: 10%;">
                            <div class="row">
                              <div class="col-md-8" >
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <h3 class="text-center"><?php echo e($demand->sous_type); ?></h3>
                                  </div>
                                  <div class="panel-body">
                                    <div class="row">

                                      <div class=" col-md-9 col-lg-9 "> 
                                        <table class="table table-user-information text-right">
                                          <tbody>
                                            <tr>
                                              <td><b><?php echo e($demand->student->prenom_ar.' '.$demand->student->nom_ar); ?></b></td>
                                              <td>الإسم و اللقب</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->classe->abbreviation); ?></b></td>
                                              <td>القسم</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->student->ddn); ?></b></td>
                                              <td>تاريخ الولادة</td>
                                            </tr>
                                        
                                            <tr>
                                              <tr>
                                              <td><b><?php echo e($demand->student->rue_etudiant_ar); ?></b></td>
                                              <td>العنوان</td>
                                            </tr>
                                              <tr>
                                              <td><b><?php echo e($demand->student->email); ?></b></td>
                                              <td>البريد الإلكتروني</td>
                                            </tr>
                                            <tr>
                                              <td><b><?php echo e($demand->student->tel1_etudiant); ?></b></td>
                                              <td>رقم الهاتف</td>
                                            </tr>
                                              <td><b><?php echo e($demand->student->cin); ?></b></td>
                                              <td>رقم ب.ت.و</td>
                                            </tr>

                                            <tr>
                                              <tr>
                                              <td><b><?php echo e($demand->nom_examen); ?></b></td>
                                              <td>إصلاح الخطأ في الوثيقة</td>
                                            </tr>
                                              <tr>
                                              <td><b><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></b></td>
                                              <td>تاريخ الإرسال</td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                        
                                      </div>

                                      <div class="col-md-3 col-lg-3 " align="center"> <img alt="Student Pic" src=<?php echo e(asset($upload.'/students/'.$demand->student->profile_image)); ?> style="width:150px !important; height:150px !important" class="img-circle img-responsive"> </div>

                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <div class="col-md-4"></div>
                            </div>
                          </div>
                          <!-- partial -->
                        <?php endif; ?>

                        <?php if($demand->sous_type == 'تثمين وحدات'): ?>
                          <!-- partial -->
                          <div class="container" style="margin-top: 5%; margin-left: 10%;">
                              <div class="row">
                                <div class="col-md-8" >
                                  <div class="panel panel-info">
                                    <div class="panel-heading">
                                      <h3 class="text-center"><?php echo e($demand->sous_type); ?></h3>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">

                                        <div class=" col-md-9 col-lg-9 "> 
                                          <table class="table table-user-information text-right">
                                            <tbody>
                                              <tr>
                                                <td><b><?php echo e($demand->student->prenom_ar.' '.$demand->student->nom_ar); ?></b></td>
                                                <td>الإسم و اللقب</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->classe->abbreviation); ?></b></td>
                                                <td>القسم</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->student->ddn); ?></b></td>
                                                <td>تاريخ الولادة</td>
                                              </tr>
                                          
                                              <tr>
                                                <td><b><?php echo e($demand->student->rue_etudiant_ar); ?></b></td>
                                                <td>العنوان</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->student->email); ?></b></td>
                                                <td>البريد الإلكتروني</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->student->tel1_etudiant); ?></b></td>
                                                <td>رقم الهاتف</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->student->cin); ?></b></td>
                                                <td>رقم ب.ت.و</td>
                                              </tr>

                                              <tr>
                                                <td><b><?php echo e($demand->type_etudiant); ?></b></td>
                                                <td>طالب</td>
                                              </tr>
                                              <?php if($demand->ecole_etudiant): ?>
                                                <tr>
                                                  <td><b><?php echo e($demand->ecole_etudiant); ?></b></td>
                                                  <td>المؤسسة</td>
                                                </tr> 
                                              <?php endif; ?>
                                              <tr>
                                                <td><b><?php echo e($demand->previous_annee); ?></b></td>
                                                <td>المستوى الدراسي للسنة الفارطة</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e($demand->previous_annee_specialite); ?></b></td>
                                                <td>إختصاص السنة الفارطة</td>
                                              </tr>
                                              <tr>
                                                <td><b><?php echo e(date('Y-m-d | H:i', strtotime($demand->created_at))); ?></b></td>
                                                <td>تاريخ الإرسال</td>
                                              </tr>
                                              
                                            </tbody>
                                          </table>
                                          
                                        </div>

                                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="Student Pic" src=<?php echo e(asset($upload.'/students/'.$demand->student->profile_image)); ?>  style="width:150px !important; height:150px !important"  class="img-circle img-responsive"> </div>

                                      </div>
                                    </div>
                                      <div class="panel-footer">
                                        <a href="<?php echo e(asset($upload.'/demandesStudents/releveeNotes/'.$demand->relevee_notes)); ?>" target="_blank" class="btn btn-primary"> الوثيقة المصاحبة / بطاقة أعداد </a>
                                      </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </div>
                          <!-- partial -->
                        <?php endif; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- partial -->
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/demandestudent/show.blade.php ENDPATH**/ ?>