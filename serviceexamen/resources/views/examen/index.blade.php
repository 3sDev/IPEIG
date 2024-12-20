@extends('adminlayoutscolarite.layout')
@section('title', 'Liste des examens')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Liste des examens</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des examens</li>
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
.emploiTemps{
    width: 60px;
    height: 40px;
    border: 1px solid #ccc;
    transition: transform .2s; /* Animation */
    margin: 0 auto;
}
.emploiTemps:hover {
    transform: scale(4.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
.custom-tooltip {
    --bs-tooltip-bg: var(--bs-primary);
}
.teacherNote{
    background-color: rgb(230, 248, 222);
    font-weight: bold;
    color: rgb(44, 172, 57);
}
.teacherNoNote{
    background-color: rgb(245, 236, 215);
    font-weight: bold;
    color: rgb(120, 15, 15);
}
.teacherNote span{
    color: rgb(44, 172, 57);
}
.teacherNoNote span{
    color: rgb(120, 15, 15);
}
</style>

<div class="row">
    @if (session('message'))
    <h5>{{ session('message') }}</h5>
        @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('AddExamen/create') }}" class="btn btn-primary float-right">Ajouter</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Année</th>
                            <th>Semestre</th>
                            <th>Session</th>
                            <th>Groupe</th>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examens as $examen)
                        
                        <tr>
                        <td>{{ $examen->annee }}</td>
                        <td>{{ $examen->semestre }}</td>
                        <td>{{ $examen->session }}</td>
                        <td>{{ $examen->classe->abbreviation }}</td>
                        <td>{{ $examen->matiere->subjectLabel }} <b>({{ $examen->matiere->description }})</b></td>
                            
                        @if ($examen->statut == '1')
                            <td class="teacherNote">
                                <a href="{{ url('saisir-note/'.$examen->id.'/'.$examen->classe_id) }}"><span>{{ $examen->teacher->full_name }}</span></a>
                            </td>
                        @else
                            <td class="teacherNoNote">
                                <a href="{{ url('saisir-note/'.$examen->id.'/'.$examen->classe_id) }}"><span>{{ $examen->teacher->full_name }}</span></a>
                            </td>
                        @endif

                        <td>{{ date('Y-m-d | H:i', strtotime($examen->created_at)) }}</td>
                        
                        <td class="text-center">
                            @if ($examen->students)
                                <a href="{{ url('modif-examen/'.$examen->id.'/'.$examen->classe_id) }}" class="btn btn-link btn-dark btn-just-icon like btn-sm"><i class="nav-icon fas fa-bars"></i></a>
                            @else
                                <a href="{{ url('affecter-examen/'.$examen->id.'/'.$examen->classe_id) }}" class="btn btn-link btn-success btn-just-icon like btn-sm"><i class="nav-icon fas fa-cog"></i></a>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ url('edit-examen/'.$examen->id) }}" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        @if ($examen->statut == '0')
                            <td class="text-center">
                                <form action="{{ url('delete-examenNote/'.$examen->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces données?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        @else
                            <td class="text-center">
                                --
                            </td>
                        @endif
                        </tr>

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Année</th>
                            <th>Semestre</th>
                            <th>Session</th>
                            <th>Groupe</th>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                            <th></th>
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