@extends('adminlayoutscolarite.layout')
@section('title', 'Créer examen')
@section('contentPage')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Ajouter examen pour un Groupe</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('examens') }}">Liste des examens</a></li>
                <li class="breadcrumb-item active">Créer nouveau examen</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

{{-- <link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" /> --}}

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
                <div class="card-body">
                    <form action="{{ url('examens') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cette donnée?')" enctype="multipart/form-data">

                        @csrf
                        {{-- @method('PUT') --}}
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Semestre</label>
                                <select name="semestre" id="semestre" class="form-control" required>
                                    <option value="" selected disabled>Selectionner semestre</option>
                                    <option value="1">S1</option>
                                    <option value="2">S2</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Choisir classe</label>
                                <select name="classe_id" id="classes" class="form-control" required>
                                    <option value="" selected disabled>Selectionner Classe</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}"> {{ $classe->abbreviation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="">Choisir matière</label>
                                <select name="matiere_id" id="matiere" data-style="btn btn-primary" required class="form-control" required>
                                    <option value="">Selectionner Matière</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Choisir enseignant</label>
                                <select name="teacher_id" id="teacher_id" class="form-control" required>
                                <option value="" selected disabled>Selectionner Enseignant</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"> {{ $teacher->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Année universitaire</label>
                                <input type="text" value="2022/2023" name="annee" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="">Session</label>
                                <select name="session" id="session" class="form-control" required>
                                    <option value="" selected disabled>Selectionner session</option>
                                    <option value="Principale">Principale</option>
                                    <option value="Controle">Controle</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <input type="description" name="description" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<script>
// when classes dropdown changes
$('#classes').change(function() {
    var classeID = $(this).val();
    var semestreSelect = $("#semestre").val();
    if (semestreSelect == 1) {
    semestre = "S1";
    }
    if (semestreSelect == 2) {
    semestre = "S2";
    }
    console.log("semestre is: "+semestreSelect);

    if (classeID) {

        $.ajax({
            type: "GET",
            url: "{{ url('getMatiereExamen') }}?classe_id=" + classeID+"&semestre=" + semestre,
            success: function(res) {
                if (res) {
                    $("#matiere").empty();
                    $("#matiere").append('<option value="" selected disabled>Selectionner Matière</option>');

                    res.map(element=>{
                        $("#matiere").append('<option value="'+element.matiere_id+'">' + element.subjectLabel +'<b>('+element.description+'/'+element.semestre+')</b></option>');
                    });

                } else {
                    console.log("myResult"+res);
                    $("#matiere").empty();
                }
            }
        });
    } else {
        $("#matiere").empty();
    }
});

</script>
    
@endsection