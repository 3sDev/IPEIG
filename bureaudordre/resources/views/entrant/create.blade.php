@extends('adminlayoutenseignant.layout')
@section('title', 'Créer un courrier entrant')
@section('contentPage')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Nouveau Courrier entrant</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('entrants') }}">Liste des courriers entrants</a></li>
                <li class="breadcrumb-item active">Nouveau Courrier entrant</li>
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
                <form action="{{ url('entrants') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cette donnée?')" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Numéro d’ordre</label>
                            <input type="text" name="numero_ordre" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="">Date d’arrivée</label>
                            <input type="date" name="date_arrivee" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="">Numéro du courrier</label>
                            <input type="text" name="numero_courrier" class="form-control" >
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Date de courrier</label>
                            <input type="date" name="date_courrier" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="">Source</label>
                            <input type="text" name="source" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="">Destinataire</label>
                            <input type="text" name="destinataire" class="form-control" >
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Sujet</label>
                            <textarea name="sujet" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Date de livraison</label>
                            <input type="date" name="date_livraison" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label for="">Pièce jointe</label>
                            <input type="file" name="piece_jointe" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-right">ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection