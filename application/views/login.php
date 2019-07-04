<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WOCO | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
</style>

  </head>
  <body class="login-page" style="font-family:'Oswald','sans-sarif' !important;">
    <div class="main-div">
    <div class="left-content">
      <div class="leftdiv-content">
        <!-- logo -->
                   <img class="img-responsive login-bck-img-trail"  src="<?php echo base_url(); ?>assets/images/Trail exp.png" alt="">
                   <center><img  class="img-responsive login-bck-img-bg"  src="<?php echo base_url(); ?>assets/images/ic_splash_logo.png" alt=""></center>

        <!-- //logo -->
        </div>
    </div>
    <div class="login-box">



      <div class="login-logo" >
        <a href="#"><h1 style="font-weight: 400 !important;letter-spacing: 3px;">Login</h1>
<?php
switch ($role) {
  case ROLE_SYSTEM_ADMIN:
    echo "<p align='left'; font-weight='300'letter-spacing:3px;> <font color=#303b8e   size='5.5pt'>System Administrator</font> </p>";
    break;

  case ROLE_ADMIN:
    echo "<p align='left'; font-weight='300'> <font color=#303b8e   size='5.5pt'>Administrator</font> </p>";
    break;

  case ROLE_HR:
    echo "<p align='left'; font-weight='300'> <font color=#303b8e   size='5.5pt'>Hr Manager</font> </p>";
    break;

  case ROLE_MANAGER:
    echo "<p align='left'; font-weight='300'letter-spacing:3px;> <font color=#303b8e   size='5.5pt'>Manager</font> </p>";
    break;

  case ROLE_EMPLOYEE:
    echo "<p align='left'; font-weight='300'letter-spacing:3px;> <font color=#303b8e   size='5.5pt'>Employee</font> </p>";
    break;

  default:
    echo "<p align='left'; font-weight='300'letter-spacing:3px;> <font color=#303b8e   size='5.5pt'>Employee</font> </p>";
    break;
} ?>
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
          <input type="hidden" name="role" value="<?php echo $role; ?>">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" placeholder="Email" name="email" required style=" margin-left: 11px !important;"  />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group has-feedback">
                   <span><i class="fa fa-lock" aria-hidden="true"></i></span>

                  <input type="password" id="password-field" class="form-control" placeholder="Password" name="password" data-toggle="password" required style="width:89% !important;" />
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style=" float:right;margin-right: -2px;margin-top: 11px;font-size: 16px;color: #2e5d9c;"></span>
                <!-- <a href="#">  <i class="fa fa-eye" ></i></a> -->
                </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6">
                <div class="checkbox icheck" style="margin-left: 21px; margin-top: 0px; color: #2b4990;">
                  <label>
                    <input type="checkbox" class="col-md-1"> <b  style="letter-spacing: 1px; color: #4c539d; font-weight: 500 !important; font-family: 'Barlow', sans-serif !important; font-size: 15px;" class="col-md-12">Remember Me</b>
                  </label>
                </div>
              </div>
              <div class="col-md-6 text-right">
                <a href="<?php echo base_url() ?>forgotPassword"><b style="letter-spacing: 1px; color: #4c539d; font-family: 'Barlow', sans-serif !important; font-weight: 500 !important; font-size: 15px; " >Forgot Password</b></a>
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
    <script type="text/javascript">
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});

    </script>
  </body>
</html>
