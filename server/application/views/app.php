<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ischool</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" 
	  content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Force IE9 to render in normal mode -->
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="sprFlat admin template"/>
    <meta name="keywords" content="admin, admin template, admin"/>
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

    <link rel="stylesheet" href="<?php echo $base ?>css/font.css" />
    <link rel="stylesheet" href="<?php echo $base ?>css/main.min.css" />
    <link rel="stylesheet" href="<?php echo $base ?>plugins/animo.js/animate+animo.css" />
    <link rel="stylesheet" href="<?php echo $base ?>css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" href="<?php echo $base ?>css/basic.css" />
    <link rel="stylesheet" href="<?php echo $base ?>css/dropzone.css" />
    <link rel="stylesheet" href="blank.css" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" 
	  href="<?php echo $base ?>img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" 
	  href="<?php echo $base ?>img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" 
	  href="<?php echo $base ?>img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" 
	  href="<?php echo $base ?>img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="icon" href="<?php echo $base ?>img/ico/favicon.ico" type="image/png">
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc" />
  </head>
  <body>
    <!-- Start #header -->
    <div id="header">
      <div class="container-fluid">
        <div class="navbar">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
              <i class="im-pencil2 text-logo-element animated bounceIn"></i>
	      <span class="text-logo">i-</span><span class="text-slogan">-School
	      </span> 
            </a>
          </div>
          <nav class="top-nav" role="navigation">
            <ul class="nav navbar-nav pull-left">
              <li id="toggle-sidebar-li">
                <a href="blank.html#" id="toggle-sidebar">
		  <i class="en-arrow-left2"></i>
                </a>
              </li>
              <li>
                <a href="blank.html#" class="full-screen">
		  <i class="fa-fullscreen"></i>
		</a>
              </li>
              <li id="goleft">
                <a href="blank.html#" title="previous">
		  <i class="im-arrow-left2"></i>
		</a>
              </li>
              <li id="goright">
                <a href="blank.html#" title="next">
		  <i class="im-arrow-right2"></i>
		</a>
              </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
              <li>
                <a href="blank.html#" id="toggle-header-area">
		  <i class="im-menu2"></i></a>
              </li>
              <li class="dropdown">
                <a href="blank.html#" id="toggle-profil" data-toggle="dropdown">
                  <img class="user-avatar" 
		       src="<?php echo $base ?>img/avatars/48.png" alt="SuggeElson">
		  SuggeElson</a>
                <ul class="dropdown-menu right fadeInDown animated" role="menu" 
		    id="profil-items" >
                  <li><a href="profile.html"><i class="st-user"></i> Profile</a>
                  </li>
                  <li><a href="file.html"><i class="st-cloud"></i> Files</a>
                  </li>
                  <li><a href="blank.html#"><i class="st-settings"></i> 
		      Settings</a>
                  </li>
                  <li><a href="login.html"><i class="im-exit"></i> Logout</a>
                  </li>
                </ul>
              </li>
              <li id="toggle-right-sidebar-li">
		<a href="blank.html#" id="toggle-right-sidebar">
		  <i class="ec-users"></i> <span class="notification">3</span>
		</a>   
              </li>
            </ul>
          </nav>
        </div>
        <!-- Start #header-area -->
        <div id="header-area" class="fadeInDown">
          <div class="header-area-inner">
            <ul class="list-unstyled list-inline">
              <li>
                <div class="shortcut-button">
                  <a href="blank.html#">
                    <i class="im-pie"></i>
                    <span>Earning Stats</span>
                  </a>
                </div>
              </li>
              <li>
                <div class="shortcut-button">
                  <a href="blank.html#">
                    <i class="ec-images color-dark"></i>
                    <span>Gallery</span>
                  </a>
                </div>
              </li>
              <li>
                <div class="shortcut-button">
                  <a href="blank.html#">
                    <i class="en-light-bulb color-orange"></i>
                    <span>Fresh ideas</span>
                  </a>
                </div>
              </li>
              <li>
                <div class="shortcut-button">
                  <a href="blank.html#">
                    <i class="ec-link color-blue"></i>
                    <span>Links</span>
                  </a>
                </div>
              </li>
              <li>
                <div class="shortcut-button">
                  <a href="blank.html#">
                    <i class="ec-support color-red"></i>
                    <span>Support</span>
                  </a>
                </div>
              </li>
              <li>
                <div class="shortcut-button">
                  <a href="blank.html#">
                    <i class="st-lock color-teal"></i>
                    <span>Lock area</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- End #header-area -->
      </div>
      <!-- Start .header-inner -->
    </div>
    <!-- End #header -->
    <!-- Start #sidebar -->
    <div id="sidebar">
      <!-- Start .sidebar-inner -->
      <div class="profil">
	<img src="<?php echo $base ?>img/avatars/48.png"/>
	<br/>
	<a href="#profil" style="font-size:19px;"> Sugge Elson</a>
      </div>

      <div class="sidebar-inner" >

        <!-- Start #sideNav -->
        <ul id="sideNav" class="nav nav-pills nav-stacked">
          <li class="top-search" id="search">
            <form>
              <input type="text" name="search" placeholder="Search ...">
              <button type="submit"><i class="ec-search s20"></i>
              </button>
            </form>
          </li>
          <li> 
	    <a href="#classrooms" id="classrooms" class="active">Classrooms 
	      <i class="im-screen"></i>
	    </a>
          </li>
          <li class="hasSub">
            <a href="#tests" id="tests" class="notExpand"> Tests 
	      <i class="en-arrow-down5 sideNav-arrow"></i>
	      <i class="ec-pencil"></i>
	      <span class="notification onhover red">4</span>
	    </a>
            <ul class="nav sub fadeInDown animated">
              <li><a href="forms.html"><i class="ec-pencil2"></i> Form Stuff</a>
              </li>
              <li><a href="form-validation.html">
		  <i class="im-checkbox-checked"></i> Form Validation</a>
              </li>
              <li><a href="form-wizard.html"><i class="im-wand"></i> 
		  Form Wizard</a>
              </li>
              <li><a href="wysiwyg.html"><i class="fa-pencil"></i> 
		  WYSIWYG editor</a>
              </li>
            </ul>
          </li>
          <li>
	    <a href="#charts" id="charts">Charts <i class="st-chart"></i>
	    </a>
          </li>
          <li><a href="#pp"><i class="im-images"></i> Pedagogic </a>
          <li><a href="#tt"><i class="im-calendar"></i> Time Table </a>
          </li>
        </ul>
        <!-- End #sideNav -->
      </div>
      <!-- End .sidebar-inner -->
    </div>
    <!-- End #sidebar -->
    <!-- Start #right-sidebar -->
    <div id="right-sidebar" class="hide-sidebar fadeInDown animated">
      <!-- Start .sidebar-inner -->
      <div class="sidebar-inner">
        <div class="sidebar-panel mt0">
          <div class="sidebar-panel-content fullwidth pt0">
            <div class="chat-user-list">
              <form class="form-horizontal chat-search" role="form">
                <div class="form-group">
                  <input type="text" class="form-control" 
			 placeholder="Search for user...">
                  <button type="submit"><i class="ec-search s16"></i>
                  </button>
                </div>
                <!-- End .form-group  -->
              </form>
              <ul class="chat-ui bsAccordion">
                <li>
                  <a href="blank.html#">Favorites 
		    <span class="notification teal">4</span>
		    <i class="en-arrow-down5"></i></a>
                  <ul class="in">
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/49.jpg" alt="@chadengle">
			Chad Engle
                        <span class="has-message"><i class="im-pencil"></i>
			</span>
                      </a>
                      <span class="status online"><i class="en-dot"></i></span>
                    </li>
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/54.jpg" alt="@alagoon">
			Anthony Lagoon</a>
                      <span class="status offline"><i class="en-dot"></i></span>
                    </li>
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/52.jpg" alt="@koridhandy">
			Kory Handy</a>
                      <span class="status"><i class="en-dot"></i></span>
                    </li>
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/50.jpg" alt="@divya">
			Divia Manyan</a>
                      <span class="status"><i class="en-dot"></i></span>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="blank.html#">Online 
		    <span class="notification green">1</span>
		    <i class="en-arrow-down5"></i>
		  </a>
                  <ul class="in">
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/51.jpg" alt="@kolage">
			Eric Hofman
		      </a>
                      <span class="status online"><i class="en-dot"></i></span>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="blank.html#">Offline 
		    <span class="notification red">2</span>
		    <i class="en-arrow-down5"></i>
		  </a>
                  <ul>
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/49.jpg" alt="@chadengle">
			Chad Engle
		      </a>
                      <span class="status offline"><i class="en-dot"></i></span>
                    </li>
                    <li>
                      <a href="blank.html#" class="chat-name">
                        <img class="chat-avatar" 
			     src="<?php echo $base ?>img/avatars/59.jpg" alt="@aiiaiiaii">
			Alia Alien
		      </a>
                      <span class="status offline"><i class="en-dot"></i></span>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="chat-box">
              <h5>Chad Engle</h5>
              <a id="close-user-chat" href="blank.html#" 
		 class="btn btn-xs btn-primary"><i class="en-arrow-left4"></i>
	      </a>
              <ul class="chat-ui chat-messages">
                <li class="chat-user">
                  <p class="avatar">
                    <img src="<?php echo $base ?>img/avatars/49.jpg" alt="@chadengle">
                  </p>
                  <p class="chat-name">Chad Engle <span class="chat-time">
		      15 seconds ago</span>
                  </p>
                  <span class="status online"><i class="en-dot"></i></span>
                  <p class="chat-txt">Hello Sugge check out the last order.</p>
                </li>
                <li class="chat-me">
                  <p class="avatar">
                    <img src="<?php echo $base ?>img/avatars/48.png" alt="SuggeElson">
                  </p>
                  <p class="chat-name">SuggeElson <span class="chat-time">
		      10 seconds ago</span>
                  </p>
                  <span class="status online"><i class="en-dot"></i></span>
                  <p class="chat-txt">Ok i will check it out.</p>
                </li>
                <li class="chat-user">
                  <p class="avatar">
                    <img src="<?php echo $base ?>img/avatars/49.jpg" alt="@chadengle">
                  </p>
                  <p class="chat-name">Chad Engle <span class="chat-time">now
		    </span>
                  </p>
                  <span class="status online"><i class="en-dot"></i></span>
                  <p class="chat-txt">Thank you, have a nice day</p>
                </li>
              </ul>
              <div class="chat-write">
                <form action="blank.html#" class="form-horizontal" role="form">
                  <div class="form-group">
                    <textarea name="sendmsg" id="sendMsg" 
			      class="form-control elastic" rows="1">
		    </textarea>
                    <a role="button" class="btn" id="attach_photo_btn">
                      <i class="fa-picture s20"></i> 
                    </a>
                    <input type="file" name="attach_photo" id="attach_photo">
                  </div>
                  <!-- End .form-group  -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End .sidebar-inner -->
    </div>
    <!-- End #right-sidebar -->
    <!-- Start #content -->
    <div id="content">
      <!-- Start .content-wrapper -->
      <div class="content-wrapper">
        <div class="row mainView">
          <!-- Start .row -->


	  <div id="classroomsItemView" class="animated fadeInDown ">
            <!-- Start .page-header -->
            <div class="col-lg-12 heading">
              <h1 class="page-header pull-left col-lg-3 col-md-3 col-xs-3 col-sm-3">
		<i class="im-screen"></i> Classrooms
	      </h1>
	      <div class="col-lg-9 col-md-9 quickbtns col-sm-9 col-xs-9 pull-right">
		<span class="pull-right">
		  <button class="btn btn-sm btn-primary" id="add-classroom-btn"
			  data-toggle="modal" 
			  data-target="#add-classroom-dialog">
		    <i class="im-plus"></i> Add classroom
		  </button>
		  <button class="btn btn-sm btn-primary disabled"
			  id="edit-classroom-btn">
		    <i class="im-pencil"></i> Edit classroom
		  </button>
		</span>
	      </div>
            </div>
	    <!-- End .page-header -->

	    <div class="col-lg-12 main" >

	    </div>

	  </div>
          <!-- End #classroomsItemView -->


	  <div id="classroomView"></div>
          <!-- End #classroomView -->

        </div>
        <!-- End .row -->
        <div class="outlet">
          <!-- Start .outlet -->
          <!-- Page start here ( usual with .row ) -->
          <div class="row">
          </div>
          <!-- Page End here -->
        </div>
        <!-- End .outlet -->
      </div>
      <!-- End .content-wrapper -->
      <div class="clearfix"></div>
    </div>
    <!-- End #content -->
    <!-- Javascripts -->
    <!-- Load pace first -->
    <script src="<?php echo $base ?>plugins/core/pace/pace.min.js"></script>
    <!-- Important javascript libs(put in all pages) -->
    <script src="<?php echo $base ?>js/libs/jquery-2.1.1.min.js"></script>
    <script src="<?php echo $base ?>plugins/animo.js/animo.js"></script>
    <script src="<?php echo $base ?>js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo $base ?>js/dropzone.min.js"></script>
    <script src="<?php echo $base ?>plugins/jquery.tmpl.js"></script>
    <script src="<?php echo $base ?>js/modal.js"></script>
    <script src="<?php echo $base ?>js/dropdown.js"></script>
    <script src="<?php echo $base ?>js/tooltip.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo $base ?>js/libs/jquery-ui-1.10.4.min.js"></script>

    <script src="<?php echo $base ?>plugins/jquery.slimscroll.min.js"></script>

	<script type="text/javascript" src="<?php echo $base ?>js/libs/excanvas.min.js">
	</script>
	<script type="text/javascript" 
		src="http://html5shim.googlecode.com/svn/trunk/html5.js">
	</script>
	<script type="text/javascript" src="<?php echo $base ?>js/libs/respond.min.js">
	</script>

    <script src="<?php echo $base ?>js/pages/blank.js"></script>

	<![endif]-->

    <script src="<?php echo $base ?>js/libs/spine.js"></script>
    <script src="<?php echo $base ?>js/libs/local.js"></script>
    <script src="<?php echo $base ?>js/libs/route.js"></script>
    <script src="helper.js"></script>
    <script src="model.js"></script>
    <script src="views.js"></script>
    <script src="uictrls.js"></script>
    <script src="ctrls.js"></script>
    <script src="blank.js"></script>

    <script type="text/x-jquery-tmpl" id="classroomItemTmpl">
      <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 classroom-item animated fadeInDown">
        <div class="tile-stats b brall mb25 blue-bg">
          <a href="#${school}/${code}" clid="${id}">
            <div class="tile-stats-icon">
	      <i class="im-screen  color-white"> </i>
            </div>
            <div class="tile-stats-content">
	      <div class="tile-stats-text color-white">
		{{if nbrStudents}} ${nbrStudents} {{else}} 0 {{/if}}
		student(s)
	      </div>
	      <div class="tile-stats-text color-white">
		{{if ttt }} {{else}} ?? today(??-??) {{/if}}
	      </div>
	      <div class="tile-stats-text color-white"> 
		{{if hPw}}${hPw} {{else}} ?? {{/if}} / week
	      </div>
	      <div class="tile-stats-text color-white"> 
		{{if subject}} ${subject} {{else}} ?subject? {{/if}}
	      </div>
              <div class="tile-stats-text color-white" >
		<h5>${code}, ${school}</h5></div>
            </div>
            <div class="clearfix"></div>
          </a>
        </div>
      </div>
    </script>
    
    <script type="text/x-jquery-tmpl" id="classroomViewTmpl">
      <div class="col-lg-12 heading">
        <h1 class="page-header pull-left col-lg-3 col-md-3 col-xs-3 col-sm-3">
	  <i class="im-screen"></i> ${code}, ${school}
	</h1>
	<div class="col-lg-9 col-md-9 quickbtns col-sm-9 col-xs-9 pull-right">
	  <span class="pull-right">
	    <div class="btn-group">
	      <button class="btn btn-sm btn-primary " view-mode="grid">
		<i class="br-grid "></i> 
	      </button>
	      <button class="btn btn-sm btn-primary" view-mode="table">
		<i class="im-table2"></i> 
	      </button>
	      <button class="btn btn-sm btn-primary active" view-mode="list">
		<i class="br-list"></i> 
	      </button>
	    </div>
	    
	    <div class="dropdown" style="display:inline-block;">
	      <button class="btn btn-default dropdown-toggle" 
		      data-toggle="dropdown" id="dropdownClassroomActionMenu">
		<i class="im-arrow-down"></i> More
	      </button>
	      <ul class="dropdown-menu pull-right animated fadeInDown"
		  role="menu" 
		  aria-labelledby="dropdownClassroomActionMenu">
		<li role="presentation">
		  <a href="#" class="save"><i class="ec-pencil"></i> 
		    Save modifications
		  </a>
		</li>
		<li role="presentation" class="divider"></li>

		<li role="presentation">
		  <a href="#" class="add-test"><i class="im-plus"></i> 
		    Create test
		  </a>
		</li>
		<li role="presentation">
		  <a href="#" class="load-test"><i class="im-download2"></i> 
		    Load test
		  </a>
		</li>
		<li role="presentation" class="divider"></li>
		
		<li role="presentation">
		  <a href="#" class="tt"><i class="im-calendar"></i> 
		    Time table
		  </a>
		</li>
		<li role="presentation" class="divider"></li>
		<li role="presentation">
		  <a href="#" class="pp"><i class="im-images"></i>
		    Pedagogic project</a>
		</li>
		<li role="presentation" class="divider"></li>
		
		<li role="presentation">
		  <a href="#" class="add-student" data-toggle="modal"
		     data-target="#add-student-dialog"><i class="im-plus"></i> 
		    Add student
		  </a>
		</li>
		<li role="presentation">
		  <a href="#" class="edit-student"><i class="im-pencil"></i>
		    Edit student
		  </a>
		</li>
		
		<li role="presentation" class="divider"></li>
		<li role="presentation">
		  <a href="#" class="import-student"><i class="im-download"></i>
		    Import students' </a>
		</li>
		<li>
		  <a href="#" class="export"><i class="ec-file"></i>
		    Export as ...
		  </a>
		</li>
		<li role="presentation" class="divider"></li>

		<li role="presentation">
		  <a href="#" class="open-new-tab"><i class="im-new-tab"></i>
		    Open in another tab </a>
		</li>
		<li role="presentation">
		  <a href="#" class="close-windows"><i class="im-close"></i>
		    Close window  </a>
		</li>
	      </ul>
	    </div>
	  </span>
	</div>
      </div>
      <div class="col-lg-12 main">
	<div class="empty">
	  <h5>Import your students' from a file(.txt, .docx, .excl, .pdf ...)
	    and automatically add them to your classroom
	  </h5>
	  <form action="#" class="dropzone dz-clickable"
		id="add-students-form">
	  </form>
	</div>
      </div>
    </script>

    <script type="text/x-jquery-tmpl" id="tableViewTmpl">
      <div class="table-responsive">
	<table class="table display table-bordered table-condensed " 
	       {{if id}} id="${id}" {{/if}} >
          <thead>
            <tr>
	      {{if img}}<th/>{{/if}}
	      {{each headers}}
              <th>${$value}</th>
	      {{/each}}
            </tr>
          </thead>
          <tbody/>
          <tfoot>
            <tr>
	      {{if img}}<th/>{{/if}}
	      {{each headers}}
              <th>${$value}</th> 
	      {{/each}}
            </tr>
          </tfoot>
	</table>
      </div>
    </script>

    <script type="text/x-jquery-tmpl" id="itemTableViewTmpl">
      <tr class="table-item animated fadeInDown" item-id="${id}">
        <td>{{if img}}<img src="${img}" width="30"/>{{/if}}</td>
	{{each data}}
        <td>${ helper.present($value) }</td>
	{{/each}}
      </tr>
    </script>


    <script type="text/x-jquery-tmpl" id="itemGridViewTmpl">
      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 grid-item animated fadeInDown grid-item" item-id="${id}" data-toggle="tooltip" data-placement="bottom" 
	   title="${ helper.present(allData) }">
        <div class="tile-stats  brall white-bg">
	  {{if img}}
          <div class="tile-stats-icon">
	    <img src="${img}"/>
          </div>
	  {{/if}}
          <div class="tile-stats-content">
            <div class="tile-stats-text" >
	      <h5>${ helper.truncate(data, 10) } </h5>
	    </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </script>

    <script type="text/x-jquery-tmpl" id="itemListViewTmpl">
      <div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 list-item animated fadeInDown list-item" item-id="${id}" data-toggle="tooltip" 
	   data-placement="bottom" title="${ helper.present(allData) }">
        <div class="tile-stats brall">
	  {{if img}}
          <div class="col-lg-1 col-md-1">
	    <img src="${img}" width="30"/>
          </div>
	  {{/if}}
          <div class="col-lg-11 col-md-11">
            <div class="tile-stats-text" >
	      <h5>${ helper.truncate(data, 15) } </h5>
	    </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </script>

    <div class="modal fade" id="add-classroom-dialog" tabindex="-1" 
	 role="dialog" aria-hidden="true" style="z-index:9999;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
		    aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add Classroom</h4>
          </div>
          <div class="modal-body">
	    <form>
	      <div class="form-group">
		<label>School </label>
		<div class="input-group">
		  <select class="form-control" name="school">
		    <option value="unknown">Choose the school or add</option>
		    <option value="lby">Lycee Bilingue de Yaounde</option>
		    <option value="lbisin">Lycee Bilingue SIN</option>
		    <option value="lba">Lycee Bilingue d'application</option>
		    <option value="cjt">College Jean Tabi</option>
		    <option value="loy">Lycee d'oyack</option>
		    <option value="unknown">Other</option>
		  </select>
		  <span class="input-group-addon btn btn-primary"
			style="color:#fff;" data-toggle="modal" 
			data-target="#add-school-dialog">Add</span>
		</div>
	      </div>
	    
              <div class="form-group ">
		<div class="input-group">
		  <span class="input-group-addon ">Name</span>
		  <input name="name" type="text" class="form-control" 
			 placeholder="Form 1">
		</div>
              </div>
              <div class="form-group ">
		<div class="input-group">
		  <span class="input-group-addon">Code</span>
		  <input name="code" type="text" class="form-control" 
			 placeholder="F1">
		</div>
              </div>
	    </form>
          </div>	
  
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" data-dismiss="modal">
	      Cancel
	    </button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">
	      Add classroom
	    </button>
	  </div>
	</div><!-- /.modal-content --></div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="add-student-dialog" tabindex="-1" 
	 role="dialog" aria-hidden="true" style="z-index:9999;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
		    aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add Student</h4>
          </div>
          <div class="modal-body">
	    <form>
              <div class="form-group">
		<div class="input-group">
		  <span class="input-group-addon ">first name</span>
		  <input name="first" type="text" class="form-control" />
		</div>
              </div>
              <div class="form-group">
		<div class="input-group">
		  <span class="input-group-addon ">last name</span>
		  <input name="last" type="text" class="form-control" />
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
		  <span class="input-group-addon">phone</span>
		  <input name="phone" type="phone" class="form-control" 
			 placeholder="for notification when the marks are avialable"/>
		</div>
              </div>
	      <input type="hidden" name="clid" value=""/>
	    </form>
          </div>
	  
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" data-dismiss="modal">
	      Cancel
	    </button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">
	      Add student
	    </button>
	  </div>
	</div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div> <!-- /.modal -->
    

  </body>
</html>
