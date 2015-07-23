<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login | I--SCHOOL</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" 
	      content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" />
	    <![endif]-->
        <meta name="author" content="SuggeElson" />
        <meta name="description" content="sprFlat admin template - new premium" 
              />
        <meta name="keywords" content="admin, admin template" />
        <meta name="application-name" content="sprFlat admin template" />

        <!--[if lt IE 9]>
	    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" 
		  rel="stylesheet" type="text/css" />
	    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" 
		  rel="stylesheet" type="text/css" />
	    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" 
		  rel="stylesheet" type="text/css" />
	    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" 
		  rel="stylesheet" type="text/css" />
	    <![endif]-->
        <!-- Css files -->
	<link rel="stylesheet" href="<?php echo $base ?>css/main.min.css" />
	<link rel="stylesheet" href="<?php echo $base ?>css/signin.css" />
        <link rel="icon" href="assets/img/ico/favicon.ico" type="image/png">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body class="login-page">
      <!-- Start #login -->
      <div id="login" class="animated bounceIn">
        <img id="logo-img" src="<?php echo $base ?>img/logo2.png" 
	     alt="ischool Logo">
        <!-- Start .login-wrapper -->
        <div class="login-wrapper">
          <ul id="myTab" class="nav nav-tabs nav-justified bn">
            <li>
              <a href="#log-in" data-toggle="tab">Login</a>
            </li>
            <li class="">
              <a href="#register" data-toggle="tab">Register</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content bn">
            <div class="tab-pane fade active in" id="log-in">
              <form class="form-horizontal mt10" method="post" role="form"
		    id="login-form" method="post"
		    action="<?php echo $base?>register/signup" >
                <div class="form-group">
                  <div class="col-lg-12">
                    <input type="text" name="email" placeholder="email"
			   class="form-control left-icon" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <input type="password" placeholder="password"
			   class="form-control left-icon" name="password">
		    <span class="help-block">
		      <a href="login.html#">
			<small>Forgout password ?</small></a>
		    </span> 
                  </div>
                </div>
                <div class="form-group">
		  <div class="col-lg-6 col-md-6" style="color:#f55;">
		    <?php if(isset($error)) echo $error; ?>
		  </div>
                  <div class="col-lg-6 col-md-6 ">
                    <button class="btn btn-success pull-right" type="submit">
		      Login</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="register">
              <form class="form-horizontal mt20" 
		    action="<?php echo $base?>register/signup" method="post"
		    id="register-form" role="form">
                <div class="form-group">
                  <div class="col-lg-12">
                    <input name="name" type="text" 
			   class="form-control left-icon" placeholder="name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <input type="email" class="form-control left-icon" 
			   name="email"  placeholder="email">
                  </div>
                  <div class="col-lg-12 mt15">
                    <input type="password" class="form-control left-icon" 
			   name="pwd" placeholder="password">
                  </div>
                </div>
                <div class="form-group">
		  <div class="col-lg-6 col-md-6" style="color:#f55;">
		    <?php if(isset($error1)) echo $error1; ?>
		  </div>
                  <div class="col-lg-6 col-md-6">
		    <button class="btn btn-success pull-right" type="submit">
		      Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End #.login-wrapper -->
      </div>
      <script src="<?php echo $base ?>js/libs/pace.min.js"></script>
      <script src="<?php echo $base ?>js/libs/jquery-2.1.1.min.js"></script>
      <script src="<?php echo $base ?>js/tab.js"></script>
      <!--[if lt IE 9]>
	  <script type="text/javascript" 
		  src="assets/js/libs/excanvas.min.js"></script>
	  <script type="text/javascript" 
		  src="http://html5shim.googlecode.com/svn/trunk/html5.js">
	  </script>
	  <script type="text/javascript" src="assets/js/libs/respond.min.js">
	  </script>
	  <![endif]-->
    </body>
</html>
