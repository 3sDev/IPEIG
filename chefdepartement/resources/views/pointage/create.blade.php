@extends('adminlayoutenseignant.layout')
@section('title', 'Gestion des pointages')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Gestion des pointages</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('pointages') }}">Gestion des pointages</a></li>
          <li class="breadcrumb-item active">Saisir pointage</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />
<style>
.inputStyle {
  background: none !important;
  border: none !important;
}
.textable {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
}
.textPointage{
  font-size: 16px;
  font-weight: bold;
  color:olive;
}
</style>

    <div class="row">
        @if (session('message'))
        <h5>{{ session('message') }}</h5>
            @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <center>
                  @foreach ($teacherResult as $teacher)
                      <h5>
                        <span>Enseignant :</span> <b>{{ $teacher->full_name }} </b> 
                        <span style="margin-left: 5%;">Jour de Pointage :</span> <b>{{ $Jour }} </b>  
                        <span style="margin-left: 5%;">Date:  </span> <b>{{ $datePointage }}</b>
                        <span style="margin-left: 5%;">Semestre:  </span> <b>{{ $semestre }}</b>
                        <a href="{{ url('pointages') }}" class="btn btn-primary float-right">Retour</a>
                      </h5>
                  @endforeach
                  </center>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                    <form action="{{ url('save-pointages') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de sauvegarder ces données?')">
                      @csrf
                    <input type="hidden" name="jour" value="{{ $Jour }}">
                    <input type="hidden" name="teacher_id" value="{{ $IdTeacher }}">
                    <input type="hidden" name="date_pointage" value="{{ $datePointage }}">
                    <input type="hidden" name="semestre" value="{{ $semestre }}">
                    <h4>Saisir un nouveau pointage :</h4>
                      <center><button type="submit" class="btn btn-danger" onclick="return IsEmpty();"><b>Envoyer</b></button></center>
                      <br>  
                      <center>
                      <table border="" BORDERCOLOR="#ccc" style="padding-right:5px; table-layout:fixed;" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="40%">Matière</th>
                                  <th width="10%">Type Matière</th>
                                  <th width="10%">Heure début</th>
                                  <th width="10%">Heure fin</th>
                                  <th width="8%">Salle</th>
                                  <th width="12%">Pointage</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($emploiTeacher as $emploi)
                              
                            <tr>
                              {{-- <td><img src="/upload/students/{{ $item->profile_image }}" alt="" class="image-table"> </td> --}}
                              <td><input type="text" name="nom_matiere[]" value="{{ $emploi->matiere->subjectLabel }}" class="form-control inputStyle" readonly style="width: 100% !important;"></td>                            
                              <td><input type="text" name="type_matiere[]" value="{{ $emploi->matiere->description }}" class="form-control inputStyle" readonly style="width: 100% !important;"></td>                            
                              <td><input type="text" name="heure_debut[]" value="{{ $emploi->heure_debut }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                              <td><input type="text" name="heure_fin[]" value="{{ $emploi->heure_fin }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                              <td><input type="text" name="salle[]" value="{{ $emploi->salle->fullName }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                              <td align="center" style="background-color: rgb(151, 151, 151)">
                                <select class="form-control" id='selec3' name="presence[]" style="width: 100% !important;"> 
                                    <option value='P'> Pointé </option>
                                    <option value='A'> Non pointé </option>
                                </select>
                              </td>
                              <td style="display: none;"><input type="text" name="seance_id[]" value="{{ $emploi->id }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </center>
                    </form>
                    <br><hr><br>
                    <h4>Liste des pointages :</h4>
                    <table border="" BORDERCOLOR="#ccc" style="padding-right:5px; table-layout:fixed;" class="table table-bordered table-striped">
                      <thead style="background-color: rgb(27, 57, 102); color:white;">
                          <tr>
                              <th width="17%">Type</th>
                              <th>Matière</th>
                              <th>Type Matière</th>
                              <th>Heure début</th>
                              <th>Heure fin</th>
                              <th>Salle</th>
                              <th>Pointage</th>
                              <th width="7%">Supp</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($pointageTeacher as $pointage)
                          
                        <tr style="background-color: rgb(233, 255, 214)">
                          {{-- <td><img src="/upload/students/{{ $item->profile_image }}" alt="" class="image-table"> </td> --}}
                          <td align="center">
                            @if ($pointage->lat)
                              <span class="demandEncours">Enseignant</span>
                            @else 
                              <span class="demandTraitee">Chef département</span>
                            @endif
                          </td>
                          <td><input type="text" name="" value="{{ $pointage->nom_matiere }}" class="form-control inputStyle" readonly style="width: 100% !important;"></td>                            
                          <td><input type="text" name="" value="{{ $pointage->type_matiere }}" class="form-control inputStyle" readonly style="width: 100% !important;"></td>                            
                          <td><input type="text" name="" value="{{ $pointage->heure_debut }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                          <td><input type="text" name="" value="{{ $pointage->heure_fin }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                          <td><input type="text" name="" value="{{ $pointage->salle }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                          <td align="center" style="background-color: rgb(233, 255, 214)">
                            <span class="textPointage">Déja Pointé</span>
                          </td>
                          <td style="display: none;"><input type="text" name="" value="{{ $pointage->id }}" class="form-control inputStyle" style="width: 100% !important;" readonly></td>                            
                          <td align="center">
                            @if ($pointage->lat)
                              <center>-</center>
                            @else 
                              <form action="{{ url('delete-pointagePageCreate/'.$pointage->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces données?')">
                                <input type="hidden" name="jour" value="{{ $Jour }}">
                                <input type="hidden" name="teacher_id" value="{{ $IdTeacher }}">  
                                <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </form>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection