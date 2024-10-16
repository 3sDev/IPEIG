@extends('adminlayoutenseignant.layout')
@section('title', 'Modifier Courrier entrant')
@section('contentPage')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Modifier courrier entrant</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('entrants') }}">Liste des courrriers entrants</a></li>
            <li class="breadcrumb-item active">Modifier courrier entrant</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach
        
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
            <div class="card-header">
                <h4>
                    <a href="{{ url('entrants') }}" class="btn btn-danger float-right">Retour</a>
                </h4>
            </div>

            <div class="card-body">
                @foreach ($entrants as $element)
                <form action="{{ url('update-entrant/'.$element->id) }}" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">

                @csrf
                {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Numéro d’ordre</label>
                            <input type="text" name="numero_ordre" class="form-control" value="{{ $element->numero_ordre }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Date d’arrivée</label>
                            <input type="date" name="date_arrivee" class="form-control" value="{{ $element->date_arrivee }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Numéro du courrier</label>
                            <input type="text" name="numero_courrier" class="form-control" value="{{ $element->numero_courrier }}">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Date de courrier</label>
                            <input type="date" name="date_courrier" class="form-control" value="{{ $element->date_courrier }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Source</label>
                            <input type="text" name="source" class="form-control" value="{{ $element->source }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Destinataire</label>
                            <input type="text" name="destinataire" class="form-control" value="{{ $element->destinataire }}">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Sujet</label>
                            <textarea name="sujet" cols="30" rows="2" class="form-control" value="{{ $element->sujet }}">
                                {{ $element->sujet }}
                            </textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Date de livraison</label>
                            <input type="date" name="date_livraison" class="form-control" value="{{ $element->date_livraison }}">
                        </div>
                        <div class="col-md-6" style="margin-top: 2.5%;">
                            <button type="submit" class="btn btn-success float-right">Modifier</button>
                        </div>
                    </div>
                    <br>

                </form>
                <br><hr><br>

                <form action="{{ url('update-fileEntrant/'.$element->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                    @csrf
                    @method('PUT')
                        <div class="form-input-steps" style="text-align: left;">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label style="float: left;">Saisir un nouveau fichier </label>
                                    <input type="file" class="form-control" name="piece_jointe" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning">Modifier fichier</button>
                        </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
    
@endsection