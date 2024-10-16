  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboards')); ?>" class="brand-link">
      <img src="https://eniga.tn/university/public/upload/variables/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Chef Département</span>
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
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Gestion des avis
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('avis') ? 'active':''); ?>" href="<?php echo e(url('avis')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Avis Etudiants</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('avisTeacher') ? 'active':''); ?>" href="<?php echo e(url('avisTeacher')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Avis Enseignants</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('bibliotheques') ? 'active':''); ?>" href="<?php echo e(url('bibliotheques')); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion de Bibliothèque 
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('teachers') ? 'active':''); ?>" href="<?php echo e(url('teachers')); ?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Gestion Enseignants
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('pointages') ? 'active':''); ?>" href="<?php echo e(url('pointages')); ?>">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Pointages enseignants
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('attendances') ? 'active':''); ?>" href="<?php echo e(url('attendances')); ?>">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Absences enseignants
                
              </p>
            </a>
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
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Emploi de temps
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('scheduleteacher') ? 'active':''); ?>" href="<?php echo e(url('scheduleteacher')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emploi Enseignant</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('emploi') ? 'active':''); ?>" href="<?php echo e(url('emploi')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emploi Enseignant (img)</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('scheduleclasse') ? 'active':''); ?>" href="<?php echo e(url('scheduleclasse')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emploi Classe</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('emplois') ? 'active':''); ?>" href="<?php echo e(url('emplois')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emploi Classe (img)</p>
                </a>
              </li>
            </ul>
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
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-braille"></i>
              <p>
                Gestion Salles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('salledisponible') ? 'active':''); ?>" href="<?php echo e(url('salledisponible')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emploi salles</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('sallestatut') ? 'active':''); ?>" href="<?php echo e(url('sallestatut')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disponibilité Salles</p>
                </a>
              </li>
            </ul>
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
                <span class="badge badge-info right">2</span>
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

<?php /**PATH /var/www/webroot/ENIGA/chefdepartement/resources/views/adminlayoutenseignant/leftmenu.blade.php ENDPATH**/ ?>