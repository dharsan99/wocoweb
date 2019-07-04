<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootcards/1.1.2/css/bootcards-desktop.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootcards/1.1.2/css/bootcards-desktop.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootcards/1.1.2/js/bootcards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootcards/1.1.2/js/bootcards.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<style>
.datepicker-dash-btn input.btn.btn-primary {
    width: 109px !important;
    margin-top: 11px;
    margin-left: 10px;
    box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);
    width: 93px;
    text-align: center;
    height: 34px;
    padding: 5px;
}

label{margin-left: 20px;
}
#datepicker,#datepickerr
{
  width:180px;
  margin: 0 20px 20px 20px;
  width: 140px;
  margin: 0 20px 20px 20px;
  margin-top: 12px;
  background: #eceff5;
  border: 1px solid #8aa5dc;
  border-radius: 20px;
}
.datepicker-dash .form-control:focus {
    border-color: #ffffff;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(236, 239, 245) !important;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(236, 239, 245) !important;
}
#datepicker , #datepicker > span:hover{cursor: pointer;}
body{
  padding-top: 0px !important;
}
#myDIV .col-md-6.col-sm-4 {
    margin-bottom: 14px;
    width: 222px !important;
    background: white;
    margin-right: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
}
&.active {
       color: white;
        background-color: rgba(0,0,0,0.1);
      }
#myDIV .bootcards-summary-item h4 {
    /* margin: 0 auto; */
    /* margin-left: -33px; */
    float: left;
    margin-top: -9px;
    font-weight: 400;
    color: #3c3c3c;
    /* font-family: 'Barlow', sans-serif !important; */
}
/* #myDIV .btn {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  font-size: 18px;
}

/* Style the active class, and buttons on mouse-over */
 #myDIV .active, #myDIV .btn:hover {
  background: linear-gradient(45deg, #14a19d 10%, #2c4a90 90%) !important;
  color: white;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23) !important;
}
 #myDIV .active h4 ,
 #myDIV .active img ,
 #myDIV .active h2,
 #myDIV .btn:hover h4,
 #myDIV .btn:hover h2,
 #myDIV .btn:hover img,
 #myDIV .active li,
 #myDIV .btn:hover li{
  color: white;
  filter: brightness(82) sepia(49) saturate(0) hue-rotate(53deg);
}

  #profile:hover {
  background-color: #00000000;
  color: white !important;
}

#myDIV a.bootcards-summary-item {
      background: #00000000;

}
#myDIV a:hover{
  color:white;
}
}
#myDIV a.bootcards-summary-item h4:hover {
    color: white;

}
#myDIV a.bootcards-summary-item .active {
    background: red;
}
#profile:hover, #profile:focus{
        background:#00000000;
        color: white !importants;
}

