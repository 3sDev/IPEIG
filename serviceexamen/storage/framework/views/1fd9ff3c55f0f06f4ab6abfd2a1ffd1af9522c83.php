  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboards')); ?>" class="brand-link">
      <img src="https://ipeig.tn/university/public/upload/variables/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Service Examens</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          
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
            <a class="nav-link <?php echo e(Request::is('notes') ? 'active':''); ?>" href="<?php echo e(url('notes')); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion des notes(pdf)
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('devoirs') ? 'active':''); ?>" href="<?php echo e(url('devoirs')); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion des évaluations
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('examens') ? 'active':''); ?>" href="<?php echo e(url('examens')); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion des examens
                
              </p>
            </a>
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
            <a class="nav-link <?php echo e(Request::is('emploiExamens') ? 'active':''); ?>" href="<?php echo e(url('emploiExamens')); ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Calendrier des examens
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('emploiSurveillances') ? 'active':''); ?>" href="<?php echo e(url('emploiSurveillances')); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Surveillance Enseignants
                
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
<?php /**PATH /var/www/webroot/ENIGA/serviceexamen/resources/views/adminlayoutscolarite/leftmenu.blade.php ENDPATH**/ ?>