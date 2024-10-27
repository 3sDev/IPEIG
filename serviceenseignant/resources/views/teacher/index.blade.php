
 @extends('adminlayoutenseignant.layoutdatatable')
 @section('title', 'Liste enseignants')
 @section('contentPage')

 <link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />
 <style>
  .btn-link{
    color:white;
  }
</style>

 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Gestion des enseignants</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion des enseignants</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Liste de tous les enseignants
                      </h3>
                      <a href="{{ url('teachers/create') }}" class="btn btn-primary float-right">Ajouter</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Spécialité</th>
                                <th>Département</th>
                                 <th>Grade</th>
                                <th>Tél</th>
                                <th>Activation</th>
                                <th width="10%">Actions</th>
                                <th>Supp</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($teachers as $teacher)
                              
                            <tr>
                           
                              <td>{{ $teacher->matricule }}</td>
                              <td>{{ $teacher->prenom .' '. $teacher->nom }}</td>
                              <td>{{ $teacher->specialite_ens }}</td>
                              <td>{{ $teacher->departement->departmentLabel }}</td>
                               <td>{{$teacher->poste}}</td>
                              <td>{{$teacher->tel1_teacher}}</td>
                              
                              <td  align="center">
                                <form action="{{ url('update-teacher-account/'.$teacher->id) }}" method="POST" onsubmit="return confirm('Confirmation!')">
                                  @csrf
                                  @method('PUT')
                                  <input type="text" style="display: none;" name="active" value="{{ $teacher->active }}">

                                  @if (($teacher->active == '0'))
                                  <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Désactivé</button>
                                  @endif
                                  @if (($teacher->active == '1'))
                                  <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Activé</button>
                                  @endif

                                </form>
                              </td>
                              <td class="text-center">
                                <a href="{{ url('teachers/'.$teacher->id) }}" class="btn btn-link btn-info btn-just-icon like btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                                <a href="{{ url('teachers/'.$teacher->id.'/edit') }}" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                              <td align="center">
                                <form action="{{ url('delete-teacher/'.$teacher->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces données?')">
                                  <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          
                          </tbody>
                          <tfoot>
                              <tr>
                              <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Spécialité</th>
                                <th>Département</th>
                                  <th>Grade</th>
                                <th>Tél</th>
                                <th>Activation</th>
                                <th width="10%">Actions</th>
                                <th>Supp</th>
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
  </div>
  <!-- /.container-fluid -->
</section>

@endsection
