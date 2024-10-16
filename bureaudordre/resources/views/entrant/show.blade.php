@extends('adminlayoutenseignant.layout')
@section('title', 'Détails Courier Entrant')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Détails Courier Entrant</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('entrants') }}">Liste des courrriers entrants</a></li>
          <li class="breadcrumb-item active">Détails Courier Entrant</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach
<style>
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }

  #printPageButton {
  display: none;
  }
  #fileButton {
  display: none;
  }
  #fileRetour {
  display: none;
  }
}
.invoice-head td {
  padding: 0 8px;
}
.container {
  padding-top:30px;
}
.invoice-body{
  background-color:transparent;
}
.invoice-thank{
  margin-top: 60px;
  padding: 5px;
}
address{
  margin-top:15px;
}
td{
  padding: 7px 0px !important;
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
              <h4>
                  <a href="{{ url('entrants') }}" id="fileRetour" class="btn btn-danger float-right">Retour</a>
              </h4>
          </div>

          <div class="card-body">

              @foreach ($entrants as $element)

                  <form action="" enctype="multipart/form-data">

                  @csrf
                  {{-- @method('PUT') --}}

                  <div class="row">
                      <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <!-- Box Comment -->
                        <div class="card card-widget">
                          <div class="card-header">
                            <div class="user-block">
                              <img class="img-circle" src={{ asset('upload/administrateur.png') }} alt="User Image">
                              <span class="username"><a href="{{ URL('profile.show') }}">{{ Auth::user()->name }}</a></span>
                              <span class="description">{{ Auth::user()->role }}</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="card-tools">
                              {{ date('Y-m-d H:i', strtotime($element->created_at)) }}
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">   
  
                            <div class="container">
                              <div class="row">
                                <div class="col-md-8">
                                        <img src="{{ url('upload/issatGafsaLogo.png') }}" class="img-rounded logo">
                                  <address>
                                      <strong>Institut Supérieur des Sciences Appliquées et de Technologies de Gafsa</strong><br>
                                      Adresse: Campus Universitaire Sidi Ahmed Zarrouk - 2112 Gafsa<br>
                                      Email: issatgf.website@gmail.com<br>
                                      Téléphone: 76 21 15 15<br>
                                  </address>
                                </div>
                                <div class="col-md-4">
                                  <table class="invoice-head">
                                    <tbody>
                                      <tr>
                                        <td class="pull-right"><strong>ID Ordre# &nbsp;&nbsp;&nbsp;</strong></td>
                                        <td>{{ $element->id }}</td>
                                      </tr>
                                      <tr>
                                        <td class="pull-right"><strong>Numéro d’ordre# &nbsp;&nbsp;&nbsp;</strong></td>
                                        <td>{{ $element->numero_ordre }}</td>
                                      </tr>
                                      <tr>
                                        <td class="pull-right"><strong>Date d’arrivée &nbsp;&nbsp;&nbsp;</strong></td>
                                        <td>{{ $element->date_arrivee }}</td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8">
                                  <h3>Ordre Entrant</h3>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <table width="90%">
                                      <tr>
                                        <td width="20%"><b>•	Numéro du courrier </b></td>
                                        <td width="30%">{{ $element->numero_courrier }}</td>
                                        <td width="14%"><b>•	Source </b></td>
                                        <td width="37%">{{ $element->source }}</td>
                                      </tr>
                                      <tr>
                                        <td width="20%"><b>•	Date de courrier </b></td>
                                        <td width="30%">{{ $element->date_courrier }}</td>
                                        <td width="14%"><b>•	Destinataire </b></td>
                                        <td width="37%">{{ $element->destinataire }}</td>
                                      </tr>
                                      <tr>
                                        <td colspan="1" width="20%"><b>•	Sujet </b></td>
                                        <td colspan="3" width="80%">{{ $element->sujet }}</td>
                                      </tr>
                                      <tr>
                                        <td colspan="1" width="20%"><b>•	Date de livraison </b></td>
                                        <td colspan="3" width="80%">
                                          <span class="float-left text-muted badge badge-warning">{{ $element->date_livraison }}</span>
                                        </td>
                                      </tr>
                                    </table>
                                </div>
                              </div>
                          </div>
                          <br><hr><br>
                            @if ($element->piece_jointe)
                              <button id="fileButton" type="button" class="btn btn-default btn-sm"><a href="{{ asset($upload.'/courriers/entrants/'.$element->piece_jointe) }}" target="_blank"><i class="fas fa-share"></i> Fichier</a></button>
                            @else
                                <span></span>
                            @endif

                            <button id="printPageButton" class="btn btn-primary btn-sm float-right" style="background-color: #21a594;" onClick="window.print();" class="noPrint">
                              Imprimer
                            </button>

                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-1"></div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <br>
                  </form>

              @endforeach

          </div>
      </div>
  </div>
</div>


@endsection