  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboards')); ?>" class="brand-link">
      <img src="https://eniga.tn/university/public/upload/variables/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Service Personnels</span>
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
            <a class="nav-link <?php echo e(Request::is('personnels') ? 'active':''); ?>" href="<?php echo e(url('personnels')); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion des personnels
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('demandepersonnel') ? 'active':''); ?>" href="<?php echo e(url('demandepersonnel')); ?>">
              <i class="nav-icon fas fa-clone"></i>
              <p>
                Gestion des demandes
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-eraser"></i>
              <p>
                Gestions des congés 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('soldes') ? 'active':''); ?>" href="<?php echo e(url('soldes')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Soldes</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('conges') ? 'active':''); ?>" href="<?php echo e(url('conges')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Congés</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('attendances') ? 'active':''); ?>" href="<?php echo e(url('attendances')); ?>">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Gestion des présences
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('formations') ? 'active':''); ?>" href="<?php echo e(url('formations')); ?>">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Gestion des formations  
                
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
            <a class="nav-link <?php echo e(Request::is('missions') ? 'active':''); ?>" href="<?php echo e(url('missions')); ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Orders & Missions
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('notes') ? 'active':''); ?>" href="<?php echo e(url('notes')); ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Notes professionnels 
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('reclamations') ? 'active':''); ?>" href="<?php echo e(url('reclamations')); ?>">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
                Gestion des reclamations
                
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

<?php /**PATH /var/www/webroot/ENIGA/servicepersonnel/resources/views/adminlayoutenseignant/leftmenu.blade.php ENDPATH**/ ?>