
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- @vite(['resources/sass/app.scss']) --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="{{asset('/css/side.css')}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    </head>
     <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end" id="sidebar-wrapper" style="background-color: #343a40;">
                <div class="sidebar-heading border-bottom" style="background-color: #343a40; color: #cfd0d2; border-color:#343a40; border-color:#4b545c;">Wifi Marketing</div>
                <div class="list-group list-group-flush pt-2">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"style="background-color: #343a40; color: #cfd0d2; border-color:#343a40; font-size: 18px;"><span class="bi bi-speedometer2 pe-2"></span>Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"style="background-color: #343a40; color: #cfd0d2; border-color:#343a40; font-size: 18px;"><span class="bi bi-layers pe-2"></span>Routers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"style="background-color: #343a40; color: #cfd0d2; border-color:#343a40; font-size: 18px;"><span class="bi bi-broadcast pe-2"></span>Campaigns</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"style="background-color: #343a40; color: #cfd0d2; border-color:#343a40; font-size: 18px;"><span class="bi bi-people pe-2"></span>Users</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"style="background-color: #343a40; color: #cfd0d2; border-color:#343a40; font-size: 18px;"><span class="bi bi-sliders pe-2"></span>Settings</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <a id="sidebarToggle"><i class="bi bi-list" style="font-size:28px; cursor:pointer;"></i></a>
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list"></i></button> --}}
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: uppercase;">{{Auth::user()->name}}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                      
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                              @csrf
                                            </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            
            </div>
        </div>
     </body>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('/js/side.js')}}"></script>
