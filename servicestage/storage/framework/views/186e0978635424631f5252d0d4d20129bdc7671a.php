  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboards')); ?>" class="brand-link">
      <img src="https://eniga.tn/university/public/upload/variables/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Service de stages</span>
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
            <a class="nav-link <?php echo e(Request::is('events') ? 'active':''); ?>" href="<?php echo e(url('events')); ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Gestion des événements 
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('news') ? 'active':''); ?>" href="<?php echo e(url('news')); ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Gestion des actualités 
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('maps') ? 'active':''); ?>" href="<?php echo e(url('maps')); ?>">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Vie estudiantine 
                
              </p>
            </a>
          </li>

          

          

          

          

          

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Gestion des stages 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('pfe') ? 'active':''); ?>" href="<?php echo e(url('pfe')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PFE + Mémoire</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('encadrement') ? 'active':''); ?>" href="<?php echo e(url('encadrement')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Encadrement</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('professionnel') ? 'active':''); ?>" href="<?php echo e(url('professionnel')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage Professionnel</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>
                Gestion des activités
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link <?php echo e(Request::is('#') ? 'active':''); ?>">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>
                    Clubs
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('clubStudents') ? 'active':''); ?>" href="<?php echo e(url('clubStudents')); ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Gestion Clubs</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('clubs') ? 'active':''); ?>" href="<?php echo e(url('clubs')); ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Demandes Clubs</p>
                    </a>
                  </li>
                </ul>
              </li>
            
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('sorties') ? 'active':''); ?>" href="<?php echo e(url('sorties')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sorties</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('missions') ? 'active':''); ?>" href="<?php echo e(url('missions')); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Missions</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('offres') ? 'active':''); ?>" href="<?php echo e(url('offres')); ?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Gestion de offres 
                
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
<?php /**PATH /var/www/webroot/ENIGA/servicestage/resources/views/adminlayoutenseignant/leftmenu.blade.php ENDPATH**/ ?>