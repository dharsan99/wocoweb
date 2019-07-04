<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=true&libraries=places&key=<?php echo GOOGLE_PLACE_API_KEY; ?>'></script>
<script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.czMore.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Location Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Location Management</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="javascript:void($('#myModal2').modal('toggle'));"><i class="fa fa-plus frm-icon"></i> Add New Location </a>
          </div>
      </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box custom-box">
                <div class="box-body table-responsive no-padding">

                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
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
                              <div class="has-feedback">
                                  <input type="date" data-column="5" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                              </div>
                            </td>
                            <td>
                                <select data-column="6"  class="search-input-select">
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
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>

                </div><!-- /.box -->
              </div>
            </div>
        </div>
    </section>





</div>

<!-- Modal -->
<div class="modal right fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel2">
<div class="modal-dialog" role="document" style="width: 600px !important;">
<div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel2">Add New Location </h4>
  </div>

  <div class="modal-body">
      <h4>Enter Location Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-form" role="form" action="<?php echo base_url() ?>admin/location/add" method="post" role="form" class="custom-form">
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control required" value="" id="title" name="title" maxlength="128" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control required" value="" id="description" name="description" maxlength="128" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <label for="description">Search Location</label>
                        <input type="text" class="form-control" id="us5-address" />
                        <div id="us5" style="width: 100%; height: 300px;">
                        </div>
                        <p></p>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="address_line_1">Address Line 1</label>
                          <input type="text" class="form-control required" id="us5-street1" value="" name="address_line_1" required>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="address_line_2">Address Line 2</label>
                          <input type="text" class="form-control required" id="us5-street2" value="" name="address_line_2" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control required" id="us5-city" value="" name="city" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" class="form-control required" id="us5-state" value="" name="state" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="country">Country</label>
                          <input type="text" class="form-control required" id="us5-country" value="" name="country" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="zip">Zip</label>
                          <input type="text" class="form-control required" id="us5-zip" value="" name="zip" required>
                      </div>
                  </div>
                  <input id="us5-lat" type="hidden" name="lat" value="" required>
                  <input id="us5-lng" type="hidden" name="lng" value="" required>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="min_radius">Min Radius</label>
                            <input type="number" class="form-control required" id="min_radius" value="" name="min_radius" maxlength="4" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <label for="min_radius">Add Devices</label>
                        <div id="czContainer">
                            <div id="first">
                                <div class="recordset">
                                    <div class="fieldRow clearfix">
                                        <div class="col-md-5">
                                            <div id="div_id_stock_1_service">
                                              <div class="controls ">
                                                <select class="select form-control" name="device_type[]" id="device_type">
                                                  <option value="">--Select--</option>
                                                  <option value="1">Wifi Router</option>
                                                  <option value="2">Beacon</option>
                                                  <option value="3">Tablet</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div id="div_id_stock_1_unit" class="form-group">
                                              <input type="text" class="textinput form-control" id="device_id" value="" name="device_id[]" placeholder="Device Id" required/>
                                          </div>
                                        </div>
                                        <!-- <div class="col-md-2">
                                          <div id="div_id_stock_1_unit" class="form-group">
                                              <input type="text" class="device_lat textinput form-control" id="device_lat" value="" name="device_lat[]" placeholder="Latitude" required readonly/>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div id="div_id_stock_1_quantity" class="form-group">
                                            <input type="text" class="device_lng textinput form-control" id="device_lng" value="" name="device_lng[]" placeholder="Longitude" required readonly/>
                                          </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
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
<div class="modal-dialog" role="document" style="width: 600px !important;">
<div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel2">Edit Location </h4>
  </div>

  <div class="modal-body">
      <h4>Edit Location Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>

        <form id="admin-edit-form" role="form" action="<?php echo base_url() ?>admin/location/edit" method="post" role="form" class="custom-form">
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control required" value="" id="edit_title" name="title" maxlength="128" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control required" value="" id="edit_description" name="description" maxlength="128" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <label for="description">Search Location</label>
                      <input type="text" class="form-control" id="us6-address" />
                        <div id="us6" style="width: 100%; height: 300px;"></div>
                        <p></p>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="address_line_1">Address Line 1</label>
                          <input type="text" class="form-control required" id="edit_street1" value="" name="address_line_1" required>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="address_line_2">Address Line 2</label>
                          <input type="text" class="form-control required" id="edit_street2" value="" name="address_line_2" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control required" id="edit_city" value="" name="city" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" class="form-control required" id="edit_state" value="" name="state" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="country">Country</label>
                          <input type="text" class="form-control required" id="edit_country" value="" name="country" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="zip">Zip</label>
                          <input type="text" class="form-control required" id="edit_zip" value="" name="zip" required>
                      </div>
                  </div>
                  <input type="hidden" id="edit_lat" name="lat" value="" required>
                  <input type="hidden" id="edit_lng" name="lng" value="" required>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="min_radius">Min Radius</label>
                            <input type="number" class="form-control required" id="edit_min_radius" value="" name="min_radius" maxlength="4" required>
                        </div>
                    </div>
                </div>

                <div class="row" id="edit_div_location_img">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="min_radius">Location Image</label>
                            <img src="" alt="Location Image" id="edit_location_img" style="height: 600px;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <label for="min_radius">Device List</label>
                        <div id="czContainer-edit">
                            <div id="first">
                                <div class="recordset">
                                    <div class="fieldRow clearfix">
                                        <div class="col-md-5">
                                            <div id="div_id_stock_1_service">
                                              <div class="controls ">
                                                <select class="select form-control" name="device_type[]" id="device_type">
                                                  <option value="">--Select--</option>
                                                  <option value="1">Wifi Router</option>
                                                  <option value="2">Beacon</option>
                                                  <option value="3">Tablet</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div id="div_id_stock_1_unit" class="form-group">
                                              <input type="text" class="textinput form-control" id="device_id" value="" name="device_id[]" placeholder="Device Id" required/>
                                          </div>
                                        </div>
                                        <!-- <div class="col-md-2">
                                          <div id="div_id_stock_1_unit" class="form-group">
                                              <input type="text" class="device_lat textinput form-control" id="device_lat" value="" name="device_lat[]" placeholder="Latitude" required readonly/>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div id="div_id_stock_1_quantity" class="form-group">
                                            <input type="text" class="device_lng textinput form-control" id="device_lng" value="" name="device_lng[]" placeholder="Longitude" required readonly/>
                                          </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script type="text/javascript" language="javascript" >

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
  onAdd: function(event, data) {

  },
  onDelete: null
});

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
          "url": "<?php echo base_url("admin/location/getListData"); ?>",
          "dataType": "json",
          "type": "POST",
          "data":{ 'ci_csrf_token' : '' }
        },
        "columns": [
          { "data": "id" },
          { "data": "title" },
          { "data": "city" },
          { "data": "state" },
          { "data": "zip" },
          { "data": "created" },
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
            render: function ( data, type, row ) {
              switch (row.status)
              {
                case '0':
                  return '<button type="button" class="btn btn-danger btn-xs"> Deactive </button>';
                  break;
                case '1':
                  return '<button type="button" class="btn btn-success btn-xs"> Active </button>';
                  break;

                default:
                  return '<button type="button" class="btn btn-danger btn-xs"> Deactive </button>';
                  break;
              }
            }
          },
          {
            "targets": 7,
            orderable: false,
            render: function ( data, type, row ) {
              var str = "<div style='width:120px'>";
              if (row.status == '1') {
                str += '<a class="btn btn-sm " href="javascript:blockAdmin(' + row.id + ')" title="Block"><i class="fa fa-ban"></i></a>';
              }else{
                str += '<a class="btn btn-sm " href="javascript:unblockAdmin(' + row.id + ')" title="Block"><i class="fa fa-check"></i></a>';
              }
              str += '<a class="btn btn-sm " href="javascript:editAdmin(' + row.id + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
              str += '<a class="btn btn-sm " href="javascript:deleteAdmin(' + row.id + ')" title="Delete"><i class="fa fa-trash"></i></a>';
              str += '</div>';
              return str;
            }
          },
        ]
  });

});

    function blockAdmin(id) {
      swal({
        title: "Are you sure?",
        text: "Location will be blocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'admin/location/block/'; ?>'+id,
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


    function unblockAdmin(id) {
          swal({
        title: "Are you sure?",
        text: "Location will be unblocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'admin/location/unblock/'; ?>'+id,
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


    function editAdmin(id) {
        $('#loader').show();
        $.ajax({
                type: 'GET',
                url: '<?php echo base_url().'admin/location/edit/'; ?>'+id,
                dataType: 'JSON',
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 1) {

                      var adminData = data.data[0];
                      $('#admin-edit-form').attr('action','<?php echo base_url().'admin/location/edit/'; ?>'+id);
                      $('#edit_title').val(adminData.title);
                      $('#edit_description').val(adminData.description);
                      $('#edit_street1').val(adminData.address_line_1);
                      $('#edit_street2').val(adminData.address_line_2);
                      $('#edit_city').val(adminData.city);
                      $('#edit_state').val(adminData.state);
                      $('#edit_country').val(adminData.country);
                      $('#edit_zip').val(adminData.zip);
                      $('#edit_lat').val(adminData.lat);
                      $('#edit_lng').val(adminData.lng);
                      $('#edit_min_radius').val(adminData.min_radius);
                      if (adminData.location_img != "") {
                        $('#edit_location_img').attr('src', '<?php echo base_url().'uploads/location/'; ?>'+adminData.location_img);
                        $('#edit_div_location_img').show();
                      }else {
                        $('#edit_location_img').attr('src', '<?php echo base_url().'uploads/location/'; ?>'+adminData.location_img);
                        $('#edit_div_location_img').hide();
                      }

                      $('#czContainer-edit').html("");
                      $('#czContainer-edit_czMore_txtCount').val('0');
                      var devices = adminData.devices;
                      for(var i = 1; i <= devices.length; i++){
                        var tempStr = '<div class="recordset">';
                                    tempStr += '<div id="btnMinus" class="btnMinus" onclick="removeSelf(this)"></div><div class="fieldRow clearfix">';
                                        tempStr += '<div class="col-md-5">';
                                            tempStr += '<div id="div_id_stock_'+i+'_service">';
                                              tempStr += '<div class="controls ">';
                                                tempStr += '<select class="select form-control" name="device_type[]" id="device_type">';
                                                  tempStr += '<option value="">--Select--</option>';
                                                  tempStr += '<option value="1" ' + (devices[i-1].device_type == 1? "selected":"") + '>Wifi Router</option>';
                                                  tempStr += '<option value="2" ' + (devices[i-1].device_type == 2? "selected":"") + '>Beacon</option>';
                                                  tempStr += '<option value="3" ' + (devices[i-1].device_type == 3? "selected":"") + '>Tablet</option>';
                                                tempStr += '</select>';
                                              tempStr += '</div>';
                                            tempStr += '</div>';
                                        tempStr += '</div>';
                                        tempStr += '<div class="col-md-6">';
                                          tempStr += '<div id="div_id_stock_1_unit" class="form-group">';
                                              tempStr += '<input type="text" class="textinput form-control" id="device_id" value="'+devices[i-1].device_id+'" name="device_id[]" placeholder="Device Id" required="">';
                                          tempStr += '</div>';
                                        tempStr += '</div>';
                                    tempStr += '</div>';
                                tempStr += '</div>';
                        $('#czContainer-edit').append(tempStr);
                        $('#czContainer-edit_czMore_txtCount').val(i);
                      }

                      $('#myModal3').modal('toggle');

                      $('#us6').locationpicker('location', { latitude: adminData.lat, longitude: adminData.lng });

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


    function deleteAdmin(id) {
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
                      url: '<?php echo base_url().'admin/location/delete/'; ?>'+id,
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


/*********************************** Location Picker Js Start ****************************************/
var lat= 26.2212121;
var lng= 77.2565454;
    function updateControls(locationComponents) {
      var addressComponents = locationComponents.addressComponents;
        $('#us5-street1').val(addressComponents.addressLine1);
        $('#us5-street2').val(addressComponents.addressLine2);
        $('#us5-city').val(addressComponents.city);
        $('#us5-state').val(addressComponents.stateOrProvince);
        $('#us5-zip').val(addressComponents.postalCode);
        $('#us5-country').val(addressComponents.country);
        $('#us5-lat').val(locationComponents.latitude);
        $('#us5-lng').val(locationComponents.longitude);
    }
    $('#us5').locationpicker({
        enableAutocomplete: true,
        location: {
          latitude: lat,
          longitude: lng,
        },
        radius: 0,
        addressFormat: "street_address",
        inputBinding: {
            latitudeInput: $('#us5-lat'),
            longitudeInput: $('#us5-lng'),
            locationNameInput: $('#us5-address')
          },
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var mapContext = $(this).locationpicker('map');
            //mapContext.map.setZoom(17);
            var locationComponents = mapContext.location;
            updateControls(locationComponents);
        },
        oninitialized: function (component) {
            var mapContext = $(component).locationpicker('map');
            mapContext.map.setZoom(17);
            var locationComponents = mapContext.location;
            updateControls(locationComponents);
        }
    });
    function updateEditControls(locationComponents) {
        var addressComponents = locationComponents.addressComponents;
        $('#edit_street1').val(addressComponents.addressLine1);
        $('#edit_street2').val(addressComponents.addressLine2);
        $('#edit_city').val(addressComponents.city);
        $('#edit_state').val(addressComponents.stateOrProvince);
        $('#edit_zip').val(addressComponents.postalCode);
        $('#edit_country').val(addressComponents.country);
        $('#edit_lat').val(locationComponents.latitude);
        $('#edit_lng').val(locationComponents.longitude);
    }




    $('#us6').locationpicker({
        enableAutocomplete: true,
        location: {
          latitude: lat,
          longitude: lng,
        },
        radius: 0,
        addressFormat: "street_address",
        inputBinding: {
            latitudeInput: $('#edit_lat'),
            longitudeInput: $('#edit_lng'),
            locationNameInput: $('#us6-address')
          },
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var mapContext = $(this).locationpicker('map');
            //mapContext.map.setZoom(17);
            var locationComponents = mapContext.location;
            updateEditControls(locationComponents);
        },
        oninitialized: function (component) {
            var mapContext = $(component).locationpicker('map');
            mapContext.map.setZoom(17);
            var locationComponents = mapContext.location;
            updateEditControls(locationComponents);
        }
    });


/*********************************** Location Picker Js End ****************************************/

</script>
