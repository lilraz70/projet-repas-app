<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div>
     <img class="armoirieimg mt-1" src="{{asset('images/armoirie2.jpg')}}">
     <hr color="#708090">
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-2 mb-3 d-flex">
       <h6 class="nameuser retouralaligne" color="#ffffff ">{{username()}}</h6>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              

             {{-- Accueil  --}}
              <li class="nav-item">
            <a href="{{Route('home')}}" class="nav-link active bg-success text-white">
              <i class="fa-solid fa-house"></i>
              
              <p class="m-2">
                    Accueil
              
              </p>

            </a>
          </li>
                
                {{--Production --}}
                <li class="nav-item {{ setMenuOpen('production.')}}">
            <a href="#" class="nav-link {{-- active --}} bg-success text-white">
              <i class="nav-icon  fa fa-industry"></i>
              
              <p>
                  Production
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{Route('metrepasindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Met Repas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('productionindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('repasindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Repas</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{Route('classesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vivres_Ingrédients</p>
                </a>
              </li> --}}
             
              <li class="nav-item">
                <a href="{{Route('vivresecolesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vivres-Ecoles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('ingredientindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Ingredients</p>
                </a>
              </li>
            </ul>
          </li>

                {{--Hygiène --}}

              <li class="nav-item menu-close">
            <a href="{{Route('classesindex')}}" class="nav-link active bg-success text-white">
              <i class="nav-icon fa-solid fa-soap"></i>
              
              <p>
                  Hygiène
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('consultationsindex')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('dispositifsecolesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dispositifs-Ecoles </p>
                </a>
              </li>
              
            </ul>
          </li>

              {{--Etats et statistiques --}}
              <li class="nav-item menu-close">
            <a href="#" class="nav-link active bg-success text-white">
              <i class="nav-icon fa fa-bar-chart"></i>
              
              <p>
                 Etats et statistiques
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('etatsecole')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat de synthèse par Ecole</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('etatsprovince')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat de synthèse par Province</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('etatsregion')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat de synthèse par Region</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('etatssproduitrecu')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat des produits reçus </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('etatsds')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat Déparasitage et supplémentation </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('etatsqplc')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat des quantités de produits locaux récoltés dans les champs scolaires </p>
                </a>
              </li>
            </ul>
          </li>
             
              {{--Gestion--}}

               @can('administrateur')

              <li class="nav-item menu-close">
            <a href="#" class="nav-link active bg-success text-white">
               <i class="nav-icon fa-solid fa-gear"></i>
              
              <p>
                 Gestion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{Route('champsindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Champs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('vivresindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vivres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('annescolairesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Années scolaire</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('classesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>classes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('classeecolesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classes-Ecoles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('elevesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eleves</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('utilisateursindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('rolesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('usersrolesindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Utilisateurs-Roles</p>
                </a>
              </li>
              
            </ul>
          </li>
          @endcan

               {{-- Paramettre--}}


               {{-- n'est pas autoriser l acces  --}}
              @can('administrateur')

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active bg-success text-white">
              <i class="nav-icon fa-solid fa-gear"></i>
              
              <p>
                  Paramètre
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('cebindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cebs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('communeindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Communes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('cspindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Csps</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('dispositifhygieneindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dispositifs  Hygiène </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('ecoleindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ecoles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('enseignantindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enseignants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('medicamentindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Médicaments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('planteindex')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Plantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('provinceindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provinces</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('regionindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Regions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('vivresindex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vivres </p>
                </a>
              </li>
            </ul>
          </li>
           @endcan

          {{-- Deconnexion --}}
          <br>
           <br>
            <br>
          <li class="nav-item d-flex justify-content-center">
           <a class="btn btn-danger" href="{{ route('logout') }}" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <i class=" nav-icon fa-solid fa-right-from-bracket"></i>
          {{-- {{ __('Déconnexion ') }} --}}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form> 
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>