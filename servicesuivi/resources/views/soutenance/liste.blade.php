@extends('adminlayoutenseignant.layout')
@section('title', 'Liste des soutenances')
@section('contentPage')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h3 class="m-0">Liste soutenances</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('soutenances') }}">Séléctionner soutenance</a></li>
            <li class="breadcrumb-item active">Liste soutenances</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" /> 

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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Etudiant</th>
                                <th>Groupe</th>
                                <th>Section</th>
                                <th>Date Soutenance</th>
                                <th>Heure Soutenance</th>
                                <th>Salle Soutenance</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Stagespfe as $pfeElement)
                            
                            <tr>
                            <td>{{ $pfeElement->student->full_name }}</td>
                            <td><span>{{ $pfeElement->classe->abbreviation }}</span></td>
                            <td><span>{{ $pfeElement->classe->category }}</span></td>
                            <td><span>{{ $pfeElement->soutenance_pfe }}</span></td>
                            <td>
                                @if ($pfeElement->heuredebut_soutenance)
                                    <span>{{ $pfeElement->heuredebut_soutenance }} -> {{ $pfeElement->heurefin_soutenance }}</span>
                                @endif
                            </td>
                            <td><span>{{ $pfeElement->salle_soutenance }} </span></td>

                            <td class="text-right">
                                {{-- <a href="{{ url('show-pfe/'.$pfeElement->id) }}" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a> --}}
                                <a href="{{ url('details-soutenance/'.$pfeElement->id) }}" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <a href="{{ url('edit-soutenance/'.$pfeElement->id) }}" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@endsection