#myDIV li{
      text-align: left;
      color:#3c3c3c;
      font-size: 15px;
      padding: 2px;
          border: none;
}
&:hover >.active{

      color:white;

}
#myDIV .emp-middle{
      text-align: left;
      text-transform: uppercase;
      background: linear-gradient(to right, #14a19d 0%, #2c4c90 77%);
      -webkit-background-clip: text;
       -webkit-text-fill-color: transparent;
       font-weight: 700;
    font-size: 15px;
}
#myDIV a#profile {
    height: 174px;
}
.card-view-dashboard .col-md-6.col-sm-6.btn {
    width: 263px !important;
}

 .bootcards-chart .nav-pills>li.active>a,
 .bootcards-chart .nav-pills>li.active>a:focus,
 .bootcards-chart .nav-pills>li.active>a:hover {
  color: #fff !important;
  background: linear-gradient(45deg, #2c4a90 10%, #14a19d 90%);
  border-bottom: white !important;
  border-radius: 29px;
  width: 93px;
  text-align: center;
  height: 34px;
  padding: 5px;
}
.bootcards-chart .nav>li>a:focus,
.bootcards-chart  .nav>li>a:hover {
    text-decoration: none;
    color: #2c4a90 !important;
    background-color: #fff;
    font-weight: 400 !important;
    border-bottom: 3px solid #ffffff !important;
}
.bootcards-chart a {
    color: #324a9a !important;
    font-weight: 400 !important;
}
.bootcards-chart .col-md-2.report-mng {
    border: 1px solid #2b519199;
    border-radius: 32px;
    margin-left: 24px;
    margin-top: 17px;
    background-color: #eceff5;
    width: 93px !important;
    text-align: center;
    height: 34px !important;
    padding: 5px !important;
}
.bootcards-chart .select-selected {
    color: #000000;
    padding: 8px 16px;
    border: 1px solid transparent;
    border-color: ;
    cursor: pointer;
    padding: 0px;
    text-align: center !important;
    user-select: none;
    font-family: 'Barlow', sans-serif;
}
.bootcards-chart .select-selected:after {
    position: absolute;
    content: "";
    top: 8px;
    right: 10px;
    /* left: 67px; */
    width: 0;
    height: 0;
    border: 6px solid transparent;
    border-color: #30388e transparent transparent transparent;
}
.bootcards-chart .select-selected.select-arrow-active:after {
    border-color: transparent transparent #30388e transparent;
    top: 2px;
}
.bootcards-chart .nav-pills-div li a {

    margin-left: 0px;
}
.emp-rqst-dash img.twPc-avatarImg {
    border: 2px solid #fff;
    border-radius: 7px;
    box-sizing: border-box;
    color: #fff;
    height: 60px;
    margin-top: -25;
    width: 60px;
}

.rqst-dash-title .head h4 {
    padding: 18px;
    padding-top: 0px;
}
.emp-rqst-dash .col-md-8 {
    padding: 8px;
}
.rqst-msg-dash p {
    font-size: 15px;
    font-weight: 400 !important;
}
.rqst-dash-view p {
    padding: 18px;
    font-size: 16px;
    font-weight: 500 !important;
    color: #2c4c90;
}
.col-md-12.emp-rqst-dash {
    border-bottom: 1px solid #eceff5;
    padding: 7px;
}
.color-div-dash {
  height: 14px;
  width: 14px;
  border-radius: 4px;
}
.list-group-horizontal .list-group-item
{
	display: inline-block;
}
.list-group-horizontal .list-group-item
{
	margin-bottom: 0;
	margin-left:-4px;
	margin-right: 0;
 	border-right-width: 0;
}
.list-group-horizontal .list-group-item:first-child
{
	border-top-right-radius:0;
	border-bottom-left-radius:4px;
}
.list-group-horizontal .list-group-item:last-child
{
	border-top-right-radius:4px;
	border-bottom-left-radius:0;
	border-right-width: 1px;
}
.under-card-dash {
    margin-top: 30px;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    <section class="content" style=" min-height: 1px;">
          <div class="row">
              <div class="col-xs-12">
                <div class="box custom-box">
                      <!-- BAR CHART -->
                  <div class="box box-success">
                    <div class="box-header with-border col-md-6" style="border-bottom: 1px solid #ffffff;">
                      <h3 class="box-title">Company Overview</h3>

                    </div>
                    <div class="col-md-6 panel panel-default bootcards-chart" id="bar-chart-head" style="border-color: #fff; box-shadow: 0 1px 1px rgb(255, 255, 255) !important;">
                            <div class="">
                                <ul class="nav nav-pills nav-pills-div">
                                  <li class="active">
                                    <a data-toggle="pill" href="#home010">Monthly</a>
                                  </li>
                                  <li class="">
                                    <a data-toggle="pill" href="#menu020" onclick="">Quaterly</a>
                                  </li>

                                    <li class="">
                                      <a data-toggle="pill" href="#password030">Yearly</a>
                                    </li>
                                </ul>
                                <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-12">
                                        </div>
                                  </div>
                              </div>
                                <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                                  <div id="home010" class="tab-pane fade in active " style="">
                                    <div style="float: right;margin-top: -105px">
                                      <div class="col-md-2 report-mng">
                                          <div class="custom-select">
                                            <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                              <option value="">2018</option>
                                              <option value="">2012</option>
                                              <option value="">2018</option>
                                              <option value="">2016</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-2 report-mng">
                                          <div class="custom-select">
                                            <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                              <option value="">Jan</option>
                                              <option value="">Feb</option>
                                              <option value="">March</option>
                                              <option value="">April</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="menu020" class="tab-pane fade">
                                    <div style="float: right;margin-top: -105px">
                                      <div class="col-md-2 report-mng">
                                          <div class="custom-select">
                                            <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                              <option value="">2018</option>
                                              <option value="">2012</option>
                                              <option value="">2018</option>
                                              <option value="">2016</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="password030" class="tab-pane fade">
                                    <div style="float: right;margin-top: -105px">
                                      <div class="col-md-2 report-mng" style=" width: 136px !important;">
                                          <div class="custom-select">
                                            <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                              <option value="">Past 10 Years</option>
                                              <option value="">Past 10 Years</option>
                                              <option value="">Past 10 Years</option>
                                              <option value="">Past 10 Years</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    </div>
                    <div class="box-body chart-responsive">
                      <div class="chart" id="bar-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body -->
                  </div>


                </div>
              </div>
          </div>
      </section>


    <section class="content card-view-dashboard">
          <div class="row">
              <div class="col-xs-12">
                <div class="box ">
                  <div class="col-md-6" id="myDIV">
                      <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6 col-sm-4 btn active" style="width: 263px ">
                          <a class="bootcards-summary-item" id="profile" href="javascript:void(0)" onclick="comp('#finances')">

                            <h4>Attendance Data</h4><br>
                            <div class="under-card-dash">
                               <h2 style="float: left; margin-top: 39px; text-transform: uppercase; background: linear-gradient(to right, #14a19d 0%, #2c4c90 77%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><?php echo $getperecent; ?>%</h2>
                              <img src="<?php echo base_url(); ?>assets/images/woco_attendance.png" alt="" style="    height: 60px; width: 52px; margin-top: 32px;float: right;">
                            </div>
                          </a>
                        </div>
                        <div class="col-md-6 col-sm-4 btn" style="width: 263px ">
                          <a class="bootcards-summary-item" id="profile" href="javascript:void(0)" onclick="comp('#clients')">
                          <h4>Male-Female </h4><br>
                          <div class="under-card-dash">
                            <h2 style="float: left; text-transform: uppercase; background: linear-gradient(to right, #14a19d 0%, #2c4c90 77%);  margin-top: 39px; -webkit-background-clip: text; -webkit-text-fill-color: transparent;"> <?php echo $male_results; ?>: <?php echo $female_results; ?></h2>
                            <img src="<?php echo base_url(); ?>assets/images/web_malefemale.png" alt="" style="height: 39px;float: right;     margin-top: 32px;">
                          </div>
                          </a>
                        </div>
                        <div class="col-md-6 col-sm-4 btn" style="width: 263px ">
                          <a class="bootcards-summary-item" id="profile" href="javascript:void(0)" onclick="comp('#growths')">

                            <h4>Onsite vs Offsite</h4><br>
                            <div class="under-card-dash">

                              <ul class="list-group list-group-horizontal">
                                <li class="middle" style="float:left;">Onsite</li>
                                <li class="list-group-item emp-middle"><?php echo $onsite;?></li>
                                <li class="middle"  style="float:right;">
                                  <?php if($onsite < $offsite){?>
                                   <img src="<?php echo base_url(); ?>assets/images/web_empdown.png" alt="" style="height: 17px; margin-bottom: 9px; width: 11px;">
                                   <?php } else  { ?>
                                     <img src="<?php echo base_url(); ?>assets/images/web-empstatus.png" alt="" style="height: 17px; margin-bottom: 9px; width: 11px;">
                                     <?php }?>
                                </li>
                              </ul>
                              <ul class="list-group list-group-horizontal">
                                <li class="middle" style="float:left;">Offsite</li>
                                <li class="list-group-item emp-middle"><?php echo $offsite;?></li>
                                <li class="middle"  style="float:right;">
                                  <?php if($offsite < $onsite){?>
                                   <img src="<?php echo base_url(); ?>assets/images/web_empdown.png" alt="" style="height: 17px; margin-bottom: 9px; width: 11px;">
                                   <?php } else  { ?>
                                     <img src="<?php echo base_url(); ?>assets/images/web-empstatus.png" alt="" style="height: 17px; margin-bottom: 9px; width: 11px;">
                                     <?php }?>
                                 </li>
                              </ul>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-6 col-sm-4 btn" style="width: 263px ">
                          <a class="bootcards-summary-item " id="profile" href="javascript:void(0)" onclick="comp('#tasks')">

                            <h4>Happiness Index </h4><br>
                            <div class="under-card-dash">
                              <h2 style="float: left; text-transform: uppercase; background: linear-gradient(to right, #14a19d 0%, #2c4c90 77%);  margin-top: 39px; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">0:0</h2>
                              <img src="<?php echo base_url(); ?>assets/images/web_smile.png" alt="" style="height: 39px;float: right;     margin-top: 32px;">
                            </div>
                          </a>
                        </div>
                        <div class="col-md-6 col-sm-4 btn" style="width: 263px ">
                          <a class="bootcards-summary-item " id="profile" href="javascript:void(0)" onclick="comp('#socialmedia')">

                            <h4>Attrition Rate</h4><br>
                          <div class="under-card-dash">
                            <h2 style="float: left; text-transform: uppercase; background: linear-gradient(to right, #14a19d 0%, #2c4c90 77%);  margin-top: 39px; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">0%</h2>
                            <img src="<?php echo base_url(); ?>assets/images/web_rate.png" alt="" style="height: 39px;float: right;     margin-top: 32px;">
                          </div>
                          </a>
                        </div>
                        <div class="col-md-6 col-sm-4 btn" style="width: 263px ">
                          <a class="bootcards-summary-item " id="profile" href="javascript:void(0)" onclick="comp('#growth')">

                            <h4>Hiring vs Attribition</h4><br>
                             <div class="under-card-dash">
                              <ul class="list-group list-group-horizontal">
                                <li class="middle" style="float:left;">Hiring</li>
                                <li class="list-group-item emp-middle"><?php //echo $fulltime_results; ?></li>
                                <li class="middle"  style="float:right;"><img src="<?php echo base_url(); ?>assets/images/web-empstatus.png" alt="" style="height: 17px; margin-bottom: 9px; width: 11px;"></li>
                              </ul>

                                <ul class="list-group list-group-horizontal">
                                  <li class="middle" style="float:left;">Attrition</li>
                                  <li class="list-group-item emp-middle"><?php //echo $parttime_results; ?></li>
                                  <li class="middle"  style="float:right;"><img src="<?php echo base_url(); ?>assets/images/web_empdown.png" alt="" style="height: 17px;margin-bottom: 9px;width: 11px;"></li>
                                </ul>
                            </div>

                          </a>
                        </div>
                        <div class="col-md-6 col-sm-4 btn" style="width: 263px ">
                          <a class="bootcards-summary-item " id="profile" href="javascript:void(0)" onclick="comp('#files')">

                            <h4>Employee Status </h4><br>
                              <div class="">
                                <?php
                                if(!empty($employeestatus_results))
                                {
                                    foreach($employeestatus_results as $result)
                                    {
                                ?>
                                      <ul class="list-group list-group-horizontal">
                                        <li class="middle" style="float:left;"><?php echo $result->title?></li>
                                        <li class="emp-middle" style="margin-left: 113px;"><?php echo $result->total; ?></li>
                                      </ul>
                                  <?php
                                  }
                                }
                                ?>
                                  <!-- <ul class="list-group list-group-horizontal">
                                    <li class="middle" style="float:left;">Part Time</li>
                                    <li class="emp-middle"  style="margin-left: 113px;"><?php echo $parttime_results; ?></li>
                                  </ul>
                                  <ul class="list-group list-group-horizontal">
                                    <li class="middle" style="float:left;">Intern</li>
                                    <li class="emp-middle"  style="margin-left: 113px;"><?php echo $intern_results; ?></li>
                                  </ul> -->
                              </div>
                          </a>
                        </div>
                      </div>
                      </div>
                   </div>
      <div class="col-md-6" style="background: white;height: auto;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0, 0, 0, 0.1);border-radius: 12px;margin-top: 17px;  height: 568px;">

        <div class="panel panel-default bootcards-chart cards visible visible" id="finances" style=" height: 417px; margin-top: 22px; border-color: #fff;">
          <h3>Attendance Data</h3>
                <div class="">
                    <ul class="nav nav-pills nav-pills-div">
                      <li class="active">
                        <a data-toggle="pill" href="#home01">Monthly</a>
                      </li>
                      <li class="">
                        <a data-toggle="pill" href="#menu02" onclick="">Quaterly</a>
                      </li>

                        <li class="">
                          <a data-toggle="pill" href="#password03">Yearly</a>
                        </li>
                    </ul>
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-12">
                            </div>
                      </div>
                  </div>
                    <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                      <div id="home01" class="tab-pane fade in active " style="">
                        <div style="float: right;margin-top: -105px">
                          <div class="col-md-2 report-mng">
                              <div class="custom-select">
                                <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                  <option value="">2018</option>
                                  <option value="">2012</option>
                                  <option value="">2018</option>
                                  <option value="">2016</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2 report-mng">
                              <div class="custom-select">
                                <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                  <option value="">Jan</option>
                                  <option value="">Feb</option>
                                  <option value="">March</option>
                                  <option value="">April</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="menu02" class="tab-pane fade">
                        <div style="float: right;margin-top: -105px">
                          <div class="col-md-2 report-mng">
                              <div class="custom-select">
                                <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                  <option value="">2018</option>
                                  <option value="">2012</option>
                                  <option value="">2018</option>
                                  <option value="">2016</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="password03" class="tab-pane fade">
                        <div style="float: right;margin-top: -105px">
                          <div class="col-md-2 report-mng" style=" width: 136px !important;">
                              <div class="custom-select">
                                <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                  <option value="">Past 10 Years</option>
                                  <option value="">Past 10 Years</option>
                                  <option value="">Past 10 Years</option>
                                  <option value="">Past 10 Years</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="bootcards-chart-canvas" id="financesChart"></div>
                      <h2 style="float: left; margin-top: 39px; text-transform: uppercase; background: linear-gradient(to right, #14a19d 0%, #2c4c90 77%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><?php echo $getperecent; ?>%</h2>
                    </div>
                </div>

                            <!-- /.box -->

        </div>
        <div class="cards visible hidden" id="clients" style="margin-left: -38px;">
         <div class="">
          <div class="box box-danger">
            <div class="box-header  bootcards-chart datepicker-dash">
              <h3 class="box-title">Male - Female Ratio</h3>
              <div class="col-md-12">
                  <div class="custom-select">
                    <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy" style="float:left;">
                        <input class="form-control" type="text" name="from" style="margin-left: 3px;width: 113%;" />
                        <span class="input-group-addon"  style="background: #eceff5;border: none;border-radius: 30px;" ><i class="fa fa-calendar" style="color: #30388e;"></i></span>
                    </div>
                    <div id="datepickerr" class="input-group date" data-date-format="mm-dd-yyyy" style="float:left;   margin-left: -10px;">
                        <input class="form-control" type="text" name="to" style="margin-left: 3px;width: 113%;" />
                        <span class="input-group-addon"  style="background: #eceff5;border: none;border-radius: 30px;" ><i class="fa fa-calendar" style="color: #30388e;"></i></span>
                    </div>
                    <div class="datepicker-dash-btn" style="">
                        <input type="submit" class="btn btn-primary" value="View " style="">
                    </div>
                </div>
              </div>
              <!-- <div class="col-md-2 datepicker-dash-btn" style="margin-left: -119px; margin-top: -5px;">
                  <input type="submit" class="btn btn-primary" value="View " style="">
              </div> -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
        </div>
        <div class="col-md-12 title-for-maleF">
          <div class="row">
            <h3 style="text-align: center;"><?php echo $user_results; ?></h3><br>
              <p style="text-align: center;margin-top: -25px;">Total Employee</p>
          </div>
        </div>
      </div>
        <div class="cards visible hidden" id="files" style="margin-left: -38px;">
         <div class="">
          <div class="box box-danger">
            <div class="box-header  bootcards-chart datepicker-dash">
              <h3 class="box-title">Employee Status</h3>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="sales-chart1" style="height: 300px; position: relative;"></div>
        </div>
        <div class="col-md-12 title-for-maleF">
          <div class="row">
            <h3 style="text-align: center;"><?php echo $user_results; ?></h3><br>
              <p style="text-align: center;margin-top: -25px;">Total Employee</p>
          </div>
          <center style="margin-left: 31px;"><hr></center>
        </div>
        <div class="col-md-12 title-for-maleF" style="margin-left: 38px;">
          <div class="row">
            <div class="show-colors-emp" style="margin-left: 30px;">
              <?php
              if(!empty($employeestatus_results))
              {
                  foreach($employeestatus_results as $result)
                  {
              ?>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-2 "  style="margin-right: -6%;">
                    <div class="color-div-dash" style="background: #<?php echo $result->color; ?>;">

                    </div>
                  </div>
                  <div class="col-md-10 div-for-show-dash">
                    <h3 style="margin-top: -4px;"><?php echo $result->total; ?></h3><br>
                    <p style="margin-top: -25px;"><?php echo $result->title?></p>
                  </div>

                </div>
              </div>
                <?php
                }
              }
              ?>

            </div>
          </div>
        </div>
      <hr>
    </div>






        <div class=" cards bootcards-chart hidden" id="tasks">
          <h3>Happiness Index</h3>
          <div class="">
              <ul class="nav nav-pills nav-pills-div">
                <li class="active">
                  <a data-toggle="pill" href="#home001">Monthly</a>
                </li>
                <li class="">
                  <a data-toggle="pill" href="#menu002" onclick="">Quaterly</a>
                </li>

                  <li class="">
                    <a data-toggle="pill" href="#password003">Yearly</a>
                  </li>
              </ul>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                      </div>
                </div>
            </div>
              <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                <div id="home001" class="tab-pane fade in active " style="">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Jan</option>
                            <option value="">Feb</option>
                            <option value="">March</option>
                            <option value="">April</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="menu002" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="password003" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng" style=" width: 136px !important;">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
          <div class="bootcards-chart-canvas" id="growCharts"></div>
        </div>



        <div class="cards bootcards-chart cards hidden" id="socialmedia">
          <h3>Attrition Rate</h3>
          <div class="">
              <ul class="nav nav-pills nav-pills-div">
                <li class="active">
                  <a data-toggle="pill" href="#home0001">Monthly</a>
                </li>
                <li class="">
                  <a data-toggle="pill" href="#menu0002" onclick="">Quaterly</a>
                </li>

                  <li class="">
                    <a data-toggle="pill" href="#password0003">Yearly</a>
                  </li>
              </ul>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                      </div>
                </div>
            </div>
              <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                <div id="home0001" class="tab-pane fade in active " style="">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Jan</option>
                            <option value="">Feb</option>
                            <option value="">March</option>
                            <option value="">April</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="menu0002" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="password0003" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng" style=" width: 136px !important;">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
          <div class="bootcards-chart-canvas" id="growthChart"></div>
        </div>



        <div class="panel panel-default bootcards-chart cards visible hidden" id="growth" style=" height: 417px; margin-top: 22px; border-color: #fff;">
          <h3>Hiring vs Attribution</h3>
          <div class="">
              <ul class="nav nav-pills nav-pills-div">
                <li class="active">
                  <a data-toggle="pill" href="#home00001">Monthly</a>
                </li>
                <li class="">
                  <a data-toggle="pill" href="#menu00002" onclick="">Quaterly</a>
                </li>

                  <li class="">
                    <a data-toggle="pill" href="#password00003">Yearly</a>
                  </li>
              </ul>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                      </div>
                </div>
            </div>
              <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                <div id="home00001" class="tab-pane fade in active " style="">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Jan</option>
                            <option value="">Feb</option>
                            <option value="">March</option>
                            <option value="">April</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="menu00002" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="password00003" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng" style=" width: 136px !important;">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
          <div class="bootcards-chart-canvas" id="financessChart"></div>
        </div>



        <div class="panel panel-default bootcards-chart cards visible hidden" id="growths" style=" height: 417px; margin-top: 22px; border-color: #fff;">
          <h3>Onsite vs offsite</h3>
          <div class="">
              <ul class="nav nav-pills nav-pills-div">
                <li class="active">
                  <a data-toggle="pill" href="#home1">Monthly</a>
                </li>
                <li class="">
                  <a data-toggle="pill" href="#menu2" onclick="">Quaterly</a>
                </li>

                  <li class="">
                    <a data-toggle="pill" href="#password3">Yearly</a>
                  </li>
              </ul>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                      </div>
                </div>
            </div>
              <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                <div id="home1" class="tab-pane fade in active " style="">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Jan</option>
                            <option value="">Feb</option>
                            <option value="">March</option>
                            <option value="">April</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">2018</option>
                            <option value="">2012</option>
                            <option value="">2018</option>
                            <option value="">2016</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="password3" class="tab-pane fade">
                  <div style="float: right;margin-top: -105px">
                    <div class="col-md-2 report-mng" style=" width: 136px !important;">
                        <div class="custom-select">
                          <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                            <option value="">Past 10 Years</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
          <div class="bootcards-chart-canvas" id="financesssChart"></div>
        </div>
      </div>
    </div>
  </div>
 </div>
</section>


<section class="content">
          <div class="row">
              <div class="col-xs-6 rqst-dash-title">
                <div class="box custom-box" style="border-radius: 9px;">
                  <div class="row">
                    <div class="head">
                      <h4>Request(4)</h4>
                    </div>
                    <div class="col-md-12 emp-rqst-dash">
                      <div class="col-md-2">
                        <div class="emp-img-rqst">
                          <a title="" href="http://woco.co.in/hr/employee/profile/135" class="twPc-avatarLink" style="padding-top: 0px;">
                                <img alt="User Image" src="http://woco.co.in/uploads/user/1557240685.jpeg" class="twPc-avatarImg">
                           </a>
                        </div>

                      </div>
                      <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-12">
                           <div class="rqst-msg-dash">
                             <p>Hello Your Request will be approved.</p>
                           </div>
                         </div>
                         <br>
                         <div class="col-md-6">
                            <p style="color: #969595;">Date :23 July 2018</p>
                         </div>
                         <div class="col-md-6">
                           <p style="color: #969595;">Leave Type : Full Day</p>
                         </div>
                      </div>
                    </div>
                      <div class="col-md-2">
                        <div class="row">
                          <div class="rqst-dash-view">
                             <a href="javascript:void(0)"> <p>View</p> </a>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12 emp-rqst-dash" >
                      <div class="col-md-2">
                        <div class="emp-img-rqst">
                          <a title="" href="http://woco.co.in/hr/employee/profile/135" class="twPc-avatarLink" style="padding-top: 0px;">
                                <img alt="User Image" src="http://woco.co.in/uploads/user/1557224524.jpg" class="twPc-avatarImg">
                           </a>
                        </div>

                      </div>
                      <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-12">
                           <div class="rqst-msg-dash">
                             <p>Hello Your Request will be approved.</p>
                           </div>
                         </div>
                         <br>
                         <div class="col-md-6">
                            <p style="color: #969595;">Date :23 July 2018</p>
                         </div>
                         <div class="col-md-6">
                           <p style="color: #969595;">Leave Type : Full Day</p>
                         </div>
                      </div>
                    </div>
                      <div class="col-md-2">
                        <div class="row">
                          <div class="rqst-dash-view">
                             <a href="javascript:void(0)"> <p>View</p> </a>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12 emp-rqst-dash">
                      <div class="col-md-2">
                        <div class="emp-img-rqst">
                          <a title="" href="http://woco.co.in/hr/employee/profile/135" class="twPc-avatarLink" style="padding-top: 0px;">
                                <img alt="User Image" src="http://woco.co.in/uploads/user/1560165230.png" class="twPc-avatarImg">
                           </a>
                        </div>

                      </div>
                      <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-12">
                           <div class="rqst-msg-dash">
                             <p>Hello Your Request will be approved.</p>
                           </div>
                         </div>
                         <br>
                         <div class="col-md-6">
                            <p style="color: #969595;">Date :23 July 2018</p>
                         </div>
                         <div class="col-md-6">
                           <p style="color: #969595;">Leave Type : Full Day</p>
                         </div>
                      </div>
                    </div>
                      <div class="col-md-2">
                        <div class="row">
                          <div class="rqst-dash-view">
                             <a href="javascript:void(0)"> <p>View</p> </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-xs-6 rqst-dash-title" >
                <div class="box custom-box" style="border-radius: 9px;">
                  <div class="row">
                    <div class="head">
                      <h4>Birthday Today</h4>
                    </div>
                    <?php if(count($getbirthdaylist) > 0){ ?>
                        <?php foreach($getbirthdaylist as $record):?>
                          <div class="col-md-12 emp-rqst-dash">
                            <div class="col-md-2">
                              <div class="emp-img-rqst">

                                 <a title="" href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>" class="twPc-avatarLink" style="padding-top: 0px;">
                                   <?php if(!empty($record->profile_image)){?>
                                  <img alt="User Image" src="<?php echo base_url(); ?>uploads/user/<?php echo $record->profile_image; ?>" class="twPc-avatarImg">
                                  <?php } else  { ?>
                                        <?php if($record->gender=='Female'){?>
                                       <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/females.png" class="twPc-avatarImg">
                                       <?php } else  { ?>
                                         <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/male.png" class="twPc-avatarImg">
                                          <?php }?>
                                     <?php }?>
                                </a>
                                   </div>

                                 </div>
                                 <div class="col-md-8">
                                   <div class="row">
                                    <div class="col-md-12">
                                      <div class="rqst-msg-dash">
                                        <p><?php echo $record->name ?></p>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                       <p style="color: #969595;"><?php echo $record->emp_id ?></p>
                                    </div>
                                 </div>
                               </div>

                          </div>
                        <?php endforeach;?>
                      <?php }else { ?>
                        <div class="head">
                          <h4>No Data</h4>
                        </div>
                      <?php } ?>

                    <!-- <div class="col-md-12 emp-rqst-dash" >
                      <div class="col-md-2">
                        <div class="emp-img-rqst">
                          <a title="" href="http://woco.co.in/hr/employee/profile/135" class="twPc-avatarLink" style="padding-top: 0px;">
                                <img alt="User Image" src="http://woco.co.in/uploads/user/1557224524.jpg" class="twPc-avatarImg">
                           </a>
                        </div>

                      </div>
                      <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-12">
                           <div class="rqst-msg-dash">
                             <p>Aashu </p>
                           </div>
                         </div>
                         <br>
                         <div class="col-md-6">
                            <p style="color: #969595;">Sr. Softwere Eng</p>
                         </div>
                      </div>
                    </div>
                    </div> -->

                    <!-- <div class="col-md-12 emp-rqst-dash">
                      <div class="col-md-2">
                        <div class="emp-img-rqst">
                          <a title="" href="http://woco.co.in/hr/employee/profile/135" class="twPc-avatarLink" style="padding-top: 0px;">
                                <img alt="User Image" src="http://woco.co.in/uploads/user/1560165230.png" class="twPc-avatarImg">
                           </a>
                        </div>

                      </div>
                      <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-12">
                           <div class="rqst-msg-dash">
                             <p>Dhruv Sharma </p>
                           </div>
                         </div>
                         <br>
                         <div class="col-md-6">
                            <p style="color: #969595;">Sr. Softwere Eng</p>
                         </div>
                      </div>
                    </div>
                    </div> -->

                  </div>
                </div>
              </div>
          </div>
      </section>




    <section class="content">
          <div class="row">
              <div class="col-xs-12">
                <div class="box custom-box">

    <div class="">


        <div class="row">
          <div class="col-md-6">

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Area Chart</h3>


              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="revenue-chart" style="height: 300px;"></div>
              </div>

            </div>


          </div>

          <div class="col-md-6">

            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Line Chart</h3>

              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="line-chart" style="height: 300px;"></div>
              </div>

            </div>
          </div>

        </div>



    </div>

                </div>
              </div>
          </div>
      </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script>

var donutChart;
var donutChart1;
  $(function () {
    "use strict";

    // AREA CHART
    // var area = new Morris.Area({
    //   element: 'revenue-chart',
    //   resize: true,
    //   data: [
    //     {y: '2011 Q1', item1: 2666, item2: 2666},
    //     {y: '2011 Q2', item1: 2778, item2: 2294},
    //     {y: '2011 Q3', item1: 4912, item2: 1969},
    //     {y: '2011 Q4', item1: 3767, item2: 3597},
    //     {y: '2012 Q1', item1: 6810, item2: 1914},
    //     {y: '2012 Q2', item1: 5670, item2: 4293},
    //     {y: '2012 Q3', item1: 4820, item2: 3795},
    //     {y: '2012 Q4', item1: 15073, item2: 5967},
    //     {y: '2013 Q1', item1: 10687, item2: 4460},
    //     {y: '2013 Q2', item1: 8432, item2: 5713}
    //   ],
    //   xkey: 'y',
    //   ykeys: ['item1', 'item2'],
    //   labels: ['Item 1', 'Item 2'],
    //   lineColors: ['#f6745e', '#f6745e'],
    //   hideHover: 'auto'
    // });
    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#2b669d'],
      hideHover: 'auto'
    });

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

    //DONUT CHART
  donutChart = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#fcd3aa", "#f2c6f1"],
      data: [



        {label: "Male", value: <?php echo $male_results; ?>},
        {label: "Female", value: <?php echo $female_results; ?>}
      ],
      hideHover: 'auto'
    });

