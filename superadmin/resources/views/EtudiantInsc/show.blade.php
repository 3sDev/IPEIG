
 @extends('adminlayoutenseignant.layout')
 @section('title', 'Gestion  des étudiants')
 @section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="m-0">Gestion  des Inscription étudiants </h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Gestion  des Inscription étudiants </li>
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
</style>

    <div class="row">
      @if(session('message'))
          <div class="alert alert-success">
        <h5> {{ session('message') }}</h5>
    </div>
@endif
       
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="container-tab">
                              
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <hr><br>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane show fade active" id="pills-categorie" role="tabpanel" aria-labelledby="pills-categorie-tab">
                            <div class="col-lg-12" style="text-align:left !important;">
                                <div class="form-group">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                            <a href="{{ url('etudiantInscription/create') }}" target="_blank" class="btn btn-success float-right">Ajouter</a><br><br>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">ID</th>
                                                        <th>Value</th>
                                                        <th>Inscription Etudiant</th>
                                                        {{-- <th></th> --}}
                                                        <th>تسجيل الطالب</th>
                                                      <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Enseignants as $cat)
                                                    
                                                    <tr>
                                                        <td>{{ $cat->id }}</td>
                                                         <td>{{ $cat->value}}</td>
                                                        <td>{{ $cat->Inscription_fr }}</td>
                                                        <td>{{ $cat->Inscription_ar}}</td>
                                                        
                                                        {{--  <td class="text-center">
                                                            <a href="{{ url('edit-poste/'.$cat->id) }}" class="btn btn-link btn-warning btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                        </td> --}}
                                                        <td class="text-center">
                                                            <form action="{{ route('etudiantInscription.destroy',$cat->id) }}" method="POST">
                                                               @csrf
                                                              @method('DELETE')
                                                                <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                        
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                 

                    

                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection



