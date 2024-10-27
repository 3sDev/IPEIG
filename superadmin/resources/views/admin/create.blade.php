@extends('adminlayoutenseignant.layout')
@section('title', 'Créer nouveau administrateur')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@section('contentPage')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Nouveau poste administrative</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('liens') }}">Liste des administrateurs</a></li>
            <li class="breadcrumb-item active">Nouveau administrateur</li>
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
                <form action="{{ url('admins') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cet element?')" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                         <div class="col-md-4">
                                               <label for="">Personnels</label>
                        
                            <select  name="personnel" class="form-control">
                                  <option value="" selected disabled>Séléctionner un personnel</option>
                              @foreach($Personnels as $Personnel)
                               <option value="{{$Personnel->full_name}}">{{$Personnel->full_name}}</option>
@endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Rôle</label>
                            <select id="role" name="role" data-style="btn btn-primary btn-round" class="form-control" required>
                                <option value="" selected disabled>Séléctionner rôle</option>
                                <option value="Service scolarité">Service scolarité</option>
                                <option value="Service enseignants">Service enseignants</option>
                                <option value="Service Personnels">Service Personnels</option>
                                <option value="Service stages">Service stages</option>
                                <option value="Service examens">Service examens</option>
                                <option value="Chef de département">Chef de département</option>
                                <option value="Service Suivi">Service de suivi</option>
                                <option value="Service bureau ordre">Service bureau d'ordre</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Département</label>
                            <select id="departement" name="departement_id" class="form-control">

                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Statut du compte</label>
                            <select name="lockout_time" data-style="btn btn-primary btn-round" class="form-control" required>
                                <option value="1">Activé</option>
                                <option value="0">Désactivé</option>
                            </select>
                        </div>
                        
                        <div class="col-md-5">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label for="">Mot de passe</label>
                            <input type="text" name="password" value="" class="form-control" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Nouvelle responsabilité pédagogique</h1>
        </div><!-- /.col -->

    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
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
                <form action="{{ url('admins') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cet element?')" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                          <div class="col-md-4">
                            <label for="">Enseignants</label>
                        
                            <select  name="personnel" class="form-control">
                                   <option value="" selected disabled>Séléctionner un enseignant</option>
                              @foreach($teachers as $teacher)
                               <option value="{{$teacher->full_name}}">{{$teacher->full_name}}</option>
@endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Rôle</label>
                            <select id="role2" name="role" data-style="btn btn-primary btn-round" class="form-control" required>
                                <option value="" selected disabled>Séléctionner rôle</option>
                                <option value="Chef de département">Chef de département</option>
                                <option value="Service Suivi">Service de suivi</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Département</label>
                            <select id="departement2" name="departement_id" class="form-control">

                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Statut du compte</label>
                            <select name="lockout_time" data-style="btn btn-primary btn-round" class="form-control" required>
                                <option value="1">Activé</option>
                                <option value="0">Désactivé</option>
                            </select>
                        </div>
                        
                        <div class="col-md-5">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label for="">Mot de passe</label>
                            <input type="text" name="password" value="" class="form-control" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

// when role dropdown changes
$('#role').change(function() {
    var roleAdmin = $(this).val();
console.log(roleAdmin);
    if (roleAdmin) {

        $.ajax({
            type: "GET",
            url: "{{ url('getDepartement/') }}",
            success: function(res) {

                if (res) {
                    $("#departement").empty();
                    if (roleAdmin == 'Chef de département') {
                        $("#departement").append('<option value="" selected disabled>Selectionner Département</option>');
                        res.map(element=>{
                        $("#departement").append('<option value="'+element.id+'">' +element.departmentLabel+'</option>');
                        });
                    } else {
                        $("#departement").append('<option value="1">'+roleAdmin+'</option>');
                    }
                } 
                
                else {
                    $("#departement").empty();
                }
            }
        });
    } else {
        $("#departement").empty();
    }
});
  $('#role2').change(function() {
    var roleAdmin = $(this).val();
console.log(roleAdmin);
    if (roleAdmin) {

        $.ajax({
            type: "GET",
            url: "{{ url('getDepartement/') }}",
            success: function(res) {

                if (res) {
                    $("#departement2").empty();
                    if (roleAdmin == 'Chef de département') {
                        $("#departement2").append('<option value="" selected disabled>Selectionner Département</option>');
                        res.map(element=>{
                        $("#departement2").append('<option value="'+element.id+'">' +element.departmentLabel+'</option>');
                        });
                    } else {
                        $("#departement2").append('<option value="1">'+roleAdmin+'</option>');
                    }
                } 
                
                else {
                    $("#departement2").empty();
                }
            }
        });
    } else {
        $("#departement2").empty();
    }
});
 /* $(document).ready(function () {
       $('#nameSelect').change(function () {
        var selectedn = $(this).val();

        // Make an AJAX request to fetch the email
        $.ajax({
            url: '/getemail',
            type: 'POST',
            contentType: 'application/json', // Set content type to JSON
            data: JSON.stringify({ name: selectedn }), // Convert data to JSON
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Include CSRF token if your application requires it
            },
            success: function (response) {
                // Update the email input
                $('#emailInput').val(response.email);
            },
            error: function () {
                alert('Error fetching email.');
            }
        });
    });
    });*/
</script>
    
@endsection
