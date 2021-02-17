<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
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

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

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
                    <li class="active"> 
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
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL CLIENT</div>
                            <div class="number">{{$nbrClient}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">add</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL ENTREE</div>
                            <div class="number">{{$nbrEntree}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="content">
                            <div class="text">MONTANT TOTAL</div>
                            <div class="number">{{$sommeT}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL REDEVANCE</div>
                            <div class="number">{{$redevanceTotal}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body">
                            <canvas id="line_chart"  height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="font-bold m-b--35">NOUVEAUX CLIENTS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    AUJOURD'HUI
                                    <span class="pull-right"><b>{{$todayClient}}</b> <small>CLIENTS</small></span>
                                </li>
                                <li>
                                    HIER
                                    <span class="pull-right"><b>{{$yesterdayClient}}</b> <small>CLIENTS</small></span>
                                </li>
                                <li>
                                    SEMAINE PASSE
                                    <span class="pull-right"><b>{{$lastWeekClient}}</b> <small>CLIENTS</small></span>
                                </li>
                                <li>
                                    MOIS PASSE
                                    <span class="pull-right"><b>{{$lastMonthClient}}</b> <small>CLIENTS</small></span>
                                </li>
                                <li>
                                    L'ANNEE PASSEE
                                    <span class="pull-right"><b>{{$lastYearClient}}</b> <small>CLIENTS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">MONTANT TOTAL</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    AUJOURD'HUI
                                    <span class="pull-right"><b>{{$todayTotal}}</b> <small>FCFA</small></span>
                                </li>
                                <li>
                                    HIER
                                    <span class="pull-right"><b>{{$yesterdayTotal}}</b> <small>FCFA</small></span>
                                </li>
                                <li>
                                      SEMAINE PASSEE
                                     <span class="pull-right"><b>{{$lastWeekTotal}}</b> <small>FCFA</small></span>
                                </li>
                                <li>
                                    MOIS PASSE
                                    <span class="pull-right"><b>{{$lastMonthTotal}}</b> <small>FCFA</small></span>
                                </li>
                                <li>
                                    L'ANNEE PASSEE
                                    <span class="pull-right"><b>{{$lastYearTotal}}</b> <small>FCFA</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">NOUVELLES ENTREES</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    AUJOURD'HUI
                                    <span class="pull-right"><b>{{$todayEntree}}</b> <small>ENTREES</small></span>
                                </li>
                                <li>
                                    HIER
                                    <span class="pull-right"><b>{{$yesterdayEntree}}</b> <small>ENTREES</small></span>
                                </li>
                                <li>
                                    SEMAINE PASSEE
                                    <span class="pull-right"><b>{{$lastWeekEntree}}</b> <small>ENTREES</small></span>
                                </li>
                                <li>
                                    MOIS PASSE
                                    <span class="pull-right"><b>{{$lastMonthEntree}}</b> <small>ENTREES</small></span>
                                </li>
                                <li>
                                    L'ANNEE PASSEE
                                    <span class="pull-right"><b>{{$lastYearEntree}}</b> <small>ENTREES</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Sexe</th>
                                            <th>Telephone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($clients) > 0)
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->nom}}</td>
                                                <td>{{$client->sexe}}</td>
                                                <td>{{$client->telephone}}</td>
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
                <!-- #END# Task Info -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <div class="m-b--35 font-bold">5 MEILLEURS CLIENTS</div>
                            <ul class="dashboard-stat-list">
                                @if(count($sorted) > 0)
                                @foreach($sorted as $s)
                                    <li>
                                        {{$s['nom']}}
                                        <span class="pull-right"><b>{{$s['mt']}}</b> <small>FCFA</small></span>
                                    </li>
                                @endforeach
                                @endif 
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
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
