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
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/signin.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <div class="container">
<?php // echo CI_VERSION; ?>
        <form class="form-signin" role="form" action="<?php echo base_url(); ?>users/accounts/signin" method="post">
        <h3 class="form-signin-heading"><img style="top: -3px;width: 50px;" id="logo" src="<?php echo base_url(); ?>images/logo.png" title="UME"> Please sign in</h3>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember Me
        </label>
        <button class="btn btn-lg btn-warning btn-block" type="submit">Sign In</button>
        <br />
        
        <?php echo $this->session->flashdata('message'); ?>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
