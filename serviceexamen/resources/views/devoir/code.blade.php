
@extends('adminlayoutscolarite.layout')
@section('title', 'Modifier les codes des étudiants')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
        <h3 class="m-0">Notes des étudiants</h3>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('devoirs') }}">Liste des devoirs</a></li>
        <li class="breadcrumb-item active">Notes des étudiants</li>
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
        <div class="card" id="printPage">
            <div class="card-header">
                <a href="{{ url('devoirs') }}" class="btn btn-primary float-right">Retour</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <form action="" method="POST" >
                    @csrf

                    @foreach ($devoirs as $devoir)
                    <center><h5><b>Classe :</b> {{ $devoir->classe->abbreviation }}</h5>
                    <h5><b>Enseignant :</b> {{ $devoir->teacher->full_name }}</h5>
                    <h5><b>Matière :</b> {{ $devoir->matiere->subjectLabel.' - '.$devoir->matiere->description }}</h5><br>
                    <table class="table table-striped" style="border:1px solid white; table-layout:fixed; width:75% !important">
                        <tr>
                            <th>Année universitaire</th>
                            <th>Semestre</th>
                            <th>Type Devoir</th>
                            
                        </tr>
                        <tr>
                            <td>{{ $devoir->annee }}</td>
                            <td>{{ $devoir->semestre }}</td>
                            <td>{{ $devoir->type_devoir }}</td>
                        </tr>
                    </table>
                    </center>
                    @endforeach
                <br>                      
                </form>
                <center>
                    <table id="example1" class="table table-bordered table-striped" style="padding-right:5px; table-layout:fixed; width:80% !important">
                        <thead>
                            <tr>
                                <th width="15%">CIN</th>
                                <th width="35%">Nom et Prénom</th>
                                <th width="20%" class="text-center">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($devoirs as $devoir) 
                            @foreach ($codes as $item)
                                @if ($item->pivot->note == '999')
                                    <tr style="background-color: #ffc0c0">
                                @else
                                    <tr>
                                @endif    
                            
                                    <td><span>{{ $item->cin }}</span></td> 
                                    <td><span>{{ $item->prenom .' '. $item->nom }}</span></td> 
                                    
                                    @if ($item->pivot->note == '999')
                                    <td align="center">
                                        <span>A</span>
                                    </td>
                                    @else
                                    <td align="center">
                                        <span>{{ $item->pivot->note }}</span>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                    <button id="print" class="btn btn-secondary" onclick="printContent('id name of your div');" >Imprimer</button>
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
    function printContent(el){
    var restorepage = $('printPage').html();
    var printcontent = $('#' + el).clone();
    $('printPage').empty().html(printcontent);
    window.print();
    $('printPage').html(restorepage);
    }
</script>
@endsection