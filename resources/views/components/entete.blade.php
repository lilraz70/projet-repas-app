 <nav class="main-header navbar navbar-expand navbar-white navbar-light pushmenu">

    {{-- Outiel a gauche --}}

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- ------------------------ Afficher la date et l heure ------------------------------------ --}}
     
    <li class="nav-item">
      <h5 class="nav-link active " id="dateheure" ></h5>
    </li>
      <script>
        function pause(ms) 
        {
          return new Promise(resolve => setTimeout(resolve, ms));
        }
        
        async function afficherDate() 
        {
          while(true) 
          {
            await pause(1000);
            var cejour = new Date();
            var options = {weekday: "long", year: "numeric", month: "long", day: "2-digit"};
            var date = cejour.toLocaleDateString("fr-FR", options);
            var heure = ("0" + cejour.getHours()).slice(-2) + ":" + ("0" + cejour.getMinutes()).slice(-2) + ":" + ("0" + cejour.getSeconds()).slice(-2);
            var dateheure = date + "  |  " + heure;
            var dateheure = dateheure.replace(/(^\w{1})|(\s+\w{1})/g, lettre => lettre.toUpperCase());
            document.getElementById('dateheure').innerHTML = dateheure;
          }
        }
        afficherDate();
        </script> 
     
     
      {{-- ----------------------------------------------------------------- --}}
    </ul>

    <!-- outiel a droite -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-user"></i>
        </a>
      </li>
    </ul>
  </nav>

  


