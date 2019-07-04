<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WOCO : Forgot Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
<style >
      img.img-responsive.login-bck-img-trail {
      margin-top: 32%;
      height: 396px;
      height: 334px;
      position: absolute;
      left: 50px;
      top: -5%;
      left: 0%;
      width: 50%;
      }
      img.img-responsive.login-bck-img-bg {
      margin-top: 20%;
      height: 396px;
      margin-top: 43%;
      /* margin-bottom: 50%; */
      margin-left: 25%;
      margin-right: 25%;
      height: 300px;
      }

      input#clickme {
          margin-top: 0px;
          font-family: sans-serif;
          background-color: #ffffff !important;
          background-image: linear-gradient(to right, #ffffff , #ffffff) !important;
          color: #2b4c91 !important;
          font-size: 20px !important;
}
</style>
  </head>
  <body class="login-page" style="font-family:'Oswald','sans-sarif' !important;">
    <div class="main-div">
        <div class="left-content">
      <div class="leftdiv-content">
        <!-- logo -->
                  <<img class="img-responsive login-bck-img-trail"  src="<?php echo base_url(); ?>assets/images/Trail exp.png" alt="">
                  <center><img  class="img-responsive login-bck-img-bg"  src="<?php echo base_url(); ?>assets/images/ic_splash_logo.png" alt=""></center>

        <!-- //logo -->
        </div>
    </div>
    <div class="login-box">
      <div class="login-logo">
        <a href="#">
          <h1 style="font-weight: 400 !important;font-size: 36px;">Forgot Password</h1>
        </a>
         <p class="para">Please Enter your Email or phone Number and we will send you an Link</p>

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

        <form action="<?php echo base_url(); ?>resetPasswordUser" method="post">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" placeholder="Email" name="login_email" required />
                </div>
              </div>
          </div>
<br>
          <div class="row">
              <div class="col-md-6">
                  <input type="button" id="clickme" class=" clickme btn btn-primary btn-block btn-flat" value="Back To Login" style="margin-top: 0px;font-family: sans-serif;"/>
              
              </div>

              <div class="col-md-6">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Send Link" style="margin-top: 0px;font-family: sans-serif;"/>
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
<script type="text/javascript">
$('.clickme').click(function() {
    history.go(-1);
 return false;
});
</script>
