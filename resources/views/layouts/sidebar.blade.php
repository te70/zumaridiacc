<head>
    <link href="{{asset('/css/dash.css')}}" rel="stylesheet">
</head>
<nav class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" style="text-transform: uppercase;">THS</a>
    {{-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    @auth
    <ul class="navbar-nav px-3 btn btn-outline-primary">
      <li class="nav-item text-nowrap">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
  
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
    @endauth
</nav>
  
  <div class="d-flex">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3" style="background-color: #293042;">
          <ul class="nav flex-column" style="font-size: 15px;">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('dashboard')}}" style="font-size: 18px;">
                <span class="bi bi-speedometer2 pe-2"></span>
                Dashboard 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showroom')}}" style="font-size: 18px;">
                <span class="bi bi-bookmark pe-2"></span>
                Reservations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manageroom')}}" style="font-size: 18px;">
                <span class="bi bi-houses pe-2"></span>
                Manage rooms
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showwines')}}" style="font-size: 18px;">
                <span class="bi bi-cup-straw pe-2"></span>
                Wines
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showbar')}}" style="font-size: 18px;">
                <span class="bi bi-suit-spade pe-2"></span>
                Bar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showps')}}" style="font-size: 18px;">
                <span class="bi bi-controller pe-2"></span>
                Playstation
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showib')}}" style="font-size: 18px;">
                <span class="bi bi-dpad pe-2"></span>
                Inbet
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('staff')}}" style="font-size: 18px;">
                <span class="bi bi-person-badge pe-2"></span>
                Manage staff
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('rentals')}}" style="font-size: 18px;">
                <span class="bi bi-door-closed pe-2"></span>
                Rentals
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('users')}}" style="font-size: 18px;">
                <span class="bi bi-people pe-2"></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showinbet')}}" style="font-size: 18px;">
                <span class="bi bi-chat pe-2"></span>
                Complaints
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manageroom')}}" style="font-size: 18px;">
                <span class="bi bi-sliders2 pe-2"></span>
                Settings
              </a>
            </li>
          </ul>
        </div>
      </nav>