


<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.czMore.js"></script>

<style media="screen">
.custom-form input {
  margin-left:24px !important;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


<section class="content">
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <section class="content-header">
            <h1><small>Employee Management/</small></h1>
            <div class="row">
                  <div class="col-xs-8">
                      <h3>Employee Management</h3>
                  </div>
                  <div class="col-xs-2 text-center emp-search-bar">
                       <div class="col-xs-2 text-right">
                      <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee"><i class="fa fa-id-card" style="margin-right: 5px;font-size: 16px;"></i> Back To Card View</a>
                    </div>
                  </div>
                <div class="col-xs-2 text-right">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee/add"><i class="fa fa-plus frm-icon" style="margin-right: 5px;font-size: 16px;"></i> Add New Employee </a>
                </div>
            </div>
          </section>



<!--Dummy Cards-->
<!--Dummy Cards-->
<!--Dummy Cards-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box custom-box">
            <?php //pre($permisions); ?>
            <div class="box-body table-responsive no-padding">

              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Profile Photo</th>
                    <th>Employee Name</th>
                    <th>Employee ID</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <thead>
                    <tr>
                        <td>
                          <div class="has-feedback" style="width: 120px;">
                              <input type="text" data-column="0" class="form-control search-input-text" id="inputValidation" placeholder="Search" style="width: 110px;">
                              <span class="glyphicon glyphicon-search form-control-feedback" style="right: -7px;"></span>
                          </div>
                        </td>

                        <td>
                          <div class="has-feedback">
                              <input type="text" data-column="1" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                              <span class="glyphicon glyphicon-search form-control-feedback"></span>
                          </div>
                        </td>

                        <td>
                          <div class="has-feedback">
                              <input type="text" data-column="2" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                              <span class="glyphicon glyphicon-search form-control-feedback"></span>
                          </div>
                        </td>
                        <td>
                          <div class="has-feedback">
                              <input type="text" data-column="3" class="form-control search-input-text" id="inputValidation" placeholder="Search" style="width: 110px;">
                              <span class="glyphicon glyphicon-search form-control-feedback"></span>
                          </div>
                        </td>
                        <td>
                          <div class="has-feedback">
                              <input type="text" data-column="4" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                              <span class="glyphicon glyphicon-search form-control-feedback"></span>
                          </div>
                        </td>
                        <td>
                            <select data-column="5"  class="search-input-select">
                                <option value="">Select Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
                                <option value="2">Blocked</option>
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
              </table>

            </div><!-- /.box -->
          </div>
        </div>
    </div>
</section>
<!--Dummy Cards-->
<!-- <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box custom-box">
            <div class="box-body table-responsive no-padding">
              <table id="example" class="table table-striped table-bordered" style="width:100%" >
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Profile Photo</th>
                      <th>Employee Name</th>
                      <th>Employee ID</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>View profile</th>
                      <th class="text-center">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  if(!empty($userRecords))
                  {
                      foreach($userRecords as $record)
                      {
                  ?>
                  <tr>
                      <td><?php echo $record->userId ?></td>
                      <td>
                        <a title="" href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>" class="twPc-avatarLink" style="padding-top: 0px !important;">
                         <?php if(!empty($record->profile_image)){?>
                        <img alt="User Image" src="<?php echo base_url(); ?>uploads/user/<?php echo $record->profile_image; ?>" class="twPc-avatarImg">
                        <?php } else  { ?>
                              <?php if($record->gender=='Female'){?>
                             <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/female.png" class="twPc-avatarImg">
                             <?php } else  { ?>
                               <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/male.png" class="twPc-avatarImg">
                                <?php }?>
                           <?php }?>
                      </a>

                      </td>
                      <td> <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->name ?></a></td>
                      <td> <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->emp_id ?></a></td>
                      <td> <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->email; ?></a></td>
                      <td>
                        <?php if ($record->status==2) { ?>
                          <button type="button" class="btn btn-danger btn-xs"> Deactive </button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-success btn-xs"> Active </button>
                          <?php }?>
                      </td>
                      <td> <a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>">View</a></td>
                      <td class="text-center" style="width: 13%;">
                        <?php if ($record->status==2) { ?>
                          <a class="btn btn-sm " href="javascript:unblockEmployee(<?php echo $record->userId; ?>)" title="Block" style=""><i class="fa fa-check"></i></a>
                        <?php } else if ($record->status==1) { ?>
                            <a class="btn btn-sm " href="javascript:blockEmployee(<?php echo $record->userId; ?>)" title="Active" style=""><i class="fa fa-ban"></i></a>
                          <?php }?>

                          <a href="javascript:editEmployee(<?php echo $record->userId; ?>)"><i class="fa fa-pencil" style="font-size: 15px;"></i></a>
                          <a class="btn btn-sm " href="javascript:deleteEmployee(<?php echo $record->userId; ?>)" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                  <?php
                      }
                  }
                  ?>
                </tbody>

              </table>

            </div>

          </div>
        </div>
    </div>
</section> -->
</div><!-- /.box-header -->
</div>
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


<!-- Form edit -->
<!-- Form edit -->
<!-- Form edit -->
<!-- Form edit -->

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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script type="text/javascript" language="javascript" >
$(document).ready(function () {
  dataTable = $('#example').DataTable({
      "order": [[ 0, "desc" ]],
      "iDisplayLength": 10,
      "processing": true,
      "language": {
          "processing": '<img src="<?php echo base_url(); ?>assets/website/loading.gif" />' //add a loading image,simply putting <img src="loader.gif" /> tag.
      },
      "serverSide": true,
      "ajax":{
        "url": "<?php echo base_url("hr/employee/getListData"); ?>",
        "dataType": "json",
        "type": "POST",
        "data":{ 'ci_csrf_token' : '' }
      },
      "columns": [
        { "data": "userId" },
        { "data": "profile_image" },
        { "data": "name" },
        { "data": "emp_id" },
        { "data": "email" },
        { "data": "status" },
        { "data": "action" }
      ],
      "columnDefs": [
        {
          "targets": 0,
          "render": function ( data, type, row )
          {
            return data;
          }
        },
        {
          "targets": 1,
          "render": function ( data, type, row ) {
            if (data != '') {
              return '<img src="<?php echo base_url(); ?>uploads/user/'+data+'" alt="" width="50px" height="50px">';
            }else {
              if (row.gender == 'Female') {
                return '<img src="<?php echo base_url() ?>assets/dist/img/avatar2.jpg" alt="" width="50px" height="50px">';
              }else {
                return '<img src="<?php echo base_url() ?>assets/dist/img/avatar.png" alt="" width="50px" height="50px">';
              }

            }

          }
        },
        {
          "targets": 2,
          "render": function ( data, type, row ) {
            return data;
          },
        },
        {
          "targets": 3,
          "render": function ( data, type, row ) {
            return data;
          }
        },
        {
          "targets": 4,
          "render": function ( data, type, row ) {
          return data;
          }
        },
        {
          "targets": 5,
          "render": function ( data, type, row ) {
            switch (row.status)
            {
              //0-pending/1-active/2-blocked
              case '0':
                return '<button type="button" class="btn btn-warning btn-xs"> Pending </button>';
                break;
              case '1':
                return '<button type="button" class="btn btn-success btn-xs"> Active </button>';
                break;
              case '2':
                return '<button type="button" class="btn btn-danger btn-xs"> Blocked </button>';
                break;
              default:
                return '<button type="button" class="btn btn-warning btn-xs"> Pending </button>';
                break;
            }
          }
        },
        {
          "targets": 6,
          orderable: false,
          "render": function ( data, type, row ) {
            var str = "<div style='width:120px'>";
            if (row.status == 1) {
              <?php if ($permission->block == 1) { ?>
                str += '<a class="btn btn-sm " href="javascript:blockAdmin(' + row.userId + ')" title="Block"><i class="fa fa-ban"></i></a>';
              <?php } ?>

            }else if (row.status == 2) {
              <?php if ($permission->unblock == 1) { ?>
                str += '<a class="btn btn-sm " href="javascript:unblockAdmin(' + row.userId + ')" title="Block"><i class="fa fa-check"></i></a>';
              <?php } ?>
            }
            <?php if ($permission->edit == 1) { ?>
              str += '<a class="btn btn-sm " href="javascript:editAdmin(' + row.userId + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
            <?php } ?>
            <?php if ($permission->delete == 1) { ?>
              str += '<a class="btn btn-sm " href="javascript:deleteAdmin(' + row.userId + ')" title="Delete"><i class="fa fa-trash"></i></a>';
            <?php } ?>
            str += '</div>';
            return str;
          }
        },
      ]
});

});



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
</script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#custom-search-form").attr("action", baseURL + "hr/employee/" + value);
            jQuery("#custom-search-form").submit();
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
