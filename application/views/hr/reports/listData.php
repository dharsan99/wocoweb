<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Reports Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Reports Management</h3>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box custom-box reports-box">
            <div class="row">
              <div class="col-md-8">
                     <div id="tab" class="" data-toggle="buttons">
                       <a href="#prices" class="btn btn-default active" data-toggle="tab" >
                         <input type="radio" class="btn btn-primary" value="Team " style="width:150px !important; height: 38px !important; box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);">Team
                       </a>
                       <a href="#features" class="btn btn-default" data-toggle="tab">

                         <input type="radio" class="btn btn-default rqst-btn-rst" onclick="resetform()" value="Department" style="width:150px !important;     box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.13);">Department
                       </a>
                  </div>

                   <!-- <div class="tab-content">
                     <div class="tab-pane active" id="prices">Prices content</div>
                     <div class="tab-pane" id="features">Features Content</div>
                   </div> -->
               </div>
                 <div class="col-md-4">
                   <div class="tab-content">
                     <div class="tab-pane active" id="prices">
                       <div class="box-footer" style="/* text-align:center; */float: right;/* margin-top: -35px; */">
                         <input type="submit" class="btn btn-primary" value="Compare Teams" style="width:174px !important; height: 38px !important; box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);" >
                       </div>
                     </div>
                     <div class="tab-pane" id="features">
                       <div class="box-footer" style="/* text-align:center; */float: right;/* margin-top: -35px; */">
                         <input type="submit" class="btn btn-primary" value="Compare Department" style="width:221px !important; height: 38px !important; box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);" >
                       </div>
                     </div>
                   </div>
                 </div>

      <br><br><br><br><br>


              <!-- <div class="col-md-6 rprt-mng-btn">
                <div class="box-footer" style="/* text-align:center; *//* float: right; *//* margin-top: -35px; */">
                    <input type="submit" class="btn btn-primary" value="Team " style="width:150px !important; height: 38px !important; box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);" >
                      <input type="reset" class="btn btn-default rqst-btn-rst" onclick="resetform()" value="Department" style="width:150px !important;     box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.13);">
                  </div>
              </div> -->
              <!-- <div class="col-md-6 ">
                <div class="box-footer" style="/* text-align:center; */float: right;/* margin-top: -35px; */">
                    <input type="submit" class="btn btn-primary" value="Compare Teams" style="width:174px !important; height: 38px !important; box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);" >
                  </div>
              </div> -->

                <div class="tab-pane" id="features">
                  <div class="col-md-2 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 24px; margin-top: 17px; background-color: #eceff5;     width: 199px;">
                      <div class="custom-select">
                        <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                          <option value="">All Department</option>
                          <option value="">All Department</option>
                          <option value="">All Department</option>
                          <option value="">All Department</option>
                      </select>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Team " style=" width: 109px !important;margin-top: 16px;margin-left: 10px; box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);" >
                </div>

                <div class="col-md-6" style="margin-top: 20px;">
                  <ul class="nav nav-pills nav-pills-div">
                    <li class="active">
                      <a data-toggle="pill" href="#home">Weakly</a>
                    </li>
                    <li class="">
                      <a data-toggle="pill" href="#menu1">Monthly</a>
                    </li>
                    <li class="">
                      <a data-toggle="pill" href="#menu2">Quaterly</a>
                    </li>
                    <li class="">
                      <a data-toggle="pill" href="#menu3">Yearly</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-5">
                  <div class="tab-content divpill" style="margin-left: 20px; ">
                    <div id="home" class="tab-pane fade active in" style="">
                      <div class="col-sm-3" style="">
                        <div class="col-md-3 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: -86px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">2018</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3" style="">
                        <div class="col-md-3 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: -37px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">May</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3" style="">
                        <div class="col-md-3 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 10px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">7-9-2019</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3" style="">
                        <input type="submit" class="btn btn-primary" value="Apply " style=" width: 109px !important;margin-top: 16px;margin-left: 68px !important;box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);">
                      </div>

                    </div>


                    <div id="menu1" class="tab-pane fade">
                      <div class="col-sm-5" style="">
                        <div class="col-md-2 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 24px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">2018</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5" style="">
                        <div class="col-md-2 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 24px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">May</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-2" style="">
                        <input type="submit" class="btn btn-primary" value="Apply " style=" width: 109px !important;margin-top: 16px;margin-left: 29px;box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);">
                      </div>
                    </div>



                    <div id="menu2" class="tab-pane fade">
                      <div class="col-sm-5" style="">
                        <div class="col-md-2 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 24px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">2018</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5" style="">
                        <div class="col-md-2 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 24px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">7-9-2019</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2" style="">
                        <input type="submit" class="btn btn-primary" value="Apply " style=" width: 109px !important;margin-top: 16px;margin-left: 29px;box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);">
                      </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <div class="col-sm-5" style="">
                        <div class="col-md-2 report-mng" style=" border: 1px solid #2b519199; border-radius: 32px; margin-left: 24px; margin-top: 17px; background-color: #eceff5;     width: 133px;">
                            <div class="custom-select">
                              <select class="select form-control gender" style="width:97%;height: 31px;" name="g" id="og" value="">
                                <option value="">2018</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                                <option value="">All Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3" style="">
                        <input type="submit" class="btn btn-primary" value="Apply " style=" width: 109px !important;margin-top: 16px;margin-left: 29px;box-shadow: 0px 8px 15px rgba(42, 77, 145, 0.59);">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr style=" margin-top: 6px !important; border-top: 2px solid #eceff5;">
            <div class="col-xs-12">
              <div class="box custom-box">
                <div class="row">
                  <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Pancuality</h3><br>
                    <h4 class="box-title">60%</h4><br>
                    <h4 class="box-title">Aggregate Attendence</h4>

                <div class="col-xs-2 text-right" style="margin-top: -30px;/* margin-left: 47px; */float: right;margin-right: 79px;">
                <a class="btn btn-primary" href="http://woco.co.in/hr/employee/userView" style=""><i class="fa fa-list-ul" style="margin-right: 5px;font-size: 16px;"></i> View Details </a>
                  </div>
              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="revenue-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="748" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.203125" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,261H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,202H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,143H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,84H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,25H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="601.6684955953828" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="307.5802133961118" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="#487fb2" stroke="none" d="M61.703125,229.5412C80.18408262454435,229.2108,117.14599787363304,231.53245,135.62695549817738,228.2196C154.10791312272173,224.90675000000002,191.06982837181044,204.50514644808743,209.5507859963548,203.0384C227.8308636467193,201.58759644808742,264.39101894744834,219.34895,282.6710965978129,216.5494C300.9511742481774,213.74984999999998,337.5113295489065,183.43358661202186,355.79140719927096,180.642C374.27236482381534,177.81973661202184,411.23428007290397,191.15875,429.71523769744834,194.094C448.1961953219927,197.02925,485.1581105710814,218.06921420765028,503.6390681956258,204.124C521.9191458459903,190.33036420765026,558.4793011467193,91.8402361878453,576.7593787970839,83.1386C594.8385764732685,74.5325861878453,630.996971825638,125.20556758241756,649.0761695018226,134.89339999999999C667.5571271263669,144.79651758241758,704.5190423754557,154.85015,723,161.50240000000002L723,261L61.703125,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#2b669d" d="M61.703125,229.5412C80.18408262454435,229.2108,117.14599787363304,231.53245,135.62695549817738,228.2196C154.10791312272173,224.90675000000002,191.06982837181044,204.50514644808743,209.5507859963548,203.0384C227.8308636467193,201.58759644808742,264.39101894744834,219.34895,282.6710965978129,216.5494C300.9511742481774,213.74984999999998,337.5113295489065,183.43358661202186,355.79140719927096,180.642C374.27236482381534,177.81973661202184,411.23428007290397,191.15875,429.71523769744834,194.094C448.1961953219927,197.02925,485.1581105710814,218.06921420765028,503.6390681956258,204.124C521.9191458459903,190.33036420765026,558.4793011467193,91.8402361878453,576.7593787970839,83.1386C594.8385764732685,74.5325861878453,630.996971825638,125.20556758241756,649.0761695018226,134.89339999999999C667.5571271263669,144.79651758241758,704.5190423754557,154.85015,723,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.703125" cy="229.5412" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="135.62695549817738" cy="228.2196" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.5507859963548" cy="203.0384" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="282.6710965978129" cy="216.5494" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="355.79140719927096" cy="180.642" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="429.71523769744834" cy="194.094" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="503.6390681956258" cy="204.124" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="576.7593787970839" cy="83.1386" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="649.0761695018226" cy="134.89339999999999" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="723" cy="161.50240000000002" r="4" fill="#2b669d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 312.791px; top: 111px; display: none;"><div class="morris-hover-row-label">2012 Q1</div><div class="morris-hover-point" style="color: #2b669d">
  Item 1:
  6,810
