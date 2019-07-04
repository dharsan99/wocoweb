  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.orgchart.css">
  <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
<style media="screen">
  .custom_menu_icon {
    left: 0;
    right: 130px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 30px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 25px;
    left: 247px;
}
  .hierarchy_div span.select2-selection.select2-selection--single {
    background-color: #2d418f !important;
    background-image: linear-gradient(to right, #eceff5 , #eceff5) !important;
    color: black !important;
    border-radius: 32px;
    border: 1px solid #2b519199;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #eceff5 !important;
    width: 285px;
  }

  .hierarchy_div .select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #333;
  }
  .hierarchy_div .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #333;
      line-height: 28px;
  }
  .hierarchy_div .select2-container--default .select2-selection--single .select2-selection__arrow b {
      border-color: #30388e transparent transparent transparent;
  }

  .orgchart .second-menu-icon {
    transition: opacity .5s;
    opacity: 0;
    right: -5px;
    top: -5px;
    z-index: 2;
    color: rgba(68, 157, 68, 0.5);
    font-size: 18px;
    position: absolute;
  }
  .orgchart .second-menu-icon:hover { color: #449d44; }
  .orgchart .node:hover .second-menu-icon { opacity: 1; }
  .orgchart .node .second-menu {
    display: none;
    position: absolute;
    top: 0;
    right: -70px;
    border-radius: 35px;
    box-shadow: 0 0 10px 1px #999;
    background-color: #fff;
    z-index: 1;
  }
  .orgchart .node .second-menu .avatar {
    width: 60px;
    height: 60px;
    border-radius: 30px;
    float: left;
    margin: 5px;
  }
  span.select2-dropdown.select2-dropdown--below {
      width: 285px !important;
      width: 285px !important;
      background-color: #eaebf3;
      box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
      border: none;
  }
  .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #5897fb;
    color: black;
    background-color: rgba(0, 0, 0, 0.1);
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
}
.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #fff;
    background: #eaebf3;
}
.select2-container--default .select2-results__option[aria-selected=true] {
    background-color: #d2d3da;
}






/* .custom-box #navbar a {
  float: left;
  display: block;
  color: #666;
  text-align: center;
  padding-right: 20px;
  text-decoration: none;
  font-size: 17px;
} */

.custom-box #navbar a:hover {
  background-color: #ddd;
  color: black;
}

.custom-box #navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.custom-box .main {
  padding: 16px;
  margin-top: 30px;
  width: 100%;
  height: 100vh;
  overflow: auto;
  cursor: grab;
  cursor: -o-grab;
  cursor: -moz-grab;
  cursor: -webkit-grab;
}



