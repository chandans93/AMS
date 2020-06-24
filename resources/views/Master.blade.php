<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{trans('labels.appname')}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/backend/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('/backend/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/backend/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{ asset('/backend/css/skins/_all-skins.min.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/css/custom.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/dataTables.bootstrap.css')}}" /> 
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/jquery.dataTables.min.css')}}" />

        @yield('header')
    </head> 
    @auth
    <body class="hold-transition skin-blue sidebar-mini">
        @else
    <body class="hold-transition login-page">
        @endauth

        <div class="wrapper">
           @auth
            <header class="main-header">
                <!-- Logo -->
                <a href="{{ url('/report')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>{{trans('labels.appshortname')}}</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>{{trans('labels.appname')}}</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">{{trans('labels.togglenav')}}</span>
                    </a>
                   <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('/backend/images/avatar5.png')}}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ asset('/backend/images/avatar5.png')}}" class="img-circle" alt="User Image">
                                        <p>
                                            {{Auth::user()->name}}
                                        </p>
                                    </li>

                                    <li class="user-footer">
                                        <div style="text-align: center;">
                                            <a href="{{ url('/logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{trans('labels.logout')}}</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        </div>  
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('/backend/images/avatar5.png')}}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->name}}</p>
                          </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php if (request()->path() == 'ase') {echo 'active';}?> treeview">
                            <a href="{{ url('ase') }}">
                                <i class="fa fa-university"></i> <span>{{trans('adminlabels.ASE')}}</span>
                            </a>
                        </li>
                        <li class="<?php if (request()->path() == 'gmis') {echo 'active';}?> treeview">
                            <a href="{{ url('gmis') }}">
                                <i class="fa fa-university"></i> <span>{{trans('adminlabels.GMIS')}}</span>
                            </a>
                        </li>
                        
                        <li class="<?php
                        if (request()->path() == 'admin/cms' || request()->path() == 'admin/addcms' || request()->path() == 'admin/editcms' || request()->path() == 'admin/templates' || request()->path() == 'admin/addtemplate' || request()->path() == 'admin/edittemplate') {
                            echo 'active';
                        }
                        ?> treeview">
                            <a href="{{ url('lgt') }}">
                                <i class="fa fa-university"></i> <span>{{trans('adminlabels.LGT')}}</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php
                        if (request()->path() == 'lgt' || request()->path() == 'lgms' || request()->path() == 'lgps') {
                            echo 'active';
                        }
                        ?>"><a href="{{ url('lgms') }}"><i class="fa fa-circle-o"></i>{{trans('adminlabels.MS')}}</a></li>
                                <li class="<?php
                                if (request()->path() == 'admin/templates' || request()->path() == 'admin/addtemplate' || request()->path() == 'admin/edittemplate') {
                                    echo 'active';
                                }
                        ?>"><a href="{{ url('lgps') }}"><i class="fa fa-circle-o"></i>{{trans('adminlabels.PS')}}</a></li>
                        <li class="<?php
                                if (request()->path() == 'smdr' || request()->path() == 'admin/addtemplate' || request()->path() == 'admin/edittemplate') {
                                    echo 'active';
                                }
                        ?>"><a href="{{ url('smdr') }}"><i class="fa fa-circle-o"></i>{{trans('adminlabels.SMDR')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            @endauth

            @auth
            <div class="content-wrapper">

                @if ($message = Session::get('success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                <h4><i class="icon fa fa-check"></i> {{trans('validation.successlbl')}}</h4>
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="alert alert-error alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                <h4><i class="icon fa fa-check"></i> {{trans('validation.errorlbl')}}</h4>
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @yield('content')
            </div><!-- /.content-wrapper -->
            @else
            @yield('content')
            @endauth

            @auth

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    {!! trans('labels.version') !!}
                </div>
                {!! trans('labels.copyrightstr') !!}
            </footer>
            @endauth
            @yield('footer')
        </div>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script src="{{ asset('backend/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{ asset('backend/plugins/fastclick/fastclick.min.js')}}"></script>               
        <!-- Datatable -->        
        <script type="text/javascript" src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>   
        <script type="text/javascript" src="{{ asset('backend/js/dataTables.bootstrap.min.js') }}"></script>  
        <script type="text/javascript" src="{{ asset('backend/js/dataTables.bootstrap.js') }}"></script> 
         <!-- backendLTE App -->
        <script src="{{ asset('backend/js/app.min.js')}}"></script>        
        <script src="{{ asset('backend/js/jquery.validate.min.js') }}"></script>
        <!-- Datepicker --> 
        <script src="{{ asset('backend/js/jquery-ui.js') }}"></script>
       
        @yield('script')

    </body>
    </body>
</html>