var colorArr = [];
var dataArr = []
<?php
if(!empty($employeestatus_results))
{
    foreach($employeestatus_results as $result)
    {?>
      colorArr.push('<?php echo "#".$result->color; ?>');
      dataArr.push({label: "<?php echo $result->title?>", value: <?php echo $result->total; ?>});
<?php } } ?>
    //DONUT CHART
  donutChart1 = new Morris.Donut({
      element: 'sales-chart1',
      resize: true,
      colors: colorArr,
      data: dataArr,
      hideHover: 'auto'
    });
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'Attendance Data', a:<?php echo $getperecent; ?>},
        {y: 'Happiness Index', a:0},
        {y: 'Female Ratio', a:<?php echo $female_results; ?>},
        {y: 'Male Ratio', a:<?php echo $male_results; ?>},
        {y: 'Punctuality', a:0}
      ],
      barColors: ['#fcd2ab'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['A'],
      hideHover: 'auto',
      grid:false,
    });
  });
</script>

<script type="text/javascript">
bootcards.init({
offCanvasBackdrop: false,
offCanvasHideOnMainClick: false,
enableTabletPortraitMode: false,
disableRubberBanding: false,
disableBreakoutSelector: 'a.no-break-out'
});

var financeCharts = function() {
$("#financesChart").empty();
Morris.Bar({
  element: 'financesChart',
  data: [{
    year: 2013,
    sales: 1.1
  }, {
    year: 2014,
    sales: 0.9
  }, {
    year: 2015,
    sales: 1.3
  }, {
    year: 2016,
    sales: 0.7
  }],
  xkey: 'year',
  ykeys: ['sales'],
  labels: ['Sales (Mil. $)'],
  hideHover: 'auto'
});
}

var financeChartsss = function() {
$("#financesssChart").empty();
Morris.Bar({
  element: 'financesssChart',
  data: [{
    year: 2013,
    sales: 1.1
  }, {
    year: 2014,
    sales: 0.9
  }, {
    year: 2015,
    sales: 1.3
  }, {
    year: 2016,
    sales: 0.7
  }],
  xkey: 'year',
  ykeys: ['sales'],
  labels: ['Sales (Mil. $)'],
  hideHover: 'auto'
});
}

var financeChartss = function() {
$("#financessChart").empty();
Morris.Bar({
  element: 'financessChart',
  data: [{
    year: 2013,
    sales: 1.1
  }, {
    year: 2014,
    sales: 0.9
  }, {
    year: 2015,
    sales: 1.3
  }, {
    year: 2016,
    sales: 0.7
  }],
  xkey: 'year',
  ykeys: ['sales'],
  labels: ['Sales (Mil. $)'],
  hideHover: 'auto'
});
}


var growthCharts = function() {
$("#growthChart").empty();
Morris.Bar({
  element: 'growthChart',
  data: [{
    year: 2013,
    growth: 5
  }, {
    year: 2014,
    growth: 2
  }, {
    year: 2015,
    growth: 7
  }, {
    year: 2016,
    growth: 11
  }],
  xkey: 'year',
  ykeys: ['growth'],
  labels: ['Percentage (%)'],
  hideHover: 'auto'
});
}
var growthssChart = function() {
$("#growthChart").empty();
Morris.Bar({
  element: 'growthChart',
  data: [{
    year: 2013,
    growth: 5
  }, {
    year: 2014,
    growth: 2
  }, {
    year: 2015,
    growth: 7
  }, {
    year: 2016,
    growth: 11
  }],
  xkey: 'year',
  ykeys: ['growth'],
  labels: ['Percentage (%)'],
  hideHover: 'auto'
});
}
var growCharts = function() {
$("#growCharts").empty();
Morris.Bar({
  element: 'growCharts',
  data: [{
    year: 2013,
    growth: 5
  }, {
    year: 2014,
    growth: 2
  }, {
    year: 2015,
    growth: 7
  }, {
    year: 2016,
    growth: 11
  }],
  xkey: 'year',
  ykeys: ['growth'],
  labels: ['Percentage (%)'],
  hideHover: 'auto'
});
}

