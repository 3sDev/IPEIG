@extends('adminlayoutenseignant.layout')
@section('title', 'Détails Soutenance')
 @section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Détails soutenance</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('soutenances') }}">Séléctionner soutenance</a></li>
                <li class="breadcrumb-item active">Liste soutenances</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach

<link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />
<style>
.titreDemande{
    background-color: rgb(235, 235, 235);
    padding: 10px 6px;
    border-radius: 12px;
    color: orangered;
    text-align: left;
    font-size: 16px;
}
label {
    /* Other styling... */
    text-align: right;
    clear: both;
    float:left;
    margin-right:15px;
}
.downloadImage{
    width: 90px;
    
}
.labelFileDownload{
    margin-left: 25%;
}
.infoCompany{
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    color: white;
}
.bgCompany{
    background-color: rgb(255, 111, 59);
}
.infoPfe{
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    color: white;
}
.bgPfe{
    background-color: rgb(53, 106, 162);
}
.infoPieces{
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    color: white;
}
.bgPieces{
    background-color: rgb(60, 162, 53);
}
.form-control{
    width: 100%;
}
table tr td {
    font-size: 14px;
}
p {
    font-size: 14px;
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

        <div class="card" id="printPage">
          @foreach ($demandes as $demand)
            <div class="card-header">

                <h4 class="text-center">PV d'évaluation de PFE par les Membres de Jury</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row" style="">
                            <div class="col-md-12" style="border-left: 1px solid rgb(255, 255, 255)">
                                <div class="profile-head">
                                    <h5><b>A- Membres de jury</b></h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="20%"><b>Président de Jury  </b></td>
                                            <td><span>{{ $demand->president_pfe }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Rapporteur  </b></td>
                                            <td><span>{{ $demand->rapporteur_pfe }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Encadrant  </b></td>
                                            <td><span>{{ $demand->encadrant_pfe }}</span></td>
                                        </tr>
                                        @if ($demand->encadrant_industriel_pfe)
                                            <tr>
                                                <td><b>Encadrant Industriel  </b></td>
                                                <td><span>{{ $demand->encadrant_industriel_pfe }}</span></td>
                                            </tr>
                                        @endif
                                        @if ($demand->invite1_pfe)
                                            <tr>
                                                <td><b>Invité 1  </b></td>
                                                <td><span>{{ $demand->invite1_pfe }}</span></td>
                                            </tr>
                                        @endif
                                        @if ($demand->invite2_pfe)
                                        <tr>
                                            <td><b>Invité 2  </b></td>
                                            <td><span>{{ $demand->invite2_pfe }}</span></td>
                                        </tr>
                                    @endif
                                    </table>

                                    <br>
                                    <h5><b>B- Intitulé du Projet de Fin d’Etudes</b></h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="20%"><b>Intitulé de PFE  </b></td>
                                            <td><span>{{ $demand->nom_pfe }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Etudiant 1  </b></td>
                                            <td>
                                                @if ($demand->student->full_name)
                                                    <span>{{ $demand->student->full_name }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Etudiant 2  </b></td>
                                            <td><span>{{ $demand->binome_pfe }}</span></td>
                                        </tr>
                                    </table>

                                    <br>
                                    <h5><b>C- Evaluation de la soutenance</b></h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><b></b></td>
                                            <td><b>Critères</b></td>
                                            <td><b>Etudiant 1</b></td>
                                            <td><b>Etudiant 2</b></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3"><b>FORME</b></td>
                                            <td>Présentation /2</td>
                                            <td>{{ $demand->notePresidentC1_pfe }}</td>
                                            <td>{{ $demand->notePresidentC11_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>Expression Orale /2</td>
                                            <td>{{ $demand->notePresidentC2_pfe }}</td>
                                            <td>{{ $demand->notePresidentC12_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>Qualité de la discussion : aptitude de dialoguer /4</td>
                                            <td>{{ $demand->notePresidentC3_pfe }}</td>
                                            <td>{{ $demand->notePresidentC13_pfe }}</td>
                                        </tr>

                                        <tr>
                                            <td rowspan="5"><b>FOND</b></td>
                                            <td>Mise en contexte du travail /2</td>
                                            <td>{{ $demand->notePresidentC4_pfe }}</td>
                                            <td>{{ $demand->notePresidentC14_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>Description de la problématique /2</td>
                                            <td>{{ $demand->notePresidentC5_pfe }}</td>
                                            <td>{{ $demand->notePresidentC15_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>Conception de la solution /4</td>
                                            <td>{{ $demand->notePresidentC6_pfe }}</td>
                                            <td>{{ $demand->notePresidentC16_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>Réalisation et tests /2</td>
                                            <td>{{ $demand->notePresidentC7_pfe }}</td>
                                            <td>{{ $demand->notePresidentC17_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>Maitrise des connaissances théoriques /2</td>
                                            <td>{{ $demand->notePresidentC8_pfe }}</td>
                                            <td>{{ $demand->notePresidentC18_pfe }}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" align="right"><b>Note de la soutenance /20 </b></td>
                                            <td>
                                                <?php
                                                    $noteStudent1 = $demand->notePresidentC1_pfe+$demand->notePresidentC2_pfe+$demand->notePresidentC3_pfe+$demand->notePresidentC4_pfe+$demand->notePresidentC5_pfe+$demand->notePresidentC6_pfe+$demand->notePresidentC7_pfe+$demand->notePresidentC8_pfe;
                                                    echo $noteStudent1;
                                                ?>
                                            </td>
                                            <td>
                                                @if ($demand->notePresidentC11_pfe)
                                                    <?php
                                                        $noteStudent2 = $demand->notePresidentC11_pfe+$demand->notePresidentC12_pfe+$demand->notePresidentC13_pfe+$demand->notePresidentC14_pfe+$demand->notePresidentC15_pfe+$demand->notePresidentC16_pfe+$demand->notePresidentC17_pfe+$demand->notePresidentC18_pfe;
                                                        echo $noteStudent2;
                                                    ?>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>

                                    <h5><b>D- Synthèse des notes</b></h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><b>Etudiant 1</b></td>
                                            <td><b>Etudiant 2</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>COEFFICIENT</b></td>
                                            <td><b>EVALUATION</b></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>0.4</td>
                                            <td>Note de la soutenance (Président de Jury) *</td>
                                            <td>
                                                <?php
                                                echo $noteStudent1;
                                                ?>
                                            </td>
                                            <td>
                                                @if ($demand->notePresidentC11_pfe)
                                                    <?php
                                                    echo $noteStudent2;
                                                    ?>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>0.3</td>
                                            <td>Note du rapporteur **</td>
                                            <td>{{ $demand->noteRapporteurE1_pfe }}</td>
                                            <td>{{ $demand->noteRapporteurE2_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td>0.3</td>
                                            <td>Note des encadrants ***</td>
                                            <td>{{ $demand->noteEncadrantE1_pfe }}</td>
                                            <td>{{ $demand->noteEncadrantE2_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><b>Note PFE (100%)</b></td>
                                            <td> 
                                                <?php
                                                    $finalNoteStudent1 = ($demand->noteRapporteurE1_pfe * 0.3) + ($demand->noteEncadrantE1_pfe * 0.3) + ($noteStudent1 * 0.4);
                                                    echo $finalNoteStudent1;
                                                ?>
                                            </td>
                                            <td>
                                                @if ($demand->noteRapporteurE2_pfe)
                                                    <?php
                                                        $finalNoteStudent2 = ($demand->noteRapporteurE2_pfe * 0.3) + ($demand->noteEncadrantE2_pfe * 0.3) + ($noteStudent2 * 0.4);
                                                        echo $finalNoteStudent2;
                                                    ?> 
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <p>* : input de l’app mobile enseignant « Président de Jury »</p>
                                    <p>** : input de l’app mobile enseignant « Rapporteur »</p>
                                    <p>** : input de l’app mobile enseignant « Encadrant Universitaire »</p>
                                
                                    <table class="table table-bordered">
                                        <tr>
                                            <td rowspan="2" width="30%"><b>Décision des membres de jury</b></td>
                                            <td width="40%"><b>Décision pour Etudiant 1</b></td>
                                            <td width="30%">{{ $demand->decisionE1_pfe }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Décision pour Etudiant 2</b></td>
                                            <td>{{ $demand->decisionE2_pfe }}</td>
                                        </tr>
                                    </table>
                                    {{-- <p>* : input de l’app mobile enseignant « Rapporteur »</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection