@extends('adminlayoutscolarite.layout')
@section('title', 'Modifier examen')
@section('contentPage')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Modifier examen pour un Groupe</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('examens') }}">Liste des examens</a></li>
                <li class="breadcrumb-item active">Modifier examen</li>
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
                    @foreach ($examens as $examen)
                    <form action="{{ url('update-examen/'.$examen->id) }}" onsubmit="return confirm('Êtes-vous sûr modifier cette donnée?')" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Choisir enseignant</label>
                                <select name="teacher_id" id="teacher_id" class="form-control" required>
                                    <option value="{{ $examen->teacher->id }}" selected>{{ $examen->teacher->full_name }}</option>
                                    <option value="" disabled>-------------------------</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"> {{ $teacher->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Choisir classe</label>
                                <select name="classe_id" id="classes" class="form-control" required>
                                    <option value="{{ $examen->classe->id }}" selected>{{ $examen->classe->abbreviation }}</option>
                                    <option value="" disabled>-------------------------</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}"> {{ $classe->abbreviation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Choisir matière</label>
                                <select name="matiere_id" id="matiere" data-style="btn btn-primary" required class="form-control" required>
                                    <option value="{{ $examen->matiere->id }}" selected>{{ $examen->matiere->subjectLabel }}</option>
                                    <option value="" disabled>-------------------------</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Année universitaire</label>
                                <input type="text" value="{{ $examen->annee }}" name="annee" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="">Semestre</label>
                                <select name="semestre" id="semestre" class="form-control" required>
                                    <option value="{{ $examen->semestre }}" selected>S{{ $examen->semestre }}</option>
                                    <option value="" disabled>-------------------------</option>
                                    <option value="1">S1</option>
                                    <option value="2">S2</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Session</label>
                                <select name="session" id="session" class="form-control" required>
                                    <option value="{{ $examen->session }}" selected>{{ $examen->session }}</option>
                                    <option value="" disabled>-------------------------</option>
                                    <option value="Principale">Principale</option>
                                    <option value="Controle">Controle</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="">Type Devoir</label>
                                    <input type="text" name="type_devoir" value="{{ $examen->type_devoir }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success float-right">Modifier</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<script>
// when classes dropdown changes
$('#classes').change(function() {
    var classeID = $(this).val();

    if (classeID) {

        $.ajax({
            type: "GET",
            url: "{{ url('getMatiere') }}?classe_id=" + classeID,
            success: function(res) {
                if (res) {
                    $("#matiere").empty();
                    $("#matiere").append('<option value="" selected disabled>Selectionner Matière</option>');

                    res.map(element=>{
                        $("#matiere").append('<option value="'+element.matiere_id+'">' + element.subjectLabel +'<b>('+element.description+')</b></option>');
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