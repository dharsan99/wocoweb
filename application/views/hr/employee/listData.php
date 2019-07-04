
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.czMore.js"></script>

<script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/croppie.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/croppie.css" rel="stylesheet" />


<style media="screen">

.img-crop-img .cabinet{
	display: block;
	cursor: pointer;
}
ul.twPc-Arrange {
    width: 155% !important;
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


<section class="content">
<div class="row">
    <div class="col-xs-9">
      <div class="box">
        <div class="box-header">
          <section class="content-header">
            <h1><small>Employee Management/</small></h1>
            <div class="row">
              <div class="col-xs-3">
                  <h3>Employee Management</h3>
              </div>
              <div class="col-xs-3 text-center">
                <div class="search-bar-emp">
                  <form class="" action="<?php echo base_url('hr/employee'); ?>" method="post">
                    <input class="list-search-emp" type="text" id="searchText" name="searchText" placeholder="Search..." value="<?php echo $searchText; ?>" style="border: 1px solid #2c4b90a8;    height: 36px; width: 90%; border-radius: 20px;">
                  </form>
                </div>
              </div>
              <div class="col-xs-6 text-right">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee/userView"><i class="fa fa-edit frm-icon"></i> View Employee List </a>
                <?php if ($permission->add == 1) { ?>
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee/add"><i class="fa fa-plus frm-icon"></i> Add New Employee </a>
                <?php } ?>

              </div>
            </div>
          </section>



<!--Dummy Cards-->
<!--Dummy Cards-->
<!--Dummy Cards-->
<!--Dummy Cards-->
        </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
         <div class="">
           <?php
           if(!empty($userRecords))
           {
               foreach($userRecords as $record)
               {
           ?>
           <div class="twPc-div col-md-6 target1 " style="width: 47%;">
             <div class="emp-div col-md-12">
							 <div class="col-md-4">
                   <a title="" href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>" class="twPc-avatarLink">
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
             <div class="twPc-divUser col-md-6">
                 <div class="twPc-divName">
                         <b><a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->name ?></a></b>
                             <?php if ($record->status==2) { ?>
                               <button type="button" class="btn btn-danger btn-xs">Deactive</button>
                             <?php } else { ?>
                                 <button type="button" class="btn btn-success btn-xs">Active</button>
                               <?php }?>
                           <p><span><?php echo $record->emp_type ?></span></p>
                           <p><span><?php echo $record->emp_id ?></span></p>
                   </div>
                </div>
             <div class="emp-dropdown col-md-2" style=";">
                 <button class="emp-dropbtn"><i class="fa fa-ellipsis-v"></i></button>
                  <div class="emp-dropdown-content twPc-Arrange">
                      <?php if ($permission->edit == 1) { ?>
                       <a href="javascript:editEmployee(<?php echo $record->userId; ?>)"><i class="fa fa-pencil" style="font-size: 15px;"></i>Edit</a>
                     <?php } ?>
                     <?php if ($permission->delete == 1) { ?>
                      <a href="javascript:deleteEmployee(<?php echo $record->userId; ?>)" class="btn" style=""><i class="fa fa-trash"></i>Delete</a>
                    <?php } ?>

                       <?php if ($record->status==2) { ?>
                         <?php if ($permission->unblock == 1) { ?>
                           <a class="btn btn-sm " href="javascript:unblockEmployee(<?php echo $record->userId; ?>)" title="Block" style=""><i class="fa fa-check"></i>Unblock</a>
                        <?php } ?>
                       <?php } else if ($record->status==1) { ?>
                         <?php if ($permission->block == 1) { ?>
                          <a class="btn btn-sm " href="javascript:blockEmployee(<?php echo $record->userId; ?>)" title="Active" style=""><i class="fa fa-ban"></i>Block</a>
                        <?php } ?>
                         <?php }?>

                   </div>
               </div>
              </div>
               <hr>
               <div class="twPc-divStats" style="  /* width: 90%; */margin-right: -29x;" onclick="location.href='<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>';">
                <ul class="twPc-Arrange" style="margin-right: 11px;width: 50%;">
                    <div style="float: left;width: 151px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-phone emp-icon"></i>
                         <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->phone_code; ?> <?php echo $record->mobile; ?></a>
                         </span>
                      </li>
                    </div>
                    <div style="float: left;width: 58%;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-envelope"></i>
                          <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo substr($record->email, 0, 3).'****'.substr($record->email, strpos($record->email, "@")); ?></a>
                        </span>
                      </li>
                    </div>
                </ul>
                <ul class="twPc-Arrange">
                  <div style="float: left;width: 152px;">
                      <li>
                        <span><i class="fa fa-briefcase"></i>
                           <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo "Employee" ?></a>
                        </span>
                      </li>
                  </div>
                  <div style="float: left;width: 200px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-users"></i>
                            <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></a>
                        </span>
                      </li>
                    </div>
                </ul>
                <ul class="twPc-Arrange">
                  <div style="float: left;width: 152px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-clock-o"></i>
                          <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->office_timing ?></a>
                        </span>
                      </li>
                  </div>
                  <div style="float: left;width: 200px;">
                    <li class="twPc-ArrangeSizeFit">
                      <span><i class="fa fa-user"></i>
                         <a href="#" ><?php echo $record->manager; ?></a>
                      </span>
                    </li>
                   </div>
                  </ul>
               </div>
              </div>
              <?php } } else {?>
								<div class="col-xs-10" style="left: 10%;">
									<div class="box custom-box" style="border-radius: 3px;margin: 11%;">
									 <div class="Dummy-text-data" style="text-align: center;">
										 <img src="<?php echo base_url(); ?>assets/images/noresult.gif" alt="">
									<h1 style="text-transform: uppercase; background: linear-gradient(to right, #30CFD0 34%, #330867 62%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Whoops!</h1>
									<p style="font-size: 20px;">No results matching with your criteria.</p>
									<p style="font-size: 20px;">Try different Keyword</p>
							 </div>
									</div>
								</div>
								<?php }?>
          </div>

              </div><!-- /.box -->
              <div class="box-footer clearfix text-center">
                  <?php echo $this->pagination->create_links(); ?>
              </div>
            </div>
          </div>

          <div class="col-xs-3">
            <div class="modal-content" style="position: fixed; min-height: 100%;top:0;">
              <div class="modal-body" style="top:70px;">
                  <h2>Filter</h2>
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form  role="form" action="<?php echo base_url() ?>hr/employee" method="get" role="form" class="custom-form filter1" id="myform" name="myform">
                        <div class="box-body">
                          <div class="col-md-12">
                              <div class="form-group custom-select">
                                <select class="select form-control gender" style="width:97%;height: 32px;" name="manager_id" value="" id="select_manager_id">
                                  <option value="">Select Manager</option>
                                  <?php foreach ($managerlist as $key => $value): ?>
                                    <option style="height:300px !important;" value="<?php echo $value->userId; ?>" <?php echo ( isset($_GET['manager_id'])?($_GET['manager_id'] == $value->userId? "selected":""):""); ?>><?php echo $value->name; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                          </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group custom-select">
                                    <select class="select form-control gender" style="width:97%;height: 31px;" name="office_timing" id="select_office_timing" value="">
                                      <option value="">Select Official Timing</option>
                                      <?php foreach ($timings as $key => $value): ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo ( isset($_GET['office_timing'])?($_GET['office_timing'] == $value->id? "selected":""):""); ?>><?php echo $value->title; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group custom-select">
                                   <select class="select form-control gender" style="width: 98%; height: 32px;" name="department" value="" id="select_department">
                                       <option value="">Select Employee Department</option>
                                       <?php foreach ($departments as $key => $value): ?>
                                         <option value="<?php echo $value->id; ?>" <?php echo ( isset($_GET['department'])?($_GET['department'] == $value->id? "selected":""):""); ?>><?php echo $value->title; ?></option>
                                       <?php endforeach; ?>
                                   </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group custom-select">
                                      <select class="select form-control gender" style="width:97%;height: 32px;" name="designation" value=""id="select_designation" >
                                        <option value="">Select Designation</option>
                                        <?php foreach ($designations as $key => $value): ?>
                                          <option value="<?php echo $value->id; ?>" <?php echo ( isset($_GET['designation'])?($_GET['designation'] == $value->id? "selected":""):""); ?>><?php echo $value->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group custom-select">
                                      <select class="select form-control gender" style="width:97%;height: 32px;" name="emp_status" value="" id="select_status">
                                        <option value="">Select Employee Status</option>
                                        <?php foreach ($emp_status as $key => $value): ?>
                                          <option value="<?php echo $value->id; ?>" <?php echo ( isset($_GET['emp_status'])?($_GET['emp_status'] == $value->id? "selected":""):""); ?>><?php echo $value->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group custom-select">
                                      <select class="select form-control gender" style="width:98%;height: 32px;" name="team_id" value="" id="select_team">
                                          <option value="">Select Team</option>
                                          <?php foreach ($teams as $key => $value): ?>
                                            <option value="<?php echo $value->id; ?>" <?php echo ( isset($_GET['team_id'])?($_GET['team_id'] == $value->id? "selected":""):""); ?>><?php echo $value->title; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>

                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer" style="text-align:center;">
                            <input type="button" class="btn btn-default" onclick="resetform()" value="Reset" style="width:100px !important;" />
                            <input type="submit" class="btn btn-primary" value="Submit" style="width:100px !important; height: 38px !important;" />

                        </div>
                    </form>
              </div>
            </div><!-- modal-content -->
          </div>
        </div>
    </section>





</div>

<!-- Modal -->
<div class="modal right fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel2">
<div class="modal-dialog" role="document">
<div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel2">Add New Employee </h4>
  </div>
</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
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
                                <select name="gender" placeholder="" id="edit_gender" name="gender" oninvalid="showalert('Pls Select Gender');" class="itemName form-control gender" value="" required style="" >
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
                                <select class="select form-control gender itemName" oninvalid="showalert('Pls Select Blood Group');" name="blood_group" id="edit_blood_group" value="" required>
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
                              <select class="select form-control gender" required oninvalid="showalert('Pls Select Martial Status');" name="marital_status" id="edit_marital_status" value="" >
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
                                  <input type="text" placeholder=" "  id="edit_spouse_name" class="form-control required" name="spouse_name" value="">
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
                                  <input type="text" placeholder=" " id="edit_emp_id"  class="form-control" readonly name="emp_id" required="" value="" oninvalid="showalert('Pls Fill Employee Id');"style="background-color: #fff;">
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
                                              <!-- <input type="file" value="Profile Image" placeholder="Profile Image" class="form-control" id="edit_profile_image"  name="profile_image"  accept='image/*' > -->
                                              <input type="hidden" id="edit_profile_image"  name="profile_image">
                                              <div class="row img-crop-img">
                                                  <label class="cabinet center-block">
                                                      <figure>
                                                        <img src="<?php echo base_url(); ?>uploads/user/<?php echo $record->profile_image; ?>" class="gambar img-responsive img-thumbnail" id="item-img-output"  style="width: 150px !important;height: 185px !important;"/>
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

                      $('#item-img-output').attr('src', '<?php echo base_url(); ?>uploads/user/'+adminData.profile_image);
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


    $("#czContainer").czMore({
      max: 5,
      min: 1,
      onLoad: null,
      onAdd: null,
      onDelete: null
    });

    $("#czContainer-edit").czMore({
      max: 5,
      min: 1,
      onLoad: null,
      onAdd: null,
      onDelete: null
    });

    $(document).ready(function(){
        $("#btnPlus").trigger('click');
    });

    function showalert(message) {
            swal("Error", message, "error");
    }


    var uploadField = document.getElementById("edit_profile_image");
    uploadField.onchange = function() {
        if(this.files[0].size >3000000){
            swal("Make sure the file is jpg, gif or png and that is smaller than 3MB!");
           this.value = "";
        };
    };

</script>

<script type="text/javascript">
//resetform
    function resetform() {
			$("#select_manager_id").prop("selectedIndex", -1);
			$("#select_office_timing").prop("selectedIndex", -1);
			$("#select_department").prop("selectedIndex", -1);
			$("#select_designation").prop("selectedIndex", -1);
			$("#select_status").prop("selectedIndex", -1);
			$("#select_team").prop("selectedIndex", -1);
		}
</script>


<script>
function myFunction() {
  var input = document.getElementById("Search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('target1');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
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

<script type="text/javascript">

</script>
