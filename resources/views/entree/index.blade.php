<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PRESSING-MANAGMENT</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a  href="#"><img src="{{URL::asset('images/logo2.jpg')}}" width="50" height="50" /></a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="50" height="50" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->nom}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('profil-all') }}"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVIGATION PRINCIPALE</li>
                    @can('user-action')
                    <li> 
                        <a href="{{ route('index') }}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @endcan
                    <li class="active">
                        <a  href="{{ route('entree-all') }}">
                            <i class="material-icons">assignment</i>
                            <span>Entree</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Sortie</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('sortieRemi-all') }}">Vêtements remis</a>
                            </li>
                            <li>
                                <a href="{{ route('sortieNonRemi-all') }}">Vêtements non remi</a>
                            </li>
                        </ul>
                    </li>
                    @can('user-action')
                    <li>
                        <a href="{{ route('archive') }}">
                            <i class="material-icons">note_add</i>
                            <span>Archives</span>
                        </a>
                    </li>
                    @endcan
                    @can('user-action')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Parametres</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('compte-all') }}">Liste utilisateur</a>
                            </li>
                            <li>
                                <a href="{{ route('statistique-all') }}">Statistique</a>
                            </li>
                            <li>
                                <a href="{{ route('categorie-all') }}">Liste categorie</a>
                            </li>
                            <li>
                                <a href="{{ route('remise-all') }}">Liste remise</a>
                            </li>
                        </ul>
                    </li>
                    @endcan
              
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2021 <a href="javascript:void(0);">PRESSING-MANAGMENT</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <h3 class="font-italic col-blue">Liste de clients</h3>
            <p>Votre liste de clients enregistrée dans l'application</p>
            <a href="newClient"><button class="btn btn-secondary pull-right" style="margin-top:-65px;margin-right:20px;border-radius:50px;width:130px;height:50px;color:white;background-color:blue;font-size:20px;" ><i class="material-icons">add</i>Ajouter</button></a>
            <button id="envoyer" onClick="envoyer()" class="btn btn-secondary pull-right" style="position:fixed; top:132px;right:190px;border-radius:30px;width:60px;height:30;color:white;background-color:gray;font-size:15px;" ><i class="material-icons">chat</i></button>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="tout" /><label for="tout">Tout</label></th>
                                            <th>Nom</th>
                                            <th>Sexe</th>
                                            <th>Telephone</th>
                                            <th>Total généré</th>
                                            <th>Remise</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($clients) > 0)
                                        @foreach($clients as $client)
                                        <tr>
                                                <td><input type="checkbox" id="{{$client->id}}" onChange="masquerBouton(this)" name="tel" value="{{$client->telephone}}"/><label for="{{$client->id}}">Cocher</label></td>
                                                <td>{{$client->nom}}</td>
                                                <td>{{$client->sexe}}</td>
                                                <td>{{$client->telephone}}</td>
                                                @if(isset($client->entrees))
                                                    <td>{{$client->entrees()->sum('pt')}}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                                @if(isset($client->remise))
                                                    <td>{{$client->remise->taux}}%</td>
                                                @else
                                                    <td>0%</td>
                                                @endif
                                                <td>
                                                    <form action="{{ route('client-destroy',$client->id) }}" method="POST">

                                                        <a class="btn btn-info" href="{{route('client-show',$client->id)}}">Detail</a>
                                                        <a class="btn btn-success" href="{{route('client-edit',$client->id)}}">Edit</a>
                                                        <a class="btn btn-secondary" href="{{route('entree-create',$client->id)}}">Laver</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('delete-action')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer?');">Delete</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>


    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../js/message.js"></script>
    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    @include('flashy::message')
</body>

</html>
