
<script src="<?php echo base_url(); ?>assets/js/jquery.czMore.js"></script>
<script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/croppie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bower.json"></script>
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/croppie.css" rel="stylesheet" />
<style>

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
      <h1><small>Employee Management/Add New Employee</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Add New Employee</h3>
        </div>
          <div class="col-xs-6 text-right">
              <a class="btn btn-primary" href="<?php echo base_url(); ?>hr/employee"><i class="glyphicon glyphicon-th-list frm-icon"></i> Employee List</a>
            <!-- <a class="btn btn-primary" href="<?php echo base_url(); ?>master/company"><i class="glyphicon glyphicon-th-list frm-icon"></i> Back to List</a> -->
          </div>
      </div>
    </section>

<section class="content">
  <div class="row">
  <div class="col-xs-12">
  <div class="box custom-box">
  <div class="container">
  	<div class="row">
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

            <form role="form" enctype="multipart/form-data" action="<?php echo base_url() ?>hr/employee/addNew" method="post" class="custom-form" id="employee-form">
                <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" id="step1">
                   <fieldset id="first" style="display: block;">
                      <div class="row">
                        <div class="col-sm-6 form-group form-group1">
                           <div class="left margin">
                             <div class="input-group">
                               <label for="fname">First Name</label>
                                 <input type="text" id="fname" placeholder="" oninvalid="showalert('Pls Fill First Name');"  class="form-control" name="fname" required value="">
                               </div>
                             </div>
                           </div>
                       <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="lname">Last Name</label>
                            <input type="text" id="lname" placeholder="" oninvalid="showalert('Pls Fill Last Name');"  class="form-control" name="lname" required value="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="gender">Gender</label>
                              <select name="gender" placeholder="" id="gender" name="gender" class="select form-control gender" oninvalid="showalert('Pls Select Gender');" value="" required>
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Non binary</option>

                              </select>
                            </div>
                          </div>
                         </div>
                         <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="dob">Date Of Birth</label>
                              <input type="date" placeholder="" name="dob" id="dob" oninvalid="showalert('Pls Fill Date Of Birth');" required="" class="textinput form-control" value="" required>

                            </div>
                          </div>
                        </div>
                    </div>

                      <div class="row">
                         <div class="col-sm-6 form-group form-group1">
                            <div class="left margin">
                            <div class="input-group">
                              <label for="blood_group">Blood Group</label>
                              <select class="select form-control gender" oninvalid="showalert('Pls Select Blood Group');" name="blood_group" id="blood_group" value="" required>
                                  <option value=""></option>
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
                      <div class="col-sm-6 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="marital_status">Martial Status</label>
                            <select class="select form-control gender" oninvalid="showalert('Pls Select Martial Status');" name="marital_status" id="marital_status" value="" required>
                                <option value=""></option>
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
                                <input type="text" placeholder=" " oninvalid="showalert('Pls Fill Spouse Name');"  class="form-control required" name="spouse_name" value="">
                            </div>
                          </div>
                        </div>
                      </div>

                    </fieldset>
                   <ul class="list-inline text-center">
                      <li>
                        <input type="button" class="btn btn-primary next-step" value="Submit & Continue" />
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
                           <input type="email" placeholder="" name="email"  oninvalid="showalert('Pls Fill Email');"  class="form-control required" required="" value="">
                         </div>
                       </div>
                     </div>
                   </div>
                    <div class="row">
                     <div class="col-sm-6 form-group form-group1">
                      <div class="left margin">
                        <div class="input-group">
                          <label for="phone_code">Primary Contact Phone Code</label>
                          <select class="select form-control gender required" name="phone_code"  id="phone_code" value="" max="3" style="width:97%;height: 32px;">
                              <option value="+91">+91</option>
                            </select>
                          <!-- <input type="text" placeholder=""  class="form-control required" name="phone_code" required="" value="" max="3"> -->
                         </div>
                      </div>
                     </div>
                      <div class="col-sm-6 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="mobile">Primary Contact Number</label>
                            <input type="text" pattern="[789][0-9]{9}" placeholder=""  oninvalid="showalert('Primary Contact is Empty or Mobile Number should start with (7,8,9) And should be 10 digits ');"  class="form-control required" name="mobile" required="" value="">
                          </div>
                         </div>
                        </div>
                      </div>
                      <div class="row">
                       <div class="col-sm-6 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="company_name">Secondary Contact Phone Code</label>
                            <select class="select form-control gender required"  name="s_phone_code" id="s_phone_code" value="" max="3" style="width:97%;height: 32px;" >
                                <option value="+91">+91</option>
                              </select>
                            <!-- <input type="text" placeholder=""  class="form-control required" name="s_phone_code" value="" max="3"> -->
                           </div>
                        </div>
                       </div>
                        <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="company_name">Secondary Contact Number</label>
                              <input type="text" pattern="[789][0-9]{9}" placeholder=""  oninvalid="showalert('Secondary Contact is Empty or Mobile Number should start with (7,8,9) And should be 10 digits ');"  class="form-control required" name="s_contact_num" value="">
                            </div>
                           </div>
                          </div>
                        </div>

                   <div class="row">
                     <label for="company_name">Emergency Contacts</label>
                     <div class="col-md-12">
                        <div id="czContainer">
                            <div id="first">
                                <div class="recordset">
                                    <div class="fieldRow clearfix">
                                      <div class="col-md-6">
                                        <div id="div_id_stock_1_unit" class="form-group">
                                            <input type="text" class="textinput form-control " id="emergency_contact_name" value="" name="emergency_contact_name[]" value="" placeholder="Contact Name" required/>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div id="div_id_stock_1_unit" class="form-group">
                                            <input type="text" class="textinput form-control" id="emergency_contact" value="" pattern="[789][0-9]{9}" name="emergency_contact[]"  oninvalid="showalert('Emergency Contact is Empty or Mobile Number should start with (7,8,9) And should be 10 digits ');"  value="" style="margin-left: 0px !important;" placeholder="Contact Number" required/>
                                        </div>
                                      </div>
                                        <div class="col-md-3" style="width:22% !important;">
                                            <div id="div_id_stock_1_service" class="form-group">
                                              <div class="controls " style="margin-top: 11px;">
                                                <select class="select form-control" oninvalid="showalert('Pls Select Relation');" name="emergency_contact_relation[]" id="emergency_contact_relation" value="" style="margin-bottom: -28px; margin-left: 0px !important;">
                                                  <option value="">Select Relation</option>
                                                  <option value="Father">Father</option>
                                                  <option value="Mother">Mother</option>
                                                  <option value="Brother">Brother</option>
                                                  <option value="Sister">Sister</option>
                                                  <option value="Husband">Husband</option>
                                                  <option value="Wife">Wife</option>
                                                  <option value="Son">Son</option>
                                                  <option value="Daughter">Daughter</option>
                                                  <option value="Uncle">Uncle</option>
                                                  <option value="Aunt">Aunt</option>
                                                  <option value="Aunt">Cousin</option>
                                                  <option value="Friend">Friend</option>
                                                  <option value="Friend">Colleague</option>
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
                            <input type="text" placeholder="" name="address_line_1"  oninvalid="showalert('Pls Fill Address line 1');" class="form-control required" required="" value="">
                            </div>
                          </div>
                        </div>
                     </div>
                      <div class="row">
                       <div class="col-sm-12 form-group form-group1">
                         <div class="left margin">
                            <div class="input-group">
                              <label for="company_name">Address Line 2</label>
                              <input type="text" placeholder="" name="address_line_2"  oninvalid="showalert('Pls Fill Address line 2');" class="form-control required" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                       <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="state">State</label>
                              <div class="autocomplete">

                                <input id="myInput" type="text" name="state" placeholder="" style="height: 34px;" oninvalid="showalert('Pls Fill State');">
                              </div>
                                <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                              </div>
                            </div>
                           </div>
                           <div class="col-sm-6 form-group form-group1">
                            <div class="left margin">
                              <div class="input-group">
                                <label for="company_name">City</label>
                                <input type="text" placeholder=""  class="form-control required" name="city" required="" value="" oninvalid="showalert('Pls Fill City');">
                                <!-- <span><i class="fa fa-caret-down" aria-hidden="City" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                              </div>
                            </div>
                          </div>
                     </div>
                     <div class="row">
                      <div class="col-sm-6 form-group form-group1">
                         <div class="left margin">
                           <div class="input-group">
                             <label for="country">Country</label>
                             <div class="autocomplete">
                               <input id="country" type="text" name="country" placeholder="" style="height: 34px;" oninvalid="showalert('Pls Fill Country');">
                             </div>
                               <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                             </div>
                           </div>
                          </div>
                          <div class="col-sm-6 form-group form-group1">
                           <div class="left margin">
                             <div class="input-group">
                               <label for="zip">Zip</label>
                               <input type="text" placeholder=""  class="form-control required" name="zip" required="" value="" oninvalid="showalert('Pls Fill Zip');">
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
                      <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                              <div class="input-group">
                                <label for="company_name">Employee Id</label>
                                <input type="text" placeholder=" "  class="form-control" name="emp_id" required="" value="" oninvalid="showalert('Pls Fill Employee Id');">
                              </div>
                            </div>
                           </div>
                           <div class="col-sm-6 form-group form-group1">
                               <div class="left margin">
                                 <div class="input-group">
                                    <label for="company_name">designation</label>
                                    <select class="select form-control gender" style="width:97%;height: 32px;" name="designation" value="" required  oninvalid="showalert('Pls Select Designation');">
                                      <option value=""></option>
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
                          <div class="col-sm-6 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                   <label for="emp_type">Employee Type</label>
                                   <select class="select form-control gender" style="width:97%;height: 32px;" name="emp_type" value="" required oninvalid="showalert('Pls Fill Select Employee type');" >
                                     <option value=""></option>
                                     <?php foreach ($emp_types as $key => $value): ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                     <?php endforeach; ?>
                                 </select>

                                  <!-- <input type="text" placeholder=" "  class="form-control required" name="emp_type" required="" value="" >
                                  <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                </div>
                              </div>
                             </div>
                          <div class="col-sm-6 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="emp_grade" class="select-one">Employee Grade</label>
                                    <select class="select form-control gender" style="width:97%;height: 32px;" name="emp_grade" value="" required  oninvalid="showalert('Pls Fill Select Employee Grade');">
                                      <option value=""></option>
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
                                      <select class="select form-control gender" style="width: 98%; height: 32px;" name="department" value="" required oninvalid="showalert('Pls Fill Select Department');" >
                                          <option value=""></option>
                                          <?php foreach ($departments as $key => $value): ?>
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
                                           <label for="emp_status">Employee Status</label>
                                           <select class="select form-control gender" style="width:97%;height: 32px;" name="emp_status" value="" required  oninvalid="showalert('Pls Fill Select Employee Status');">
                                             <option value=""></option>
                                             <?php foreach ($emp_status as $key => $value): ?>
                                               <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                             <?php endforeach; ?>
                                         </select>


                                           <!-- <input type="text" placeholder="Employee Status"  class="form-control required" name="emp_status" required="" value="">
                                           <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                                         </div>
                                       </div>
                                      </div>
                                      <div class="col-sm-6 form-group form-group1">
                                        <div class="left margin">
                                          <div class="input-group">
                                             <label for="office_timing">Official Timing</label>
                                             <select class="select form-control gender" style="width:97%;height: 32px;" name="office_timing" id="office_timing" value="" required  oninvalid="showalert('Pls Fill Select Official Timing');">
                                               <option value=""></option>
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
                                      <div class="col-sm-6 form-group form-group1">
                                         <div class="left margin">
                                             <div class="input-group">
                                               <label for="annual_pkg">Package</label>
                                              <input type="number" placeholder=""  required name="annual_pkg" id="annual_pkg"  class ="textinput form-control gender" required="" value="" oninvalid="showalert('Pls Fill Package');">
                                              <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                          </div>
                                        </div>
                                     </div>
                                     <div class="col-sm-6 form-group form-group1">
                                       <div class="left margin">
                                         <div class="input-group">
                                            <label for="currency">Currency</label>
                                            <select class="itemName form-control" style="width:97%;height: 32px;" name="currency" value="" required  oninvalid="showalert('Pls Select Currency');">
                                              <option value=""></option>
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
                                      <div class="col-sm-6 form-group form-group1">
                                        <div class="left margin">
                                           <div class="input-group">
                                              <label for="joining_date">Joining Date</label>
                                              <input type="date" placeholder=""  required name="joining_date" id="joining_date"  class ="textinput form-control gender" required="" value="" oninvalid="showalert('Pls  Select Joining Date');">


                                           </div>
                                         </div>
                                       </div>

                                       <div class="col-sm-6 form-group form-group1">
                                         <div class="left margin">
                                             <div class="input-group">
                                                 <label for="office" class="select-one">Office</label>
                                                 <select class="select form-control gender" style="width: 98%; height: 32px;" id="office" name="office" value="" required oninvalid="showalert('Pls Select Office');" >
                                                     <option value=""></option>
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
                                      <div class="col-md-6">
																				<label for="select_pmng_id">Select Primary Manager</label>
																				<select id="select_pmng_id" class="select form-control itemName" style="width:100%;height: 32px;" name="pmng_id" value="">
																					<option value="0">Assign to HR</option>
																				</select>
																				<span><i class="fa fa-caret-down" aria-hidden="true	" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                       </div>

                                       <div class="col-md-6">
																				 <label for="select_smng_id">Select Secondry Manager</label>
																				 <select id="select_smng_id" class="select form-control itemNamer" style="width:100%;height: 32px;" name="smng_id" value="" ></select>
																				 <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                        </div>
                                    </div>

                                    <div class="row " >
                                      <div class="col-sm-6 form-group form-group1">
                                        <div class="left margin">
                                           <div class="input-group">
                                              <label for="joining_date">Profile Photo</label>
								                              <!-- <input type="file" value="Profile Image" placeholder="Profile Image" class="form-control" id="edit_profile_image"  name="profile_image"  accept='image/*' > -->
								                              <input type="hidden" id="edit_profile_image"  name="profile_image">
																		          <div class="row img-crop-img">
																		      				<label class="cabinet center-block">
																		      						<figure>
																		      							<img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
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
										                              					</div>
										                        						</div>
										                        			</div>
										                        	</div>
                                           </div>
																					 <p style="/* margin-top: 56px; */color: #2a4a90;">File Should be jpg, gif or png and that is smaller than 3MB</p>
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
  </div>
        <!-- /.box -->
  </div>
  </div>
  </div>
  </section>
  </center>
  </div>