$(document).ready(function() {
financeCharts();
financeChartss();
financeChartsss();
growthCharts();
growCharts();

});
$(window).on('resize', function() {
financeCharts();
financeChartss();
financeChartsss();
growthCharts();
growCharts();

});
$(window).on('click', function() {
financeCharts();
financeChartss();
financeChartsss();
growthCharts();
growCharts();

});

function comp(nameid) {
  $('.cards').addClass('hidden');
  $(nameid).removeClass('hidden').addClass('visible');
  if (nameid=='#clients') {
    donutChart.redraw();
  }else  if (nameid == '#files') {
    donutChart1.redraw();
  }
}
</script>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = header.getElementsByClassName("active");
  if (current.length > 0) {
    current[0].className = current[0].className.replace(" active", "");
  }
  this.className += " active";
  });
}
</script>
<script type="text/javascript">
$(function () {
  $("#datepicker").datepicker({
        autoclose: true,

  }).datepicker('update', new Date());
  $('input[name="from"]').val('From');
});

</script>
<script type="text/javascript">
$(function () {
  $("#datepickerr").datepicker({
        autoclose: true,

  }).datepicker('update', new Date());
  $('input[name="to"]').val('To');
});

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}



</script>
<!-- <script type="text/javascript">
function loadAttendance() {
  $('#loader').show();
  var date  = $("#select-checkin-date").val(); //2019-19
  $.ajax({
          type: 'GET',
          url: '<?php echo base_url().'dashboard/'.$userInfo->userId; ?>?date='+date,
          dataType: 'JSON',
          success: function (data) {
            $('#loader').hide();
              if (data.status == true) {
                  $('#ul-all-chekin-list').html(data.data);
              }else {
                swal("Failed!", data.message, "error");
              }
          },
          error: function (data) {
            $('#loader').hide();
              swal("Error", 'An error occurred.', "error");
          },
      });
}
</script> -->
