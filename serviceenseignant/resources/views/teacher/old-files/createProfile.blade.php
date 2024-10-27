@extends('adminlayoutenseignant.layout')
@section('title', 'Profil Enseignant')
@section('contentPage')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Profil Enseignant</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('teachers') }}">Liste des enseignants</a></li>
                <li class="breadcrumb-item active">Profil Enseignant</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

{{-- <link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" /> --}}
<style>
    .profileTeacher {
        font-weight: bold;
        color: blueviolet;
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

            @foreach ($profiles as $profile)

                    @if ($profile->profile_teacher == [])
                    <div class="card">
                        <div class="card-header">
                            
                            <h5>Ajouter le profile d`enseignant <span class="profileTeacher">{{ $profile->prenom.' '.$profile->nom }}</span>
                                <a href="{{ url('teachers') }}" class="btn btn-danger float-right">Retour</a>
                            </h5>
                            
                        </div>
                        <div class="card-body">

                    <form action="{{ url('teacherprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" style="display:none;" name="teacher_id" value="{{ $profile->id }}" class="form-control">

                        <div class="row" style="margin-top: 3%">
                            <div class="col-md-4">
                                <label for="">Date de naissance</label>
                                <input type="date" name="ddn" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Téléphone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Genre</label><br>
                                <select name="genre" class="form-control" data-size="3" data-style="btn btn-primary btn-round">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>    
                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 3%">
                            <div class="col-md-4">
                                <label for="">Gouvernaurat</label>
                                <input type="text" name="gov" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Rue</label>
                                <input type="text" name="rue" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Code postal</label>
                                <input type="text" name="codepostal" class="form-control">
                            </div>
                        </div>

                        <div class="mb-6" style="margin-top: 3%">
                            <div class="col-md-6 col-sm-6">
                                <label for="">Selectionner image</label>
                                <input type="file" name="profile_image" class="form-control"/>
                            </div>
                        </div>
                              <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    @else

                    <div class="card">
                        <div class="card-header">
                            
                            <h4>Modifier le profile d`enseignant <span class="profileTeacher">{{ $profile->prenom.' '.$profile->nom }}</span>
                                <a href="{{ url('teachers') }}" class="btn btn-danger float-right">Retour</a>
                            </h4>
                            
                        </div>
                        <div class="card-body">
                        <form action="{{ url('update-profileteacher/'.$profile->profile_teacher->id) }}" enctype="multipart/form-data">
                        
                        @csrf
                        @method('PUT')

                        <input type="text" style="display:none;" name="teacher_id" value="{{ $profile->id }}" class="form-control">

                        <div class="row" style="margin-top: 3%">
                            <div class="col-md-4">
                                <label for="">Date de naissance</label>
                                <input type="date" name="ddn" value="{{ $profile->profile_teacher->ddn }}" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Téléphone</label>
                                <input type="text" name="phone" value="{{ $profile->profile_teacher->phone }}"  class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Genre</label><br>
                                <select name="genre" class="form-control" data-size="3" data-style="btn btn-primary btn-round">
                                    
                                    @if ( $profile->profile_teacher->genre == "Homme" )
                                        <option value="{{ $profile->profile_teacher->genre }}">{{ $profile->profile_teacher->genre }}</option>
                                        <option value="Femme">Femme</option>    
                                    @elseif ( $profile->profile_teacher->genre == "Femme")
                                        <option value="{{ $profile->profile_teacher->genre }}">{{ $profile->profile_teacher->genre }}</option>
                                        <option value="Homme">Homme</option>    
                                    @else
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>    
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 3%">
                            <div class="col-md-4">
                                <label for="">Gouvernaurat</label>
                                <input type="text" name="gov" value="{{ $profile->profile_teacher->gov }}"  class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Rue</label>
                                <input type="text" name="rue" value="{{ $profile->profile_teacher->rue }}"  class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Code postal</label>
                                <input type="text" name="codepostal" value="{{ $profile->profile_teacher->codepostal }}"  class="form-control">
                            </div>
                        </div>

                            <div class="mb-3" style="margin-top: 3%">
                                <div class="col-md-4 col-sm-4">
                                  <label for="">Selectionner image</label>
                                    <input type="file" class="form-control" name="profile_image" />
                                </div>
                                <button type="submit" class="btn btn-success float-right">Modifier</button>
                            </div>
                        </form> 
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection