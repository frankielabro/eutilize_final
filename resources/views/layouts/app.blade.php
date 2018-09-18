<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>E-Utilize</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
    <!-- PLUGIN: Datatables CSS -->
    <link href="{{ asset('DataTables/datatables.css') }}" rel="stylesheet" type="text/css">

    <!-- PLUGIN: Daterangepicker CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>


    @yield('css')
    


</head>

<body>

    <div class="wrapper">
        <!--  SIDEBAR START -->
            <div class="sidebar" data-background-color="white" data-active-color="success">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="home" class="light-logo" width="100%">
                    </div>
                    <ul class="nav">
                        <li @yield('act-1')>
                            <a href="{{ route('main') }}">
                                <i class="ti-info"></i>
                                <p>Scanner</p>
                            </a>
                        </li>
                        <li @yield('act-2')>
                            <a href="{{ route('book') }}">
                                <i class="ti-book"></i>
                                <p>Books</p>
                            </a>
                        </li>
                        <li class="parent @yield('act-3')">
                            <a data-toggle="collapse" href="#sub-item-1" class="" aria-expanded="true" style="margin-bottom: 0px;">
                                <i class="ti-layout-accordion-separated"></i>
                                <p>Procurement
                                    <span>
                                        <i class="ti-angle-down" style="float:right;"></i>
                                    </span>
                                </p>
                            </a>
                            <ul class="children nav collapse" id="sub-item-1" aria-expanded="true" style="margin-top: 0px;padding-left: 15px;">
                                <li>
                                    <a href="{{ route('summaryreport') }}" style="margin: 2px 2px;">
                                        <i class="ti-clipboard"></i>
                                        <p>Summary Report</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/procurement/book-shortages" style="margin: 2px 2px;">
                                        <i class="ti-clipboard"></i>
                                        <p>Book Shortage </p>
                                    </a>
                                </li>
                                <!-- <li class="parent">
                                        <a data-toggle="collapse" href="#sub-item-2" class="" aria-expanded="false" style="margin-bottom: 0px;">
                                            <i class="ti-ruler-pencil"></i>
                                            <p>Graphs
                                                <span>
                                                    <i class="ti-angle-down" style="float:right;"></i>
                                                </span>
                                            </p>
                                        </a>
                                        <ul class="children nav collapse" id="sub-item-2" aria-expanded="false" style="margin-top: 0px;padding-left: 15px;">
                                            <li>
                                                <a href="{{ route('lineargraph') }}" style="margin: 2px 2px;">
                                                    <i class="ti-stats-up"></i>
                                                    <p style="font-size: 10px;
                                                                text-align: left;
                                                                line-height: inherit;">
                                                        Book Utilization Linear Graph</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('bargraph') }}" style="margin: 2px 2px;">
                                                    <i class="ti-bar-chart"></i>
                                                    <p style="font-size: 10px;
                                                                text-align: left;
                                                                line-height: inherit;">
                                                        Category Utilization Bar Graph</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> -->
                                <li>
                                    <a href="{{ route('bookversion') }}" style="margin: 2px 2px;">
                                        <i class="ti-reload"></i>
                                        <p>Book Version</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @yield('act-4')>
                            <a href="{{ route('activitylog') }}">
                                <i class="ti-time"></i>
                                <p>Activity Log</p>
                            </a>
                        </li>
                        <li @yield('act-5')>
                            <a href="{{ route('settings') }}">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        <!--  SIDEBAR END -->
        <!-- CONTENT START -->
            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">@yield('sector') Section</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            
                            <ul class="nav navbar-nav navbar-right">
                                
                                <li>
                                    <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="ti-power-off"></i>
                                        <p>Log Out </p>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                @yield('content')
            </div>
        <!-- CONTENT END -->
    </div>

    @yield('modal')


</body>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('js/paper-dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>

<!-- PLUGIN: Datatables JS -->
<script src="{{ asset('DataTables/datatables.js') }}" type="text/javascript"></script>

<!-- PLUGIN: Daterangepicker JS -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" type="text/javascript" ></script>

@yield('script')

</html>