</div></div></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- DONUT CHART -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Pancuality</h3><br>
                  <h4 class="box-title">60%</h4><br>
                  <h4 class="box-title">Aggregate Attendence</h4>

                <div class="col-xs-2 text-right" style="margin-top: -30px;/* margin-left: 47px; */float: right;margin-right: 79px;">
                                  <a class="btn btn-primary" href="http://woco.co.in/hr/employee/userView" style=""><i class="fa fa-list-ul" style="margin-right: 5px;font-size: 16px;"></i> View Details </a>
                                </div>
              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="sales-chart" style="height: 300px; position: relative;"><svg height="300" version="1.1" width="748" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#fcd3aa" d="M374,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,465.583894737841,167.9861428816512" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#fcd3aa" stroke="#ffffff" d="M374,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,468.5276627829859,168.56426890284712L506.46956203152,176.0156709538169A135,135,0,0,1,374,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f2c6f1" d="M465.583894737841,167.9861428816512A93.33333333333333,93.33333333333333,0,0,0,457.5838186863824,108.46860988465397" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#f2c6f1" stroke="#ffffff" d="M468.5276627829859,168.56426890284712A96.33333333333333,96.33333333333333,0,0,0,460.27044142987324,107.13367234523214L494.8980234570888,89.92781072601736A135,135,0,0,1,506.46956203152,176.0156709538169Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#97ede1" d="M457.5838186863824,108.46860988465397A93.33333333333333,93.33333333333333,0,0,0,424.7479478207284,71.66892760152113" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#97ede1" stroke="#ffffff" d="M460.27044142987324,107.13367234523214A96.33333333333333,96.33333333333333,0,0,0,426.37913185782327,69.15114313157002L447.40328166926787,36.6996988522002A135,135,0,0,1,494.8980234570888,89.92781072601736Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#c5cbfc" d="M424.7479478207284,71.66892760152113A93.33333333333333,93.33333333333333,0,0,0,280.674745152299,151.22797342103516" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#c5cbfc" stroke="#ffffff" d="M426.37913185782327,69.15114313157002A96.33333333333333,96.33333333333333,0,0,0,277.6750048179086,151.26744399528272L234.01211772844846,151.84196013155272A140,140,0,0,1,450.1219217310926,32.50339140228169Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#8ad4f6" d="M280.674745152299,151.22797342103516A93.33333333333333,93.33333333333333,0,0,0,373.9706784690487,243.333328727518" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#8ad4f6" stroke="#ffffff" d="M277.6750048179086,151.26744399528272A96.33333333333333,96.33333333333333,0,0,0,373.9697359912682,246.3333285794739L373.9575884998741,284.9999933380171A135,135,0,0,1,239.01168495243246,151.77617584114014Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="374" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(2.7451,0,0,2.7451,-652.653,-259.1471)" stroke-width="0.36428571428571427"><tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">IOS</tspan></text><text x="374" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.9444,0,0,1.9444,-353.2075,-143.5556)" stroke-width="0.5142857142857143"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">35</tspan></text></svg></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <div class="col-md-6">
                      <!-- LINE CHART -->
                      <div class="box box-info">
                        <div class="box-header with-border">
                <h3 class="box-title">Pancuality</h3><br>
                        <h4 class="box-title">60%</h4><br>
                        <h4 class="box-title">Aggregate Attendence</h4>

                <div class="col-xs-2 text-right" style="margin-top: -30px;/* margin-left: 47px; */float: right;margin-right: 79px;">
                                  <a class="btn btn-primary" href="http://woco.co.in/hr/employee/userView" style=""><i class="fa fa-list-ul" style="margin-right: 5px;font-size: 16px;"></i> View Details </a>
                                </div>
              </div>
                        <div class="box-body chart-responsive">
                          <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="748" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.203125" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,261H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,202H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,143H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,84H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,25H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="601.6684955953828" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="307.5802133961118" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#3c8dbc" d="M61.703125,229.5412C80.18408262454435,229.2108,117.14599787363304,231.53245,135.62695549817738,228.2196C154.10791312272173,224.90675000000002,191.06982837181044,204.50514644808743,209.5507859963548,203.0384C227.8308636467193,201.58759644808742,264.39101894744834,219.34895,282.6710965978129,216.5494C300.9511742481774,213.74984999999998,337.5113295489065,183.43358661202186,355.79140719927096,180.642C374.27236482381534,177.81973661202184,411.23428007290397,191.15875,429.71523769744834,194.094C448.1961953219927,197.02925,485.1581105710814,218.06921420765028,503.6390681956258,204.124C521.9191458459903,190.33036420765026,558.4793011467193,91.8402361878453,576.7593787970839,83.1386C594.8385764732685,74.5325861878453,630.996971825638,125.20556758241756,649.0761695018226,134.89339999999999C667.5571271263669,144.79651758241758,704.5190423754557,154.85015,723,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.703125" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="135.62695549817738" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.5507859963548" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="282.6710965978129" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="355.79140719927096" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="429.71523769744834" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="503.6390681956258" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="576.7593787970839" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="649.0761695018226" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="723" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 18.7031px; top: 160px; display: none;"><div class="morris-hover-row-label">2011 Q1</div><div class="morris-hover-point" style="color: #3c8dbc">
            Item 1:
            2,666
          </div></div></div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->

                      <!-- BAR CHART -->
                      <div class="box box-success">
                        <div class="box-header with-border">
                <h3 class="box-title">Pancuality</h3><br>
                        <h4 class="box-title">60%</h4><br>
                        <h4 class="box-title">Aggregate Attendence</h4>

                <div class="col-xs-2 text-right" style="margin-top: -30px;/* margin-left: 47px; */float: right;margin-right: 79px;">
                                  <a class="btn btn-primary" href="http://woco.co.in/hr/employee/userView" style=""><i class="fa fa-list-ul" style="margin-right: 5px;font-size: 16px;"></i> View Details </a>
                                </div>
              </div>
                        <div class="box-body chart-responsive">
                          <div class="chart" id="bar-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="748" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="35.84375" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,261H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">17.5</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,202H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">35</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,143H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">52.5</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,84H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">70</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,25H723" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="655.534375" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><text x="520.603125" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan></text><text x="385.671875" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan></text><text x="250.740625" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2007</tspan></text><text x="115.809375" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan></text><rect x="65.21015625" y="58.71428571428572" width="17.839687500000004" height="202.28571428571428" rx="0" ry="0" fill="#fcd2ab" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="86.04984375000001" y="92.42857142857142" width="17.839687500000004" height="168.57142857142858" rx="0" ry="0" fill="#88d8f7" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="106.88953125" y="159.85714285714286" width="17.839687500000004" height="101.14285714285714" rx="0" ry="0" fill="#bdb1fe" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="127.72921875" y="109.28571428571428" width="17.839687500000004" height="151.71428571428572" rx="0" ry="0" fill="#9af3da" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="148.56890625" y="31.742857142857133" width="17.839687500000004" height="229.25714285714287" rx="0" ry="0" fill="#f5c5f1" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="200.14140625" y="58.71428571428572" width="17.839687500000004" height="202.28571428571428" rx="0" ry="0" fill="#fcd2ab" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="220.98109374999999" y="92.42857142857142" width="17.839687500000004" height="168.57142857142858" rx="0" ry="0" fill="#88d8f7" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="241.82078124999998" y="159.85714285714286" width="17.839687500000004" height="101.14285714285714" rx="0" ry="0" fill="#bdb1fe" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="262.66046875" y="109.28571428571428" width="17.839687500000004" height="151.71428571428572" rx="0" ry="0" fill="#9af3da" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="283.50015625000003" y="31.742857142857133" width="17.839687500000004" height="229.25714285714287" rx="0" ry="0" fill="#f5c5f1" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="335.07265625" y="58.71428571428572" width="17.839687500000004" height="202.28571428571428" rx="0" ry="0" fill="#fcd2ab" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="355.91234375000005" y="92.42857142857142" width="17.839687500000004" height="168.57142857142858" rx="0" ry="0" fill="#88d8f7" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="376.75203125" y="159.85714285714286" width="17.839687500000004" height="101.14285714285714" rx="0" ry="0" fill="#bdb1fe" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="397.59171875000004" y="109.28571428571428" width="17.839687500000004" height="151.71428571428572" rx="0" ry="0" fill="#9af3da" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="418.43140625" y="31.742857142857133" width="17.839687500000004" height="229.25714285714287" rx="0" ry="0" fill="#f5c5f1" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="470.00390625000006" y="58.71428571428572" width="17.839687500000004" height="202.28571428571428" rx="0" ry="0" fill="#fcd2ab" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="490.8435937500001" y="92.42857142857142" width="17.839687500000004" height="168.57142857142858" rx="0" ry="0" fill="#88d8f7" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="511.68328125000005" y="159.85714285714286" width="17.839687500000004" height="101.14285714285714" rx="0" ry="0" fill="#bdb1fe" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="532.52296875" y="109.28571428571428" width="17.839687500000004" height="151.71428571428572" rx="0" ry="0" fill="#9af3da" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="553.3626562500001" y="31.742857142857133" width="17.839687500000004" height="229.25714285714287" rx="0" ry="0" fill="#f5c5f1" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="604.93515625" y="58.71428571428572" width="17.839687500000004" height="202.28571428571428" rx="0" ry="0" fill="#fcd2ab" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="625.77484375" y="92.42857142857142" width="17.839687500000004" height="168.57142857142858" rx="0" ry="0" fill="#88d8f7" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="646.61453125" y="159.85714285714286" width="17.839687500000004" height="101.14285714285714" rx="0" ry="0" fill="#bdb1fe" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="667.45421875" y="109.28571428571428" width="17.839687500000004" height="151.71428571428572" rx="0" ry="0" fill="#9af3da" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="688.29390625" y="31.742857142857133" width="17.839687500000004" height="229.25714285714287" rx="0" ry="0" fill="#f5c5f1" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 93.3094px; top: 82px; display: none;"><div class="morris-hover-row-label">2006</div><div class="morris-hover-point" style="color: #fcd2ab">
            A:
            60
          </div><div class="morris-hover-point" style="color: #88d8f7">
            B:
            50
          </div><div class="morris-hover-point" style="color: #bdb1fe">
            C:
            30
          </div><div class="morris-hover-point" style="color: #9af3da">
            D:
            45
          </div><div class="morris-hover-point" style="color: #f5c5f1">
            E:
            68
          </div></div></div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->

                    </div>
                    </div>
                                <!-- /.box -->
                </div>
              </div>

                <!-- /.box -->
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
    <h4 class="modal-title" id="myModalLabel2">Add New Team </h4>
  </div>

  <div class="modal-body">
      <h4>Enter Team Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-form" role="form" action="<?php echo base_url() ?>hr/team/add" method="post" role="form" class="custom-form">
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Department</label>
                            <select id="add-team-department" class="itemName form-control" style="width: 98%; height: 32px;" name="department" value="" required >
                                <option value="">-- Select Employee Department --</option>
                                <?php foreach ($department as $key => $value): ?>
                                  <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                         </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="head">Head</label>

                      <select id="add-team-head" class="itemName form-control" style="width: 98%; height: 32px;" name="head" value="" required>
                          <option value="">-- Select Employee Head --</option>
                          <?php foreach ($head as $key => $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control required" value="<?php echo set_value('title'); ?>" id="title" name="title" maxlength="128" required>
                    </div>
                  </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="4" cols="40" class="form-control required" value="<?php echo set_value('description'); ?>" id="description" maxlength="128" required></textarea>
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

</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->



<!-- Modal -->
<div class="modal right fade" id="myModal3" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel2">Edit Team </h4>
  </div>

  <div class="modal-body">
      <h4>Edit Team Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-edit-form" role="form" action="<?php echo base_url() ?>hr/team/edit" method="post" role="form" class="custom-form">
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="department">Department</label>

                          <select class="itemName form-control" style="width: 98%; height: 32px;"  id="edit_department"  name="department" value="" required >
                              <option value="">-- Select Employee Department --</option>
                              <?php foreach ($department as $key => $value): ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                              <?php endforeach; ?>
                          </select>

                         </div>
                      </div>
                  </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="head">Title</label>
                      <input type="text" class="form-control required" value="" id="edit_head" name="head" maxlength="128" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control required" value="" id="edit_title" name="title" maxlength="128" required>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" rows="4" cols="40" class="form-control required" value="" id="edit_description" maxlength="128" required></textarea>
                      </div>
                  </div>
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <!-- <input type="reset" class="btn btn-default" value="Reset" /> -->
            </div>
        </form>
  </div>

</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
<div class="modal fade popup-form" id="myModal" role="dialog">
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
          "url": "<?php echo base_url("hr/team/getListData"); ?>",
          "dataType": "json",
          "type": "POST",
          "data":{ 'ci_csrf_token' : '' }
        },
        "columns": [
          { "data": "id" },
          { "data": "title" },
          { "data": "department" },
          { "data": "head" },
          { "data": "description" },
          { "data": "created" },
          { "data": "created_by" },
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
            }
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
              if (data.length > 20) {
                return data.substring(0,20)+".....";
              }else {
                return data;
              }
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
            }
          },
          {
            "targets": 6,
            "render": function ( data, type, row ) {
            return data;
            }
          },
          {
            "targets": 7,
            orderable: false,
            "render": function ( data, type, row ) {
              var str = "<div style='width:120px'>";
              str += '<a class="btn btn-sm " href="javascript:editTeam(' + row.id + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
              str += '<a class="btn btn-sm " href="javascript:deleteTeam(' + row.id + ')" title="Delete"><i class="fa fa-trash"></i></a>';
              str += '</div>';
              return str;
            }
          }
        ]
  });

});

    function blockTeam(id) {
      swal({
        title: "Are you sure?",
        text: "Team will be blocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'hr/team/block/'; ?>'+id,
              dataType: 'JSON',
              success: function (data) {
                $('#loader').hide();
                  if (data.status == true) {
                    swal(data.message, {
                      icon: "success",
                    }).then((value) => {
                      dataTable.ajax.reload();
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


    function unblockTeam(id) {
          swal({
        title: "Are you sure?",
        text: "Team will be unblocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'hr/team/unblock/'; ?>'+id,
                  dataType: 'JSON',
                  success: function (data) {
                    $('#loader').hide();
                      if (data.status == true) {
                        swal(data.message, {
                          icon: "success",
                        }).then((value) => {
                          dataTable.ajax.reload();
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


    function editTeam(id) {
        $('#loader').show();
        $.ajax({
                type: 'GET',
                url: '<?php echo base_url().'hr/team/edit/'; ?>'+id,
                dataType: 'JSON',
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 1) {

                      var hrData = data.data[0];
                      $('#admin-edit-form').attr('action','<?php echo base_url().'hr/team/edit/'; ?>'+id);
                      $('#edit_title').val(hrData.title);
                      $('#edit_department option[value='+hrData.department_id+']').attr('selected','selected');

                      $('#edit_description').val(hrData.description);
                      $('#myModal3').modal('toggle');

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


    function deleteTeam(id) {
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
                      url: '<?php echo base_url().'hr/team/delete/'; ?>'+id,
                      dataType: 'JSON',
                      success: function (data) {
                        $('#loader').hide();
                          if (data.status == true) {
                            swal(data.message, {
                              icon: "success",
                            }).then((value) => {
                              dataTable.ajax.reload();
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

    $('#add-team-department').on('change', function() {
        $('#add-team-head').html('');

  $.ajax({
          type: 'GET',
          url: '<?php echo base_url().'hr/team/getusers/'; ?>'+this.value,
          dataType: 'JSON',
          success: function (data) {
            $('#loader').hide();
              if (data.status == true) {
                var str = "";
                for (var i = 0; i < data.data.length; i++) {
                  var row = data.data[i];
                  str += '<option value="'+row.userId+'">'+row.name+'('+row.email+')</option>';
                }
                $('#add-team-head').html(str);
              }
              else {
                swal("Failed!", data.message, "error");
                  $('#add-team-head').html('');
              }
          },
          error: function (data) {
            $('#loader').hide();
              swal("Error", 'An error occurred.', "error");
                $('#add-team-head').html('');
          },
      });
});


</script>
