<?php
$user = $this->session->userdata('user');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">

        <title><?php echo $title; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/visitor_page.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/docs.min.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/dashboard.js"></script>


    </head>

    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img id="logo" src="<?php echo base_url(); ?>images/logo.png" title="UME" /> <span id="logo-title">UME</span></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a style="font-weight: bold; top: 11px;">Welcome: <?php echo $user['use_name']; ?></a></li>
<!--                        <li class="dropdown menu-left">
                            <a href="#" data-toggle="dropdown" class="icon-top">Menu</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Account</li>

                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account setting</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Privacy setting</a></li>
                                <li><a href="<?php echo site_url(); ?>/accounts/signout"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>

                                <li><a href="<?php echo site_url(); ?>/accounts"><i class="glyphicon glyphicon-log-in"></i> Log In</a></li>

                                <li class="divider"></li>
                                <li class="dropdown-header">Support</li>
                                <li><a href="#"><i class="glyphicon glyphicon-info-sign"></i> Help</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-ban-circle"></i> Report problems</a></li>
                            </ul>
                        </li>-->

<!--                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="icon-top"><i class="glyphicon glyphicon-th"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Account</li>

                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account setting</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Privacy setting</a></li>
                                <li><a href="<?php echo site_url(); ?>users/accounts/signout"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>

                                <li><a href="<?php echo site_url(); ?>/accounts"><i class="glyphicon glyphicon-log-in"></i> Log In</a></li>

                                <li class="divider"></li>
                                <li class="dropdown-header">Support</li>
                                <li><a href="#"><i class="glyphicon glyphicon-info-sign"></i> Help</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-ban-circle"></i> Report problems</a></li>
                            </ul>
                        </li>-->
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="icon-top"><i class="glyphicon glyphicon-th"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Account</li>

                                <li><a href="<?php echo site_url(); ?>users/accounts/changepassword"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                                <li><a href="<?php echo site_url(); ?>users/accounts/profile"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                                <li><a href="<?php echo site_url(); ?>users/accounts/signout"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>


                                <li class="divider"></li>
                                <li class="dropdown-header">Support</li>
                                <li><a href="#"><i class="glyphicon glyphicon-info-sign"></i> Help</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-ban-circle"></i> Report problems</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php $this->load->view('sidebar'); ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main content">
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php $this->load->view($content); ?>
                </div>
            </div>
        </div>


    </body>
</html>