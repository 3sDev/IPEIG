
@extends('adminlayoutscolarite.layout')
@section('title', 'Détails éliminations')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="m-0">Liste éliminations</h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('eliminations') }}">Chercher éliminations</a></li>
          <li class="breadcrumb-item active">Détails éliminations</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach

<style>
  .inputStyle {
    background: none !important;
    border: none !important;
    width: 50px;
  }
.NonElim{
  background: rgb(233, 252, 205);

}
.Elim{
  background: rgb(249, 183, 183);
}
</style>

    <div class="row">
        @if (session('message'))
        <h5>{{ session('message') }}</h5>
            @endif
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title">Saisir les absences des étudiants</h3> 
                    <a href="{{ url('eliminations') }}" class="btn btn-primary float-right">Retour</a>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    
                    <form action="{{ url('getElimination') }}" method="POST">
                      @csrf

                      @foreach ($classResult as $classItem)
                        <center>
                          <table>
                            <tr>
                              <td><h5><b>Date :</b> {{ date('d-m-Y | H:i') }} </h5></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td><h5><b>Année Universitaire :</b> 2022/2023</h5></td>
                            </tr>
                            <tr>
                              <td><h5><b>Semestre :</b> {{ $semestre }}</h5></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td><h5><b>Groupe :</b> {{ $classItem->abbreviation }}</h5></td>
                            </tr>
                            <tr>
                              <td><h5><b>Effectif du groupe :</b> 30</h5></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td><h5><b>Nom Enseignant :</b> 
                                @if ($myTeacher)
                                  {{ $myTeacher->nameTeacher }}
                                @else
                                  --
                                @endif
                                </h5>
                              </td>
                            </tr>
                            <tr>
                              @foreach ($dataMatiere as $matiereItem)
                                <td><h5><b>Matière :</b> {{ $matiereItem->subjectLabel.'('.$matiereItem->description.')' }}</h5></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="divToHide"><h5><b>Nombre élimination :</b> {{ $nombreElimination }}</h5></div></td>
                              @endforeach
                            </tr>
                          </table>
                        </center>
                      @endforeach

                      <br>  
                      <hr>
                      <!-- this row will not appear when printing -->
                      <center>
                        <div class="row no-print">
                          <div class="col-12">
                            <a href="#" onclick="window.print();return false;" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                          </div>
                        </div>
                      </center>
                      <br><br>
                      <table id="example5" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                              <th width="12%">Cin</th>
                              <th width="60%">Nom et Prénom</th>  
                              <th width="30%" align="center" style="text-align: center !important">Nombre des absences</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($listeStudents as $item)
                            @if ($item->nbr > $nombreElimination)
                            <tr>
                                <td>*****{{ substr($item->cin, -3) }}</td>
                                <td>{{ $item->nomStudent .' '. $item->prenomStudent }}</td>
                                <td align="center">{{ $item->nbr}}</td>
                            </tr>
                            @endif
                          @endforeach
                      </tbody>
                      </table>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
<script>
  window.onload = function(){
  var divToHide = document.getElementById('divToHide');
  document.onclick = function(e){
    if(e.target.id !== 'divToHide'){
      //element clicked wasn't the div; hide the div
      divToHide.style.display = 'none';
    }
  };
};
</script>
@endsection