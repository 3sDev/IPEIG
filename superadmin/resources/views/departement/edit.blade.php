@extends('adminlayoutenseignant.layout')
@section('title', 'Modifier un département')
@section('contentPage')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Modifier un département</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('departements') }}">Liste des départements</a></li>
            <li class="breadcrumb-item active">Modifier un département</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach


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
                @foreach ($departements as $dep)
                <form action="{{ url('update-departement/'.$dep->id) }}" onsubmit="return confirm('Êtes-vous sûr de modifier cet département?')" enctype="multipart/form-data">

                    @csrf
                    {{-- @method('PUT') --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nom département</label>
                                <input type="text" name="departmentLabel" value="{{ $dep->departmentLabel }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Description</label>
                                <input type="text" name="description" value="{{ $dep->description }}" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nom chef département</label>
                                <input type="text" name="nom_chef_dep" value="{{ $dep->nom_chef_dep }}" class="form-control" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success float-right">Modifier</button>
                        </div>
                    </form>  
                    <br><hr><br>
                    <form action="{{ url('update-chefDep/'.$dep->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de modifier cette donnée?')">
                        @csrf
                        @method('PUT')
                        <div class="form-input-steps" style="text-align: left;">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label style="float: left;">Signature Chéf Département</label>
                                    <input type="file" value="{{ $dep->signature_chef_dep }}" class="form-control" name="signature_chef_dep" required><br>
                                    <button type="submit" class="btn btn-warning">Modifier fichier</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <center>
                                        <img src={{ asset('https://eniga.tn/university/public/upload/departements/signature/'.$dep->signature_chef_dep) }} style="width:200px !important; height: 160px;">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>  
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection