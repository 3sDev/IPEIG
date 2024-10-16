@extends('adminlayoutenseignant.layout')
@section('title', 'Ajouter personnel')
@section('contentPage')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Ajouter personnel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('personnels') }}">Liste des personnels</a></li>
                <li class="breadcrumb-item active">Ajouter personnel</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

{{-- <link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" /> --}}
<link rel="stylesheet" href="{{ URL::asset('css/ajaxSelect.css') }}" />
<style>
.hrInscrit {
    border: 1px solid rgb(108, 108, 108);
    width: 100%
}
.labelright {
    display: inline-block;
    text-align: right;
    float: right !important;
}
.sousTitre{
    text-align: center;
    background-color: rgb(90, 90, 90);
    color: aliceblue;
    top: -19%;
    padding: 20px 40px;
    font-size: 17px;
    font-weight: 700;
    position: relative;
}
.TitleOne {
    text-align: right !important;
}
.etoileOblig{
    color: red;
    font-weight: bold;
}
</style>    
    <div class="row">
        <div class="col-md-12">

            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif

            <div class="card">
                <div class="card-header">
                    <a href="{{ url('personnels') }}" class="btn btn-danger float-left">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('personnels') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cette donnée?')">

                        @csrf

                        <h5 class="TitleOne">Application Smart Institute</h5>
                        <h4 class="TitleOne">تطبيق الجامعة الذكية</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                        
                            </div>
                            <div class="col-md-6">
                                <label class="labelright"><span class="etoileOblig">*</span>حالة الحساب </label>
                                <select id="active" name="active" class="form-control" required>
                                    <option value="">Séléctionner Etat</option>
                                    <option value="" disabled>-----------------------------</option>
                                 
                                    @foreach ($Personnel as $element)
                                      <option value="{{ $element->Etat_fr.' / '.$element->Etat_ar }}">{{ $element->Etat_fr.' / '.$element->Etat_ar }}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Prénom (en français) <span class="etoileOblig">*</span></label>
                                <input type="text" class="form-control" id="prenom"  name="prenom" placeholder="Prénom Personnel" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="labelright"><span class="etoileOblig">*</span>الإسم(بالعربية)</label>
                                <input type="text" class="form-control" id="prenom_ar" name="prenom_ar" placeholder="الإسم الشخصي " required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nom (en français) <span class="etoileOblig">*</span></label>
                                <input type="text" class="form-control" name="nom" placeholder="Nom Personnel" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="labelright"><span class="etoileOblig">*</span>اللقب(بالعربية)</label>
                                <input type="text" class="form-control" name="nom_ar" placeholder="اللقب الشخصي " required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="labelright"><span class="etoileOblig">*</span>الجنسية</label>
                                <select id="inputState" class="form-control" name="nationnalite" required>
                                    <option selected>Choisir...</option>
                                    <option value="تونسية">تونسية</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright"> مكان الولادة (بالعربية)</label>
                             
                             <input type="text" class="form-control" name="gov_ar"placeholder="مكان الولادة (بالعربية)" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright"> مكان الولادة (بالفرنسية)</label>
                               <input type="text" class="form-control" name="gov"placeholder="مكان الولادة (بالفرنسية)" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright">تاريخ الولادة</label>
                                <input type="date" class="form-control" name="ddn" placeholder="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                     <div class="form-group col-md-3">
                                <label class="labelright">تاريخ إصدار بطاقة التعريف الوطنية </label>
                                <input type="date" id="cin_date" class="form-control" name="cin_date" placeholder="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright"><span class="etoileOblig">*</span> رقم بطاقة التعريف الوطنية</label>
                                <input type="text" id="mycin" class="form-control" name="cin" placeholder="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright">الحالة المدنية</label>
                                <select id="inputState" class="form-control" name="etat_civil">
                                    <option selected>Choisir...</option>
                                    <option value="Celibataire">Celibataire / أعزب / عزباء</option>
                                    <option value="Marié(e)">Marié(e) / (ة) متزوج</option>
                                    <option value="Divorcé(e)">Divorcé(e) / (ة) مطلق</option>
                                    <option value="Veuf(ve)">Veuf(ve) / (ة) أرمل</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright"><span class="etoileOblig">*</span>الجنس</label>
                                <select id="inputState" class="form-control" name="genre" required>
                                    <option selected disabled>Choisir...</option>
                                    <option value="ذكر">Homme/ذكر</option>
                                    <option value="أنثى">Femme/أنثى</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group col-md-3">
                                <label class="labelright"> 2 الهاتف الجوال </label>
                                <input type="number" class="form-control" name="tel2_personnel" placeholder="" >
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright"><span class="etoileOblig">*</span> 1 الهاتف الجوال </label>
                                <input type="number" class="form-control" name="tel1_personnel" placeholder="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="labelright"><span class="etoileOblig">*</span>البريد الإلكتروني </label>
                                <input type="email" class="form-control" name="email" required/>
                            </div>
                        
                            <div class="form-group col-md-3">
                                <label class="labelright">المعرف الوحيد</label>
                                <input type="text" id="mat_cnrps" class="form-control" name="mat_cnrps" placeholder="">
                            </div>
                        </div>
                        <br>
                            <div class="row">
                            <div class="form-group col-md-2">
                                <label class="labelright">الترقيم البريدي</label>
                                <input type="number" id="codepostal" class="form-control" name="codepostal_personnel" placeholder="">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="labelright">العنوان بالفرنسية</label>
                                <input type="text" class="form-control" name="rue_personnel" placeholder="">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="labelright">العنوان بالعربية</label>
                                <input type="text" class="form-control" name="rue_personnel_ar" placeholder="">
                            </div>
                        </div>
                        <br>
                    
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="labelright">عدد الأبناء</label>
                                <input type="number" class="form-control" name="nbr_enfant" placeholder="">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="labelright">مهنة القرين ومكانها</label>
                                <input type="text" class="form-control" name="profession_garant" placeholder="">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="labelright">إسم القرين ولقبه</label>
                                <input type="text" class="form-control" name="nom_garant" placeholder="">
                            </div>
                        </div>
                        <br><hr>

                        <div class="row">
                                  <div class="form-group col-md-4">
                                <label class="labelright">الحساب الجاري للعامل</label>
                                <input type="text" id="rib_perso" class="form-control" name="rib_perso" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="labelright">تاريخ الإنتداب</label>
                                <input type="date" class="form-control" name="date_recrutement" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="labelright">الخطة الوظيفية</label>
                                <select id="poste" name="poste" class="form-control">
                                    <option value="">Séléctionner Poste</option>
                                    <option value="" disabled>-----------------------------</option>
                              <option value=" " > </option>
                                    @foreach ($fonctions as $element)
                                        <option value="{{ $element->label_fr.' / '.$element->label_ar }}">{{ $element->label_fr.' / '.$element->label_ar }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="labelright">تاريخ التسمية في الرتبة أو الصنف </label>
                                <input type="date" id="grade_date" class="form-control" name="grade_date" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="labelright">الصنف / Catégorie</label>
                                <select id="categorie" name="categorie" class="form-control">
                                    <option value="">Séléctionner Catégorie</option>
                                    <option value="" disabled>-----------------------------</option>
                                      <option value=" " > </option>
                                    @foreach ($categories as $element)
                                        <option value="{{ $element->label_fr.' / '.$element->label_ar }}">{{ $element->label_fr.' / '.$element->label_ar }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="labelright">الرتبة</label>
                                <select id="grade" name="grade" class="form-control">
                                    <option value="">Séléctionner Grade</option>
                                    <option value="" disabled>-----------------------------</option>
                                     <option value=" " > </option>                  
                                    @foreach ($grades as $element)
                                        <option value="{{ $element->label_fr.' / '.$element->label_ar }}">{{ $element->label_fr.' / '.$element->label_ar }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <br>
                  
                        <div class="form-input-steps" style="text-align: right;">
                            <h4>Documents naicessaires</h4>
                            <h3> الصورة الشخصية</h3>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="labelright">Photo de profil / الصورة الشخصية</label>
                                        <input type="file" id="" class="form-control" name="profile_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-right">ajouter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        mycin.oninput = function () {
            if (this.value.length > 8) {
                this.value = this.value.slice(0,8); 
            }
        }
    </script>
        <script>
        mynum.oninput = function () {
            if (this.value.length > 8) {
                this.value = this.value.slice(0,8); 
            }
        }
    </script>
    <script>
        codepostal.oninput = function () {
            if (this.value.length > 4) {
                this.value = this.value.slice(0,4); 
            }
        }
    </script>

    <script>
        // when section dropdown changes
        $('#levels').change(function() {

            var levelID = $(this).val();

            if (levelID) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('getClasse') }}?level_id=" + levelID,
                    success: function(res) {

                        if (res) {

                            $("#classe").empty();
                            $("#classe").append('<option selected disabled>Selectionner La classe</option>');
                            $.each(res, function(key, value) {
                                $("#classe").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {

                            $("#classe").empty();
                        }
                    }
                });
            } else {

                $("#classe").empty();
            }
        });

    </script>
@endsection




