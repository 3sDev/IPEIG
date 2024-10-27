@extends('adminlayoutenseignant.layout')
@section('title', 'Créer un poste ')
@section('contentPage')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Ajouter poste enseignant</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('etatEnseignant') }}">Poste Enseignant</a></li>
                <li class="breadcrumb-item active">Créer un poste enseignant</li>
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

                    <form action="{{ url('enseignantposte') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter un etat?')" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}

                      
                            <div class="row">
                               <div class="col-md-2">
                                    <label for="">Valeur</label>
                                    <input type="text" name="value" class="form-control" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="">poste Enseignant</label>
                                    <input type="text" name="Poste_fr" class="form-control" >
                                </div>
                                <div class="col-md-5" style="direction: rtl;" >
                                    <label style="float: right;">الخطة الوظيفية</label>
                                    <input type="text" name="Poste_ar" class="form-control" >
                                </div>
                            </div>
                        

                  

                            <br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>

    
@endsection




