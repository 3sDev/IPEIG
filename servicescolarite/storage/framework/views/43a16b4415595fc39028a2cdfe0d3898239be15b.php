<?php $__env->startSection('title', 'Détails étudiant'); ?>
<?php $__env->startSection('contentPage'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Gestion Etudiant</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('students')); ?>">Gestion des étudiants</a></li>
            <li class="breadcrumb-item active">Détails Etudiant</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $uploads = app('App\Libs\Urlupload'); ?>
<?php $__currentLoopData = $uploads->getLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<style>
.labelright {
    display: inline-block;
    text-align: right;
    float: right !important;
}

input[type=text], select, input[type=number], input[type=password]{
    text-align: right !important;
}

.TitleOne {
    text-align: right !important
}

.invoice-col img{
  width: 100%;
  transition: 0.5s all ease-in-out;
}
.invoice-col:hover img {
        transform: scale(1.5);
}

/*  Rotation image  */
.rotated {
  transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  -o-transform: rotate(90deg);
}
.imgCinFace1{
    transition: all 0.5s ease;
    cursor: pointer;
}
.imgCinFace2{
    transition: all 0.5s ease;
    cursor: pointer;
}
.imgFiche{
    width: 80% !important;
    height: 80% !important;
    transition: all 0.5s ease;
    cursor: pointer;
}
.imgPhoto{
    transition: all 0.5s ease;
    cursor: pointer;
}
</style>
    <div class="row">
        <div class="col-md-12">

            <?php if($errors->any()): ?>
                <ul class="alert alert-warning">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="card">
                <div class="card-header">
                    <h4>Modifier l'étudiant <span class="profileStudent"><?php echo e($profile->prenom.' '.$profile->nom); ?></span>
                        <a href="<?php echo e(url('students')); ?>" class="btn btn-danger float-right">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <form action="<?php echo e(url('update-student/'.$profile->id)); ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de modifier ces données?')">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <h5 class="TitleOne">Application Smart Institute</h5>
                        <h4 class="TitleOne">تطبيق الجامعة الذكية</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <label class="labelright">(ة) حالة الطالب </label>
                                <select id="active" name="active" class="form-control" required>

                                    <?php if(($profile->active=='0')): ?>
                                    <option value="0">Désactivé</option>
                                    <?php endif; ?>
                                    <?php if(($profile->active=='1')): ?>
                                    <option value="1">Inscrit / Activé</option>
                                    <?php endif; ?>
                                    <?php if(($profile->active=='2')): ?>
                                    <option value="2">Non inscrit</option>
                                    <?php endif; ?>
                                    <?php if(($profile->active=='3')): ?>
                                    <option value="3">Retrait Inscrit</option>
                                    <?php endif; ?>
                                    <?php if(($profile->active=='4')): ?>
                                    <option value="4">Mutation</option>
                                    <?php endif; ?>

                                    <option value="" disabled>------------------------------------</option>
                                    <?php $__currentLoopData = $EtudiantEtat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($element->value); ?>" <?php if($profile->active == $element->value): ?> selected <?php endif; ?>>
        <?php echo e($element->Etat_fr.' / '.$element->Etat_ar); ?>

    </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <br><hr><br>
                      	<div class="row">
                         	<div class="col-md-4">
                            	<button type="submit" class="btn btn-success text-center">Modifier</button>
                        	</div>
                        	<div class="col-md-8">
								<h5 class="TitleOne">Institut Supérieur des Sciences Appliquées et de Technologies de Gafsa</h5>
                        		<h4 class="TitleOne">المعهد العالي للعلوم التطبيقية و التكنولوجيا بقفصة</h4>
                        	</div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="labelright">نوعية الترسيم</label>
                                <select id="type_inscription" class="form-control" name="type_inscription" required>
                                    <option value="<?php echo e($profile->type_inscription); ?>"><?php echo e($profile->type_inscription); ?></option>
                                    <option value="" disabled>-------------------------------</option>
                                       <?php $__currentLoopData = $EtudiantInscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($element->value); ?>" <?php if($profile->active == $element->value): ?> selected <?php endif; ?>>
        <?php echo e($element->Inscription_fr.' / '.$element->Inscription_ar); ?>

    </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>                            
                            </div>
                            
                            <div class="col-md-3">
                                <label class="labelright">الفوج</label>
                                <select id="classe_id" class="form-control" name="classe_id" required>
                                    <option value="<?php echo e($profile->classe->id); ?>" selected><?php echo e($profile->classe->abbreviation); ?></option>
                                    <option value="" disabled >إختر الفوج</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($classItem->id); ?>"><?php echo e($classItem->abbreviation); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>                            
                            </div>
                            <div class="col-md-3">
                                <label class="labelright">الشعبة</label>
                                <select name="filiere" id="filiere" class="form-control" data-dependent="filiere" required>
                                    <option value="<?php echo e($profile->filiere); ?>"><?php echo e($profile->filiere); ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="labelright">المستوى الدراسي</label>
                                <select name="niveau" id="niveau" class="form-control" data-dependent="niveau" required>
                                    <option value="<?php echo e($profile->diplome); ?>"><?php echo e($profile->diplome); ?></option>
                                    <option value="سنة أولى إجازة">سنة أولى إجازة</option>
                                    <option value="سنة ثانية إجازة">سنة ثانية إجازة</option>
                                    <option value="سنة ثالثة إجازة">سنة ثالثة إجازة</option>
                                    <option value="سنة أولى ماجستير">سنة أولى ماجستير</option>
                                    <option value="سنة ثانية ماجستير">سنة ثانية ماجستير</option>
                                </select>                            
                            </div>
                        </div>

                        <br><br>
                        <h5 class="TitleOne">Information Personnel</h5>
                        <h4 class="TitleOne">معلومات شخصية</h4>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelright">رقم بطاقة التعريف الوطنية</label>
                                <input type="text" name="cin" value="<?php echo e($profile->cin); ?>" id="mycin" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">اللقب(بالفرنسية)</label>
                                <input type="text" name="nom" value="<?php echo e($profile->nom); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">الإسم(بالفرنسية)</label>
                                <input type="text" name="prenom" value="<?php echo e($profile->prenom); ?>" class="form-control" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelright">إسم الطالب كامل بالفرنسية</label>
                                <input type="text" name="full_name" value="<?php echo e($profile->full_name); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">اللقب(بالعربية)</label>
                                <input type="text" name="nom_ar" value="<?php echo e($profile->nom_ar); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">الإسم(بالعربية)</label>
                                <input type="text" name="prenom_ar" value="<?php echo e($profile->prenom_ar); ?>" class="form-control" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelright">مكان الولادة</label>
                                <input type="text" name="lieu_naissance" class="form-control" value="<?php echo e($profile->lieu_naissance); ?>" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">تاريخ الولادة</label>
                                <input type="date" name="ddn" class="form-control" value="<?php echo e($profile->ddn); ?>" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">Nationalité / جنسية الطالب</label>
                                <select class="form-control" id="nationalite" name="nationalite" oninput="this.className = ''" required>
                                    <option value="<?php echo e($profile->nationalite); ?>"><?php echo e($profile->nationalite); ?></option>
                                    <option value="" disabled>---------------------------------</option>
                                    <option value="تونسية"> تونسي (ة)</option>
                                    <option value="أجنببية"> Étranger(e)</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">الحالة المدنية</label>
                                <select id="etat_civil" name="etat_civil" class="form-control" required>
                                    <option value="<?php echo e($profile->etat_civil); ?>"><?php echo e($profile->etat_civil); ?></option>
                                    <option value="أعزب / عزباء">Celibataire / أعزب / عزباء</option>
                                    <option value="(ة) متزوج">Marié(e) / (ة) متزوج</option>
                                    <option value="(ة) مطلق">Divorcé(e) / (ة) مطلق</option>
                                    <option value="(ة) أرمل">Veuf(ve) / (ة) أرمل</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright">الجنس</label>
                                <select id="genre" name="genre" class="form-control" required>
                                    <option value="<?php echo e($profile->genre); ?>"><?php echo e($profile->genre); ?></option>
                                    <option value="ذكر">Homme/ذكر</option>
                                    <option value="أنثى">Femme/أنثى</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">إسم الأب و لقبه</label>
                                <input type="text" name="prenom_pere" class="form-control" value="<?php echo e($profile->prenom_pere); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright">إسم الأم و لقبها</label>
                                <input type="text" name="prenom_mere" class="form-control" value="<?php echo e($profile->prenom_mere); ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">رقم هاتف الولي</label>
                                <input type="text" name="tel2_etudiant" class="form-control" value="<?php echo e($profile->tel2_etudiant); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright">مهنة الأب</label>
                                <input type="text" name="profession_pere" class="form-control" value="<?php echo e($profile->profession_pere); ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelright">الترقيم البريدي</label>
                                <input type="number" name="codepostal_etudiant" id="codepostal" class="form-control" value="<?php echo e($profile->codepostal_etudiant); ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">المعتمدية</label>
                                <select id="municipality" class="form-control" name="municipality">
                                    <option value="<?php echo e($profile->municipality); ?>" selected><?php echo e($profile->municipality); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="labelright">الولاية</label>
                                <select id="gov" class="form-control" name="gov" required>
                                    <option value="<?php echo e($profile->gov); ?>" selected><?php echo e($profile->gov); ?></option>
                                    <option value="أريانة">أريانة</option>
                                    <option value="بن عروس">بن عروس</option>
                                    <option value="باجة">باجة</option>
                                    <option value="بنزرت">بنزرت</option>
                                    <option value="قابس">قابس</option>
                                    <option value="قفصة">قفصة</option>
                                    <option value="جندوبة">جندوبة</option>
                                    <option value="قبلي">قبلي</option>
                                    <option value="الكاف">الكاف</option>
                                    <option value="القيروان">القيروان</option>
                                    <option value="مدنين">مدنين</option>
                                    <option value="المهدية">المهدية</option>
                                    <option value="المنستير">المنستير</option>
                                    <option value="نابل">نابل</option>
                                    <option value="صفاقس">صفاقس</option>
                                    <option value="سليانة">سليانة</option>
                                    <option value="سوسة">سوسة</option>
                                    <option value="تطاوين">تطاوين</option>
                                    <option value="توزر">توزر</option>
                                    <option value="تونس">تونس</option>
                                    <option value="زغوان">زغوان</option>
                                    <option value="منوبة">منوبة</option>
                                    <option value="القصرين">القصرين</option>
                                    <option value="سيدي بوزيد">سيدي بوزيد</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">العنوان باللغة الفرنسية</label>
                                <input type="text" id="rue_etudiant" name="rue_etudiant" class="form-control" value="<?php echo e($profile->rue_etudiant); ?>" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright">العنوان باللغة العربية</label>
                                <input type="text" id="rue_etudiant_ar" name="rue_etudiant_ar" class="form-control" value="<?php echo e($profile->rue_etudiant_ar); ?>" placeholder="" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">رقم هاتف الطالب</label>
                                <input type="number" id="mynum" name="tel1_etudiant" class="form-control" value="<?php echo e($profile->tel1_etudiant); ?>" placeholder="8 chiffres" required>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright">البريد الإلكتروني</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo e($profile->email); ?>" placeholder="" required>
                            </div>
                        </div>
                        <br><br>
                        <h5 class="TitleOne">Baccalauréat ou diplome équivalent</h5>
                        <h4 class="TitleOne"> البكالوريا أو مايعادلها</h4>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">الدورة</label>
                                <select id="inputState" name="session_bac" class="form-control" required>
                                    <option selected value="<?php echo e($profile->session_bac); ?>"><?php echo e($profile->session_bac); ?></option>
                                    <option value="الرئيسية">Principale/الرئيسية</option>
                                    <option value="التدارك">Controle/التدارك</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright"> الشعبة</label>
                                <select id="inputState" name="section_bac" class="form-control" required>
                                    <option value="<?php echo e($profile->section_bac); ?>" selected><?php echo e($profile->section_bac); ?></option>
                                    <option value="آداب">Lettres / آداب</option>
                                    <option value="رياضيات">Mathématiques / رياضيات</option>
                                    <option value="علوم تجريبية">Sciences exprimentales / علوم تجريبية</option>
                                    <option value="إقتصاد وتصرف">Economie et Gestion / إقتصاد وتصرف</option>
                                    <option value="تقنية">Technique / تقنية</option>
                                    <option value="علوم إعلامية">Sciences informatique / علوم إعلامية</option>
                                    <option value="أخرى">Autres / أخرى</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="labelright">السنة</label>
                                <input type="number" name="annee_bac" class="form-control" value="<?php echo e($profile->annee_bac); ?>" min="1950" max="2050" step="1" value="2022" required/>
                            </div>
                            <div class="col-md-6">
                                <label class="labelright">المعدل</label>
                                <input type="text" name="moyenne_bac" class="form-control" value="<?php echo e($profile->moyenne_bac); ?>" placeholder="Exp. 16.53" required>
                            </div>
                        </div>

                        <br><br>
                       
                    </form>

                        <br><hr><br>
                        <h5 class="TitleOne">Documents naicessaires <span style="color: brown;">format image (jpg, png)</span></h5>
                        <h4 class="TitleOne">الوثائق المطلوبة</h4>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5" style="padding-bottom:55px; border-bottom: 2px solid rgb(122, 122, 122)">
                                <form action="<?php echo e(url('update-cin2/'.$profile->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier CIN face 2 ?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <label class="labelright">CIN (Face 2) /  بطاقة التعريف الوطنية الوجه الثاني</label>
                                    <div class="invoice-col">
                                        <center>
                                        <img src=<?php echo e(asset($upload.'/students/cinFace2/'.$profile->cin_file_2)); ?> style="width: 60% !important; height: 150px;" class="imgCinFace2">
                                        </center>
                                    </div><br>   
                                    <input type="file" name="cin_file_2" class="form-control" value="<?php echo e($profile->cin_file_2); ?>" placeholder="لتغيير الصورة إضغط هنا" required><br>

                                    <center><button type="submit" class="btn btn-primary">Modifier</button></center>
                                </form>
                            </div>
                            
                            <div class="col-md-1" style="border-right: 2px solid rgb(122, 122, 122)"></div>
                            <div class="col-md-1"></div>

                            <div class="col-md-5" style="padding-bottom:55px; border-bottom: 2px solid rgb(122, 122, 122)">
                                <form action="<?php echo e(url('update-cin1/'.$profile->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier CIN face 1 ?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <label class="labelright">CIN (Face 1) /  بطاقة التعريف الوطنية الوجه الأول</label>
                                    <div class="invoice-col">
                                        <center>
                                        <img src=<?php echo e(asset($upload.'/students/cin/'.$profile->cin_file)); ?> style="width: 60% !important; height: 150px;" class="imgCinFace1">
                                        </center>
                                    </div><br>
                                    <input type="file" name="cin_file" class="form-control" value="<?php echo e($profile->cin_file); ?>" placeholder="لتغيير الصورة إضغط هنا" required><br>
                                    <center><button type="submit" class="btn btn-primary">Modifier</button></center>
                                </form>
                            </div>
                        </div>

                        <br><br>
                        <div class="row">
                        <div class="col-md-5" style="padding-bottom:55px; border-bottom: 2px solid rgb(122, 122, 122)">
                            <form action="<?php echo e(url('update-fiche/'.$profile->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier fiche d\'inscription ?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <label class="labelright">Reçu de Paiement (inscription.tn) / وصل التسجيل عن بعد</label>
                                <div class="">
                                    <img src=<?php echo e(asset($upload.'/students/inscription/'.$profile->paiement_file)); ?> class="imgFiche" >
                                </div>
                                <input type="file" name="paiement_file" class="form-control" value="<?php echo e($profile->paiement_file); ?>" placeholder="لتغيير الصورة إضغط هنا" required><br>
                                <center><button type="submit" class="btn btn-primary">Modifier</button></center>
                            </form>
                        </div>

                        <div class="col-md-1" style="border-right: 2px solid rgb(122, 122, 122)"></div>
                        <div class="col-md-1"></div>

                        <div class="col-md-5" style="padding-bottom:55px; border-bottom: 2px solid rgb(122, 122, 122)">
                            <form action="<?php echo e(url('update-photo/'.$profile->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier photo de profil ?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="text-center">
                                    <img src=<?php echo e(asset($upload.'/students/'.$profile->profile_image)); ?> style="width:150px !important; height: 160px;" class="profile-user-img img-fluid img-circle imgPhoto"" >
                                </div>
                                <label class="labelright">Photo de profil / الصورة الشخصية</label>
                                <input type="file" name="profile_image" class="form-control" value="<?php echo e($profile->profile_image); ?>" placeholder="لتغيير الصورة إضغط هنا" required><br>
                                <center><button type="submit" class="btn btn-primary">Modifier</button></center>
                            </form>
                        </div>
                    </div>

                    <br><hr><br>
                    <h5 class="TitleOne">Changer le mot de passe (App Etudiant)
                    <h4 class="TitleOne">(ة)تغيير كلمة السر الخاصة بالطالب</h4>
                    <br><br>
                    <form action="<?php echo e(url('update-passwordStudent/'.$profile->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier le mot de passe ?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                
                                <label class="labelright">كلمة السر الجديدة</label>
                                <input type="text" id="new_password" name="new_password"class="form-control" required><br>
                                <label class="labelright">تأكيد كلمة السر الجديدة</label>
                                <input type="text" id="confirm_password" name="confirm_password" class="form-control" required><br>
                                <center><button type="submit" class="btn btn-warning">Modifier</button></center>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>
    </div>
<script src="<?php echo e(URL::asset('js/scriptFiliere.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/municipality.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/rotationImage.js')); ?>"></script>
<script>

</script>
<script>
$(document).ready(function() {
    var degrees = 0;

});
</script>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
        x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script>
    $('#new_password, #confirm_password').on('keyup', function () {
    if ($('#new_password').val() == $('#confirm_password').val()) {
        $('#message').html('Valid').css('color', 'green');
    } else 
        $('#message').html('Not Valid').css('color', 'red');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/student/edit.blade.php ENDPATH**/ ?>