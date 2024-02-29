<ul class="navbar-nav sidebar sidebar-danger accordion 
        
@if(Route::current()->getName() === 'login' || Route::current()->getName() === 'register')
                  d-none
                @else
                ''
                @endif      
" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboardgeneral')}}">
    <div class="sidebar-brand-icon">
      <img src="img/crous.png">
    </div>
    <div class="sidebar-brand-text mx-3">Suivi-Recette</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="{{'/acceuil-general'}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Suivi-Vente
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{route('ventes.home')}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 40 40"><path fill="currentColor" d="M36.016 32.584H3.984a2.844 2.844 0 0 1-2.841-2.842V10.248a2.844 2.844 0 0 1 2.841-2.842h32.032a2.845 2.845 0 0 1 2.842 2.842v19.495a2.846 2.846 0 0 1-2.842 2.841M3.984 8.38a1.87 1.87 0 0 0-1.867 1.867v19.495a1.87 1.87 0 0 0 1.867 1.867h32.032a1.87 1.87 0 0 0 1.867-1.867V10.248a1.87 1.87 0 0 0-1.867-1.867z"/><path fill="currentColor" d="M2.682 32.068a.488.488 0 0 1-.339-.837l9.2-8.884c.093-.09.204-.125.349-.137a.49.49 0 0 1 .343.151l3.869 4.066l10.869-10.903a.486.486 0 0 1 .688-.003l2.211 2.185l5.546-5.471h-2.594a.487.487 0 1 1 0-.974h3.782a.488.488 0 0 1 .343.835l-6.734 6.642a.487.487 0 0 1-.685-.001l-2.208-2.182L16.44 27.47c-.093.094-.216.114-.351.144a.49.49 0 0 1-.347-.151l-3.875-4.073l-8.847 8.541a.48.48 0 0 1-.338.137"/><path fill="currentColor" d="M36.605 15.925a.487.487 0 0 1-.487-.487v-3.689a.487.487 0 1 1 .974 0v3.689a.487.487 0 0 1-.487.487m-3.83-.878h.974v16.782h-.974zm-4.683 2.239h.974v14.543h-.974zm-4.828 2.16h.974v12.651h-.974zm-4.769 4.785h.974v7.875h-.974zm-4.776.91h.974v6.811h-.974zm-4.753-.192h.974v7.095h-.974z"/></svg>
      <span class="text-black">Tableau de Bord | Ventes</span>
      <hr>
    </a>
  </li>


  <li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link collapsed disabled" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tickets</span>
        </a>
    @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tickets</span>
        </a>
    @endif
    
    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ticket Restauration</h6>
            @if(Auth::check() && !Auth::user()->role_as == '1')
                <a class="collapse-item disabled" href="#" aria-disabled="true">Petit Déjeuner</a>
                <a class="collapse-item disabled" href="#" aria-disabled="true">Déjeuner</a>
            @else
                <a class="collapse-item" href="{{ route('consultation.index') }}">Consultation</a>
                <a class="collapse-item" href="{{ route('musculation.index') }}">Musculation</a>
                <a class="collapse-item" href="{{ route('ticketpetitdej.indexpetitdej') }}">Petit Déjeuner</a>
                <a class="collapse-item" href="{{ route('ticketdej.indexdej') }}">Déjeuner</a>
            @endif
        </div>
    </div>
</li>



  





<li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link disabled" href="#" aria-disabled="true">
            <i class="bi bi-capsule-pill"></i>
            <span>Vente Médicament</span>
        </a>
    @else
        <a class="nav-link" href="{{ route('medicament.index') }}">
            <i class="bi bi-capsule-pill"></i>
            <span>Vente Médicament</span>
        </a>
    @endif
</li>

<li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link disabled" href="#" aria-disabled="true">
            <i class="bi bi-capsule-pill"></i>
            <span>Petit Pain</span>
        </a>
    @else
        <a class="nav-link" href="{{ route('pain.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid" viewBox="0 0 16 16">
  <path d="M14.121 1.879a3 3 0 0 0-4.242 0L8.733 3.026l4.261 4.26 1.127-1.165a3 3 0 0 0 0-4.242M12.293 8 8.027 3.734 3.738 8.031 8 12.293zm-5.006 4.994L3.03 8.737 1.879 9.88a3 3 0 0 0 4.241 4.24l.006-.006 1.16-1.121ZM2.679 7.676l6.492-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492z"/>
  <path d="M5.56 7.646a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708Zm1.415-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707M8.39 4.818a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707Zm0 5.657a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707ZM9.803 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707Zm1.414-1.414a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708ZM6.975 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707ZM8.39 7.646a.5.5 0 1 1-.708.708.5.5 0 0 1 .707-.708Zm1.413-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707"/>
