@extends('adminlayoutenseignant.layout')
@section('title', 'Modifier PFE')
 @section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="m-0">Saisir les informations de soutenance</h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('soutenances') }}">Séléctionner soutenance</a></li>
            <li class="breadcrumb-item active">Modifier soutenance</li>
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
                <h5 class="text-center">- {{ $demand->sous_type }} -</h5>
            </div>
            <div class="card-body">
                
                <form action="{{ url('update-soutenance/'.$demand->id) }}" method="POST"  onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                @csrf
                @method('PUT')
                <div class="row">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <h5 class="titreDemande">Information Etudiant(e) </h5>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-2" style="margin-top:-2%;">
                                    <div class="text-center">
                                        <img src={{ asset($upload.'/students/'.$demand->student->profile_image) }} style="width:150px !important; height: 160px;" class="profile-user-img img-fluid img-circle imgPhoto">
                                    </div>
                                </div>
                                <div class="col-md-5" style="border-left: 1px solid rgb(255, 255, 255)">
                                    
                                    <div class="profile-head">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>&nbsp;&nbsp;&nbsp;Etudiant(e) </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>{{ $demand->student->prenom.' '.$demand->student->nom }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>&nbsp;&nbsp;&nbsp;Classe</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>{{ $demand->classe->abbreviation }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label>&nbsp;&nbsp;&nbsp;Filière </label>
                                        </div>
                                        <div class="col-md-7">
                                            <p>{{ $demand->student->filiere }}</p>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>&nbsp;&nbsp;&nbsp;Numéro Tél </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>{{ $demand->student->tel1_etudiant }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="border-left: 1px solid rgb(255, 255, 255)">
                                    <div class="profile-head">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>&nbsp;&nbsp;&nbsp;Email </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>{{ $demand->student->email }}</p>
                                            </div>
                                        </div>

                                        @if ($demand->classe->category == 'Licence')
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>&nbsp;&nbsp;&nbsp;Binome  </label>
                                                </div>
                                                <div class="col-md-7">
                                                    <p>{{ $demand->binome_pfe }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>&nbsp;&nbsp;&nbsp;Date demande </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>{{ date('Y-m-d', strtotime($demand->created_at)) }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>&nbsp;&nbsp;&nbsp;Type demande </label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>{{ $demand->sous_type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr><br>
                    
                        <?php
                        $ts1 = strtotime($demand->datedebut_pfe);
                        $ts2 = strtotime($demand->datefin_pfe);

                        $year1 = date('Y', $ts1);
                        $year2 = date('Y', $ts2);

                        $month1 = date('m', $ts1);
                        $month2 = date('m', $ts2);

                        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                        ?>
                        <div class="row" style="">
                        <div class="col-md-2" style="margin-top:2%;"></div>
                        <div class="col-md-10" style="border-left: 1px solid rgb(255, 255, 255)">
                            <div class="profile-head">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td align="center" colspan="4" class="bgPfe"><span class="infoPfe">Modifier les informations de soutenance</span></td>
                                    </tr>
                                    <tr>
                                        {{--<td width="32%"><label>Date début :  </label> <input type="date" name="datedebut_pfe" id="" value="{{ date('d-m-Y', strtotime($demand->datedebut_pfe)) }}" class="form-control" ></td>--}}
                                        <td width="36%"><label>Date Soutenance:  </label><input type="date" name="soutenance_pfe" id="" value="{{ $demand->soutenance_pfe }}" class="form-control" ></td>
                                        <td width="32%"><label>Heure début :  </label> <input type="time" name="heuredebut_soutenance" id="" value="{{ $demand->heuredebut_soutenance }}" class="form-control" min="08:00" max="18:00"></td>
                                        <td width="32%"><label>Heure fin :  </label><input type="time" name="heurefin_soutenance" id="" value="{{ $demand->heurefin_soutenance }}" class="form-control" min="08:00" max="18:00"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" width="100%"><label for="nom_pfe">Salle de soutenance :</label>
                                            <select name="salle_soutenance" id="" class="form-control" >
                                                <option value="{{ $demand->salle_soutenance }}">{{ $demand->salle_soutenance }}</option>
                                                <option value="" disabled>-----------------------------------</option>
                                                @foreach ($salles as $salle)
                                                    <option value="{{ $salle->fullName }}">{{ $salle->fullName }}</option>
                                                @endforeach
                                            </select>                                    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" width="50%"><label for="rapporteur_pfe">Rapporteur PFE:</label>
                                            <select name="rapporteur_pfe" id="" class="form-control" >
                                                <option value="{{ $demand->rapporteur_id }}/{{ $demand->rapporteur_pfe }}">{{ $demand->rapporteur_pfe }}</option>
                                                <option value="" disabled>-----------------------------------</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}/{{ $teacher->full_name}}">{{ $teacher->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td colspan="2" width="50%"><label for="president_pfe">Président PFE:</label>
                                            <select name="president_pfe" id="" class="form-control">
                                                <option value="{{ $demand->presidentjury_id }}/{{ $demand->president_pfe }}">{{ $demand->president_pfe }}</option>
                                                <option value="" disabled>-----------------------------------</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}/{{ $teacher->full_name}}">{{ $teacher->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" width="50%"><label for="invite1_pfe">Invité 1 PFE:</label>
                                            <input type="text" name="invite1_pfe" id="" value="{{ $demand->invite1_pfe }}" class="form-control" >
                                        </td>
                                        <td colspan="2" width="50%"><label for="president_pfe">Invité 2 PFE:</label>
                                            <input type="text" name="invite2_pfe" id="" value="{{ $demand->invite2_pfe }}" class="form-control" >
                                        </td>
                                    </tr>
                                </table>
                                <center>
                                <button type="submit" class="btn btn-info">Modifier</button>
                            </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection