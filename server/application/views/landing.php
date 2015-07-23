<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ischool</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" 
	  content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Force IE9 to render in normal mode -->
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" />
	<![endif]-->
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="sprFlat admin template"
          />
    <meta name="keywords" content="admin, admin template, admin theme" 
	  content="sprFlat admin template" />
    <!--[if lt IE 9]>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" 
	      rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" 
	      rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" 
	      rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" 
	      rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base ?>css/main.min.css" />

	<![endif]-->
    <!-- Css files -->
    <link rel="stylesheet" href="css/landing.m.css" />
    <link rel="stylesheet" href="css/icons.css" />
    <link rel="stylesheet" href="css/dropzone.css" />
    <link rel="stylesheet" href="css/landing.css" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" 
	  href="assets/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" 
	  href="assets/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" 
	  href="assets/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" 
	  href="assets/img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="icon" href="assets/img/ico/favicon.ico" type="image/png">
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc" />
  </head>
  <body>
    <div id="fb-root"></div>
    <!-- Start .landing-intro -->
    <div id="top" class="landing-intro" role="main">
      <!-- Start .container -->
      <div class="container">
        <!-- Start .header -->
        <header class="header row">
          <div class="col-md-6 col-sm-12">
            <!-- Start .logo -->
            <h1 class="text-logo">
	      <!--<i class="im-pencil2 text-logo-element animated bounceIn"></i>
		-->
	      <i class="text-logo-element animated bounceIn"></i>
	      I-<span class="text-logo-r">-SCHOOL</span>
            </h1>
            <!-- End .logo -->
          </div>
          <div class="col-md-6 col-sm-12">
            <nav>
              <ul>
                <li>
                  <button class="btn btn-white btn-alt" data-toggle="modal" 
		     data-target="#register-dialog" href="#">
		    Register and Try
		  </button>
                </li>
                <li>
                  <button class="btn btn-white btn-alt" href="#">
		    Demo
		  </button>
                </li>
              </ul>
            </nav>
            <!-- Start .fb-like -->
            <!-- End .fb-like -->
          </div>
        </header>
        <!-- End .header -->
        <!-- Start intro-slogan -->
        <div class="intro-slogan text-center animated fadeInDown">
          <h1>Make teaching  easier and Share your experience around
	    the world</h1>
	  <br/><br/><br/>
          <p style="text-align:left;">
	    Manage your classrooms,  track your evolution with 
	    pedagogic projects, plan courses and tests, get statistics 
	    and graphics from marks, notify students, 
	    share with other teachers in the world and more
	  </p>
        </div>
      </div>
      <!-- End .container -->
      <!-- Start .description-bar -->
      <div class="description-bar">
        <!-- Start container -->
	<form class="row" action="register/signin" 
	      method="post">
	  <div class="col-lg-10 col-md-10 col-md-offset-2 col-lg-offset-2">
	    <span class="col-lg-4 col-md-4">
	      <input name="email" type="text" 
		     placeholder="email"
		     class="form-control left-icon ">
	    </span>
	    <span class="col-lg-4 col-md-4">
	      <input name="password" placeholder="password" 
		     class="form-control left-icon" type="password">
	    </span>
	    <span class="col-lg-4 col-md-4">
	      <button class="btn btn-white btn-alt btn-lg">
		Try It for Free
	      </button>
	    </span>
	  </div>
	</form>

        <div class="container text-center">
        </div>
        <!-- End container -->
      </div>
    </div>

    <footer id="footer">
      <div class="container">
        <div class="row mt50 mb50">
          <!-- Start .row -->
          <div class="col-md-12 footer-links">
            <a href="#">What is i-school ?</a>
            <a href="#" class="goTo">Features</a> 
            <a href="#" target="_blank">Demo</a>
            <a href="#" class="goTo">Contact us</a> 
            <p>&copy; 2015 cool software. All Rights Reserved</p>
          </div>
        </div>
        <!-- End .row -->
      </div>
    </footer>

    <script src="js/libs/pace.min.js"></script>
    <script src="js/libs/jquery-2.1.1.min.js"></script>
    <script src="js/libs/dropzone.min.js"></script>
    <script src="js/libs/modal.js"></script>
    <!--[if lt IE 9]>
	<script type="text/javascript" src="assets/js/libs/excanvas.min.js">
	</script>
	<script type="text/javascript" 
		src="http://html5shim.googlecode.com/svn/trunk/html5.js">
	</script>
	<script type="text/javascript" src="assets/js/libs/respond.min.js">
	</script>
	<script src="<?php echo $base ?>js/landing.js"></script>
	<![endif]-->

    
    <div class="modal fade" id="register-dialog" tabindex="-1" 
	 role="dialog" aria-hidden="true" style="z-index:9999;">
      <div class="modal-dialog">
        <div class="modal-content">
	  <form action="register/signup" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" 
		      aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Registration</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
		<div class="input-group">
		  <span class="input-group-addon ">name</span>
		  <input name="name" type="text" class="form-control" />
		</div>
              </div>
              <div class="form-group">
		<div class="input-group">
		  <span class="input-group-addon">email</span>
		  <input name="email" type="email" class="form-control" />
		</div>
              </div>
              <div class="form-group">
		<div class="input-group">
		  <span class="input-group-addon">password</span>
		  <input name="password" type="password" class="form-control" />
		</div>
              </div>
            </div>
	    <div class="modal-footer">
              <button type="button" class="btn btn-primary">
		Register
	      </button>
	    </div>
	  </form>
	</div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div> <!-- /.modal -->

  </body>
</html>
