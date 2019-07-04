<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="http://woco.co.in/assets/js/jquery.czMore.js"></script>
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
              <div class="col-xs-6">
                  <h3>Employee Management</h3>
              </div>
                <div class="col-xs-6 text-right">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee/add"><i class="fa fa-plus frm-icon"></i> Add New Employee </a>
                </div>
            </div>
          </section>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
         <div>
           <?php
           if(!empty($userRecords))
           {
               foreach($userRecords as $record)
               {
           ?>
          <div class="twPc-div col-md-6">
            <div class="emp-div">
                <a class="twPc-bg twPc-block"></a>
                  <a title="Smith" href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>" class="twPc-avatarLink">
                  <img alt="Smith" src="<?php echo base_url(); ?>assets/dist/img/avatar04.png" class="twPc-avatarImg">
                </a>
              <div class="twPc-divUser">
                <div class="twPc-divName">
                    <b><a href="<?php echo base_url(); ?>hr/employee/profile/<?php echo $record->userId; ?>"><?php echo $record->name ?></a></b>
                            <?php if ($record->status==2) { ?>
                              <button type="button" class="btn btn-danger btn-xs"> Deactive </button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-success btn-xs"> Active </button>
                              <?php }?>
                    <p><span><?php echo $record->emp_type ?></span></p>
                    <p><span><?php echo $record->emp_id ?></span></p>
                </div>
               </div>
            <div class="emp-dropdown">
               <button class="emp-dropbtn"><i class="fa fa-ellipsis-v"></i></button>
                 <div class="emp-dropdown-content twPc-Arrange">
                      <a href="javascript:editEmployee(<?php echo $record->userId; ?>)"><i class="fa fa-pencil"></i>Edit</a>
                      <a href="javascript:deleteEmployee(<?php echo $record->userId; ?>)"  class="btn" style="margin-left: 0px;"><i class="fa fa-trash"></i>Delete</a>
                      <?php if ($record->status==2) { ?>
                        <a class="btn btn-sm " href="javascript:unblockEmployee(<?php echo $record->userId; ?>)" title="Block"><i class="fa fa-check"></i>unblock</a>
                      <?php } else if ($record->status==1) { ?>
                          <a class="btn btn-sm " href="javascript:blockEmployee(<?php echo $record->userId; ?>)" title="Active"><i class="fa fa-ban"></i>Block</a>
                        <?php }?>


                  </div>
                 </div>
                  <a href="#"><button class="emp-button" style="margin-left: 70px; float: right;margin-top:10px; margin-right:20px; border: 1px solid #2a669d;border-radius: 35px;background-color:white;cursor: pointer;">Permanent</button></a>
              </div>
              <hr>
              <div class="twPc-divStats">
                <ul class="twPc-Arrange">
                    <div style="float: left; width: 220px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-phone emp-icon"></i>
                         <a href='#'><?php echo $record->phone_code; ?> <?php echo $record->mobile; ?></a>
                         </span>
                      </li>
                    </div>
                    <div style="float: left; width: 220px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-envelope"></i>
                          <a href='#'><?php echo $record->email; ?></a>
                        </span>
                      </li>
                    </div>
                </ul>
                <ul class="twPc-Arrange">
                  <div style="float: left; width: 220px;">
                      <li>
                        <span><i class="fa fa-briefcase"></i>
                           <a href='#'><?php echo "Employee" ?></a>
                        </span>
                      </li>
                  </div>
                  <div style="float: left; width: 220px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-users"></i>
                            <a href='#'><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></a>
                        </span>
                      </li>
                    </div>
                </ul>
                <ul class="twPc-Arrange">
                  <div style="float: left; width: 220px;">
                      <li class="twPc-ArrangeSizeFit">
                        <span><i class="fa fa-clock-o"></i>
                          <a href='#'><?php echo $record->office_timing ?></a>
                        </span>
                      </li>
                  </div>
                  <div style="float: left; width: 220px;">
                    <li class="twPc-ArrangeSizeFit">
                      <span><i class="fa fa-user"></i>
                         <a href='#'> XYZ</a>
                      </span>
                    </li>
                   </div>
                  </ul>
               </div>
             </div>
              <?php
            }
          }
            ?>
          </div>
            <div class="box-footer clearfix">
                <?php //echo $this->pagination->create_links(); ?>
            </div>

              </div><!-- /.box -->
            </div>
          </div>

          <div class="col-xs-3">
            <div class="modal-content" style="position: fixed; min-height: 100%;top:0;">
              <div class="modal-body" style="top:70px;">
                  <h2>Filter</h2>
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form  role="form" action="<?php echo base_url() ?>hr/employee" method="get" role="form" class="custom-form filter1">
                        <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">

                                    <select class="select form-control gender" style="width:97%;height: 32px;" name="office_timing" id="office_timing" value="" >
                                      <option value="">Select Official Timing</option>
                                      <?php foreach ($timings as $key => $value): ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <select class="select form-control gender" style="width: 98%; height: 32px;" name="department" value="" >
                                          <option value="">Select Employee Department</option>
                                          <?php foreach ($departments as $key => $value): ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <select class="select form-control gender" style="width:98%;height: 32px;" name="team_id" value="" >
                                          <option value="">Select Team</option>
                                          <?php foreach ($teams as $key => $value): ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <select class="select form-control gender" style="width:97%;height: 32px;" name="designation" value="" >
                                        <option value="">Select Designation</option>
                                        <?php foreach ($designations as $key => $value): ?>
                                          <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <select class="select form-control gender" style="width:97%;height: 32px;" name="emp_status" value="" >
                                        <option value="">Select Employee Status</option>
                                        <?php foreach ($emp_status as $key => $value): ?>
                                          <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer" style="text-align:center;">
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <input type="submit" class="btn btn-primary" value="Submit" />

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
            <div class="wizard">
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

              <form role="form" action="<?php echo base_url() ?>hr/employee/edit" method="post" class="custom-form" id="employee-form">
                  <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                     <fieldset id="first" style="display: block;">
                        <div class="row">
                          <div class="col-sm-12 form-group form-group1">
                             <div class="left margin">
                               <div class="input-group">
                                 <label for="fname">First Name</label>
                                   <input type="text" id="edit_fname" placeholder=""  class="form-control" name="fname" required value="">
                                 </div>
                               </div>
                             </div>
                         <div class="col-sm-12 form-group form-group1">
                            <div class="left margin">
                              <div class="input-group">
                                <label for="lname">Last Name</label>
                              <input type="text" id="edit_lname" placeholder=""  class="form-control" name="lname" required value="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12 form-group form-group1">
                            <div class="left margin">
                              <div class="input-group">
                                <label for="gender">Select Gender</label>
                                <select name="gender" placeholder="" id="edit_gender" name="gender" class="itemName form-control gender" value="" required style="">
                                  <option value="">--Select Gender-- </option>
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
                                <input type="date" placeholder="" name="dob date" id="edit_dob" min='1899-01-01' max='2010-13-13' required="" class="textinput form-control datepicker" value="" required>
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
                                <select class="select form-control gender" name="blood_group" id="edit_blood_group" value="" style="margin-left: 26px; margin-bottom: 3px;">
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
                              <select class="select form-control gender" name="marital_status" id="edit_marital_status" value="" style="margin-left: 26px; margin-bottom: 3px;">
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
                                  <input type="text" placeholder=" " id="edit_spouse_name" class="form-control required" name="spouse_name" value="">
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
                             <input type="email" placeholder="" name="email" id="edit_email"  class="form-control required" required="" value="">
                           </div>
                         </div>
                       </div>
                     </div>
                      <div class="row">
                       <div class="col-sm-12 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="phone_code">Primary Contact Phone Code</label>
                            <input type="text" placeholder=""  class="form-control required" id="edit_phone_code" name="phone_code" required="" value="" max="3">
                           </div>
                        </div>
                       </div>
                        <div class="col-sm-12 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="mobile">Primary Contact Number</label>
                              <input type="text" placeholder=""  class="form-control required" id="edit_mobile" name="mobile" required="" value="">
                            </div>
                           </div>
                          </div>
                        </div>
                        <div class="row">
                         <div class="col-sm-12 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="company_name">Secondary Contact Phone Code</label>
                              <input type="text" placeholder=""  class="form-control required"  id="edit_s_phone_code" name="s_phone_code" value="" max="3">
                             </div>
                          </div>
                         </div>
                          <div class="col-sm-12 form-group form-group1">
                            <div class="left margin">
                              <div class="input-group">
                                <label for="company_name">Secondary Contact Number</label>
                                <input type="text" placeholder=""  class="form-control required" id="edit_s_contact_num" name="s_contact_num" value="">
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
                                                <input type="number" class="textinput form-control" id="edit_emergency_contact" value="" name="emergency_contact[]"  value="" placeholder="Contact Number" required/>
                                            </div>
                                          </div>
                                          <div class="col-md-12" style="width:22% !important;">
                                              <div id="div_id_stock_1_service" class="form-group">
                                                <div class="controls ">
                                                  <select class="select form-control" name="emergency_contact_relation[]" id="edit_emergency_contact_relation" value="" style="margin-bottom: -24px;">
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
                              <input type="text" placeholder="Address Line 1" name="address_line_1" id="edit_address_line_1"  class="form-control required" required="" value="">
                              </div>
                            </div>
                          </div>
                       </div>
                        <div class="row">
                         <div class="col-sm-12 form-group form-group1">
                           <div class="left margin">
                              <div class="input-group">
                                <label for="company_name">Address Line 2</label>
                                <input type="text" placeholder="" name="address_line_2"  id="edit_address_line_2" class="form-control required" value="">
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
                                  <input id="edit_state" type="text" name="state"  placeholder="" style="margin-bottom: -9px;">
                                </div>
                                  <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                </div>
                              </div>
                             </div>
                             <div class="col-sm-6 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="company_name">City</label>
                                  <input type="text" placeholder=""  id="edit_city" class="form-control required" name="city" required="" value="">
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
                                 <input  type="text" id="edit_country" name="country" placeholder="" style="margin-bottom: -9px;">
                               </div>
                                 <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                               </div>
                             </div>
                            </div>
                            <div class="col-sm-12 form-group form-group1">
                             <div class="left margin">
                               <div class="input-group">
                                 <label for="zip">Zip</label>
                                 <input type="text" placeholder=""  class="form-control required"  id="edit_zip" name="zip" required="" value="">
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
                                  <input type="text" placeholder=" " id="edit_emp_id"  class="form-control" name="emp_id" required="" value="">
                                </div>
                              </div>
                             </div>
                             <div class="col-sm-12 form-group form-group1">
                                 <div class="left margin">
                                   <div class="input-group">
                                      <label for="company_name">designation</label>
                                      <select class="itemName form-control" style="width:97%;height: 32px;" id="edit_designation" name="designation" value="" required >
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
                                     <select class="itemName form-control" style="width:97%;height: 32px;" id="edit_emp_type" name="emp_type" value="" required >
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
                                      <select class="itemName form-control" style="width:100%;height: 32px;" id="edit_emp_grade" name="emp_grade" value="" required >
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
                                        <select class="itemName form-control" style="width: 98%; height: 32px;" id="edit_department" name="department" value="" required >
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
                                          <select class="itemName form-control" style="width:98%;height: 32px;" id="edit_team_id" name="team_id" value="" required >
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
                                             <select class="itemName form-control" style="width:100%;height: 32px;" name="emp_status" id="edit_emp_status" value="" required >
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
                                               <select class="itemName form-control" style="width:100%;height: 32px;"  name="office_timing" id="edit_office_timing" value="" required >
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
                                                <input type="number" placeholder=""  required name="annual_pkg" id="edit_annual_pkg"  class ="textinput form-control gender" required="" value="">
                                                <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 form-group form-group1">
                                         <div class="left margin">
                                           <div class="input-group">
                                              <label for="currency">Currency</label>
                                              <select class="itemName form-control" style="width:100%;height: 32px;" id="edit_currency" name="currency" value="" required >
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
                                                <input type="date" placeholder="" required  class="form-control required" size="12" required pattern="\d{1,2}/\d{1,2}/\d{4}" id="edit_joining_date" name="joining_date" required="" value="">
                                                <span><i class="fa fa-calendar" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                             </div>
                                           </div>
                                         </div>

                                         <div class="col-sm-12 form-group form-group1">
                                           <div class="left margin">
                                               <div class="input-group">
                                                   <label for="office" class="select-one">Office</label>
                                                   <select class="itemName form-control" style="width: 98%; height: 32px;" id="edit_office" name="office" value="" required >
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
var dataTable;

    $('.search-input-text').on( 'keyup click change', function () {   // for text boxes
        var i =$(this).attr('data-column');  // getting column index
        var v =$(this).val();  // getting search input value
        dataTable.columns(i).search(v).draw();
    } );
    $('.search-input-select').on( 'change', function () {   // for select box
        var i =$(this).attr('data-column');
        var v =$(this).val();
        dataTable.columns(i).search(v).draw();
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
                  dataTable.ajax.reload();
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
            data: frm.serialize(),
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                if (data.status == 1) {
                  $("#admin-edit-form").trigger("reset");
                  $('#myModal3').modal('hide');
                  dataTable.ajax.reload();
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
          { "data": "name" },
          { "data": "email" },
          { "data": "phone_code" },
          { "data": "mobile" },
          { "data": "createdDtm" },
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
              return data;
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
               var todayTime = new Date(data);
               var month = todayTime .getMonth() + 1
               var day   = todayTime .getDate();
               var year = todayTime .getFullYear();
               return (day<10?`0${day}`:day) + "/" + (month<10?`0${month}`:month) + "/" + year;
              //return data;
            }
          },
          {
            "targets": 6,
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
            "targets": 7,
            orderable: false,
            "render": function ( data, type, row ) {
              var str = "<div style='width:120px'>";
              if (row.status == 1) {
                str += '<a class="btn btn-sm " href="javascript:blockEmployee(' + row.userId + ')" title="Block"><i class="fa fa-ban"></i></a>';
              }else if (row.status == 2) {
                str += '<a class="btn btn-sm " href="javascript:unblockEmployee(' + row.userId + ')" title="Block"><i class="fa fa-check"></i></a>';
              }
              str += '<a class="btn btn-sm " href="javascript:editEmployee(' + row.userId + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
              str += '<a class="btn btn-sm " href="javascript:deleteEmployee(' + row.userId + ')" title="Delete"><i class="fa fa-trash"></i></a>';
              str += '</div>';
              return str;
            }
          },
        ]
  });

});

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
                      dataTable.ajax.reload();
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
                          dataTable.ajax.reload();
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
                                            tempStr += '<div class="col-md-6">';
                                              tempStr += '<div id="div_id_stock_1_unit" class="form-group">';
                                                tempStr += '<input type="text" class="textinput form-control " id="emergency_contact_name" value="'+devices[i-1].name+'" name="emergency_contact_name[]"  placeholder="Contact Name" required/>';
                                              tempStr += '</div>';
                                            tempStr += '</div>';
                                          tempStr +='<div class="col-md-3">';
                                             tempStr +='<div id="div_id_stock_1_unit" class="form-group">';
                                               tempStr += '<input type="number" class="textinput form-control" id="emergency_contact" value="'+devices[i-1].contact+'" name="emergency_contact[]"  placeholder="Contact Number" required/>';
                                             tempStr +='</div>';
                                         tempStr +='</div>';
                                        tempStr +='<div class="col-md-3" style="width:22% !important;">';
                                          tempStr +='<div id="div_id_stock_'+i+'_service" class="form-group">';
                                           tempStr +='<div class="controls ">';
                                             tempStr +='<select class="select form-control" name="emergency_contact_relation[]" id="emergency_contact_relation"  style="margin-bottom: -24px;">';
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
                              dataTable.ajax.reload();
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


</script>
