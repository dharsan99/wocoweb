<?php
$userId = $userInfo->userId;
$name = $userInfo->name;
$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;
$role = $userInfo->role;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1><small>My Profile/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>My Profile</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="javascript:editEmployee(<?php echo $userInfo->userId; ?>)"><i class="fa fa-edit frm-icon"></i> Edit Profile </a>
          </div>
      </div>
    </section>


    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box custom-box">
            <div class="row">
              <div class="col-md-7">
                <div class="col-md-3">
                   <div class="row">
                     <div class="profile-img">
                        <?php if(!empty($userInfo->profile_image)){?>
                       <img alt="User Image" src="<?php echo base_url(); ?>uploads/user/<?php echo $userInfo->profile_image; ?>" class=" profile-logo-img img-responsive ">
                       <?php } else  { ?>
                             <?php if($userInfo->gender=='Female'){?>
                            <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/avatar2.jpg" class=" profile-logo-img img-responsive ">
                            <?php } else  { ?>
                              <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class=" profile-logo-img img-responsive ">
                               <?php }?>
                          <?php }?>
                    </div>
                   </div>
                </div>
                <div class="col-md-9">
                  <div class="twPc-divUser">
                     <div class="twPc-divName profile-info">
                       <h2><?php echo $userInfo->name ?></h2>
                       <div class="details">
                         <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                              <span><i class="fa fa-briefcase emp-icon"></i><a href="#">
                                <?php echo $role_text; ?>
                              </a></span>
                             </li>
                          </div>
                          <div class="i-btn">
                             <li class="twPc-ArrangeSizeFit">
                               <span><i class="fa fa-mars emp-icon"></i><a href="#"><?php echo $userInfo->gender ?>&nbsp; &nbsp;<span><i class="fa fa-tint emp-icon"></i></span></a><a href="#"><?php echo $userInfo->blood_group ?></a></span>
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

              <div class="col-md-5">
                <div class="document-div ">
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
        </div>
      </div>
    </section>





<section class="content">
  <div class="row">
      <div class="col-xs-12">
        <div class="box custom-box">
            <div class="row">

              <div class="" style="margin-left: 0px;">

            <ul class="nav nav-pills nav-pills-div">

              <li class="active">
                <a data-toggle="pill" href="#home">Contact Details</a>
              </li>
              <li>
                <a data-toggle="pill" href="#menu1">Work Details</a>
              </li>

              <li>
                <a data-toggle="pill" href="#password">Change Password</a>
              </li>
            </ul>
              <div class="tab-bottom-line"></div>



              <div class="col-md-12">
                  <?php
                      $this->load->helper('form');
                      $error = $this->session->flashdata('error');
                      if($error)
                      {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $this->session->flashdata('error'); ?>
                  </div>
                  <?php } ?>
                  <?php
                      $success = $this->session->flashdata('success');
                      if($success)
                      {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $this->session->flashdata('success'); ?>
                  </div>
                  <?php } ?>

                  <?php
                      $noMatch = $this->session->flashdata('nomatch');
                      if($noMatch)
                      {
                  ?>
                  <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $this->session->flashdata('nomatch'); ?>
                  </div>
                  <?php } ?>

                  <div class="row">
                      <div class="col-md-12">
                          <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                      </div>
                  </div>
              </div>

            <div class="tab-content divpill" style="margin-top: 50px; margin-left: 20px; ">
              <div id="home" class="tab-pane fade in active " style="">
                <div class="col-sm-4" style="">
                <a href="#">Email</a>
                <p><?php echo $userInfo->email ?></p>

                <a href="#">Emergency Contact Number</a>
                <p>+91 0987654321</p>


            </div>
                <div class="col-sm-4" style="">
                  <a href="#">Primary Contact Number</a>
                  <p><?php echo $userInfo->mobile ?></p>

                  <a href="#">Address</a>
                  <p><?php echo $userInfo->address_line_1 ?></p>

              </div>
              <div class="col-sm-4" style="">
                <a href="#">SecondaryContact Number</a>
                <p><?php echo $userInfo->s_contact_num ?></p>
              </div>
              </div>


              <div id="menu1" class="tab-pane fade">
                <div class="col-sm-2" style="">
                    <a href="#">Employee Id</a>
                    <p><?php echo $userInfo->emp_id ?></p>

                    <a href="#">Employee Type</a>
                    <p><?php foreach ($emp_types as $key => $value): ?>
                      <?php if ($value->id==$userInfo->emp_type): ?>
                        <?php echo $value->title; ?>
                      <?php endif; ?>
                    <?php endforeach; ?></p>

                    <a href="#">Package</a>
                    <p><?php echo $userInfo->annual_pkg ?></p>

                </div>
                <div class="col-sm-2" style="">
                    <a href="#">Employee Grade</a>
                    <p><?php foreach ($emp_grades as $key => $value): ?>
                      <?php if ($value->id==$userInfo->emp_grade): ?>
                        <?php echo $value->title; ?>
                      <?php endif; ?>
                    <?php endforeach; ?></p>

                    <a href="#">Joining Date</a>
                    <p><?php echo $userInfo->joining_date ?></p>


                </div>
                <div class="col-sm-2" style="">
                    <a href="#">Department</a>
                    <p><?php foreach ($departments as $key => $value): ?>
                      <?php if ($value->id==$userInfo->department_id): ?>
                        <?php echo $value->title; ?>
                      <?php endif; ?>
                    <?php endforeach; ?></p>

                    <a href="#">Official Timing</a>
                    <p><?php echo $userInfo->office_timing ?></p>

                    <a href="#">Office Address</a>
                    <p><?php echo $userInfo->address_line_2 ?></p>

                </div>
                <div class="col-sm-2" style="">


                    <a href="#">Designation</a>
                    <p>  <?php foreach ($designations as $key => $value): ?>
                        <?php if ($value->id==$userInfo->designation): ?>
                          <?php echo $value->title; ?>
                        <?php endif; ?>
                      <?php endforeach; ?></p>

                    <a href="#">Team</a>
                    <p><?php foreach ($teams as $key => $value): ?>
                      <?php if ($value->id==$userInfo->team_id): ?>
                        <?php echo $value->title; ?>
                      <?php endif; ?>
                    <?php endforeach; ?></p>

                    <a href="#">Employee Status</a>
                    <p><?php foreach ($emp_status as $key => $value): ?>
                      <?php if ($value->id==$userInfo->emp_status): ?>
                        <?php echo $value->title; ?>
                      <?php endif; ?>
                    <?php endforeach; ?></p>
                </div>
              </div>

              <div id="password" class="tab-pane fade">
                <div class="col-sm-4" style="">
                  <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                      <div class="box-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="inputPassword1">Old Password</label>
                                      <input type="password" data-toggle="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" style="width: 97%;" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="inputPassword1">New Password</label>
                                      <input type="password" data-toggle="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20" style="width: 97%;" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="inputPassword2">Confirm New Password</label>

                                      <input type="password" data-toggle="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" style="width: 97%;" maxlength="20" required>
                                  </div>
                              </div>
                          </div>
                      </div><!-- /.box-body -->

                      <center><div class="box-footer password-btn">
                          <input type="submit" class="btn btn-primary" value="Submit" />
                          <input type="reset" class="btn btn-default" value="Reset" />
                      </div></center>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>          <!-- /.box -->
      </div>
    </div>
  </div>
