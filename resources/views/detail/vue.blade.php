<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PRESSING-MANAGMENT</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
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
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
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
                    <li>
                        <a  href="{{ route('entree-all') }}">
                            <i class="material-icons">assignment</i>
                            <span>Entree</span>
                        </a>
                    </li>
                    <li class="active">
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
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <h3 class="font-italic col-blue">Informations sur l'entrée</h3>
            <p>Voici les informations du depot effectué par le client.</p>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>Générales</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">bubble_chart</i>
                                        Redevance
                                    </div>
                                    <div class="content">
                                      {{$montantRedevance}}Fcfa
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">drag_handle</i>
                                        Montant total
                                    </div>
                                    <div class="content">
                                      {{$total}}Fcfa
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">blur_circular</i>
                                        Remise
                                    </div>
                                    <div class="content">
                                      {{$remiseClient}}%
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">blur_linear</i>
                                        Montant total(avec remise)
                                    </div>
                                    <div class="content">
                                    @if($ptRemise != null)
                                      {{$ptRemise}}Fcfa
                                    @else
                                       0Fcfa
                                    @endif
                                    </div>
                                </li>
                            </ul>
                            <br>
                            <form action="{{ route('modifier-detail',$entree->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="montantVerse">Montant versé</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="montantVerse" name="montantVerse"  class="form-control" required>
                                    </div>
                                </div>
                               
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ENREGISTRER</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>Détail sur les vêtements</h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a  href="{{route('entree-all')}}" >
                                        <i class="material-icons">forward</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nom vetement</th>
                                            @if($entree->type =="simple")
                                            <th>Prix vetement</th>
                                            @endif
                                            <th>Quantite</th>
                                            <th>Marque</th>
                                            <th>Couleur</th>
                                            @if($entree->type =="simple")
                                            <th>Repassage</th>
                                            @endif
                                            <th>Editer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($details) > 0)
                                        @foreach($details as $detail)
                                        <tr>
                                                <td>{{$detail->categorie->nom}}</td>
                                                @if($entree->type =="simple")
                                                <td>{{$detail->categorie->prix}}</td>
                                                @endif
                                                <td>{{$detail->quantite}}</td>
                                                <td>{{$detail->marque}}</td>
                                                <td>{{$detail->couleur}}</td>
                                                @if($entree->type =="simple")
                                                <td>{{$detail->repassage}}</td>
                                                @endif
                                                <td>
                                                    <a  href="{{route('edit-detail',$detail->id)}}" title="edit"><i class="material-icons" style="color:rgb(43, 152, 43)">edit</i></a>
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
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
