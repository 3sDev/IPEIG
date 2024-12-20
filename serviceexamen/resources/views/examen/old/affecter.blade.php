
@extends('adminlayoutscolarite.layout')
@section('title', 'Affecter les notes aux étudiants')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Affecter les notes aux étudiants</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('examens') }}">Liste des examens</a></li>
        <li class="breadcrumb-item active">Affecter les notes aux étudiants</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<style>
.inputStyle {
background: none !important;
border: none !important;
width: 50px;
}

.fa {
color:rgb(73, 73, 73)
}

.textable {
overflow: hidden;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 1; /* number of lines to show */
-webkit-box-orient: vertical;
}

input[type="radio"]:checked + .card {
background: #f1f1f1;
}

.card.backgroundCard {
background: #f1f1f1;
}

input[type=radio]:checked  + .card{
background: #3057d5;
border-color: #3057d5;
transform: scale(1.2);
opacity: 1;
}

input[type=radio]:focus + .card{
box-shadow: 0 0 0 4px rgba(48, 86, 213, 0.2);
border-color: #3056d5;
}

.cardLabel{
cursor: pointer;
}

.cardLabel:hover{
border: 1px solid #3056d5;
}

.infos{
    width: 100% !important;
    border: none;
}
</style>


<link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />

<div class="row">
    @if (session('message'))
    <h5>{{ session('message') }}</h5>
        @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('examens') }}" class="btn btn-primary float-right">Retour</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <form action="{{ url('addCodesToStudents') }}" method="POST">
                    @csrf

                    @foreach ($examens as $examen)
                    <center><h5><b>Classe :</b> {{ $examen->classe->abbreviation }}</h5>
                    <h5><b>Matière :</b> {{ $examen->matiere->subjectLabel.' - '.$examen->matiere->description }}</h5><br></center>
                    @endforeach
                    <div class="row">

                    <input type="text" style="display:none;" name="examen_id" value="{{ $examen->id }}"><br>
                    <input type="text" style="display:none;" name="classe_id" value="{{ $examen->classe_id }}"><br>
                    <input type="text" style="display:none;" name="matiere_id" value="{{ $examen->matiere_id }}"><br>
                    <input type="text" style="display:none;" name="teacher_id" value="{{ $examen->teacher_id }}">


                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <b>Année universitaire</b>
                            <input type="text" class="form-control infos" name="annee" value="{{ $examen->annee }}" readonly>                                  
                        </div>
                        <br>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <b>Semestre</b>
                            <input type="text" class="form-control infos" name="semestre" value="{{ $examen->semestre }}" readonly>                                    
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <b>Session</b>
                            <input type="text" class="form-control infos" name="session" value="{{ $examen->session }}" readonly>                         </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <b>Description</b>
                            <input type="text" class="form-control infos" name="description" value="{{ $examen->description }}" readonly>                                   
                        </div>
                    </div>


                    <div class="col-lg-1"></div>
                    
                </div>

                    {{-- <center><button type="submit" class="btn btn-secondary" onclick="return IsEmpty();"><b>Envoyer</b></button></center> --}}
                    <br>  
                    <center>
                    <table border="" BORDERCOLOR="#ccc" style="padding-right:5px; table-layout:fixed; width:50% !important" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="15%">ID</th>
                                <th width="50%">Nom et Prénom</th>
                                <th width="35%" align="center">Code Examen</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $item)
                            
                        <tr>
                            {{-- <td><img src="/upload/students/{{ $item->profile_image }}" alt="" class="image-table"> </td> --}}
                            <td><input type="text" class="inputStyle" name="student_id[]" value="{{ $item->id }}" readonly></td>
                            <td>{{ $item->prenom .' '. $item->nom }}</td>                            
                                        
                            <td align="center">
                                <input type="text" class="form-control" name="code[]" required style="width: 80% !important;">
                            </td>
                        
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Nom et Prénom</th>
                            <th>Code Examen</th>
                            </tr>
                        </tfoot>
                    </table>
                </center>
                <center><button type="submit" id="submit" onClick="return confirm('Click sur Cancel pour vérifier les codes / Click sur OK pour sauvgarder les codes')" class="btn btn-secondary"><b>Envoyer</b></button></center>
                <br>  
                <p id="demo"></p>
                <center>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script>

    $('#submit').click(function () {
        var valid = true;

        $.each($('input[type="text"]'), function (index1, item1) {

            $.each($('input[type="text"]').not(this), function (index2, item2) {

                if ($(item1).val() == $(item2).val() && ($(item1).val() != '99999' || $(item2).val() != '99999')) {
                    $(item1).css("border-color", "red");
                    valid = false;
                }
                else{
                    $(item1).css("border-color", "green");
                    valid = true;
                }

            });
        });
function myFunction() {
    let text;
    if (confirm("Click sur Cancel pour vérifier les codes / Click sur OK pour sauvgarder les codes") == false) {
        text = "You canceled!";
    }
    document.getElementById("demo").innerHTML = text;
}
        return valid;
    });
    
//return valid;
</script>
<script>
    $(this).attr('name');
    $('.check-on').on('change', function() {
        let radioName = $(this).attr('name');
        $(`.check-on[name=${radioName}]`).closest('.card.backgroundCard').removeClass('backgroundCard');
        $(this).closest('.card').addClass('backgroundCard');
    });
</script>
@endsection