.custom-box .button {
  width: 300px;
  height: 60px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Hierarchy Management/</small></h1>
      <div class="row">
        <div class="col-xs-7">
            <h3>Hierarchy Management</h3>
        </div>
        <div class="col-xs-5 hierarchy_div">
            <div class="col-xs-5">
              <label class="checkbox-inline">
                <input type="checkbox" id="full_tree" name="full_tree"  value="1" onchange="viewFullTree()"> <i class="fa fa-sitemap frm-icon"></i> View Full Tree
              </label>
            </div>
          <div class="col-xs-5" style="margin-left: -48px;">
            <select id="select_mng_id" class="select-css" name="pmng_id" style="width:75%" value="" ></select>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="box custom-box">

        <div class="box-body no-padding">
          <div id="navbar">
            <button type="button" onclick="zoomin()"> Zoom In</button>
            <button type="button" onclick="zoomout()"> Zoom Out</button>
          </div>
          <div id="chart-container"  class="main dragscroll" style="background-color: #fff !important;border: 2px dashed #fff;"></div>
        </div><!-- /.box -->
      </div>
    </section>
</div>


<!-- Modal -->
<div class="modal right fade" id="myModal1" role="dialog" aria-labelledby="myModalLabel2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2">Update Manager </h4>
      </div>

      <div class="modal-body">
          <h4 id="model_title">Update Manager</h4>
            <!-- form start -->
            <?php $this->load->helper("form"); ?>
            <form id="admin-edit-form" role="form" action="<?php echo base_url() ?>hr/manager/add" method="post" role="form" class="custom-form">
                <div class="box-body">
                  <div class="row">
                     <div class="col-md-12 text-center">
                         <center>
                           <div class="profile-img">
                               <img alt="User Image" id="model_img" src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class=" profile-logo-img img-responsive" style="margin: 5% !important;">
                           </div>
                         </center>
                         <h3 id="model_name"></h3>
                         <h5 id="model_emp_id"></h4>
                         <h5 id="model_email"></h4>
                         <h5 id="model_role"></h4>
                          <input id="model_userId" type="hidden" name="user_id" value="0">
                     </div>
                   </div>

                   <br>
                   <div class="row">
                     <div class="col-md-12">
                         <div class="form-group">
                           <label for="select_pmng_id">Update Primary Manager</label>
                           <select id="select_pmng_id" class="itemName form-control" style="width:100%;height: 42px;" name="pmng_id">
                             <option value="0">Assign to HR</option>
                           </select>
                       </div>
                     </div>
                     <div class="col-md-12">
                         <div class="form-group">
                           <label for="select_smng_id">Update Secondry Manager</label>
                           <select id="select_smng_id" class="itemName form-control" style="width:100%;height: 42px;" name="smng_id">
                             <option value="0">Assign to HR</option>
                           </select>
                       </div>
                     </div>
                   </div>
                </div><!-- /.box-body -->

                <div class="box-footer text-center">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.mockjax.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.orgchart.js" charset="utf-8"></script>

<script type="text/javascript" language="javascript" >


var managerId = "";
var selectedUserId = "";

var oc;
var mId = "0";
var full_tree = '0';

<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

if (count($uri_segments) > 3) { ?>
  mId = <?php echo $uri_segments[3]; ?>
<?php } ?>

function getURL() {
  managerId = (managerId==''?'0':managerId);
  return '<?php echo base_url('hr/employee/p-manager-search/'); ?>/'+selectedUserId;
}

  $('#select_pmng_id').select2({
     placeholder: '--- Select Primary Manager ---',
     ajax: {
       url: function() {
             return getURL()
         },
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

function getURL1() {
  managerId = (managerId==''?'0':managerId);
  return '<?php echo base_url('hr/employee/s-manager-search'); ?>/'+managerId+"/"+selectedUserId;
}

 $('#select_smng_id').select2({
    placeholder: '--- Select Secondry Manager ---',
    ajax: {
      url: function() {
            return getURL1()
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
                    $('#admin-edit-form').attr('action','<?php echo base_url().'hr/employee/edit-hierarchy/'; ?>'+id);
                    $('#model_emp_id').text(adminData.emp_id+"");

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
                    $('#myModal1').modal('show');

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
                var mdID = $("#select_pmng_id option:selected").val();
                oc.init({ 'data': '<?php echo base_url(); ?>hr/hierarchy/tree/'+mdID+'/'+full_tree });
                $("#admin-edit-form").trigger("reset");
                $('#myModal1').modal('hide');
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

  $('#select_mng_id').select2({
         placeholder: 'Select Manager',
         ajax: {
           url: '<?php echo base_url('hr/hierarchy/manager-search'); ?>',
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
        var data = $("#select_mng_id option:selected").val();
        mId = data;
        oc.init({ 'data': '<?php echo base_url(); ?>hr/hierarchy/tree/'+mId+'/'+full_tree });
        i= 0;
      });


  $(function() {
  var ajaxURLs = {
    'children': function(nodeData) {
      return '<?php echo base_url(); ?>hr/hierarchy/tree/' + nodeData.userId+'/'+full_tree;
    }
  };

  oc = $('#chart-container').orgchart({
      'data' : '<?php echo base_url(); ?>hr/hierarchy/tree/'+mId+'/'+full_tree,
      'ajaxURL': ajaxURLs,
      'visibleLevel': 10,
      'nodeContent': 'role',
      'exportButton': false,
      'exportFilename': 'OrgChart',
      'exportFileextension':'png',
      'nodeID': 'userId','otherPro': 'email',
      'pan': true,
      'zoom': false,
      'zoominLimit':2,
      'createNode': function($node, data) {
        var secondMenuIcon = $('<i>', {
          'class': 'fa fa-edit second-menu-icon',
          click: function() {
            $('#model_title').text("Update Manager of "+data.name);
            $('#model_name').text(data.name);
            $('#model_email').text(data.email);
            $('#model_role').text(data.role);
            $('#model_userId').val(data.userId);
            if (data.profile_image != '') {
              $('#model_img').attr("src", '<?php echo base_url(); ?>uploads/user/' + data.profile_image);
            }else {
              $('#model_img').attr("src", '<?php echo base_url(); ?>assets/dist/img/avatar.png');
            }
            selectedUserId = data.userId;
            editEmployee(data.userId);
          }
        });
        $node.append(secondMenuIcon);
        var secondMenuIcon1 = $('<i>', {
          'class': 'fa fa-info-circle custom_menu_icon second-menu-icon',
          click: function() {
            $(this).siblings('.second-menu').toggle();
          }
        });
        var secondMenu1 = '<div class="second-menu"><img class="avatar" src="<?php echo base_url(); ?>uploads/user/' + data.profile_image + '"></div>';
        $node.append(secondMenuIcon1).append(secondMenu1);
      }
    });

    oc.$chartContainer.on('touchmove', function(event) {
      event.preventDefault();
    });

  });

  function viewFullTree() {
    if ($("#full_tree").is(':checked')) {
      full_tree = '1';
      i=0;
    }else {
      full_tree = '0';
      i=0;
    }
    oc.init({ 'data': '<?php echo base_url(); ?>hr/hierarchy/tree/'+mId+'/'+full_tree});
  }


var i = 0;
  function zoomin() {
  var myImg = document.getElementsByClassName("orgchart")[0];
  if (i < 5) {
    myImg.style.transform = "scale(1."+ (++i) +")";
  }
}

function zoomout() {
  var myImg = document.getElementsByClassName("orgchart")[0];
  if (i > 0) {
    myImg.style.transform = "scale(1."+ (--i) +")";
  }
}
</script>
