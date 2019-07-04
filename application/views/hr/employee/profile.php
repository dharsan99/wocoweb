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
            <h3> Profile</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="#"><i class="fa fa-edit frm-icon"></i> Edit Profile </a>
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
                         <img class=" profile-logo-img img-responsive " src="<?php echo base_url(); ?>assets/dist/img/avatar.png" alt="User profile picture">
                     </div>
                   </div>
                </div>
                <div class="col-md-9">
                  <div class="twPc-divUser">
                     <div class="twPc-divName profile-info">
                       <h2><?= $name ?></h2>
                       <div class="details">
                         <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                              <span><i class="fa fa-briefcase emp-icon"> </i><a href="#"><?= $role ?></a></span>
                             </li>
                          </div>
                          <div class="i-btn">
                             <li class="twPc-ArrangeSizeFit">
                               <span><i class="fa fa-mars emp-icon"></i><a href="#">Male |&nbsp; &nbsp;<span><i class="fa fa-tint emp-icon"></i></span></a><a href="#">O+</a></span>
                             </li>
                          </div>
                          <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                              <span><i class="fa fa-birthday-cake emp-icon"> </i><a href="#">16 Nov 1985</a></span>
                            </li>
                          </div>
                          <div class="i-btn">
                            <li class="twPc-ArrangeSizeFit">
                               <span><i class="fa fa-life-ring emp-icon"> </i><a href="#">Married to Jessica Jr.</a></span>
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
                                <div class="col-sm-3" style="">
                                <a href="#">Email</a>
                                <p>sachin.saini@abc.com</p>

                                <a href="#">Secondary Contact Number</a>
                                <p>+91 0987654321</p>

                                <a href="#">Address</a>
                                <p>Sector 34, Impulse Building</p>
                            </div>
                                <div class="col-sm-3" style="">
                                <a href="#">Primary Contact Number</a>
                                <p>+11-987654321</p>

                                <a href="#">Emergency Contact Number</a>
                                <p>+91 0987654321</p>

                                <a href="#">Address</a>
                                <p>Sector 34, Impulse Building</p>

                              </div>
                              <div class="col-sm-3" style="">
                              <a href="#">Primary Contact Number</a>
                              <p>+11-987654321</p>

                              <a href="#">Emergency Contact Number</a>
                              <p>+91 0987654321</p>

                              <a href="#">Address</a>
                              <p>Sector 34, Impulse Building</p>

                            </div>
                              </div>


                              <div id="menu1" class="tab-pane fade">
                                <div class="col-sm-2" style="">
                                    <a href="#">Employee Id</a>
                                    <p>A1234</p>

                                    <a href="#">Department</a>
                                    <p>Internal</p>

                                    <a href="#">Official Timing</a>
                                    <p>9:00 AM - 6:00 PM</p>

                                    <a href="#">Package</a>
                                    <p>7.9 LPA</p>

                                    <a href="#">Office Address</a>
                                    <p>B-25, Impulse Building</p>
                                </div>
                                <div class="col-sm-2" style="">
                                    <a href="#">Manager</a>
                                    <p>yxz</p>

                                    <a href="#">Designation</a>
                                    <p>Ios</p>

                                    <a href="#">Employee Grade</a>
                                    <p>A</p>

                                    <a href="#">Joining Date</a>
                                    <p>2 Jan 2019</p>

                                    <a href="#">Employee Status</a>
                                    <p>Full Time</p>
                                </div>
                                <div class="col-sm-2" style="">
                                    <a href="#">Manager</a>
                                    <p>yxz</p>

                                    <a href="#">Designation</a>
                                    <p>Ios</p>

                                    <a href="#">Employee Grade</a>
                                    <p>A</p>

                                    <a href="#">Joining Date</a>
                                    <p>2 Jan 2019</p>

                                    <a href="#">Employee Status</a>
                                    <p>Full Time</p>
                                </div>
                                <div class="col-sm-2" style="">
                                    <a href="#">Manager</a>
                                    <p>yxz</p>

                                    <a href="#">Designation</a>
                                    <p>Ios</p>

                                    <a href="#">Employee Grade</a>
                                    <p>A</p>

                                    <a href="#">Joining Date</a>
                                    <p>2 Jan 2019</p>

                                    <a href="#">Employee Status</a>
                                    <p>Full Time</p>
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
                                                      <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" required>
                                                  </div>
                                              </div>
                                          </div>
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

                                      <div class="box-footer">
                                          <input type="submit" class="btn btn-primary" value="Submit" />
                                          <input type="reset" class="btn btn-default" value="Reset" />
                                      </div>
                                  </form>
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
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
