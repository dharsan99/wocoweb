<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Office Timing Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Office Timing Management</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="javascript:void($('#myModal2').modal('toggle'));"><i class="fa fa-plus frm-icon"></i> Add New Office Timing </a>
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
                        <th>Shift Type</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Hours</th>
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
                              <select data-column="2"  class="search-input-select">
                                  <option value="">Select Type</option>
                                  <option value="1">Fixed</option>
                                  <option value="2">Flexible</option>
                              </select>
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
                                  <input type="text" data-column="5" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                              </div>
                            </td>
                            <td>
                              <select data-column="6"  class="search-input-select">
                                  <option value="">Select Status</option>
                                  <option value="1">Active</option>
                                  <option value="2">Deactive</option>
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





</div>

<!-- Modal -->
<div class="modal right fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel2">
<div class="modal-dialog" role="document">
<div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel2">Add New Office Timing </h4>
  </div>

  <div class="modal-body">
      <h4>Enter Office Timing Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-form" role="form" action="<?php echo base_url() ?>admin/shift/add" method="post" role="form" class="custom-form">
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control required" id="title" name="title" maxlength="128" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control required" id="description" name="description" maxlength="500" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label for="title" style="margin-left: 15px;">Shift Type</label>
                  <div class="col-md-12">
                    <label class="radio-inline">
                      <input type="radio" id="shift_fixed" name="shift_type" value="1" checked> Fixed
                    </label>
                    <label class="radio-inline">
                      <input type="radio" id="shift_flexible" name="shift_type" value="2"> Flexible
                    </label>
                  </div>
                </div>
                <br>

                <div class="row" id="div_fixed">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" maxlength="20">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" maxlength="20">
                        </div>
                    </div>
                </div>

                <div class="row" id="div_flexible">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="start_time">Number Of Hours</label>
                            <input type="number" class="form-control" id="num_hours" name="num_hours" maxlength="20">
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
    <h4 class="modal-title" id="myModalLabel2">Edit Office Timing </h4>
  </div>

  <div class="modal-body">
      <h4>Edit Office Timing Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-edit-form" role="form" action="<?php echo base_url() ?>admin/shift/edit" method="post" role="form" class="custom-form">
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="edit_title">Title</label>
                      <input type="text" class="form-control required" id="edit_title" name="title" maxlength="128" required>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="edit_description">Description</label>
                      <input type="text" class="form-control required" id="edit_description" name="description" maxlength="500" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="title" style="margin-left: 15px;">Shift Type</label>
                <div class="col-md-12">
                  <label class="radio-inline">
                    <input type="radio" id="edit_shift_fixed" name="shift_type" value="1" checked> Fixed
                  </label>
                  <label class="radio-inline">
                    <input type="radio" id="edit_shift_flexible" name="shift_type" value="2"> Flexible
                  </label>
                </div>
              </div>
              <br>

              <div class="row" id="edit_div_fixed">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="edit_start_time">Start Time</label>
                          <input type="time" class="form-control" id="edit_start_time" name="start_time" maxlength="20">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="edit_end_time">End Time</label>
                          <input type="time" class="form-control" id="edit_end_time" name="end_time" maxlength="20">
                      </div>
                  </div>
              </div>

              <div class="row" id="edit_div_flexible">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="edit_start_time">Number Of Hours</label>
                          <input type="number" class="form-control" id="edit_num_hours" name="num_hours" maxlength="20">
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script type="text/javascript" language="javascript" >
$('#div_flexible').hide();

$('#shift_fixed').on('change', function() {
    if (this.checked) {
        $('#div_fixed').show();
        $('#div_flexible').hide();
    }else {
      $('#div_fixed').hide();
      $('#div_flexible').show();
    }
});
$('#shift_flexible').on('change', function() {
    if (this.checked) {
      $('#div_fixed').hide();
      $('#div_flexible').show();
    }else {
      $('#div_fixed').show();
      $('#div_flexible').hide();
    }
});