</svg>
        <span>Petit Pain</span>
        </a>
    @endif
</li>






  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Suivi-Location
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{route('location.home')}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 40 40"><path fill="currentColor" d="M36.016 32.584H3.984a2.844 2.844 0 0 1-2.841-2.842V10.248a2.844 2.844 0 0 1 2.841-2.842h32.032a2.845 2.845 0 0 1 2.842 2.842v19.495a2.846 2.846 0 0 1-2.842 2.841M3.984 8.38a1.87 1.87 0 0 0-1.867 1.867v19.495a1.87 1.87 0 0 0 1.867 1.867h32.032a1.87 1.87 0 0 0 1.867-1.867V10.248a1.87 1.87 0 0 0-1.867-1.867z"/><path fill="currentColor" d="M2.682 32.068a.488.488 0 0 1-.339-.837l9.2-8.884c.093-.09.204-.125.349-.137a.49.49 0 0 1 .343.151l3.869 4.066l10.869-10.903a.486.486 0 0 1 .688-.003l2.211 2.185l5.546-5.471h-2.594a.487.487 0 1 1 0-.974h3.782a.488.488 0 0 1 .343.835l-6.734 6.642a.487.487 0 0 1-.685-.001l-2.208-2.182L16.44 27.47c-.093.094-.216.114-.351.144a.49.49 0 0 1-.347-.151l-3.875-4.073l-8.847 8.541a.48.48 0 0 1-.338.137"/><path fill="currentColor" d="M36.605 15.925a.487.487 0 0 1-.487-.487v-3.689a.487.487 0 1 1 .974 0v3.689a.487.487 0 0 1-.487.487m-3.83-.878h.974v16.782h-.974zm-4.683 2.239h.974v14.543h-.974zm-4.828 2.16h.974v12.651h-.974zm-4.769 4.785h.974v7.875h-.974zm-4.776.91h.974v6.811h-.974zm-4.753-.192h.974v7.095h-.974z"/></svg>
      <span class="text-black">Tableau de Bord | Location</span>
      <hr>
    </a>
  </li>




  <li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link collapsed disabled" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="bi bi-cup-hot"></i>
            <span>Cafétaria</span>
        </a>
    @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="bi bi-cup-hot"></i>
            <span>Cafétaria</span>
        </a>
    @endif
    
    <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Recette Cafetaria</h6>
            @if(Auth::check() && !Auth::user()->role_as == '1')
                <a class="collapse-item disabled" href="#" aria-disabled="true">GreenVibes</a>
                <a class="collapse-item disabled" href="#" aria-disabled="true">Salle Cafétaria</a>
            @else
                <a class="collapse-item" href="{{ route('greenvibes.index') }}">GreenVibes</a>
                <a class="collapse-item" href="{{ route('sallecafetaria.index') }}">Salle Cafétaria</a>
            @endif
        </div>
    </div>
</li>



<li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link disabled" href="#" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4.462 7V3.615l3.384 1.693zm12.692 0V3.615l3.384 1.693zm-5.923-.846V2.769l3.384 1.693zM10.5 21.288q-1.727-.069-3.124-.293q-1.397-.224-2.398-.557q-1.001-.332-1.547-.751q-.546-.42-.546-.88v-8.23q0-.529.681-.98q.682-.45 1.897-.786q1.216-.336 2.887-.535q1.671-.2 3.65-.2t3.65.2q1.671.199 2.887.535q1.215.335 1.897.786q.681.451.681.98v8.23q0 .46-.546.88q-.546.419-1.547.751q-1 .333-2.398.557q-1.397.224-3.124.293v-3.98h-3zm1.5-9.211q2.483 0 4.649-.393q2.166-.394 3.236-1.038q-.327-.529-2.39-1.049q-2.064-.52-5.495-.52t-5.494.52q-2.064.52-2.39 1.05q1.069.643 3.014 1.037q1.945.393 4.87.393m-2.5 8.138v-3.907h5v3.907q2.365-.18 3.804-.626q1.438-.445 1.811-.88v-7.063q-1.644.762-3.661 1.096q-2.017.335-4.454.335t-4.454-.335q-2.017-.334-3.661-1.096v7.064q.373.434 1.696.88t3.919.625m2.5-4.294"/></svg>    
            <span>Terrain Multisport</span>
        </a>
    @else
        <a class="nav-link" href="{{ route('terrainmultisport.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4.462 7V3.615l3.384 1.693zm12.692 0V3.615l3.384 1.693zm-5.923-.846V2.769l3.384 1.693zM10.5 21.288q-1.727-.069-3.124-.293q-1.397-.224-2.398-.557q-1.001-.332-1.547-.751q-.546-.42-.546-.88v-8.23q0-.529.681-.98q.682-.45 1.897-.786q1.216-.336 2.887-.535q1.671-.2 3.65-.2t3.65.2q1.671.199 2.887.535q1.215.335 1.897.786q.681.451.681.98v8.23q0 .46-.546.88q-.546.419-1.547.751q-1 .333-2.398.557q-1.397.224-3.124.293v-3.98h-3zm1.5-9.211q2.483 0 4.649-.393q2.166-.394 3.236-1.038q-.327-.529-2.39-1.049q-2.064-.52-5.495-.52t-5.494.52q-2.064.52-2.39 1.05q1.069.643 3.014 1.037q1.945.393 4.87.393m-2.5 8.138v-3.907h5v3.907q2.365-.18 3.804-.626q1.438-.445 1.811-.88v-7.063q-1.644.762-3.661 1.096q-2.017.335-4.454.335t-4.454-.335q-2.017-.334-3.661-1.096v7.064q.373.434 1.696.88t3.919.625m2.5-4.294"/></svg>    
            <span>Terrain Multisport</span>
        </a>
    @endif
