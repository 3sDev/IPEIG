  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboards')); ?>" class="brand-link">
      <img src="https://eniga.tn/university/public/upload/variables/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Service Scolarité</span>
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
                Gestion des avis
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('students') ? 'active':''); ?>">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Gestion des étudiants
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('https://eniga.tn/inscription/public/') ? 'active':''); ?>" href="<?php echo e(url('https://eniga.tn/inscription/public/')); ?>" target="_blank">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter étudiant</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('students') ? 'active':''); ?>" href="<?php echo e(url('students')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inscription étudiants</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('classe-student') ? 'active':''); ?>" href="<?php echo e(url('classe-student')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etudiant par classe</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('filtrage') ? 'active':''); ?>" href="<?php echo e(url('filtrage')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filtrage des Etudiants </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('demandestudent') ? 'active':''); ?>" href="<?php echo e(url('demandestudent')); ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Demandes Etudiants
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('reclamations') ? 'active':''); ?>" href="<?php echo e(url('reclamations')); ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Reclamations Etudiants
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('rattrapage') ? 'active':''); ?>" href="<?php echo e(url('rattrapage')); ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Avis de rattrapage
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Gestion des absences
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('classe-student-attendance') ? 'active':''); ?>" href="<?php echo e(url('classe-student-attendance')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absence des étudiants</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('justifications') ? 'active':''); ?>" href="<?php echo e(url('justifications')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absence justifié</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('eliminations') ? 'active':''); ?>" href="<?php echo e(url('eliminations')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Elimination absences</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('matieres') ? 'active':''); ?>" href="<?php echo e(url('matieres')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestion des matières</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('emploi') ? 'active':''); ?>" href="<?php echo e(url('emploi')); ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Emploi de temps Groupe
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('emploiExamens') ? 'active':''); ?>" href="<?php echo e(url('emploiExamens')); ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Calendrier des examens
                
              </p>
            </a>
          </li>

          <li class="nav-header" style="border-top: 1px solid #ccc;">Info Admin</li>
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
<?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/adminlayoutscolarite/leftmenu.blade.php ENDPATH**/ ?>