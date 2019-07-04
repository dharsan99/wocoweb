<?php
$userId = $userInfo->userId;
$name = $userInfo->name;
$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;
$role = $userInfo->role;
?>
<script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/croppie.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/croppie.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<style media="screen">
.custom-form input {
  margin-left:24px !important;
}


.img-crop-img .cabinet{
	display: block;
	cursor: pointer;
}

.img-crop-img .cabinet input.file{
	position: relative;
	height: 100%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
  filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
  margin-top:-30px;
}

.img-img-crop-img #upload-demo{
	width: 250px;
	height: 250px;
  padding-bottom:25px;
}
.img-crop-img figure figcaption {
    position: absolute;
    bottom: 0;
    color: #fff;
    width: 100%;
    padding-left: 9px;
    padding-bottom: 5px;
    text-shadow: 0 0 10px #000;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
    <h1><small>  <a href="<?php echo base_url(); ?>hr/employee" style="color: #807c7c;">Employee Management/</a></small></h1>

      <div class="row">
        <div class="col-xs-6">
            <h3>Employee Profile</h3>
        </div>

        <div class="col-xs-6 text-right">
          <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee"><i class="fa fa-edit frm-icon"></i> Back to Employee View </a>
          <?php if ($permission->edit == 1) { ?>
            <a class="btn btn-primary" href="javascript:editEmployee(<?php echo $userInfo->userId; ?>)"><i class="fa fa-edit frm-icon"></i> Edit Profile </a>
         <?php } ?>

        </div>


      </div>
    </section>


    <section class="content">
      <div class="row">
        <div class="col-xs-5">

    <div class="box custom-box">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-4">
                   <div class="row">
                      <div class="profile-img">
                         <?php if(!empty($userInfo->profile_image)){?>
                        <img alt="User Image" src="<?php echo base_url(); ?>uploads/user/<?php echo $userInfo->profile_image; ?>" onclick="openProfileImage()" class=" profile-logo-img img-responsive " style="width: 150px !important;height: 185px !important;">
                        <?php } else  { ?>
                              <?php if($userInfo->gender=='Female'){?>
                             <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/females.png" class=" profile-logo-img img-responsive " style="width: 150px !important;height: 185px !important;">
                             <?php } else  { ?>
                               <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/male.png" class=" profile-logo-img img-responsive " style="width: 150px !important;height: 185px !important;">
                                <?php }?>
                           <?php }?>
                     </div>
                   </div>
                </div>
                <div class="col-md-8">
                  <div class="twPc-divUser">
                     <div class="twPc-divName profile-info">
                       <h2><?php echo $userInfo->name ?></h2>
                       <div class="details">
                         <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                              <span><i class="fa fa-briefcase emp-icon"></i><a href="#">
                                <?php foreach ($emp_types as $key => $value): ?>
                                  <?php if ($value->id==$userInfo->emp_type): ?>
                                    <?php echo $value->title; ?>
                                  <?php endif; ?>
                                <?php endforeach; ?></p>
                              </a></span>
                             </li>
                          </div>
                          <div class="i-btn">
                             <li class="twPc-ArrangeSizeFit">
                               <span><i class="fa fa-mars emp-icon"></i>
                                 <a href="#"><?php echo $userInfo->gender ?>&nbsp; &nbsp;|&nbsp; &nbsp;<span><i class="fa fa-tint emp-icon"></i></span></a>
                                 <a href="#"><?php echo $userInfo->blood_group ?></a>
                               </span>
                             </li>
                          </div>
                          <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                              <span><i class="fa fa-birthday-cake emp-icon"> </i><a href="#"><?php echo $userInfo->dob ?></a></span>
                            </li>
                          </div>
                          <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                               <span><i class="fa fa-life-ring emp-icon"> </i><a href="#"><?php echo $userInfo->marital_status ?></a></span>
                            </li>
                          </div>
                       </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="document-div " style="border: 0px !important">
                   <h3>Document</h3>
                   <hr class="ç">
              			<ul class="doc-ul">
                      <li class="">
                        <div class="pro-text">
                          <span>
                            <i class="fa fa-file-pdf-o fa-2"></i>
                            <a href="#">employee_aadharcard.png</a>
                          </span>
                            <i class="fa fa-close fa-2 pro-icon"></i>
                        </div>
                      </li>
                      <li class="">
                        <div class="pro-text">
                          <span>
                            <i class="fa fa-file-pdf-o fa-2"></i>
                            <a href="#">employee_aadharcard.png</a>
                          </span>
                          <i class="fa fa-close fa-2 pro-icon"></i>
                        </div>
                      </li>
              			</ul>
                	</div>
              </div>

            </div>

          </div>





          <section class="">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box custom-box">
                        <div class="row">
                          <div class="" style="margin-left: 0px;">
                              <ul class="nav nav-pills nav-pills-div">
                                <li class="active">
                                  <a data-toggle="pill" href="#home">Contact Details</a>
                                </li>
                                <li class="">
                                  <a data-toggle="pill" href="#menu1">Work Details</a>
                                </li>
                                <li class="">
                                  <a data-toggle="pill" href="#menu2">Performance Review</a>
                                </li>
                              </ul>
                              <div class="tab-bottom-line"></div>
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-12">
                                      </div>
                                  </div>
                              </div>
                            <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                              <div id="home" class="tab-pane fade active in" style="">
                                <div class="col-sm-6" style="">
                                    <a href="#">Email</a>
                                        <p><?php echo $userInfo->email ?></p>
                                        <a href="#">Secondary Contact Number</a>
                                        <p><?php echo $userInfo->s_contact_num ?></p>
                                        <a href="#">Address</a>
                                        <p><?php echo $userInfo->address_line_1 ?></p>
                                  </div>
                                <div class="col-sm-6" style="">
                                <a href="#">Primary Contact Number</a>
                                <p><?php echo $userInfo->mobile ?></p>

                                <a href="#">Emergency Contact Number</a>
                                <?php $eContactArr = json_decode($userInfo->emergency_contacts, TRUE); ?>
                                <?php foreach ($eContactArr as $key => $value): ?>
                                  <p><?php echo $value['name']." (".$value['relation'].")<br>".$value['contact']; ?></p>
                                <?php endforeach; ?>

                              </div>

                              </div>


                              <div id="menu1" class="tab-pane fade">
                                <div class="col-sm-6" style="">
                                    <a href="#">Employee Id</a>
                                    <p><?php echo $userInfo->emp_id ?></p>

                                    <a href="#">Department</a>
                                    <p><?php foreach ($departments as $key => $value): ?>
                                      <?php if ($value->id==$userInfo->department_id): ?>
                                        <?php echo $value->title; ?>
                                      <?php endif; ?>
                                    <?php endforeach; ?></p>

                                    <a href="#">Employee Type</a>
                                    <p>
                                      <?php foreach ($emp_types as $key => $value): ?>
                                        <?php if ($value->id==$userInfo->emp_type): ?>
                                          <?php echo $value->title; ?>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>

                                    <a href="#">Official Timing</a>
                                    <p>
                                      <?php foreach ($timings as $key => $value): ?>
                                        <?php if ($value->id==$userInfo->office_timing): ?>
                                          <?php echo $value->title; ?>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>

                                    <a href="#">Package</a>
                                    <p><?php echo $userInfo->annual_pkg ?>
                                    </p>

                                    <a href="#">Office Address</a>
                                    <p>
                                      <?php foreach ($offices as $key => $value): ?>
                                        <?php if ($value->id==$userInfo->office_id): ?>
                                          <?php echo $value->title; ?>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>
                                </div>
                                <div class="col-sm-6" style="">
                                    <a href="#">Manager</a>
                                    <p>yxz</p>

                                    <a href="#">Designation</a>
                                    <p>
                                      <?php foreach ($designations as $key => $value): ?>
                                        <?php if ($value->id==$userInfo->designation): ?>
                                          <?php echo $value->title; ?>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>

                                    <a href="#">Employee Grade</a>
                                    <p>
                                      <?php foreach ($emp_grades as $key => $value): ?>
                                        <?php if ($value->id==$userInfo->emp_grade): ?>
                                          <?php echo $value->title; ?>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>
                                    <a href="#">Team</a>
                                    <p>
                                      <?php foreach ($teams as $key => $value): ?>
                                        <?php if ($value->id==$userInfo->team_id): ?>
                                          <?php echo $value->title; ?>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>

                                    <a href="#">Joining Date</a>
                                    <p><?php echo $userInfo->joining_date ?></p>

                                    <a href="#">Employee Status</a>
                                    <p><?php foreach ($emp_status as $key => $value): ?>
                                      <?php if ($value->id==$userInfo->emp_status): ?>
                                        <?php echo $value->title; ?>
                                      <?php endif; ?>
                                    <?php endforeach; ?></p>
                                </div>
                              </div>

                              <div id="menu2" class="tab-pane fade">
                                <div class="col-sm-6" style="">
                                  <h4>Review</h4>
                                </div>
                                <div class="col-sm-6" style="">

                                </div>
                              </div>



                            </div>
                          </div>

                            </div>
                                        <!-- /.box -->
                        </div>
                      </div>
                  </div>
            </section>

        </div>
        <div class="col-xs-7">

          <div class="box custom-box">
            <div class="row">

              <div class="" style="margin-left: 0px;">
                  <ul class="nav nav-pills nav-pills-div">
                    <li class="active">
                      <a data-toggle="pill" href="#home01">Request</a>
                    </li>
                    <li class="">
                      <a data-toggle="pill" href="#menu02" onclick="loadAttendance();">Attendance</a>
                    </li>
                    <?php if ($permission->edit == 1) { ?>
                      <li class="">
                        <a data-toggle="pill" href="#password03">Reset Password</a>
                      </li>
                    <?php } ?>

                  </ul>
                  <div class="tab-bottom-line"></div>
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                          </div>
                    </div>
                </div>
                  <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
                    <div id="home01" class="tab-pane fade in active " style="">
                      <!-- TAB CONTROLLERS -->
                      <input id="panel-1-ctrl" class="panel-radios" type="radio" name="request-radios" value="1" checked>
                      <label for="panel-1-ctrl">Leaves</label>
                      <input id="panel-2-ctrl" class="panel-radios" type="radio" name="request-radios" value="2">
                      <label for="panel-2-ctrl" style="margin-left: 43px;">Checkin/Checkout Request</label>
                      <!-- THE PANELS -->
                      <article id="panels">
                        <div class="row" style="margin-left: 0px;">
                          <div style="width: 25% !important;margin-top: 20px !important;">
                            <input class="checkin_date" type="month" name="checkin_date" id="select-leave-rq-date" value="<?php echo date('Y-m'); ?>" onchange="loadRequests();" max="<?php echo date('Y-m'); ?>">
                          </div>
                        </div>
                        <div class="container">
                          <section id="panel-1">
                            <main style="margin-left: -114px;" id="panel-leaves-request">
                              <h3 class='text-center'>No Leave Requests</h3>
                            </main>
                          </section>

                          <section id="panel-2">
                            <main style="margin-left: -114px;" id="panel-checkin-request">
                              <h3 class='text-center'>No Check In Requests</h3>
                            </main>
                          </section>
                        </div>
                      </article>
                    </div>
                    <div id="menu02" class="tab-pane fade">
                      <div class="row" style="margin-left: 0px;">
                        <div class="col-sm-3">
                          <input class="checkin_date" type="month" name="checkin_date" id="select-checkin-date" value="<?php echo date('Y-m'); ?>" onchange="loadAttendance();" max="<?php echo date('Y-m'); ?>">
                        </div>
                      </div>
                      <ul class="timeline" style="margin-top:20px;" id="ul-all-chekin-list">

                        <!-- <li class="time-label">
                          <div id="content" style="margin-left: 26px;">
                            <div class="circle blue"></div>
                          </div>

                          <div class="timeline-item">
                            <div class="col-md-2" style="margin-left: -25px;width:23.6%;">
                              <p>Feb 2019<br>Mon</p>
                            </div>
                            <div class="col-md-12" style="width:93%; margin-left:-66px;">
                              <div class="row">
                                <ul class="atndnc">
                                  <div class="stripes">
                                    <li class="location-office">
                                    <div class="absents">
                                      <center style=""><h2 style="margin-top: 0px;">Absents</h2></center>
                                    </div>
                                  </li>
                                  </div>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </li> -->

                      </ul>
                    </div>

                    <?php if ($permission->edit == 1) { ?>
                    <div id="password03" class="tab-pane fade">
                      <div class="col-sm-12" style="">
                        <form role="form" action="http://woco.co.in/changePassword" method="post">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputPassword1">Old Password</label>
                                            <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputPassword1">New Password</label>
                                            <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputPassword2">Confirm New Password</label>
                                            <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="20" required="">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </div>
                        </form>
                      </div>
                    </div>
                    <?php } ?>


                  </div>
              </div>
            </div>
                          <!-- /.box -->
          </div>
        </div>
      </div>
    </section>

    <div class="modal right fade" id="myModal3" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel2">Edit Employee </h4>
            </div>
         <div class="modal-body">
          <h4>Edit Employee Details</h4>
            <!-- form start -->
            <?php $this->load->helper("form"); ?>
            <section>
                <div class="wizard" style="margin-left:50px;">
                  <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Basic Details">
                          <span class="round-tab">
                            <i class="glyphicon glyphicon-ok"></i>
                            <p class="line-text">Basic Details</p>
                          </span>
                        </a>
                      </li>
                      <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Contact Details">
                          <span class="round-tab">
                            <i class="glyphicon glyphicon-ok"></i>
                            <p class="line-text">Contact Details</p>
                          </span>
                        </a>
                      </li>
                      <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Work Details">
                          <span class="round-tab">
                            <i class="glyphicon glyphicon-ok"></i>
                            <p class="line-text">Work Details</p>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </div>

                  <form role="form" enctype="multipart/form-data" action="<?php echo base_url() ?>hr/employee/edit" method="post" class="custom-form" id="admin-edit-form">
                      <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                         <fieldset id="first" style="display: block;">
                            <div class="row">
                              <div class="col-sm-12 form-group form-group1">
                                 <div class="left margin">
                                   <div class="input-group">
                                     <label for="fname">First Name</label>
                                       <input type="text" id="edit_fname" placeholder="" oninvalid="showalert('Pls Fill First Name');"  class="form-control" name="fname" required value="">
                                     </div>
                                   </div>
                                 </div>
                             <div class="col-sm-12 form-group form-group1">
                                <div class="left margin">
                                  <div class="input-group">
                                    <label for="lname">Last Name</label>
                                  <input type="text" id="edit_lname" placeholder="" oninvalid="showalert('Pls Fill Last Name');"  class="form-control" name="lname" required value="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12 form-group form-group1">
                                <div class="left margin">
                                  <div class="input-group">
                                    <label for="gender">Select Gender</label>
                                    <select name="gender" placeholder="" id="edit_gender" name="gender" oninvalid="showalert('Pls Select Gender');" class="itemName form-control gender" value="" required style="">
                                      <option value="">Select Gender </option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                      <option value="Other">Other</option>
                                      <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                    </select>
                                  </div>
                                </div>
                               </div>
                               <div class="col-sm-12 form-group form-group1">
                                <div class="left margin">
                                  <div class="input-group">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" placeholder="" oninvalid="showalert('Pls Fill Date Of Birth');" name="dob" id="edit_dob" min='1899-01-01' max='2010-13-13' required="" class="textinput form-control datepicker" value="" required>
                                    <span><i class="fa fa-calendar" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                  </div>
                                </div>
                              </div>
                          </div>

                            <div class="row">
                               <div class="col-sm-12 form-group form-group1">
                                  <div class="left margin">
                                  <div class="input-group">
                                    <label for="blood_group">Blood Group</label>
                                    <select class="select form-control gender" oninvalid="showalert('Pls Select Blood Group');" name="blood_group" id="edit_blood_group" value="" style="margin-left: 26px; margin-bottom: 3px;">
                                        <option value="">Select One</option>
                                       <option value="A+">A+</option>
                                       <option value="A-">A-</option>-
                                       <option value="B+">B+</option>
                                       <option value="B-">B-</option>
                                       <option value="O+">O+</option>
                                       <option value="O-">O-</option>
                                       <option value="AB+">AB+</option>
                                       <option value="AB-">AB-</option>
                                    </select>
                                  <!-- <input type="text" placeholder=""  class="form-control required" name="blood_group" required="" value="">
                                  <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                </div>
                              </div>
                             </div>
                            <div class="col-sm-12 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="marital_status">Martial Status</label>
                                  <select class="select form-control gender" oninvalid="showalert('Pls Select Martial Status');" name="marital_status" id="edit_marital_status" value="" style="margin-left: 26px; margin-bottom: 3px;">
                                      <option value="">Select One</option>
                                      <option value="Married">Married</option>
                                      <option value="Single">Single</option>
                                      <option value="Divorced">Other</option>
                                    </select>
                                  </div>
                                 </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-12 form-group form-group1">
                                  <div class="left margin">
                                    <div class="input-group">
                                      <label for="company_name">Spouse Name</label>
                                      <input type="text" placeholder=" " oninvalid="showalert('Pls Fill Spouse Name');" id="edit_spouse_name" class="form-control required" name="spouse_name" value="">
                                  </div>
                                </div>
                              </div>
                            </div>

                          </fieldset>
                         <ul class="list-inline text-center">
                            <li>
                              <input type="button" class="btn btn-primary next-step"  value="Submit & Continue" />
                            </li>
                          </ul>
                        </div>

                      <div class="tab-pane" role="tabpanel" id="step2">
                        <fieldset id="second" style="display: block;">
                         <div class="row">
                            <div class="col-sm-12 form-group form-group1">
                             <div class="left margin">
                               <div class="input-group">
                                 <label for="company_name">Email</label>
                                 <input type="email" placeholder="" oninvalid="showalert('Pls Fill Email');" name="email" id="edit_email"  class="form-control required" required="" value="">
                               </div>
                             </div>
                           </div>
                         </div>
                          <div class="row">
                           <div class="col-sm-12 form-group form-group1">
                            <div class="left margin">
                              <div class="input-group">
                                <label for="phone_code">Primary Contact Phone Code</label>
                                <input type="text" placeholder=""   class="form-control required" id="edit_phone_code" name="phone_code" required="" value="" max="3">
                               </div>
                            </div>
                           </div>
                            <div class="col-sm-12 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="mobile">Primary Contact Number</label>
                                  <input type="text" placeholder="" oninvalid="showalert('Pls Fill the Primary Contact Number');"  class="form-control required" id="edit_mobile" name="mobile" required="" value="">
                                </div>
                               </div>
                              </div>
                            </div>
                            <div class="row">
                             <div class="col-sm-12 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="company_name">Secondary Contact Phone Code</label>
                                  <input type="text" placeholder=""   class="form-control required"  id="edit_s_phone_code" name="s_phone_code" value="" max="3">
                                 </div>
                              </div>
                             </div>
                              <div class="col-sm-12 form-group form-group1">
                                <div class="left margin">
                                  <div class="input-group">
                                    <label for="company_name">Secondary Contact Number</label>
                                    <input type="text" placeholder="" oninvalid="showalert('Pls Fill the Secondary Contact Number');" class="form-control required" id="edit_s_contact_num" name="s_contact_num" value="">
                                  </div>
                                 </div>
                                </div>
                              </div>

                         <div class="row">
                           <label for="company_name">Emergency Contacts</label>
                           <div class="col-md-12">
                              <div id="czContainer-edit">
                                  <div id="first">
                                      <div class="recordset">
                                          <div class="fieldRow clearfix">
                                              <div class="col-md-12">
                                                <div id="div_id_stock_1_unit" class="form-group">
                                                    <input type="text" class="textinput form-control " id="edit_emergency_contact_name" value="" name="emergency_contact_name[]" value="" placeholder="Contact Name" required/>
                                                </div>
                                              </div>
                                              <div class="col-md-12">
                                                <div id="div_id_stock_1_unit" class="form-group">
                                                    <input type="number" class="textinput form-control" id="edit_emergency_contact" oninvalid="showalert('Pls Fill the Emergency Contact Number');" value="" name="emergency_contact[]"  value="" placeholder="Contact Number" required/>
                                                </div>
                                              </div>
                                              <div class="col-md-12" style="width:100% !important;">
                                                  <div id="div_id_stock_1_service" class="form-group">
                                                    <div class="controls ">
                                                      <select class="select form-control" oninvalid="showalert('Pls Select Relation');" name="emergency_contact_relation[]" id="edit_emergency_contact_relation" value="" style="margin-bottom: -24px;">
                                                        <option value="">--Select Relation--</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Uncle">Uncle</option>
                                                        <option value="Aunt">Aunt</option>
                                                        <option value="Aunt">Cousin</option>
                                                        <option value="Friend">Friend</option>
                                                        <option value="Other">Other</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                          </div>

                          <div class="row">
                           <div class="col-sm-12 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="company_name">Address Line 1</label>
                                  <input type="text" placeholder="Address Line 1" oninvalid="showalert('Pls Fill Address line 1');" name="address_line_1" id="edit_address_line_1"  class="form-control required" required="" value="">
                                  </div>
                                </div>
                              </div>
                           </div>
                            <div class="row">
                             <div class="col-sm-12 form-group form-group1">
                               <div class="left margin">
                                  <div class="input-group">
                                    <label for="company_name">Address Line 2</label>
                                    <input type="text" placeholder="" name="address_line_2" oninvalid="showalert('Pls Fill Address line 2');"  id="edit_address_line_2" class="form-control required" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                             <div class="col-sm-12 form-group form-group1">
                                <div class="left margin">
                                  <div class="input-group">
                                    <label for="state">State</label>
                                    <div class="autocomplete">
                                      <input id="edit_state" type="text" name="state" oninvalid="showalert('Pls Fill State');"  placeholder="" style="margin-bottom: -9px;">
                                    </div>
                                      <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                    </div>
                                  </div>
                                 </div>
                                 <div class="col-sm-6 form-group form-group1">
                                  <div class="left margin">
                                    <div class="input-group">
                                      <label for="company_name">City</label>
                                      <input type="text" placeholder=""  id="edit_city" class="form-control required" name="city" required="" value=""  oninvalid="showalert('Pls Fill City');">
                                      <!-- <span><i class="fa fa-caret-down" aria-hidden="City" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                    </div>
                                  </div>
                                </div>
                           </div>
                           <div class="row">
                            <div class="col-sm-12 form-group form-group1">
                               <div class="left margin">
                                 <div class="input-group">
                                   <label for="country">Country</label>
                                   <div class="autocomplete">
                                     <input  type="text" id="edit_country" name="country" placeholder="" style="margin-bottom: -9px;" oninvalid="showalert('Pls Fill Country');">
                                   </div>
                                     <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                   </div>
                                 </div>
                                </div>
                                <div class="col-sm-12 form-group form-group1">
                                 <div class="left margin">
                                   <div class="input-group">
                                     <label for="zip">Zip</label>
                                     <input type="text" placeholder=""  class="form-control required"  id="edit_zip" name="zip" required="" value="" oninvalid="showalert('Pls Fill Zip');">
                                     <!-- <span><i class="fa fa-caret-down" aria-hidden="City" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                   </div>
                                 </div>
                               </div>
                          </div>
                        </fieldset>
                        <ul class="list-inline text-center">
                            <li>
                                <input type="button" class="btn btn-default  prev-step" value="Previous" />
                            </li>
                            <li>
                              <input type="button" class="btn btn-primary next-step" value="Submit & Continue" />
                            </li>
                        </ul>
                       </div>

                      <div class="tab-pane" role="tabpanel" id="step3">
                        <fieldset id="third">

                        <div class="row">
                            <div class="col-sm-12 form-group form-group1">
                                <div class="left margin">
                                    <div class="input-group">
                                      <label for="company_name">Employee Id</label>
                                      <input type="text" placeholder=" " id="edit_emp_id"  class="form-control" name="emp_id" required="" value="" oninvalid="showalert('Pls Fill Employee Id');">
                                    </div>
                                  </div>
                                 </div>
                                 <div class="col-sm-12 form-group form-group1">
                                     <div class="left margin">
                                       <div class="input-group">
                                          <label for="company_name">designation</label>
                                          <select class="itemName form-control" style="width:97%;height: 32px;" id="edit_designation" name="designation" value="" required  oninvalid="showalert('Pls Select Designation');">
                                            <option value="">-- Select Designation --</option>
                                              <?php foreach ($designations as $key => $value): ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                         <!-- <input type="text" placeholder=" "  class="form-control required" name="emp_type" required="" value="" >
                                         <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                       </div>
                                     </div>
                                    </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 form-group form-group1">
                                    <div class="left margin">
                                      <div class="input-group">
                                         <label for="emp_type">Employee Type</label>
                                         <select class="itemName form-control" style="width:97%;height: 32px;" id="edit_emp_type" name="emp_type" value="" required oninvalid="showalert('Pls Fill Select Employee type');">
                                           <option value="">-- Select Employee Type --</option>
                                           <?php foreach ($emp_types as $key => $value): ?>
                                             <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                           <?php endforeach; ?>
                                       </select>

                                        <!-- <input type="text" placeholder=" "  class="form-control required" name="emp_type" required="" value="" >
                                        <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                      </div>
                                    </div>
                                   </div>
                                <div class="col-sm-12 form-group form-group1">
                                    <div class="left margin">
                                      <div class="input-group">
                                        <label for="emp_grade" class="select-one">Employee Grade</label>
                                          <select class="itemName form-control" style="width:100%;height: 32px;" id="edit_emp_grade" name="emp_grade" value="" required oninvalid="showalert('Pls Fill Select Employee Grade');">
                                            <option value="">-- Select Employee Grade --</option>
                                            <?php foreach ($emp_grades as $key => $value): ?>
                                              <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- <input type="text" placeholder="Employee Grade"  class="form-control required" name="emp_grade" required="" value=""  >
                                        <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                        </div>
                                      </div>
                                     </div>
                                    </div>
                                <div class="row">
                                  <div class="col-sm-12 form-group form-group1">
                                    <div class="left margin">
                                        <div class="input-group">
                                            <label for="department" class="select-one">Department</label>
                                            <select class="itemName form-control" style="width: 98%; height: 32px;" id="edit_department" name="department" value="" required oninvalid="showalert('Pls Fill Select Department');" >
                                                <option value="">-- Select Employee Department --</option>
                                                <?php foreach ($departments as $key => $value): ?>
                                                  <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                         <!-- <input type="text" placeholder="Department"  class="form-control required" name="department" required="" value="" >
                                        <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                      </div>
                                    </div>
                                   </div>
                                    <div class="col-sm-12 form-group form-group1">
                                        <div class="left margin">
                                            <div class="input-group">
                                              <label for="team_id">Team</label>
                                              <select class="itemName form-control" style="width:98%;height: 32px;" id="edit_team_id" name="team_id" value="" required oninvalid="showalert('Pls Fill Select Team');">
                                                  <option value="">-- Select Team --</option>
                                                  <?php foreach ($teams as $key => $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                                  <?php endforeach; ?>
                                              </select>


                                        <!-- <input type="text" placeholder="Team"  class="form-control required" name="team_id" required="" value="" >
                                        <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12 form-group form-group1">
                                          <div class="left margin">
                                              <div class="input-group">
                                                 <label for="emp_status">Employee Status</label>
                                                 <select class="itemName form-control" style="width:100%;height: 32px;" name="emp_status" id="edit_emp_status" value="" required oninvalid="showalert('Pls Fill Select Employee Status');">
                                                   <option value="">-- Select Employee Status --</option>
                                                   <?php foreach ($emp_status as $key => $value): ?>
                                                     <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                                   <?php endforeach; ?>
                                               </select>


                                                 <!-- <input type="text" placeholder="Employee Status"  class="form-control required" name="emp_status" required="" value="">
                                                 <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                               </div>
                                             </div>
                                            </div>
                                            <div class="col-sm-12 form-group form-group1">
                                              <div class="left margin">
                                                <div class="input-group">
                                                   <label for="office_timing">Official Timing</label>
                                                   <select class="itemName form-control" style="width:100%;height: 32px;"  name="office_timing" id="edit_office_timing" value="" required oninvalid="showalert('Pls Fill Select Official Timing');">
                                                     <option value="">-- Select Official Timing --</option>
                                                     <?php foreach ($timings as $key => $value): ?>
                                                       <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                                     <?php endforeach; ?>
                                                 </select>


                                                   <!-- <input type="text" placeholder="Employee Status"  class="form-control required" name="emp_status" required="" value="">
                                                   <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                                 </div>
                                               </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-sm-12 form-group form-group1">
                                               <div class="left margin">
                                                   <div class="input-group">
                                                     <label for="annual_pkg">Package</label>
                                                    <input type="number" placeholder=""  required name="annual_pkg" id="edit_annual_pkg"  class ="textinput form-control gender" required="" value="" oninvalid="showalert('Pls Fill Package');">
                                                    <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                                </div>
                                              </div>
                                           </div>
                                           <div class="col-sm-12 form-group form-group1">
                                             <div class="left margin">
                                               <div class="input-group">
                                                  <label for="currency">Currency</label>
                                                  <select class="itemName form-control" style="width:100%;height: 32px;" id="edit_currency" name="currency" value="" required oninvalid="showalert('Pls Select Currency');">
                                                    <option value="">-- Select Currency --</option>
                                                    <option value="INR">Indian rupee (INR)</option>
                                                    <option value="USD">United States dollar (USD)</option>
                                                    <option value="GBP">British pound (GBP)</option>
                                                    <option value="EUR">Euro (EUR)</option>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-sm-12 form-group form-group1">
                                              <div class="left margin">
                                                 <div class="input-group">
                                                    <label for="joining_date">Joining Date</label>
                                                    <input type="date" placeholder="" required oninvalid="showalert('Pls  Select Joining Date');"  class="form-control required" size="12" required pattern="\d{1,2}/\d{1,2}/\d{4}" id="edit_joining_date" name="joining_date" required="" value="">
                                                    <span><i class="fa fa-calendar" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                                 </div>
                                               </div>
                                             </div>

                                             <div class="col-sm-12 form-group form-group1">
                                               <div class="left margin">
                                                   <div class="input-group">
                                                       <label for="office" class="select-one">Office</label>
                                                       <select class="itemName form-control" oninvalid="showalert('Pls Select Office');" style="width: 98%; height: 32px;" id="edit_office" name="office" value="" required >
                                                           <option value="">-- Select Office --</option>
                                                             <?php foreach ($offices as $key => $value): ?>
                                                               <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                                             <?php endforeach; ?>
                                                       </select>
                                                    <!-- <input type="text" placeholder="Department"  class="form-control required" name="department" required="" value="" >
                                                   <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                                 </div>
                                               </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="select_pmng_id">Select Primary Manager</label>
                                                  <select id="select_pmng_id" class="itemName form-control" style="width:100%;height: 42px;" name="pmng_id">
                                                    <option value="0">Assign to HR</option>
                                                  </select>
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="select_smng_id">Select Secondry Manager</label>
                                                  <select id="select_smng_id" class="itemName form-control" style="width:100%;height: 42px;" name="smng_id">
                                                    <option value="0">Assign to HR</option>
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-sm-6 form-group form-group1">
                                              <div class="left margin">
                                                <div class="input-group">
                                                   <label for="joining_date">Profile Photo</label>
                                                  <!-- <input type="file" value="Profile Image" placeholder="Profile Image" class="form-control" id="edit_profile_image"  name="profile_image"  accept='image/*' > -->
                                                  <input type="hidden" id="edit_profile_image"  name="profile_image">
                                                  <div class="row img-crop-img">
                                                      <label class="cabinet center-block">
                                                          <figure>
                                                            <img src="<?php echo base_url(); ?>uploads/user/<?php echo $userInfo->profile_image; ?>" class="gambar img-responsive img-thumbnail" id="item-img-output"  style="width: 150px !important;height: 185px !important;"/>
                                                              <figcaption><i class="fa fa-camera"></i></figcaption>
                                                                 </figure>
                                                            <input type="file" class="item-img file center-block" name="file_photo"/>
                                                        </label>
                                                   </div>
                                                <div class="modal fade img-img-crop-img" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                 <h4 class="modal-title" id="myModalLabel"></h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                    <div id="upload-demo" class="center-block"></div>
                                                              </div>
                                                                <div class="modal-footer">
                                                                  <a href="#"  id="cropImageBtn" class="btn btn-primary" style="margin-top: 16px; width: 100px;height: 36px; box-shadow: 0px 8px 14px rgba(7, 77, 145, 0.59);">Crop</a>
                                                                  <a href="#"  class="btn btn-default" data-dismiss="modal" style="margin-top: 16px; width: 100px !important; height: 36px !important; box-shadow: 0px 8px 14px rgba(7, 77, 145, 0.59);">Close</a>

                                                                </div>
                                                            </div>
                                                      </div>
                                                  </div>
                                                </div>
                                               </div>
                                             </div>
                                              <p style="margin-top: 36px;color: #2a4a90;">File Should be jpg, gif or png and that is smaller than 3MB</p>
                                          </div>
                                        </fieldset>
                                        <ul class="list-inline text-center">
                                          <li>
                                            <input type="button" class="btn btn-default  prev-step" value="Previous" />
                                          </li>
                                          <li>
                                            <input type="submit" class="btn btn-primary next-step" value="Submit & Continue" />
                                          </li>
                                        </ul>
                       </div>
                    <div class="clearfix"></div>
                  </div>
                </form>
               </div>
            </section>
      </div>
       </div><!-- modal-content -->
      </div><!-- modal-dialog -->
     </div><!-- modal -->

     <div class="modal fade popup-form" id="modal-leave-approve" role="dialog">
       <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
           <div class="">
             <button type="button" class="close" data-dismiss="modal"></button>
              <h4 class="modal-title" style="text-align: center; padding-top: 35px;">Approve Leave Request ?</h4>
           </div>
           <div class="modal-body">
             <textarea></textarea>
           </div>
           <div class="modal-footer">
             <input type="submit" class="btn btn-primary" value="Approve" style="width:134px !important; height: 38px !important;" data-toggle="modal" data-target="#myModal">
              <input type="reset"  data-dismiss="modal" class="btn btn-default rqst-btn-rst" onclick="resetform()" value="Cancel">

           </div>
         </div>

       </div>
     </div>
</div>


<!-- Modal -->
<div class="modal fade" id="profile-image-model" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile Image</h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url(); ?>uploads/user/<?php echo $userInfo->profile_image; ?>" alt="<?php echo $userInfo->name; ?>" width="100%">
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>


<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script type="text/javascript" language="javascript" >


var managerId = "";
  $('#select_pmng_id').select2({
         placeholder: '--- Select Primary Manager ---',
         ajax: {
           url: '<?php echo base_url('hr/employee/p-manager-search/'.$userId); ?>',
           dataType: 'json',
           delay: 250,
           processResults: function (data) {
             $("#select_smng_id option[value='']").attr('selected', true);
             $('#select_smng_id').val(null).trigger("change");

             return {
               results: data
             };
           },
           cache: true
         }
       }).on('change', function(e) {
          var data = $("#select_pmng_id option:selected").val();
          managerId = data;
        });

function getURL() {
  managerId = (managerId==''?'0':managerId);
  return '<?php echo base_url('hr/employee/s-manager-search'); ?>/'+managerId+"/<?php echo $userId; ?>";
}

 $('#select_smng_id').select2({
        placeholder: '--- Select Secondry Manager ---',
        ajax: {
          url: function() {
                return getURL()
            },
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });


function openProfileImage() {
  $('#profile-image-model').modal('show');
}

    $('.search-input-text').on( 'keyup click change', function () {   // for text boxes
        var i =$(this).attr('data-column');  // getting column index
        var v =$(this).val();  // getting search input value
      //  dataTable.columns(i).search(v).draw();
    } );
    $('.search-input-select').on( 'change', function () {   // for select box
        var i =$(this).attr('data-column');
        var v =$(this).val();
      //  dataTable.columns(i).search(v).draw();
    } );

    $("#admin-form").submit(function(e) {
        var frm = $(this);
        e.preventDefault();
        $('#loader').show();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                if (data.status == 1) {
                  $("#admin-form").trigger("reset");
                  $('#myModal2').modal('hide');
                  //dataTable.ajax.reload();
                  swal("Success", data.message, "success");
                }else {
                  swal("Failed!", data.message, "error");
                }
            },
            error: function (data) {
              $('#loader').hide();
                swal("Error", data.message, "error");
            },
        });
    });

    $("#admin-edit-form").submit(function(e) {
        var frm = $(this);
        e.preventDefault();
        $('#loader').show();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                if (data.status == 1) {
                  $("#admin-edit-form").trigger("reset");
                  $('#myModal3').modal('hide');
                  //dataTable.ajax.reload();
                  location.reload();
                  swal("Success", data.message, "success");
                }else {
                  swal("Failed!", data.message, "error");
                }
            },
            error: function (data) {
              $('#loader').hide();
                swal("Error", data.message, "error");
            },
        });
    });
