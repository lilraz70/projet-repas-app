<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Repas</title>

    <link rel="stylesheet" href="{{mix("css/app.css")}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/armoirie2.jpg')}}" type="image/x-icon"/>
  

    @livewireStyles

</head>
<body class="hold-transition sidebar-mini">
<div class="">

              <!-- entete <body entete> -->

                 <x-entete/>


                <!-- Menu -->
                <x-menu/>

              <!-- Contenu de la page <body main> -->
                   <!-- Main content -->
              <div class="  content-wrapper">
               
                <div class="content">
                  <div class="container-fluid">
                         @yield('contenu')
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
      
              </div>


              <!-- informations utilisateur -->

                      <x-sidebar/>

                    <!-- piedpage  <body piedpage>-->

                    <x-piedpage/>

</div>


<!-- REQUIRED SCRIPTS -->
<script src="{{ mix('js/app.js') }}"></script>


@livewireScripts

</body>
</html>