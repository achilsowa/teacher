<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Suku App</title>

    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="styles/animate.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/sukuapp.css" rel="stylesheet">

</head>

<body ng-app="sukuApp">

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-university"></i> <strong class="font-bold">SuKuApp+</strong> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown m-t-xs">
                            <li><a href="profile.html"><i class="fa fa-university"></i> Suku.com</a></li>
                            <li class="divider"></li>
                            <li><a href="profile.html"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="contacts.html"><i class="fa fa-lock"></i> Confidentiality</a></li>
                            <li><a href="mailbox.html"><i class="fa fa-cog"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        SK+
                    </div>
                </li>
                <li>
                    <a href="layouts.html"><i class="fa fa-list-alt"></i> <span class="nav-label">Classrooms</span></a>
                </li>
                <li>
                    <a href="layouts.html"><i class="fa fa-edit"></i> <span class="nav-label">Tests</span></a>
                </li>
                <li>
                    <a href="layouts.html"><i class="fa fa-file"></i> <span class="nav-label">Files</span></a>
                </li>
                <li>
                    <a href="layouts.html"><i class="fa fa-users"></i> <span class="nav-label">Colleagues</span></a>
                </li>
            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top top-header " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-success btn-sm" href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <a class="navbar-minimalize minimalize-styl-2 btn btn-success btn-outline btn-sm" href="#"><i class="fa fa-users"></i> Find Colleagues or Contacts</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-success">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>

            </nav>
        </div>
        <div ng-view>

        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="scripts/vendors/jquery-2.1.1.js"></script>
<script src="scripts/vendors/angular.js"></script>
<!--<script src="scripts/vendors/angular-route.js"></script>-->
<script src="scripts/vendors/bootstrap.min.js"></script>
<script src="scripts/vendors/metisMenu/jquery.metisMenu.js"></script>


<!-- Custom and plugin javascript -->
<script src="scripts/others/inspinia.js"></script>
<script src="scripts/vendors/pace/pace.min.js"></script>

<script src="app.js"></script>


</body>

</html>
