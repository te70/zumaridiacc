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
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3" style="background-color: #293042;">
          <ul class="nav flex-column" style="font-size: 15px;">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('dashboard')}}">
                <span data-feather="home"></span>
                Dashboard 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showwines')}}">
                <span data-feather="layers"></span>
                Wines
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showbar')}}">
                <span data-feather="bar-chart-2"></span>
                Bar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showplaystation')}}">
                <span data-feather="users"></span>
                Playstation
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('showinbet')}}">
                <span data-feather="sliders"></span>
                Inbet
              </a>
            </li>
          </ul>
        </div>
      </nav>