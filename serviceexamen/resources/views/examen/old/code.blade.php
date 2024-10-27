
@extends('adminlayoutscolarite.layout')
@section('title', 'Modifier les codes des étudiants')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Modifier les codes des étudiants</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('examens') }}">Liste des examens</a></li>
        <li class="breadcrumb-item active">Modifier les codes des étudiants</li>
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
                
                <form action="" method="POST" >
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
                    <br>                      
                </form>
                <center>
                    <table border="" BORDERCOLOR="#ccc" style="padding-right:5px; table-layout:fixed; width:60% !important" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20%">CIN</th>
                                <th width="35%">Nom et Prénom</th>
                                <th width="20%">Note</th>
                                <th width="30%" align="center">Code Examen</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($examens as $examen) 
                            @foreach ($codes as $item)
                                <tr>
                                    <td><span>{{ $item->cin }}</span></td>
                                    <td style="display: none"><input type="text" class="inputStyle" name="student_id[]" value="{{ $item->id }}" readonly></td>
                                    
                                    <td><span>{{ $item->prenom .' '. $item->nom }}</span></td> 
                                    
                                    @if ($item->pivot->note)
                                    <td align="center">
                                        <span>{{ $item->pivot->note }}</span>
                                    </td>
                                    @else
                                    <td align="center">
                                        <span>--</span>
                                    </td>
                                    @endif

                                    <td align="center">
                                        <form action="{{ url('modifierCodeStudentByIdCode/'.$item->pivot->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir modifier ce code ?')">
                                            @csrf
                                            <div class="input-group mb-3">
                                                @if ($item->pivot->note)
                                                <div class="input-group-append">
                                                    <input type="text" class="form-control" value="{{ $item->pivot->code }}" name="code" readonly style="width: 60% !important;">
                                                    <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm" disabled><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                                @else
                                                <div class="input-group-append">
                                                    <input type="text" class="form-control" value="{{ $item->pivot->code }}" name="code" required style="width: 60% !important;">
                                                    <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                                @endif
                                              
                                            </div>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            {{-- @foreach ($examen->students as $item)
                                <tr>
                                    <td><input type="text" class="inputStyle" name="student_id[]" value="{{ $item->id }}" readonly></td>
                                    
                                    <td>{{ $item->prenom .' '. $item->nom }}</td>                            
                                    
                                    <td align="center">
                                        <input type="text" class="form-control"  name="code[]" required style="width: 80% !important;">
                                    </td>
                                </tr>
                            @endforeach --}}
                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                            <th>CIN</th>
                            <th>Nom et Prénom</th>
                            <th>Note</th>
                            <th>Code Examen</th>
                            </tr>
                        </tfoot>
                    </table>
                </center>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script>
$(this).attr('name');
$('.check-on').on('change', function() {
let radioName = $(this).attr('name');
$(`.check-on[name=${radioName}]`).closest('.card.backgroundCard').removeClass('backgroundCard');
$(this).closest('.card').addClass('backgroundCard');
});
</script>
@endsection