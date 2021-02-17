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
                    <img src="../../images/user.png" width="50" height="50" alt="User" />
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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="../../images/user.png" width="100" height="100" alt="User" />
                            </div>
                            <div class="content-area">
                                <h3>{{ Auth::user()->nom }}</h3>
                                <p>{{ Auth::user()->email }}</p>
                                <p>{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Derniere connexion</span>
                                    <p>{{ Auth::user()->last_view }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Age
                                    </div>
                                    <div class="content">
                                        {{Auth::user()->age}}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Sexe
                                    </div>
                                    <div class="content">
                                      {{Auth::user()->sexe}}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Telephone
                                    </div>
                                    <div class="content">
                                    {{Auth::user()->telephone}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#user_settings" aria-controls="settings" role="tab" data-toggle="tab">Information utilisateur</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Données recentes</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Informations générales</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="user_settings">
                                        <div class="body">
                                            <form action="{{ route('compte-update',Auth::user()->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="nom">Nom</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="nom" value="{{Auth::user()->nom}}" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="nom">Date embauche</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="dateEmbauche" value="{{Auth::user()->dateEmbauche}}" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="nom">Age</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" name="age" value="{{Auth::user()->age}}"  class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="sexe">Sexe</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select id="sexe"  name="sexe" class="form-control">
                                                                <option>{{Auth::user()->sexe}}</option>
                                                                <option value="hommme">hommme</option>
                                                                <option value="femme">femme</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <b>Telephone</b>
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" name="telephone" value="{{Auth::user()->telephone}}"  class="form-control mobile-phone-number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <b>Email</b>
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right">MODIFIER</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <div class="body">
                                            <canvas id="line_chart"  height="150"></canvas>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <div class="row clearfix">
                                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <div class="icon bg-red">
                                                        <i class="material-icons">face</i>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Total client</div>
                                                        <div class="text">{{$nbrClient}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <div class="icon bg-indigo">
                                                        <i class="material-icons">shopping_cart</i>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Total entree</div>
                                                        <div class="text">{{$nbrEntree}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <div class="icon bg-blue">
                                                        <i class="material-icons">launch</i>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Montant totale</div>
                                                        <div class="text">{{$somme}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
    <script src="../../../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../../../plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/examples/profile.js"></script>
    <script src="../../plugins/chartjs/Chart.bundle.js"></script>
    <script src="../../../js/pages/widgets/infobox/infobox-1.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

    <script>
        var tab = <?php echo $tab; ?>;
        var tabEntree = <?php echo $tabEntree; ?>;
        var barChartData = {
            labels: tab,
            datasets: [{
                label: "Montant total",
                data: tabEntree,
                borderColor: 'rgba(0, 188, 212, 0.75)',
                backgroundColor: 'rgba(0, 188, 212, 0.3)',
                pointBorderColor: 'rgba(0, 188, 212, 0)',
                pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                pointBorderWidth: 1
            }]
        };
        $(function () {
            new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
        });
        function getChartJs(type) {
            var config = null;

            if (type === 'line') {
                config = {
                    type: 'line',
                    data: barChartData,
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
            return config;
        }
    </script>
</body>

</html>
