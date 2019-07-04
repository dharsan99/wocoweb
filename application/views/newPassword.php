<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WOCO : Reset Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="login-page">
    <div class="main-div">
        <div class="left-content">
      <div class="leftdiv-content">
        <!-- logo -->
                  <center><embed style="margin-top: 20%;" class="img-responsive" type="image/svg+xml" src="<?php echo base_url(); ?>assets/images/woco.svg" /></center>

        <!-- //logo -->
        </div>
    </div>
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><br>Reset Password</a>
         <p class="para">Create New Password</p>

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
        $send = $this->session->flashdata('send');
        $notsend = $this->session->flashdata('notsend');
        $unable = $this->session->flashdata('unable');
        $invalid = $this->session->flashdata('invalid');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php }

        if($send)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $send; ?>
            </div>
        <?php }

        if($notsend)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $notsend; ?>
            </div>
        <?php }

        if($unable)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $unable; ?>
            </div>
        <?php }

        if($invalid)
        {
            ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $invalid; ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url(); ?>createPasswordUser" method="post">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group has-feedback">
                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                <input type="text" style="background-color: transparent;" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" readonly required />
              </div>
            </div>
            <input type="hidden" name="activation_code"  value="<?php echo $activation_code; ?>" required />
            <hr>
            <div class="col-xs-12">
              <div class="form-group has-feedback">
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="New Password" name="password" required />
              </div>
            </div>
            <div class="col-xs-12">
              <div class="form-group has-feedback">
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 text-right">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit" />
            </div><!-- /.col -->
            <!-- /.col -->
          </div>

        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
</div>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
