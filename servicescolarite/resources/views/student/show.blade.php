@extends('adminlayoutscolarite.layout')
@section('title', 'Profil Etudiant')
@section('contentPage')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profil Etudiant</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('students') }}">Liste des étudiants</a></li>
          <li class="breadcrumb-item active">Profil Etudiant</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@inject('uploads', 'App\Libs\Urlupload')
@foreach($uploads->getLinks() as $upload)
@endforeach

<style>
.invoice-col img{
  width: 100%;
  transition: 0.5s all ease-in-out;
}
.invoice-col:hover img {
        transform: scale(1.5);
    }
</style>
    <link rel="stylesheet" href="{{ URL::asset('css/components.css') }}" />

    <div class="row">
      <div class="col-md-3">

        @if (session('message'))
          <h5>{{ session('message') }}</h5>
        @endif

        @foreach ($profiles as $profile)
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img src={{ asset($upload.'/students/'.$profile->profile_image) }} class="profile-user-img img-fluid img-circle" >
              </div>

              <h3 class="profile-username text-center">{{ $profile->prenom.' '.$profile->nom }}</h3>

              <p class="text-muted text-center">{{ $profile->prenom_ar.' '.$profile->nom_ar }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <b>Type Inscription</b>   <a class="float-right">
                
                                @if (($profile->active == '0'))
                                <button type="submit" class="btn btn-link btn-warning btn-just-icon edit btn-sm">Désactivé</button>
                                @endif
                                @if (($profile->active == '1'))
                                <button type="submit" class="btn btn-link btn-success btn-just-icon edit btn-sm">Inscrit / Activé</button>
                                @endif
                                @if (($profile->active == '2'))
                                <button type="submit" class="btn btn-link btn-danger btn-just-icon edit btn-sm">Non inscrit</button>
                                @endif
                                @if (($profile->active == '3'))
                                <button type="submit" class="btn btn-link btn-info btn-just-icon edit btn-sm">Retrait Inscrit</button>
                                @endif
                                @if (($profile->active == '4'))
                                <button type="submit" class="btn btn-link btn-secondary btn-just-icon edit btn-sm">Mutation</button>
                  @endif</a>
                    </li>
                <li class="list-group-item">
                  <b>CIN</b> <a class="float-right">{{ $profile->cin }}</a>
                </li>
                <li class="list-group-item">
                  <b>Téléphone</b> <a class="float-right">{{ $profile->tel1_etudiant }}</a>
                </li>
                <li class="list-group-item">
                  <b>Type Inscrit</b> <a class="float-right">{{ $profile->type_inscription }}</a>
                </li>
                <li class="list-group-item">
                  <b>Niveau</b> <a class="float-right">{{ $profile->diplome }}</a>
                </li>
                <li class="list-group-item">
                  <b>Filière</b> <a class="float-right">{{ $profile->filiere }}</a>
                </li>
                <li class="list-group-item">
                  <b>Groupe</b> <a class="float-right">{{ $profile->classe->abbreviation }}</a>
                </li>
                    <li class="list-group-item">
                  <b>Compte Vérifiée</b> <a class="float-right">                 
                    @if (($profile->verify == '1'))Oui @endif
                     @if (($profile->verify == '0'))Non @endif</a>
                           
                
                </li>
              </ul>

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        @endforeach

        <!-- About Me Box -->
        {{-- <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Info</h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-user-alt mr-1"></i> Genre</strong>
            <p class="text-muted">{{ $profile->genre }}</p>
            <hr>
            <strong><i class="fas fa-book mr-1"></i> Date de naissance</strong>
            <p class="text-muted">
              {{ $profile->ddn }}
            </p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
            <p class="text-muted">{{ $profile->rue_etudiant.", ".$profile->gov.", ".$profile->codepostal_etudiant	  }}</p>
          </div>
        </div> --}}
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#infos" data-toggle="tab">Informations personnel</a></li>
              <li class="nav-item"><a class="nav-link" href="#demande" data-toggle="tab">Demandes</a></li>
              <li class="nav-item"><a class="nav-link" href="#attendance" data-toggle="tab">Absences</a></li>
              <li class="nav-item"><a class="nav-link" href="#reclamation" data-toggle="tab">Réclamations</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane" id="demande">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Année</th>
                        <th width="13%">Statut</th>
                        <th>Langue</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                    @foreach ($demandestudents as $demand)
                
                    <tr>
                    <td>{{ $demand->id }}</td>
                    <td>{{ $demand->type }}</td>
                    <td>{{ $demand->sous_type }}</td>

                    @if (($demand->statut=='En cours'))
                    <td><span class="demandEncours">{{ $demand->statut }}</span></td>
                    @endif
                    @if (($demand->statut=='Traitée'))
                    <td><span class="demandTraitee">{{ $demand->statut }}</span></td>
                    @endif
                    
                    <td>{{ $demand->langue }}</td>
                  
                    <td>{{ date('Y-m-d - H:i', strtotime($demand->created_at)) }}</td> 
                    
                    <td class="text-right">
                        <a href="{{ url('edit-demandestudent/'.$demand->id) }}" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td class="text-right">
                        <a href="{{ url('show-demandestudent/'.$demand->id) }}" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                    </td>
                    <td>
                        <form action="{{ url('delete-demandestudent/'.$demand->id) }}" onsubmit="return confirm('Are you sure to delete this data?')">
                        {{-- @csrf
                        @method('DELETE') --}}
                        <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    </tr>

                    @endforeach

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Année</th>
                        <th>Statut</th>
                        <th>Langue</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="attendance">
                
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                      <th>Date d'absence</th>
                        <th>Séance</th>
                        <th>Matiere</th>
                        <th>Enseignant</th>
                     
                         <th>Saisie Par</th>
                         <th>Justification</th>
                       
                      </tr>
                  </thead>
                  <tbody>
    
                    @foreach ($attendancestudents as $student)
                      @foreach ($student->attendances as $attendance)
            
                      <tr>
                        
                    
              <td>{{ $attendance->attendance_date }}</td>
               <td>{{ $attendance->attendance_seance_debut.'--'.$attendance->attendance_seance_fin}}</td>
                      @foreach ($matieres as $m)
                 
                           @if($attendance->matiere_id==$m->id)
                        <td>{{ $m->subjectLabel}}</td>
               
                            @endif
                                @endforeach
                          @foreach ($teachers as $t)
                 
                           @if($attendance->teacher_id==$t->id)
                        <td>{{ $t->nom.' '.$t->prenom}}</td>
               
                            @endif
                                @endforeach
                    
                          <td>{{$attendance->qui_save_absent}}</td>
                        <td>{{ $attendance->justification}}</td>
                    
                      </tr>
                       
                      @endforeach
                    @endforeach

                  </tbody>
                  <tfoot>
                      <tr>
                     <th>Date d'absence</th>
                        <th>Séance</th>
                        <th>Matiere</th>
                        <th>Enseignant</th>
                        <th>Saisie Par</th>
                         <th>Justification</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="reclamation">
                
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Date réclam.</th>
                        <th>Text réclam.</th>
                        <th>Etat réclam.</th>
                   
                        <th></th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                    @foreach ($reclamationstudent as $student)
                      @foreach ($student->reclamations as $reclam)
                      <tr>
                       <td>{{ date('Y-m-d', strtotime($reclam->created_at)) }}</td>
                        <td>{{ $reclam->description }}</td>

                        @if (($reclam->statut=='En cours'))
                        <td><span class="demandEncours">{{ $reclam->statut }}</span></td>
                        @endif
                        @if (($reclam->statut=='Traitée'))
                        <td><span class="demandTraitee">{{ $reclam->statut }}</span></td>
                        @endif

                       
                        <td class="text-right">
                          {{-- <a href="{{ url('show-reclamation/'.$reclam->id) }}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">account_box</i></a> --}}
                          <a href="{{ url('edit-reclamation/'.$reclam->id) }}" class="btn btn-link btn-success btn-just-icon edit btn-sm"><i class="nav-icon fas fa-eye"></i></a>
                        </td>
                        <td>
                            <form action="{{ url('delete-reclamation/'.$reclam->id) }}" onsubmit="return confirm('Are you sure to delete this data?')">
                                <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    @endforeach

                  </tbody>
                  <tfoot>
                      <tr>
                         <th>Date réclam.</th>
                        <th>Text réclam.</th>
                        <th>Etat réclam.</th>
                      
                        <th></th>
                        <th></th>
                      </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="infos">
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Informations personnels</p>
                    <address>
                      <strong>Genre :</strong> {{ $profile->genre }}<br>
                      <strong>Etat civil :</strong> {{ $profile->etat_civil }}<br>
                      <strong>Date naissance :</strong> {{ $profile->ddn }}<br>
                      <strong>Lieu de naissance :</strong> {{ $profile->lieu_naissance }}<br>
                      <strong>Téléphone Etudiant :</strong> {{ $profile->tel1_etudiant }}<br>
                      <strong>Email :</strong> {{ $profile->email }}
                      
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Adresse d'étudiant</p>
                    <address>
                      <strong>Nationalité :</strong> {{ $profile->nationalite }}<br>
                      <strong>Gouvernorat :</strong> {{ $profile->gov }}<br>
                      <strong>Municipalité :</strong> {{ $profile->municipality }}<br>
                      <strong>Adresse Domicile FR :</strong> {{ $profile->rue_etudiant }}<br>
                      <strong>Adresse Domicile AR:</strong> {{ $profile->rue_etudiant_ar }}<br>
                      <strong>Code Postal:</strong> {{ $profile->codepostal_etudiant }}<br>
                      
                    </address>
                  </div>
                </div>
                <!-- /.row -->
                <hr>
                <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Parents</p>
                    <address>
                      <strong>Nom et prénom père :</strong> {{ $profile->prenom_pere }}<br>
                      <strong>Profession de père :</strong> {{ $profile->profession_pere }}<br>
                      <strong>Nom et prénom mère :</strong> {{ $profile->prenom_mere}}<br>
                      <strong>Téléphone famille :</strong> {{ $profile->tel2_etudiant }}<br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <p class="lead">Baccalauréat</p>
                    <address>
                      <strong>Année :</strong> {{ $profile->annee_bac }}<br>
                      <strong>Section :</strong> {{ $profile->section_bac }}<br>
                      <strong>Session :</strong> {{ $profile->session_bac }}<br>
                      <strong>Moyenne :</strong> {{ $profile->moyenne_bac }}<br>
                    </address>
                  </div>
                </div>

                <hr>
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Cin face 1</p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/cin/'.$profile->cin_file) }} title="Carte identité nationale Face 1">
                      <img src={{ asset($upload.'/students/cin/'.$profile->cin_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Cin face 2</p>
                    <a download="CIN2.png" target="_blank" href={{ asset($upload.'/students/cinFace2/'.$profile->cin_file_2) }} title="Carte identité nationale Face 2">
                      <img src={{ asset($upload.'/students/cinFace2/'.$profile->cin_file_2) }} class="img-fluid cinFace2" >
                    </a>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Fiche Inscription (Inscription.tn)</p>
                    <a download="paiement.png" target="_blank" href={{ asset($upload.'/students/inscription/'.$profile->paiement_file) }} title="Fiche d'incription en ligne">
                      <img src={{ asset($upload.'/students/inscription/'.$profile->paiement_file) }} class="img-fluid inscription" >
                    </a>
                  </div>
                </div>

              <div class="row invoice-info">

                @if(!is_null($profile->derniere_relevee_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Redoublant </p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/derniereReleveeNotes/'.$profile->derniere_relevee_file) }} title="Rélevée des notes">
                      <img src={{ asset($upload.'/students/derniereReleveeNotes/'.$profile->derniere_relevee_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

                @if(!is_null($profile->mutation_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Mutation </p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/mutation/'.$profile->mutation_file) }} title="Mutation">
                      <img src={{ asset($upload.'/students/mutation/'.$profile->mutation_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

                @if(!is_null($profile->sortie_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Attestation de sortie</p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/quiteInstitut/'.$profile->sortie_file) }} title="Attestation de sortie">
                      <img src={{ asset($upload.'/students/quiteInstitut/'.$profile->sortie_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

                @if(!is_null($profile->reorientation_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Réorientation</p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/reorientation/'.$profile->reorientation_file) }} title="Réorientation">
                      <img src={{ asset($upload.'/students/reorientation/'.$profile->reorientation_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

                @if(!is_null($profile->reintegration_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Réintégration </p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/reintegration/'.$profile->reintegration_file) }} title="Reintegration">
                      <img src={{ asset($upload.'/students/reintegration/'.$profile->reintegration_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

                @if(!is_null($profile->demande_ecrit_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Demande Ecrite </p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/demandeEcrite/'.$profile->demande_ecrit_file) }} title="demande ecrite">
                      <img src={{ asset($upload.'/students/demandeEcrite/'.$profile->demande_ecrit_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

                @if(!is_null($profile->recu_paiement_file))
                <hr>
                  <div class="col-sm-4 invoice-col">
                    <p class="lead text-center">Fiche inscription complète </p>
                    <a download="CIN1.png" target="_blank" href={{ asset($upload.'/students/recuPaimentComplet/'.$profile->recu_paiement_file) }} title="Fiche inscription complète">
                      <img src={{ asset($upload.'/students/recuPaimentComplet/'.$profile->recu_paiement_file) }} class="img-fluid cinFace1" >
                    </a>
                  </div>
                @endif

              </div>

              </div>
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection


