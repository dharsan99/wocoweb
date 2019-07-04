<?php
if ($this->session->userdata('userId') == ""){
  redirect("login");
}

$mode = 0;
if ($this->session->userdata('mode') != ""){
  $mode = $this->session->userdata('mode');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.customLoader.walker.css"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/css/_all-skins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>
    <script src="http://woco.co.in/assets/website/js/sweetalert.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
  <style media="screen">
    .btnPlus {
      background-image: url(<?php echo base_url(); ?>assets/images/add3.png) !important;
    }
    .btnMinus {
      background-image: url(<?php echo base_url(); ?>assets/images/cancel.png) !important;
    }
  </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('dashboard'); ?>" class="logo" style="position: fixed;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/dist/img/Logo.png" class="user-image" alt="User Image" style="height: 33px; margin-top: 10px;" /></span>
          <!-- logo for regular state and mobile devices -->
          <img src="<?php echo base_url(); ?>assets/images/new logo woco.svg" class="user-image logo-lg" alt="User Image" style="height: 46px; margin-top: 10px; width: 149px;">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        <div class="navbar-custom-menu profile-main">
            <ul class="nav navbar-nav">
            <?php if($role == ROLE_ADMIN && $isHr == 1) { ?>
              <li class="dropdown tasks-menu" style="padding: 20px;">
                <div class="my-toggle-btn-wrapper">
                  <div class="my-toggle-btn">
                    <input type="checkbox" id="checkbox-switch-role" <?php echo ($mode == 1? "checked":""); ?>>
                    <label for="checkbox-switch-role">
                      <span class="on">HR</span>
                      <span class="off">ADMIN</span>
                    </label>
                  </div>
                </div>
              </li>
            <?php } ?>
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-bell bell-icon"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/male.png" class="user-image" alt="User Image"/>

                  <span class="hidden-xs"><?php echo $name; ?></span><br>
                  <span class="hidden-xs hidden-xx"><?php echo $role_text; ?></span>
                </a>
                <ul class="dropdown-menu signout">
                  <a href="http://woco.co.in/profile" class="toogle-menu active"><li class="user-footer ">
                    </li>
                       <div class="pull-left active custom-dropdown-menu ">
                          <i class="toogle-menu"></i>My Profile
                       </div></a>
                  <a href="http://woco.co.in/logout" class="toogle-menu"> <li class="user-footer " >
                   </li>
                       <div class="pull-left custom-dropdown-menu">
                         <i class="toogle-menu"></i>Logout
                      </div></a>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="treeview dashb-icon">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-tachometer fa-2"></i> <span>Dashboard</span></i>
              </a>
            </li>

          <?php if($role == ROLE_SYSTEM_ADMIN) { ?>
            <!-- ************************* SIDEBAR MENUS FOR SUPER ADMIN START *************************** -->
            <li class="treeview cpm-icon">
              <a href="<?php echo base_url(); ?>master/company" >
                <i class="glyphicon glyphicon-tower"></i>
                <span>Company Management</span>
              </a>
            </li>

            <li class="treeview admin-icon">
              <a href="<?php echo base_url(); ?>master/admin" >
                <i class="glyphicon glyphicon-user"></i>
                <span>Admin Management</span>
              </a>
            </li>

            <li class="treeview perm-icon">
              <a href="<?php echo base_url(); ?>master/permission" >
                <i class="glyphicon glyphicon-user"></i>
                <span>Permission Management</span>
              </a>
            </li>
          <!-- ************************* SIDEBAR MENUS FOR SUPER ADMIN END *************************** -->
          <?php } ?>





          <?php if($role == ROLE_ADMIN && $mode == 0) { ?>
          <!-- ************************* SIDEBAR MENUS FOR ADMIN START *************************** -->
            <li class="treeview subadm-icon">
              <a href="<?php echo base_url(); ?>admin/subadmin" >
                <i class="fa fa-user-secret fa-2"></i>
                <span>Sub Admin Management</span>
              </a>
            </li>
            <li class="treeview empysts-icon">
              <a href="<?php echo base_url(); ?>admin/empstatus" >
                <i class="fa fa-tasks fa-2"></i>
                <span>Employee Status</span>
              </a>
            </li>
            <li class="treeview emptyp-icon">
              <a href="<?php echo base_url(); ?>admin/emptype" >
                <i class="fa fa-tasks fa-2"></i>
                <span>Employee Types</span>
              </a>
            </li>
            <li class="treeview empgrd-icon">
              <a href="<?php echo base_url(); ?>admin/empgrade" >
                <i class="fa fa-tasks fa-2"></i>
                <span>Employee Grades</span>
              </a>
            </li>
            <li class="treeview lvtyp-icon">
              <a href="<?php echo base_url(); ?>admin/leavetype" >
                <i class="fa fa-tasks fa-2"></i>
                <span>Leave Types</span>
              </a>
            </li>
            <li class="treeview dprt-icon">
              <a href="<?php echo base_url(); ?>admin/department" >
                <i class="fa fa-object-group fa-2"></i>
                <span>Departments</span>
              </a>
            </li>
            <li class="treeview dsgn-icon">
              <a href="<?php echo base_url(); ?>admin/designation">
                <i class="fa fa-object-ungroup fa-2"></i>
                <span> Designations</span>
              </a>
            </li>
            <li class="treeview ofc-icon">
              <a href="<?php echo base_url(); ?>admin/office" >
                <i class="fa fa-university fa-2"></i>
                <span>Offices</span>
              </a>
            </li>
            <li class="treeview tmng-icon">
              <a href="<?php echo base_url(); ?>admin/shift" >
                <i class="fa fa-clock-o fa-2"></i>
                <span>Timings</span>
              </a>
            </li>
            <li class="treeview lctn-icon">
              <a href="<?php echo base_url(); ?>admin/location" >
                <i class="fa fa-map-marker fa-2"></i>
                <span>Locations</span>
              </a>
            </li>
            <li class="treeview lctn-icon">
              <a href="<?php echo base_url(); ?>admin/feedback" >
                <i class="fa fa-comments fa-2"></i>
                <span>Feedback</span>
              </a>
            </li>
          <!-- ************************* SIDEBAR MENUS FOR ADMIN END *************************** -->
          <?php } ?>





          <?php if($role == ROLE_HR || ($role == ROLE_ADMIN && $isHr == 1 && $mode == 1)) { ?>
          <!-- ************************* SIDEBAR MENUS FOR HR START *************************** -->
            <li class="treeview hr-icon">
              <a href="<?php echo base_url(); ?>hr/hr" >
              <img src="<?php echo base_url(); ?>/assets/dist/img/profileselected_web.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>HR Management</span>
              </a>
            </li>
            <li class="treeview hr-icon">
              <a href="<?php echo base_url(); ?>hr/manager" >
                <img src="<?php echo base_url(); ?>/assets/dist/img/ic_hr.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Manager Management</span>
              </a>
            </li>
            <li class="treeview empmng-icon">
              <a href="<?php echo base_url(); ?>hr/hierarchy">
                <img src="<?php echo base_url(); ?>/assets/dist/img/tree_icon.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Hierarchy Management</span>
              </a>
            </li>
            <li class="treeview empmng-icon">
              <a href="<?php echo base_url(); ?>hr/employee">
                <img src="<?php echo base_url(); ?>/assets/dist/img/profileselected_web.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Employee Management</span>
              </a>
            </li>
            <li class="treeview rprt-icon">
              <a href="<?php echo base_url(); ?>hr/reports">
                <img src="<?php echo base_url(); ?>/assets/dist/img/ic_reports.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Report</span>
              </a>
            </li>
            <li class="treeview tmmng-icon">
              <a href="<?php echo base_url(); ?>hr/team">
                <img src="<?php echo base_url(); ?>/assets/dist/img/group-1.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">

                <span>Team Management</span>
              </a>
            </li>
            <li class="treeview lvmngt-icon">
              <a href="<?php echo base_url(); ?>hr/leave">
                <img src="<?php echo base_url(); ?>/assets/dist/img/leaves_icon_web.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Leave Management</span>
              </a>
            </li>
            <li class="treeview ntfctn-icon">
              <a href="<?php echo base_url(); ?>hr/notification" >
              <img src="<?php echo base_url(); ?>/assets/dist/img/notification_bell_1.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Notification Management</span>
              </a>
            </li>
            <li class="treeview lvrqst-icon">
              <a href="<?php echo base_url(); ?>hr/leaverequest" >
                <img src="<?php echo base_url(); ?>/assets/dist/img/leave.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Leave Requests</span>
              </a>
            </li>
            <li class="treeview lvrqst-icon">
              <a href="<?php echo base_url(); ?>hr/attendance" >
                <img src="<?php echo base_url(); ?>/assets/dist/img/attendence.png" style="margin-top: -4px; height: 20px;margin-right: 6px;">
                <span>Attendance List</span>
              </a>
            </li>
            <!-- ************************* SIDEBAR MENUS FOR HR END *************************** -->
          <?php } ?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
