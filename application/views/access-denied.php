<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WOCO | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">

  </head>
  <body class="login-page" style="font-family:'Oswald','sans-sarif' !important;">
    <div class="main-div">
    <div class="left-content">
      <div class="leftdiv-content">
        <!-- logo -->
                  <center><embed style="margin-top: 20%;" class="img-responsive" type="image/svg+xml" src="<?php echo base_url(); ?>assets/images/woco.svg" /></center>

        <!-- //logo -->
        </div>
    </div>
    <div class="login-box">



      <div class="login-logo" >
        <a href="#"><b style="font-weight: 300 !important;">Login</b><br>
<?php

if (isset($role)) {
  switch ($role) {
    case ROLE_SYSTEM_ADMIN:
      echo "System Administrator";
      break;

    case ROLE_ADMIN:
      echo "Administrator";
      break;

    case ROLE_HR:
      echo "HR Manager";
      break;

    case ROLE_MANAGER:
      echo "Manager";
      break;

    case ROLE_EMPLOYEE:
      echo "Employee";
      break;

    default:
      echo "Employee";
      break;
  }
}else {
  echo "Administrator";
}
?>
        </a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url(); ?>loginMe" method="post">
          <input type="hidden" name="role" value="<?php echo (isset($role) ? $role: ROLE_ADMIN); ?>">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" placeholder="Email" name="email" required />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group has-feedback">
                   <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" placeholder="Password" name="password" required />
                </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6">
                <div class="checkbox icheck" style="margin-left: 21px; margin-top: 0px; color: #2b4990;">
                  <label>
                    <input type="checkbox"> <b style="letter-spacing: 3px;">Remember Me</b>
                  </label>
                </div>
              </div>
              <div class="col-md-6 text-right">
                <a href="<?php echo base_url() ?>forgotPassword"><b style="letter-spacing: 3px;">Forgot Password</b></a>
              </div>
          </div>
<br>
          <div class="row">
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" style="font-family: sans-serif;"/>
              </div>
          </div>

        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
