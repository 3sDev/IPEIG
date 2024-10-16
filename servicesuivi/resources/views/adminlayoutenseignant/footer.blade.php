  <!-- Footer -->
  <footer class="main-footer">
      @foreach ($variable as $var)
      <strong>Copyright &copy; 2024 <a href="https://eniga.rnu.tn" target="_blank">{{$var->etab_abrv}}</a>.</strong>
      @endforeach
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Service de suivi - Version</b> 1.0.0
    </div>
  </footer>