</li>


<li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link disabled" href="#" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4.462 7V3.615l3.384 1.693zm12.692 0V3.615l3.384 1.693zm-5.923-.846V2.769l3.384 1.693zM10.5 21.288q-1.727-.069-3.124-.293q-1.397-.224-2.398-.557q-1.001-.332-1.547-.751q-.546-.42-.546-.88v-8.23q0-.529.681-.98q.682-.45 1.897-.786q1.216-.336 2.887-.535q1.671-.2 3.65-.2t3.65.2q1.671.199 2.887.535q1.215.335 1.897.786q.681.451.681.98v8.23q0 .46-.546.88q-.546.419-1.547.751q-1 .333-2.398.557q-1.397.224-3.124.293v-3.98h-3zm1.5-9.211q2.483 0 4.649-.393q2.166-.394 3.236-1.038q-.327-.529-2.39-1.049q-2.064-.52-5.495-.52t-5.494.52q-2.064.52-2.39 1.05q1.069.643 3.014 1.037q1.945.393 4.87.393m-2.5 8.138v-3.907h5v3.907q2.365-.18 3.804-.626q1.438-.445 1.811-.88v-7.063q-1.644.762-3.661 1.096q-2.017.335-4.454.335t-4.454-.335q-2.017-.334-3.661-1.096v7.064q.373.434 1.696.88t3.919.625m2.5-4.294"/></svg>    
            <span>Location Cantines</span>
        </a>
    @else
        <a class="nav-link" href="{{ route('Cantines.index') }}">
        <i class="fa-solid fa-shop"></i>
            <span>Location Cantines</span>
        </a>
    @endif
</li>


<li class="nav-item">
    @if(Auth::check() && !Auth::user()->role_as == '1')
        <a class="nav-link disabled" href="#" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4.462 7V3.615l3.384 1.693zm12.692 0V3.615l3.384 1.693zm-5.923-.846V2.769l3.384 1.693zM10.5 21.288q-1.727-.069-3.124-.293q-1.397-.224-2.398-.557q-1.001-.332-1.547-.751q-.546-.42-.546-.88v-8.23q0-.529.681-.98q.682-.45 1.897-.786q1.216-.336 2.887-.535q1.671-.2 3.65-.2t3.65.2q1.671.199 2.887.535q1.215.335 1.897.786q.681.451.681.98v8.23q0 .46-.546.88q-.546.419-1.547.751q-1 .333-2.398.557q-1.397.224-3.124.293v-3.98h-3zm1.5-9.211q2.483 0 4.649-.393q2.166-.394 3.236-1.038q-.327-.529-2.39-1.049q-2.064-.52-5.495-.52t-5.494.52q-2.064.52-2.39 1.05q1.069.643 3.014 1.037q1.945.393 4.87.393m-2.5 8.138v-3.907h5v3.907q2.365-.18 3.804-.626q1.438-.445 1.811-.88v-7.063q-1.644.762-3.661 1.096q-2.017.335-4.454.335t-4.454-.335q-2.017-.334-3.661-1.096v7.064q.373.434 1.696.88t3.919.625m2.5-4.294"/></svg>    
            <span>Chambres Etudiants</span>
        </a>
    @else
        <a class="nav-link" href="{{ route('ChambreEtudiant.index') }}">
        <i class="fa-solid fa-bed"></i>
            <span>Chambres Etudiants</span>
        </a>
    @endif
</li>




  <hr class="sidebar-divider">
  <div class="version" id="version-ruangadmin"></div>
</ul>