  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboards')); ?>" class="brand-link">
      <img src="https://ipeig.tn/university/public/upload/variables/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      
      <span class="brand-text font-weight-light">Super Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          
          <li class="nav-item <?php echo e(Request::is('dashboards') ? 'active':''); ?>" href="<?php echo e(url('dashboards')); ?>">
            <a class="nav-link <?php echo e(Request::is('dashboards') ? 'active':''); ?>" href="<?php echo e(url('dashboards')); ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('avis') ? 'active':''); ?>" href="<?php echo e(url('avis')); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Consultation des avis
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('locaux') ? 'active':''); ?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Gestion Enseignants
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('teachers') ? 'active':''); ?>" href="<?php echo e(url('teachers')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Enseignants</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('pointages') ? 'active':''); ?>" href="<?php echo e(url('pointages')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pointages enseignants</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('attendances') ? 'active':''); ?>" href="<?php echo e(url('attendances')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absences enseignants</p>
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('teachers') ? 'active':''); ?>" href="<?php echo e(url('enseignantEtat')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etats des Enseignants</p>
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('teachers') ? 'active':''); ?>" href="<?php echo e(url('enseignantposte')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Postes des Enseignants</p>
                </a>
              </li>
                   <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('teachers') ? 'active':''); ?>" href="<?php echo e(url('enseignantgrade')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade des Enseignants</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('locaux') ? 'active':''); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion Personnels
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('personnels') ? 'active':''); ?>" href="<?php echo e(url('personnels')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des personnels</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('postePersonnels') ? 'active':''); ?>" href="<?php echo e(url('postePersonnels')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Postes des personnels</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('attendancePersonnels') ? 'active':''); ?>" href="<?php echo e(url('attendancePersonnels')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absences personnels</p>
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('attendancePersonnels') ? 'active':''); ?>" href="<?php echo e(url('personnelEtat')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etats personnels</p>
                </a>
              </li>
            </ul>
          </li>
  <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('locaux') ? 'active':''); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion Etudiants
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('personnels') ? 'active':''); ?>" href="<?php echo e(url('etudiantInscription')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inscription des étudiants</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('postePersonnels') ? 'active':''); ?>" href="<?php echo e(url('etudiantEtat')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etats des étudiants</p>
                </a>
              </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('locaux') ? 'active':''); ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Gestion demandes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('demandeEtudiant') ? 'active':''); ?>" href="<?php echo e(url('demandeEtudiant')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demande étudiant</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('demandeEnseignant') ? 'active':''); ?>" href="<?php echo e(url('demandeEnseignant')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demande enseignant</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('demandePersonnel') ? 'active':''); ?>" href="<?php echo e(url('demandePersonnel')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demande personnel</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('locaux') ? 'active':''); ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Gestion reclamations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('reclamationEtudiant') ? 'active':''); ?>" href="<?php echo e(url('reclamationEtudiant')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reclamation étudiant</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('reclamationEnseignant') ? 'active':''); ?>" href="<?php echo e(url('reclamationEnseignant')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reclamation enseignant</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('reclamationPersonnel') ? 'active':''); ?>" href="<?php echo e(url('reclamationPersonnel')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reclamation personnel</p>
                </a>
              </li>
            </ul>
          </li>

          

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Gestion Département
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('matieres') ? 'active':''); ?>" href="<?php echo e(url('matieres')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matières</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('salles') ? 'active':''); ?>" href="<?php echo e(url('salles')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salles</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('all-classes') ? 'active':''); ?>" href="<?php echo e(url('all-classes')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classes</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('departements') ? 'active':''); ?>" href="<?php echo e(url('departements')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Départements</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('liens') ? 'active':''); ?>" href="<?php echo e(url('liens')); ?>">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Liens Utils
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('missions') ? 'active':''); ?>" href="<?php echo e(url('missions')); ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Gestion des ordres
                
              </p>
            </a>
          </li>

          

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('admins') ? 'active':''); ?>" href="<?php echo e(url('admins')); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion des admins
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('downloads') ? 'active':''); ?>" href="<?php echo e(url('downloads')); ?>">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Espace téléchargements
                
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('edit-variable') ? 'active':''); ?>" href="<?php echo e(url('edit-variable')); ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Variables Globales
                
              </p>
            </a>
          </li>

          

          

          <li class="nav-header">Info Admin</li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('profile.show') ? 'active':''); ?>" href="<?php echo e(url('profile.show')); ?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Mon Profil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('message') ? 'active':''); ?>" href="<?php echo e(url('message')); ?>">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Messagerie
              </p>
            </a>
          </li>
          <li class="nav-item">
            <?php if(auth()->id()): ?>
              <form method="POST" action="<?php echo e(route('logout')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                          this.closest('form').submit(); " role="button">
                          <i class="nav-icon far fa-play-circle"></i>
                          <?php echo e(__('Déconnecter')); ?>

                      </a>
                  </div>
              </form>
            <?php endif; ?>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>






<?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/adminlayoutenseignant/leftmenu.blade.php ENDPATH**/ ?>