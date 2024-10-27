
 @extends('adminlayoutenseignant.layout')
 @section('title', 'Les courriers sortants')
 @section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Liste des courriers sortants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Liste des courriers sortants</li>
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
.badge{
    font-size: 15px;
}
</style>

    <div class="row">
        @if (session('message'))
        <h5>{{ session('message') }}</h5>
            @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('sortants/create') }}" class="btn btn-primary float-right">Ajouter</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Numéro d’inscription</th>
                                <th>Date d’édition</th>
                                <th>Sujet</th>
                                <th>Destinataire</th>
                                <th>Voie d’envoi</th>
                                <th width="11%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sortants as $element)
                            
                            <tr>
                            <td>{{ $element->id }}</td>
                            <td><span>{{ $element->numero_inscription }}</span></td>
                            <td><span>{{ $element->date_edition }}</span></td>
                            <td><span class="textable">{{ $element->sujet }}</span></td>
                            <td><span>{{ $element->destinataire }}</span></td>
                            <td><span>{{ $element->voie_envoi }}</span></td>
                            
                            <td class="text-center">
                                <a href="{{ url('show-sortant/'.$element->id) }}" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="{{ url('edit-sortant/'.$element->id) }}" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td class="text-center">
                                <form action="{{ url('delete-sortant/'.$element->id) }}" onsubmit="return confirm('Confirmation de supprimer ce courrier?')">
                                    <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Numéro d’inscription</th>
                                <th>Date d’édition</th>
                                <th>Sujet</th>
                                <th>Destinataire</th>
                                <th>Voie d’envoi</th>
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