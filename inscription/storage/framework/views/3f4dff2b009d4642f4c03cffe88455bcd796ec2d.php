<link rel="stylesheet" href="<?php echo e(URL::asset('css/invoice.css')); ?>" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="css/invoice.css">
<script src="api/pdf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style>

@media print {
  #printPageButton {
    display: none;
  }
  #printPageButton2 {
    display: none;
  }
  #printPageButton3 {
    display: none;
  }
}

.blockStyle{
    padding-bottom: 15px !important;
    text-align: right;
}

.profile_image{
    width: 110px;
    height: 130px;
}
#printme{
    border: 2px solid #21a594;
}
</style>
<div>
    <div class="row">
        
        <div class="col-md-12">
            <div class="card" id="invoicepdf">

                <!-- partial:index.partial.html -->
                <div class="container invoice">
                <div class="invoice-header">
                   
                </div>
                <div class="invoice-body">

                    <?php $__currentLoopData = $myStudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscrit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <form action="" id="regForm" method="POST" class="register-wizard-box" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                    <div class="row">
                        <div class="col-xs-3">
                            <img src=<?php echo e(asset('https://ipeig.tn/university/public/upload/students/'.$inscrit->profile_image)); ?> class="profile_image" >
                        </div>
                        <div class="col-xs-6" style="text-align: center">
                            
                            <h4>بطاقة إرشادات خاصة بالترسيم الجامعي</h4>
                            <h5>Fiche de renseignements pour l'inscription</h5>
                            <h6>2022-2023</h6>
                        </div>
                        <div class="col-xs-3" style="text-align: right;">
                            
                            <h6>الجمهورية التونسية</h6>
                            <h6>وزارة التعليم العالي</h6>
                            <h6>المعهد العالي للعلوم التطبيقية والتكنولوجيا بقفصة</h6>
                        </div>
                        
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">                        
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12" style="text-align: right !important;">
                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->nom_ar??null); ?></span> <label> : اللقب</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->prenom_ar??null); ?></span> <label> : الإسم</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span> <?php echo e($inscrit->lieu_naissance??null); ?></span> <label> : مكان الولادة</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span> <?php echo e($inscrit->ddn??null); ?></span> <label> : تاريخ الولادة</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-12">
                                                <span> <?php echo e($inscrit->cin??null); ?></span> <label> : رقم بطاقة التعريف الوطنية</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span> <?php echo e($inscrit->etat_civil??null); ?></span> <label> : الحالة المدنية</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span> <?php echo e($inscrit->genre??null); ?></span> <label> : الجنس</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span> <?php echo e($inscrit->profession_pere??null); ?></span> <label> : مهنة الأب </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span> <?php echo e($inscrit->prenom_pere??null); ?></span> <label> : إسم الأب و لقبه</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->tel2_etudiant??null); ?></span> <label> : رقم هاتف الولي</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->prenom_mere??null); ?></span> <label> : إسم الأم و لقبها</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row blockStyle">
                                            <div class="col-xs-12">
                                                <span><?php echo e($inscrit->rue_etudiant_ar??null); ?></span> <label> : العنوان</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->codepostal_etudiant??null); ?></span> <label> : الترقيم البريدي</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->gov??null); ?></span> <label> : الولاية</label>
                                            </div>   
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->email??null); ?></span> <label> : البريد الإلكتروني</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->tel1_etudiant??null); ?></span> <label> : رقم هاتف الطالب</label>
                                            </div>
                                        </div>

                                        <hr>
                                        <h6>البكالوريا أو مايعادلها</h6>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->session_bac??null); ?></span> <label> : الدورة</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->section_bac??null); ?></span> <label> : الشعبة</label>
                                            </div>
                                        </div>

                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->annee_bac??null); ?></span> <label> : السنة الحصول على البكالوريا</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->moyenne_bac??null); ?></span> <label> : المعدل</label>
                                            </div>
                                        </div>

                                        <hr>
                                        <h6>المعهد العالي للعلوم التطبيقية والتكنولوجيا بقفصة</h6>
                                        <div class="row blockStyle">
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->diplome??null); ?></span> <label> : المستوى</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <span><?php echo e($inscrit->type_inscription??null); ?></span> <label> : نوعية الترسيم</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <span><?php echo e($inscrit->filiere??null); ?></span> <label> : الشعبة</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                </div>

                                <div class="container mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $myQrCodeStudent = md5($inscrit->qrcode);
                                            ?>
                                            <?php echo QrCode::size(90)->generate($inscrit->qrcode); ?>

                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="invoice-footer" style="">
                            <center>
                            <hr>
                            
                                
                            </center>
                        </div>
                        
                    </div>

                    <?php
                        $nameStudent   = $inscrit->nom??null;
                        $prenomStudent = $inscrit->prenom??null;
                        $cinStudent    = $inscrit->cin??null;
                        $fileName      = $nameStudent.$prenomStudent;
                    ?>
                 
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                </div>
              </div>
                <!-- partial -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-md-6 text-right mb-3">
        <button id="printPageButton2" class="btn btn-primary"> Télécharger pdf</button>
    </div>

    <button id="printPageButton" class="btn btn-primary" style="background-color: #21a594;" onClick="window.print();" class="noPrint">
    Imprimer
    </button>

    <a href="<?php echo e(url('login')); ?>" id="printPageButton3" class="btn btn-primary text-center"> تسجيل الخروج</a>
    <br><br><br>
</div>

<script type='text/javascript'>

    window.onload = function() {

    var myVar =  <?php echo(json_encode($fileName.date('Y-m-d'))); ?>;
   
    document.getElementById("printPageButton2")
        .addEventListener("click", () => {
            const invoicepdf = this.document.getElementById("invoicepdf");
            console.log(invoicepdf);
            console.log(window);
            var opt = {
                margin: 0,
                filename: myVar,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoicepdf).set(opt).save();
        })
    }
    </script><?php /**PATH /var/www/webroot/IPEIG/inscription/resources/views/auth/fiche-inscription.blade.php ENDPATH**/ ?>