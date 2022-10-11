<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
<div class="bg-dark">
    <div class="card-body bg-dark box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/avatar.png') }}" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center retouralaligne">{{ username() }} </h3>

    <h6 class="text-muted text-center retouralaligne">{{ getRole()}}</h6>

    <ul class="list-group bg-dark mb-3">
         <li class="list-group-item">
        <a href="#" class="d-flex align-items-center"><i class="fa fa-user-circle pr-2"></i><b class="retouralaligne">{{userlogin()}}</b> </a>
        </li>
        <li class="list-group-item">
        <a href="#" class="d-flex align-items-center"><i class="fa fa-envelope pr-2"></i><b class="retouralaligne">{{useremail()}}</b> </a>
        </li>
        <li class="list-group-item">
        <a href="#" class="d-flex align-items-center"><i class="fa-solid fa-phone pr-2"></i><b class="retouralaligne">{{usertelephone()}}</b> </a>
        </li>
    </ul>

    <a class="btn btn-danger d-flex justify-content-center" href="{{ route('logout') }}" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <i class=" nav-icon fa-solid fa-right-from-bracket"></i>
          {{-- {{ __('Déconnexion ') }} --}}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form> 
            </a>
    </div>
    <!-- /.card-body -->
</div>
</aside>