</section>






    <!-- <section class="content">

        <div class="row">
            <!-- left column -->
          <!--  <div class="col-md-3">
              <!-- general form elements


                <div class="box box-warning">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/avatar.png" alt="User profile picture">
                        <h3 class="profile-username text-center"><?= $name ?></h3>

                        <p class="text-muted text-center"><?= $role ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?= $email ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile</b> <a class="pull-right"><?= $mobile ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-5">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?= ($active == "details")? "active" : "" ?>"><a href="#details" data-toggle="tab">Details</a></li>
                        <li class="<?= ($active == "changepass")? "active" : "" ?>"><a href="#changepass" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="<?= ($active == "details")? "active" : "" ?> tab-pane" id="details">
                            <form action="<?php echo base_url() ?>profileUpdate" method="post" id="editProfile" role="form">
                                <?php $this->load->helper('form'); ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $name; ?>" value="<?php echo set_value('fname', $name); ?>" maxlength="128" />
                                                <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" value="<?php echo set_value('mobile', $mobile); ?>" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $email; ?>" value="<?php echo set_value('email', $email); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body --
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
                            </form>
                        </div>
                        <div class="<?= ($active == "changepass")? "active" : "" ?> tab-pane" id="changepass">
                            <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1">Old Password</label>
                                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1">New Password</label>
                                                <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword2">Confirm New Password</label>
                                                <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
<!--
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
                            </form>
                        </div>-->
                    </div>
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
                                            <div class="col-sm-6 form-group form-group1">
                                              <div class="left margin">
                                                 <div class="input-group">
                                                    <label for="joining_date">Profile Photo</label>
                                                    <input type="file" class="form-control" id="edit_profile_image" name="profile_image" accept='image/*' >
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
</div>

    <script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
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

                          // $('#edit_profile_image').val(adminData.profile_image);
                          $('#edit_office_timing').val(adminData.office_timing);
                          $('#edit_annual_pkg').val(adminData.annual_pkg);
                          $('#edit_currency').val(adminData.currency);
                          $('#edit_joining_date').val(adminData.joining_date);
                          $('#edit_office').val(adminData.office_id);
                          $('#myModal3').modal('toggle');
                          $('#czContainer-edit').html("");

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
    </script>
