
@extends('adminlayoutenseignant.layout')
 @section('title', 'Liste des rattrapages')
 @section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des rattrapages</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des rattrapages</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />
<style>
.textable {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1; /* number of lines to show */
    -webkit-box-orient: vertical;
}
.statutR{
    background-color: blueviolet;
    color: wheat;
    padding: 5px 15px;
    border-radius: 10px;
}
</style>

    <div class="row">
        @if (session('message'))
        <h5>{{ session('message') }}</h5>
            @endif
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="9%">Date</th>
                                <th width="10%">Séance</th>
                                <th>Durée</th>
                                <th>Matière</th>
                                <th>Enseignant</th>
                                <th>Classe</th>
                                <th>Salle</th>
                                <th width="11%">Statut</th>
                                <th width="14%">Création</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rattrapages as $rattrapage)
                            
                            @if (Carbon\Carbon::now() > $rattrapage->date )
                                <tr style="background: rgb(255, 209, 193)">
                            @else
                                <tr style="background: rgb(225, 255, 211)">
                            @endif
                            <td>{{ $rattrapage->id }}</td>
                            <td>{{ $rattrapage->date }}</td>
                            <td>{{ $rattrapage->heure_debut.' - '.$rattrapage->heure_fin }}</td>
                            <td>{{ $rattrapage->duree }}</td>
                            <td>{{ $rattrapage->matieres->subjectLabel }} <b>({{ $rattrapage->matieres->description }})</b></td>
                            <td>{{ $rattrapage->teacher->full_name }}</td>
                            <td>{{ $rattrapage->classes->abbreviation }}</td>
                            <td>{{ $rattrapage->salles->fullName }}</td>
                            <td><span class="statutR">{{ $rattrapage->statut }}</span></td>
                            <td>{{ date('Y-m-d | H:i', strtotime($rattrapage->created_at)) }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Séance</th>
                                <th>Durée</th>
                                <th>Matière</th>
                                <th>Enseignant</th>
                                <th>Classe</th>
                                <th>Salle</th>
                                <th>Statut</th>
                                <th>Création</th>
                            </tr>
                        </tfoot>
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