</script>


<script>

    function blockEmployee(id) {
      swal({
        title: "Are you sure?",
        text: "Employee will be blocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'hr/employee/block/'; ?>'+id,
              dataType: 'JSON',
              success: function (data) {
                $('#loader').hide();
                  if (data.status == true) {
                    swal(data.message, {
                      icon: "success",
                    }).then((value) => {
                      location.reload();
                      });
                  }
                  else {
                    swal("Failed!", data.message, "error");
                  }
              },
              error: function (data) {
                $('#loader').hide();
                  swal("Error", 'An error occurred.', "error");
              },
          });

        } else {
          swal("Process cancelled");
        }
      });
    }

    function unblockEmployee(id) {
          swal({
        title: "Are you sure?",
        text: "Employee will be unblocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'hr/employee/unblock/'; ?>'+id,
                  dataType: 'JSON',
                  success: function (data) {
                    $('#loader').hide();
                      if (data.status == true) {
                        swal(data.message, {
                          icon: "success",
                        }).then((value) => {
                          location.reload();
                          });
                      }
                      else {
                        swal("Failed!", data.message, "error");
                      }
                  },
                  error: function (data) {
                    $('#loader').hide();
                      swal("Error", 'An error occurred.', "error");
                  },
              });

        } else {
          swal("Process cancelled");
        }
      });
    }

    function editEmployee(id) {
        $('#loader').show();
        $.ajax({
                type: 'GET',
                url: '<?php echo base_url().'hr/employee/edit/'; ?>'+id,
                dataType: 'JSON',
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 1) {

                      var adminData = data.data[0];
                      $('#admin-edit-form').attr('action','<?php echo base_url().'hr/employee/edit/'; ?>'+id);
                      $('#edit_fname').val(adminData.fname);
                      $('#edit_lname').val(adminData.lname);
                      $('#edit_gender').val(adminData.gender);
                      $('#edit_blood_group').val(adminData.blood_group);
                      $('#edit_marital_status').val(adminData.marital_status);
                      $('#edit_dob').val(adminData.dob);
                      $('#edit_spouse_name').val(adminData.spouse_name);
                      $('#edit_email').val(adminData.email);
                      $('#edit_phone_code').val(adminData.phone_code);
                      $('#edit_mobile').val(adminData.mobile);
                      $('#edit_s_phone_code').val(adminData.s_phone_code);
                      $('#edit_s_contact_num').val(adminData.s_contact_num);
                      // $('#edit_emgContacts').val(adminData.emergency_contact_name);
                      // $('#edit_emergency_contact').val(adminData.emergency_contact);
                      // $('#edit_emergency_contact_relation').val(adminData.emergency_contact_relation);
                      $('#edit_address_line_1').val(adminData.address_line_1);
                      $('#edit_address_line_2').val(adminData.address_line_2);
                      $('#edit_state').val(adminData.state);
                      $('#edit_city').val(adminData.city);
                      $('#edit_country').val(adminData.country);
                      $('#edit_zip').val(adminData.zip);
                      $('#edit_emp_id').val(adminData.emp_id);
                      // $('#edit_designation').val(adminData.designation);
                      $('#edit_designation option[value='+adminData.designation+']').attr('selected','selected');
                      // $('#edit_emp_type').val(adminData.emp_type);
                      $('#edit_emp_type option[value='+adminData.emp_type+']').attr('selected','selected');
                      $('#edit_emp_grade').val(adminData.emp_grade);
                      // $('#edit_department').val(adminData.department);
                      $('#edit_department option[value='+adminData.department_id+']').attr('selected','selected');
                      $('#edit_team_id').val(adminData.team_id);
                      $('#edit_emp_status').val(adminData.emp_status);

                      $('#item-img-output').attr('src', '<?php echo base_url(); ?>uploads/user/'+adminData.profile_image);
                      $('#edit_office_timing').val(adminData.office_timing);
                      $('#edit_annual_pkg').val(adminData.annual_pkg);
                      $('#edit_currency').val(adminData.currency);
                      $('#edit_joining_date').val(adminData.joining_date);
                      $('#edit_office').val(adminData.office_id);
                      $('#myModal3').modal('toggle');
                      $('#czContainer-edit').html("");

                      if (data.data.manager_details != null) {
                        managerId = data.data.manager_details.userId;
                        $('#select_pmng_id').html('<option value="0">Assign to HR</option>'+"\n<option value="+data.data.manager_details.userId + " selected >"+ data.data.manager_details.name+"("+data.data.manager_details.email + ")</option>");
                      }else {
                        $('#select_pmng_id').html('<option value="0">Assign to HR</option>');
                      }

                      if (data.data.s_manager_details != null) {
                        $('#select_smng_id').html('<option value="0">Select NaN</option>'+"<option value="+data.data.s_manager_details.userId + " selected >"+ data.data.s_manager_details.name+"("+data.data.s_manager_details.email + ")</option>");
                      }else {
                        $('#select_smng_id').html('<option value="0">Select NaN</option>');
                      }

                      $('#czContainer-edit_czMore_txtCount').val('0');
                      var devices = jQuery.parseJSON( adminData.emergency_contacts );
                      for(var i = 1; i <= devices.length; i++){
                        var tempStr = '<div class="recordset">';
                                        tempStr += '<div id="btnMinus" class="btnMinus" onclick="removeSelf(this)"></div><div class="fieldRow clearfix">';
                                            tempStr += '<div class="col-md-12">';
                                              tempStr += '<div id="div_id_stock_1_unit" class="form-group">';
                                                tempStr += '<input type="text" class="textinput form-control " id="emergency_contact_name" value="'+devices[i-1].name+'" name="emergency_contact_name[]"  placeholder="Contact Name" required/>';
                                              tempStr += '</div>';
                                            tempStr += '</div>';
                                          tempStr +='<div class="col-md-12">';
                                             tempStr +='<div id="div_id_stock_1_unit" class="form-group">';
                                               tempStr += '<input type="number" class="textinput form-control" id="emergency_contact" value="'+devices[i-1].contact+'" name="emergency_contact[]"  placeholder="Contact Number" style="margin-left:1px !important;" required/>';
                                             tempStr +='</div>';
                                         tempStr +='</div>';
                                        tempStr +='<div class="col-md-12" style="width:100% !important;">';
                                          tempStr +='<div id="div_id_stock_'+i+'_service" class="form-group">';
                                           tempStr +='<div class="controls ">';
                                             tempStr +='<select class="select form-control" name="emergency_contact_relation[]" id="emergency_contact_relation"  style="margin-bottom: -24px; margin-left:1px !important;">';
                                                tempStr +='<option value="">--Select Relation--</option>';
                                                tempStr +='<option value="Father" ' + (devices[i-1].relation == 'Father'? "selected":"") + '>Father</option>';
                                                tempStr +='<option value="Mother" ' + (devices[i-1].relation == 'Mother'? "selected":"") + '>Mother</option>';
                                                tempStr +='<option value="Brother" ' + (devices[i-1].relation == 'Brother'? "selected":"") + '>Brother</option>';
                                                tempStr +='<option value="Sister" ' + (devices[i-1].relation == 'Sister'? "selected":"") + '>Sister</option>';
                                                tempStr +='<option value="Son" ' + (devices[i-1].relation == 'Son'? "selected":"") + '>Son</option>';
                                                tempStr += '<option value="Daughter" ' + (devices[i-1].relation == 'Daughter'? "selected":"") + '>Daughter</option>';
                                                tempStr += '<option value="Uncle" ' + (devices[i-1].relation == 'Uncle'? "selected":"") + '>Uncle</option>';
                                                tempStr += '<option value="Aunt" ' + (devices[i-1].relation == 'Aunt'? "selected":"") + '>Aunt</option>';
                                                tempStr += ' <option value="Cousin" ' + (devices[i-1].relation == 'Cousin'? "selected":"") + '>Cousin</option>';
                                                tempStr += '<option value="Friend" ' + (devices[i-1].relation == 'Friend'? "selected":"") + '>Friend</option>';
                                                tempStr += '<option value="Colleague" ' + (devices[i-1].relation == 'Colleague'? "selected":"") + '>Colleague</option>';
                                                tempStr += '<option value="Other" ' + (devices[i-1].relation == 'Other'? "selected":"") + '>Other</option>';
                                            tempStr +=  '</select>';
                                          tempStr +=  '</div>';
                                        tempStr +=  '</div>';
                                      tempStr +='</div>';
                                    tempStr += '</div>';
                                tempStr += '</div>';
                        $('#czContainer-edit').append(tempStr);
                        $('#czContainer-edit_czMore_txtCount').val(i);
                      }


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

    function removeSelf(obj) {
      $(obj).parent().remove();
      $('#czContainer-edit_czMore_txtCount').val($('#czContainer-edit_czMore_txtCount').val()-1);
    }

    function deleteEmployee(id) {
        swal({
            title: "Are you sure?",
            text: "Data will be deleted.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $('#loader').show();
              $.ajax({
                      type: 'GET',
                      url: '<?php echo base_url().'hr/employee/delete/'; ?>'+id,
                      dataType: 'JSON',
                      success: function (data) {
                        $('#loader').hide();
                          if (data.status == true) {
                            swal(data.message, {
                              icon: "success",
                            }).then((value) => {
                              location.reload();
                              });
                          }
                          else {
                            swal("Failed!", data.message, "error");
                          }
                      },
                      error: function (data) {
                        $('#loader').hide();
                          swal("Error", 'An error occurred.', "error");
                      },
                  });

            } else {
              swal("Process cancelled");
            }
          });
    }

    $(document).ready(function () {
      //Initialize tooltips
      $('.nav-tabs > li a[title]').tooltip();

      //Wizard
      $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
          var $target = $(e.target);
          if ($target.parent().hasClass('disabled')) {
              return false;
          }
      });

      $(".next-step").click(function (e) {
          var $active = $('.wizard .nav-tabs li.active');
          $active.next().removeClass('disabled');
          nextTab($active);

      });
      $(".prev-step").click(function (e) {
          var $active = $('.wizard .nav-tabs li.active');
          prevTab($active);

      });
    });

    function nextTab(elem) {
      console.log(elem);
      $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
      $(elem).prev().find('a[data-toggle="tab"]').click();
    }

    $(document).ready(function(){
        $("#btnPlus").trigger('click');
    });
    function showalert(message) {
            swal("Error", message, "error");
    }

    $(document).ready(function(){
      loadRequests()
    });

    function loadRequests() {
      $('#loader').show();
      var type = $("input:radio[name ='request-radios']:checked").val();
      var date = $("#select-leave-rq-date").val(); //2019-19
      $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'hr/employee/requests/'.$userInfo->userId; ?>?date='+date+'&type='+type,
              dataType: 'JSON',
              success: function (data) {
                $('#loader').hide();
                  if (data.status == true) {
                      if (type == 1) {
                        parseLeaveRequest(data.data);
                      }else if (type == 2){
                        parseCheckInRequest(data.data);
                      }
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

    $("input[type=radio][name='request-radios']").change(function() {
        loadRequests();
    });

    function parseLeaveRequest(data) {
      $('#panel-leaves-request').html("");
      var tempStr = "";
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      $.each(data, function (index, item) {
          var requestDate = new Date(item.rq_datetime*1);
          tempStr = '<ul class="atndnc" style="margin-top: -31px;">'+
          '  <div class="box custom-box rqst-box" style="height: auto;width: 100%; background: none !important;">'+
          '    <li>'+
          '       <div class="cldr-div">'+
          '         <h1 style="float: left;margin-left: 22px;margin-top: 10px;">'+requestDate.getDate()+' </h1><h1 style="font-size: 16px;margin-left: 52px !important;margin-top: 13px;color: #ffffffb8;"> |  '+months[requestDate.getMonth()].toUpperCase()+' '+requestDate.getFullYear()+'</h1>'+
          '         <ul>'+
          '         <li style="background-color: #ffffff6e;width: 68%;margin-left: 24px;height: 24px;border-radius: 5px;">'+
          '           <h1 style="FONT-SIZE: 18px;margin-top: 18px;margin-left: 24px; color: #ffffffa3;">2 Days</h1>'+
          '         </li>'+
          '          </ul>'+
          '       </div>'+
          '    </li>'+
          ''+
          '       <!-- <li class="rqst-list" ><a href="#home" style="padding: 16px;">Type</a></li>'+
          '       <li  class="rqst-list" ><a href="#news" style="padding: 16px;">Category</a></li>'+
          '       <li class="rqst-list" ><a href="#contact" style="padding: 16px;">Applied On</a></li>'+
          '       <li class="rqst-list" ><a href="#about" style="padding: 16px;">Status</a></li> -->'+
          '   <table class="rqst-tble">'+
          '     <thead>'+
          '       <tr>'+
          '         <th scope="col">Type</th>'+
          '         <th scope="col">Category</th>'+
          '         <th scope="col">Applied On</th>'+
          '         <th scope="col">Status</th>'+
          '       </tr>'+
          '     </thead>'+
          '     <tbody>'+
          '       <tr>'+
          '         <td data-label="Type">Half Day (Second Half)</td>'+
          '         <td data-label="Category">EL</td>'+
          '         <td data-label="Applied On">04/01/2016</td>'+
          '         <td data-label="Status">Panding</td>'+
          '       </tr>'+
          '     </tbody>'+
          '   </table>'+
          '   <table class="rqst-tble" style="margin-top: -6px;">'+
          '       <thead>'+
          '         <tr>'+
          '           <th scope="col">Comment</th>'+
          '         </tr>'+
          '       </thead>'+
          '       <tbody>'+
          '         <tr>'+
          '           <td data-label="Type" style=" padding-top: 0px !important;">Half Day econd Half Half Day econd Half)</td>'+
          '         </tr>'+
          '       </tbody>'+
          '     </table>'+
          '     <div class="box-footer" style="/* text-align:center; */float: right; margin-top: -35px;">'+
          '         <input type="submit" data-toggle="modal" data-target="#modal-leave-approve" class="btn btn-primary" value="Accept" style="width:134px !important; height: 38px !important;">'+
          '         <input type="reset" class="btn btn-default rqst-btn-rst" onclick="resetform()" value="Reject" style="width:134px !important;">'+
          '     </div>'+
          '  </div>'+
          '</ul>'+
          '<hr style="margin-top: 3pc;margin-left: 79px; margin-bottom: 35px;">';
          $('#panel-leaves-request').append(tempStr);
      });
      if (tempStr == "") {
        $('#panel-leaves-request').html("<h3 class='text-center'>No Leave Requests</h3>");
      }


    }

    function parseCheckInRequest(data) {
      $('#panel-checkin-request').html("");
      var tempStr = "";
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      $.each(data, function (index, item) {
        var checkinDate = new Date(item.checkin_timestamp*1);
        tempStr =  '<ul class="atndnc" style="margin-top: -31px;">'  +
                    '    <div class="box custom-box rqst-box" style="height: auto;width: 100%; background: none !important;">'+
                    '      <li>'+
                    '        <div class="cldr-div" style="height: 47px; margin-top: 22px;">'+
                    '          <h1 style="float: left;margin-left: 22px;margin-top: 10px;">'+checkinDate.getDate()+' </h1><h1 style="font-size: 16px;margin-left: 52px !important;margin-top: 13px;color: #ffffffb8;"> |  '+months[checkinDate.getMonth()].toUpperCase()+' '+checkinDate.getFullYear()+'</h1>'+
                    '        </div>'+
                    '      </li>'+
                    '     <table class="rqst-tble" style="margin-top: -6px;">'+
                    '       <thead>'+
                    '         <tr>'+
                    '           <th scope="col">Checkin Time</th>'+
                    '           <th scope="col">Location</th>'+
                    '           <th scope="col">Status</th>'+
                    '         </tr>'+
                    '       </thead>'+
                    '       <tbody>'+
                    '         <tr>'+
                    '           <td data-label="Type">' + ("0" + (checkinDate.getHours()%12)).substr(-2) + ':' + ("0" + checkinDate.getMinutes()).substr(-2) + ':' + ("0" + checkinDate.getSeconds()).substr(-2) + ' ' + ((checkinDate.getHours()/12) > 0 ? "PM":"AM") + '</td>'+
                    '           <td data-label="Category">'+item.location+'</td>'+
                    '           <td data-label="Category">'+(item.rq_status == 1? "Pending":(item.rq_status == 2? "Approved":"Rejected"))+'</td>'+
                    '         </tr>'+
                    '       </tbody>'+
                    '     </table>'+
                    '     <table class="rqst-tble">'+
                    '         <thead>'+
                    '           <tr>'+
                    '             <th scope="col">Comment</th>'+
                    '           </tr>'+
                    '         </thead>'+
                    '         <tbody>'+
                    '           <tr>'+
                    '             <td data-label="Type" style=" padding-top: 0px !important;">'+item.checkin_comment+'</td>'+
                    '           </tr>'+
                    '         </tbody>'+
                    '       </table>'+
                    '       <div class="box-footer" style="/* text-align:center; */float: right; margin-top: -35px;">';
                    if (item.rq_status == 2) {
                      tempStr +=  '<input type="reset" class="btn btn-default rqst-btn-rst" onclick="showModalRejectCheckIn('+item.rq_id+');" value="Reject" style="width:134px !important;">';
                    }else if (item.rq_status == 3) {
                      tempStr +=  '<input type="submit" onclick="showModalApproveCheckIn('+item.rq_id+');" class="btn btn-primary" value="Approve" style="width:134px !important; height: 38px !important;">';
                    }else {
                      tempStr +=  '<input type="submit" onclick="showModalApproveCheckIn('+item.rq_id+');" class="btn btn-primary" value="Approve" style="width:134px !important; height: 38px !important;">';
                      tempStr +=  '<input type="reset" class="btn btn-default rqst-btn-rst" onclick="showModalRejectCheckIn('+item.rq_id+');" value="Reject" style="width:134px !important;">';
                    }

                    tempStr +=  '</div>'+
                    '    </div>'+
                    '  </ul>'+
                    '<hr style="margin-top: 3pc;margin-left: 79px; margin-bottom: 35px;">';
        $('#panel-checkin-request').append(tempStr);
      });
      if (tempStr == "") {
        $('#panel-checkin-request').html("<h3 class='text-center'>No Check In Requests</h3>");
      }
    }

    function showModalApproveCheckIn(rqId) {
      swal({
        title: "Are you sure?",
        text: "Request will be approved.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'hr/employee/attendance-approve/'. $userId; ?>?type=2&reqId='+rqId,
              dataType: 'JSON',
              success: function (data) {
                $('#loader').hide();
                  if (data.status == true) {
                    swal(data.message, {
                      icon: "success",
                    }).then((value) => {
                      loadRequests();
                      });
                  }
                  else {
                    swal("Failed!", data.message, "error");
                  }
              },
              error: function (data) {
                $('#loader').hide();
                  swal("Error", 'An error occurred.', "error");
              },
          });

        } else {
          swal("Process cancelled");
        }
      });
    }


    function showModalRejectCheckIn(rqId) {
      swal({
        title: "Are you sure?",
        text: "Request will be rejected.",
        content: { element: "input", attributes: { placeholder: "Write comment..." } },
        buttons: { cancel: true, confirm: { value: true,closeModal: false }, },
        closeOnClickOutside: false,
        closeOnEsc: false,
        allowOutsideClick: false,
      }).then((inputValue) => {
        if (inputValue == null) return false;
        if (inputValue === "") {
          swal("You need to write some comment...", {
            icon: "info",
          }).then((value) => {
            showModalRejectCheckIn(rqId);
            });
            return false;
        }
        $('#loader').show();
        $.ajax({
            type: 'POST',
            data: {type:2, reqId:rqId, comment:inputValue},
            url: '<?php echo base_url().'hr/employee/attendance-reject/'. $userId; ?>',
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                if (data.status == true) {
                  swal(data.message, {
                    icon: "success",
                  }).then((value) => {
                    loadRequests();
                    });
                }
                else {
                  swal("Failed!", data.message, "error");
                }
            },
            error: function (data) {
              $('#loader').hide();
                swal("Error", 'An error occurred.', "error");
            },
        });
      });
    }


    function loadAttendance() {
      $('#loader').show();
      var date  = $("#select-checkin-date").val(); //2019-19
      $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'hr/employee/attendance/'.$userInfo->userId; ?>?date='+date,
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

</script>
<script type="text/javascript">
// Start upload preview image
$(".gambar");
          var $uploadCrop,
          tempFilename,
          rawImg,
          imageId;
          function readFile(input) {
            if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#cropImagePop').modal('show');
                      rawImg = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else {
                  swal("Sorry - you're browser doesn't support the FileReader API");
              }
          }

          $uploadCrop = $('#upload-demo').croppie({
            viewport: {
              width: 150,
              height: 185,
            },
            enforceBoundary: false,
            enableExif: true
          });
          $('#cropImagePop').on('shown.bs.modal', function(){
            // alert('Shown pop');
            $uploadCrop.croppie('bind', {
                  url: rawImg
                }).then(function(){
                  console.log('jQuery bind complete');
                });
          });

          $('.item-img').on('change', function () {
						 imageId = $(this).data('id');
						 tempFilename = $(this).val();
          $('#cancelCropBtn').data('id', imageId); readFile(this); });
          $('#cropImageBtn').on('click', function (ev) {
            $uploadCrop.croppie('result', {
              type: 'base64',
              format: 'jpeg',
              size: {width: 150, height: 185}
            }).then(function (resp) {
							 console.log(resp);
							$('#edit_profile_image').val(resp);
              $('#item-img-output').attr('src', resp);
              $('#cropImagePop').modal('hide');
            });
          });
      // End upload preview image
</script>
