  <!-- Footer -->
  <footer class="main-footer">
  <?php $__currentLoopData = $variable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <strong>Copyright &copy; 2024 <a href="https://IPEIG.rnu.tn" target="_blank"><?php echo e($var->etab_abrv); ?></a>.</strong>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Secrétaire Général (Super Admin) - Version</b> 1.0.0
    </div>
  </footer>


<?php /**PATH /var/www/webroot/IPEIG/superadmin/resources/views/adminlayoutenseignant/footer.blade.php ENDPATH**/ ?>