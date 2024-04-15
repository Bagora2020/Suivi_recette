<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top 
@if(Route::current()->getName() === 'login' || Route::current()->getName() === 'register')
                  d-none
                @else
                ''
                @endif
          ">
  <button id="sidebarToggleTop" class="btn btn-primary rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
  <ul class="navbar-nav ml-auto">

  <li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link disabled" href="#" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><span></span>
        </a>
    @else
        <a class="nav-link" href="{{ route('typetickets.index') }}">
        <i class="bi bi-gear-wide-connected fs-4"></i>
            <span></span>
        </a>
    @endif
</li>

    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw fs-4"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-1 small" placeholder="Que voulez-vous rechercher?" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
   
    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
        <span class="ml-2 d-none d-lg-inline text-white small">
          @if(auth()->check())
          {{ auth()->user()->name }}
          @endif

        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
       
          

      <a class="dropdown-item" href="{{route('budgetdefinitif.index')}}">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Budget Définitif</span>
        </a>
   
        
        <a class="dropdown-item" href="{{route('comptes.index')}}">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Compte
        </a>
        <a class="dropdown-item" href="{{route('Credits.index')}}">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Credit
        </a>
        <a class="dropdown-item" href="{{route('login')}}">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Se connecter
        </a>
        <div class="dropdown-divider"></div>
       
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Déconnexion
        </a>


        <!-- <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>  -->

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>



        
      </div>
    </li>
  </ul>
</nav>