$('#edit_div_flexible').hide();

$('#edit_shift_fixed').on('change', function() {
    if (this.checked) {
        $('#edit_div_fixed').show();
        $('#edit_div_flexible').hide();
    }else {
      $('#edit_div_fixed').hide();
      $('#edit_div_flexible').show();
    }
});
$('#edit_shift_flexible').on('change', function() {
    if (this.checked) {
      $('#edit_div_fixed').hide();
      $('#edit_div_flexible').show();
    }else {
      $('#edit_div_fixed').show();
      $('#edit_div_flexible').hide();
    }
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
          "url": "<?php echo base_url("admin/shift/getListData"); ?>",
          "dataType": "json",
          "type": "POST",
          "data":{ 'ci_csrf_token' : '' }
        },
        "columns": [
          { "data": "id" },
          { "data": "title" },
          { "data": "shift_type" },
          { "data": "start_time" },
          { "data": "end_time" },
          { "data": "num_hours" },
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
              if (data == 1) {
                return "Fixed";
              }else {
                return "Flexible";
              }
            },
          },
          {
            "targets": 3,
            "render": function ( data, type, row ) {
              return tConvert(data);
            }
          },
          {
            "targets": 4,
            "render": function ( data, type, row ) {
            return tConvert(data);
            }
          },
          {
            "targets": 5,
            "render": function ( data, type, row ) {
              return data;
            }
          },
          {
            "targets": 6,
            "render": function ( data, type, row ) {
              switch (row.status)
              {
                //1-active/2-Deactive
                case '0':
                  return '<button type="button" class="btn btn-warning btn-xs"> Pending </button>';
                  break;
                case '1':
                  return '<button type="button" class="btn btn-success btn-xs"> Active </button>';
                  break;
                case '2':
                  return '<button type="button" class="btn btn-danger btn-xs"> Deactive </button>';
                  break;
                default:
                  return '<button type="button" class="btn btn-warning btn-xs"> Deactive </button>';
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
                str += '<a class="btn btn-sm " href="javascript:blockAdmin(' + row.id + ')" title="Block"><i class="fa fa-ban"></i></a>';
              }else if (row.status == 2) {
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
        text: "Office Timing will be blocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'admin/shift/block/'; ?>'+id,
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
        text: "Office Timing will be Activated.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'admin/shift/unblock/'; ?>'+id,
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
                url: '<?php echo base_url().'admin/shift/edit/'; ?>'+id,
                dataType: 'JSON',
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 1) {

                      var adminData = data.data[0];
                      $('#admin-edit-form').attr('action','<?php echo base_url().'admin/shift/edit/'; ?>'+id);
                      $('#edit_title').val(adminData.title);
                      $('#edit_description').val(adminData.description);
                      if (adminData.shift_type == 1) {
                        $('#edit_shift_fixed').prop('checked', true);
                        $('#edit_shift_flexible').prop('checked', false);
                        $('#edit_div_fixed').show();
                        $('#edit_div_flexible').hide();
                      }else {
                        $('#edit_shift_fixed').prop('checked', false);
                        $('#edit_shift_flexible').prop('checked', true);
                        $('#edit_div_fixed').hide();
                        $('#edit_div_flexible').show();
                      }
                      $('#edit_start_time').val(adminData.start_time);
                      $('#edit_end_time').val(adminData.end_time);
                      $('#edit_num_hours').val(adminData.num_hours);
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
                      url: '<?php echo base_url().'admin/shift/delete/'; ?>'+id,
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


    function tConvert (time) {
     // Check correct time format and split into components
     time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

      if (time.length > 1) { // If time format correct
        time = time.slice (1);  // Remove full string match value
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
        time[0] =( time[0] < 10 ? "0"+time[0] : time[0]);
      }
      return time.join (''); // return adjusted time or original string
    }

</script>
