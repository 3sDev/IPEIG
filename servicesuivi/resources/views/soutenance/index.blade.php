
 @extends('adminlayoutenseignant.layout')
 @section('title', 'Liste des PFE')
 @section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0">Séléctionner étudiant ou classe</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboards') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Soutenances</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach
<link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />
<style>
.textable {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1; /* number of lines to show */
    -webkit-box-orient: vertical;
}
.form-control{
    width: 100% !important;
}
</style>

    <div class="row">
        @if (session('message'))
        <h5>{{ session('message') }}</h5>
            @endif
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title"></h3>
                    <a href="{{ url('events/create') }}" class="btn btn-primary float-right">Ajouter</a>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                        <form action="{{ url('liste-soutenance') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Confirmation')">
                        @csrf
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <label for="">Choisir classe</label>
                                <select name="classe_id" id="classes" class="form-control" required>
                                <option value="" selected disabled>Selectionner Classe</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}"> {{ $classe->abbreviation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Choisir étudiant</label>
                                <select name="student_id" id="student" data-style="btn btn-primary" class="form-control">
                                    <option value="">Selectionner étudiant</option>
                                </select>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="mb-3">
                            <br><br>
                            <center>
                                <button type="submit" class="btn btn-primary float-center">Séléctionner</button>
                            </center>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

<script>
// when classes dropdown changes
$('#classes').change(function() {
    var classeID       = $(this).val();

    if (classeID) {
        $.ajax({
            type: "GET",
            url: "{{ url('getStudent') }}?classe_id=" + classeID,
            success: function(res) {

                if (res) {

                    $("#student").empty();
                    $("#student").append('<option value="" selected disabled>Selectionner étudiant</option>');

                    res.map(element=>{
                    $("#student").append('<option value="'+element.id+'">' + element.full_name +'</option>');
                    });

                } else {
                    $("#student").empty();
                }
            }
        });
    } else {
        $("#student").empty();
    }
});
</script>
@endsection