<script type="text/javascript">

var managerId = "";
  $('#select_pmng_id').select2({
         placeholder: '--- Select Primary Manager ---',
         ajax: {
           url: '<?php echo base_url('hr/employee/p-manager-search'); ?>',
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
  return '<?php echo base_url('hr/employee/s-manager-search'); ?>/'+managerId;
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

$(document).ready(function(){
    $("#btnPlus").trigger('click');
});
</script>

<script type="text/javascript" language="javascript" >

    $("#employee-form").submit(function(e) {
        var frm = $(this);
        e.preventDefault();
        $('#loader').show();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: new FormData( this ),
             processData: false,
             contentType: false,
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                console.log('Submission was successful.');
                console.log(data);
                if (data.status == 1) {
                  $("#employee-form").trigger("reset");

          				swal("Success", data.message, "success").then((value) => {
                    location.reload();
                  });;
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

function showalert(message) {
        swal("Error", message, "error");
}

var uploadField = document.getElementById("edit_profile_image");
uploadField.onchange = function() {
    if(this.files[0].size > 3000000){
        swal("Make sure the file is jpg, gif or png and that is smaller than 3MB!");
       this.value = "";
    };
};
</script>

<style media="screen">
  .btnPlus {
    position: absolute;
    top: -25px;
    right: 0;
  }
  .btnMinus {
    margin-top: 10px;
  }

</style>
<script type="text/javascript">
// Start upload preview image
$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
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
