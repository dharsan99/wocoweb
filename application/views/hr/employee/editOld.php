
<script src="<?php echo base_url(); ?>assets/js/jquery.czMore.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Employee Management/Add New Employee</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Edit Employee</h3>
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

            <form role="form" action="<?php echo base_url() ?>hr/employee/edit" method="post" class="custom-form" id="employee-form">
                <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" id="step1">
                   <fieldset id="first" style="display: block;">
                      <div class="row">
                        <div class="col-sm-6 form-group form-group1">
                           <div class="left margin">
                             <div class="input-group">
                               <label for="fname">First Name</label>
                                 <input type="text" id="fname" placeholder=""  class="form-control" name="fname" required value="">
                               </div>
                             </div>
                           </div>
                       <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="lname">Last Name</label>
                            <input type="text" id="lname" placeholder=""  class="form-control" name="lname" required value="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="gender">Select Gender</label>
                              <select name="gender" placeholder="" id="gender" name="gender" class="itemName form-control gender" value="" required>
                                <option value="">--Select Gender-- </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                              </select>
                            </div>
                          </div>
                         </div>
                         <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="dob">Date Of Birth</label>
                              <input type="date" placeholder="" name="dob" id="dob" required="" class="textinput form-control" value="" required>
                              <span><i class="fa fa-calendar" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                            </div>
                          </div>
                        </div>
                    </div>

                      <div class="row">
                         <div class="col-sm-6 form-group form-group1">
                            <div class="left margin">
                            <div class="input-group">
                              <label for="blood_group">Blood Group</label>
                              <select class="select form-control gender" name="blood_group" id="blood_group" value="">
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
                      <div class="col-sm-6 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="marital_status">Martial Status</label>
                            <select class="select form-control gender" name="marital_status" id="marital_status" value="">
                                <option value="">Select One</option>
                                <option value="Married">Married</option>
                                <option value="Single">Single</option>
                                <option value="Divorced">Divorced</option>
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
                                <input type="text" placeholder=" "  class="form-control required" name="spouse_name" value="">
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
                           <input type="email" placeholder="" name="email"  class="form-control required" required="" value="">
                         </div>
                       </div>
                     </div>
                   </div>
                    <div class="row">
                     <div class="col-sm-6 form-group form-group1">
                      <div class="left margin">
                        <div class="input-group">
                          <label for="phone_code">Primary Contact Phone Code</label>
                          <input type="text" placeholder=""  class="form-control required" name="phone_code" required="" value="" max="3">
                         </div>
                      </div>
                     </div>
                      <div class="col-sm-6 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="mobile">Primary Contact Number</label>
                            <input type="text" placeholder=""  class="form-control required" name="mobile" required="" value="">
                          </div>
                         </div>
                        </div>
                      </div>
                      <div class="row">
                       <div class="col-sm-6 form-group form-group1">
                        <div class="left margin">
                          <div class="input-group">
                            <label for="company_name">Secondary Contact Phone Code</label>
                            <input type="text" placeholder=""  class="form-control required" name="s_phone_code" value="" max="3">
                           </div>
                        </div>
                       </div>
                        <div class="col-sm-6 form-group form-group1">
                          <div class="left margin">
                            <div class="input-group">
                              <label for="company_name">Secondary Contact Number</label>
                              <input type="text" placeholder=""  class="form-control required" name="s_contact_num" value="">
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
                                            <input type="number" class="textinput form-control" id="emergency_contact" value="" name="emergency_contact[]"  value="" placeholder="Contact Number" required/>
                                        </div>
                                      </div>
                                        <div class="col-md-3" style="width:22% !important;">
                                            <div id="div_id_stock_1_service" class="form-group">
                                              <div class="controls ">
                                                <select class="select form-control" name="emergency_contact_relation[]" id="emergency_contact_relation" value="" style="margin-bottom: -24px;">
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
                            <input type="text" placeholder="Address Line 1" name="address_line_1"  class="form-control required" required="" value="">
                            </div>
                          </div>
                        </div>
                     </div>
                      <div class="row">
                       <div class="col-sm-12 form-group form-group1">
                         <div class="left margin">
                            <div class="input-group">
                              <label for="company_name">Address Line 2</label>
                              <input type="text" placeholder="" name="address_line_2"  class="form-control required" value="">
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
                                <input id="myInput" type="text" name="state" placeholder="" style="margin-bottom: -9px;">
                              </div>
                                <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                              </div>
                            </div>
                           </div>
                           <div class="col-sm-6 form-group form-group1">
                            <div class="left margin">
                              <div class="input-group">
                                <label for="company_name">City</label>
                                <input type="text" placeholder=""  class="form-control required" name="city" required="" value="">
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
                               <input id="country" type="text" name="country" placeholder="" style="margin-bottom: -9px;">
                             </div>
                               <!-- <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span> -->
                             </div>
                           </div>
                          </div>
                          <div class="col-sm-6 form-group form-group1">
                           <div class="left margin">
                             <div class="input-group">
                               <label for="zip">Zip</label>
                               <input type="text" placeholder=""  class="form-control required" name="zip" required="" value="">
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
                                <input type="text" placeholder=" "  class="form-control" name="emp_id" required="" value="">
                              </div>
                            </div>
                           </div>
                           <div class="col-sm-6 form-group form-group1">
                               <div class="left margin">
                                 <div class="input-group">
                                    <label for="company_name">designation</label>
                                    <select class="itemName form-control" style="width:97%;height: 32px;" name="designation" value="" required >
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
                          <div class="col-sm-6 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                   <label for="emp_type">Employee Type</label>
                                   <select class="itemName form-control" style="width:97%;height: 32px;" name="emp_type" value="" required >
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
                          <div class="col-sm-6 form-group form-group1">
                              <div class="left margin">
                                <div class="input-group">
                                  <label for="emp_grade" class="select-one">Employee Grade</label>
                                    <select class="itemName form-control" style="width:100%;height: 32px;" name="emp_grade" value="" required >
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
                            <div class="col-sm-6 form-group form-group1">
                              <div class="left margin">
                                  <div class="input-group">
                                      <label for="department" class="select-one">Department</label>
                                      <select class="itemName form-control" style="width: 98%; height: 32px;" name="department" value="" required >
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
                              <div class="col-sm-6 form-group form-group1">
                                  <div class="left margin">
                                      <div class="input-group">
                                        <label for="team_id">Team</label>
                                        <select class="itemName form-control" style="width:98%;height: 32px;" name="team_id" value="" required >
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
                                <div class="col-sm-6 form-group form-group1">
                                    <div class="left margin">
                                        <div class="input-group">
                                           <label for="emp_status">Employee Status</label>
                                           <select class="itemName form-control" style="width:100%;height: 32px;" name="emp_status" value="" required >
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
                                      <div class="col-sm-6 form-group form-group1">
                                        <div class="left margin">
                                          <div class="input-group">
                                             <label for="office_timing">Official Timing</label>
                                             <select class="itemName form-control" style="width:100%;height: 32px;" name="office_timing" id="office_timing" value="" required >
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
                                      <div class="col-sm-6 form-group form-group1">
                                         <div class="left margin">
                                             <div class="input-group">
                                               <label for="annual_pkg">Package</label>
                                              <input type="number" placeholder=""  required name="annual_pkg" id="annual_pkg"  class ="textinput form-control gender" required="" value="">
                                              <span><i class="fa fa-caret-down" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                          </div>
                                        </div>
                                     </div>
                                     <div class="col-sm-6 form-group form-group1">
                                       <div class="left margin">
                                         <div class="input-group">
                                            <label for="currency">Currency</label>
                                            <select class="itemName form-control" style="width:100%;height: 32px;" name="currency" value="" required >
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
                                      <div class="col-sm-6 form-group form-group1">
                                        <div class="left margin">
                                           <div class="input-group">
                                              <label for="joining_date">Joining Date</label>
                                              <input type="date" placeholder="" required  class="form-control required" id="joining_date" name="joining_date" required="" value="">
                                              <span><i class="fa fa-calendar" aria-hidden="true" style="margin-top: -30px; float: right; margin-right: 10px;"></i></span>
                                           </div>
                                         </div>
                                       </div>

                                       <div class="col-sm-6 form-group form-group1">
                                         <div class="left margin">
                                             <div class="input-group">
                                                 <label for="office" class="select-one">Office</label>
                                                 <select class="itemName form-control" style="width: 98%; height: 32px;" id="office" name="office" value="" required >
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
  </div>
        <!-- /.box -->
  </div>
  </div>
  </div>
  </section>
  </center>
  </div>

<script type="text/javascript">


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
            data: frm.serialize(),
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                console.log('Submission was successful.');
                console.log(data);
                if (data.status == 1) {
                  $("#employee-form").trigger("reset");
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
