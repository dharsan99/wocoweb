<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>HR Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>HR Management</h3>
        </div>
          <div class="col-xs-6 text-right">
            <?php if ($permission->add == 1) { ?>
              <a class="btn btn-primary" href="javascript:$('#myModal1').modal('toggle');"><i class="fa fa-plus frm-icon"></i> Add New HR </a>
              <a class="btn btn-primary" href="javascript:$('#myModal2').modal('toggle');"><i class="fa fa-pencil frm-icon"></i> Create New HR </a>
            <?php } ?>
          </div>
      </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box custom-box">
                <?php //pre($permisions); ?>
                <div class="box-body table-responsive no-padding">

                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Code</th>
                        <th>Mobile</th>
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
                  </table>

                </div><!-- /.box -->
              </div>
            </div>
        </div>
    </section>





</div>

<!-- Modal -->
<div class="modal right fade" id="myModal1" role="dialog" aria-labelledby="myModalLabel2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2">Add New HR </h4>
      </div>

      <div class="modal-body">
          <h4>Select an Employee to add HR</h4>
            <!-- form start -->
            <?php $this->load->helper("form"); ?>
            <form id="admin-form-add-new" role="form" action="<?php echo base_url() ?>hr/hr/add" method="post" role="form" class="custom-form">
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="select_emp_id">Search Employee</label>
                            <select id="select_emp_id" class="itemName form-control" style="width:100%;height: 32px;" name="emp_id" value="<?php echo set_value('emp_id'); ?>" required ></select>
                        </div>
                        <input type="hidden" name="add_new_hr" value="1">
                      </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!-- Modal -->
<div class="modal right fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2">Create New HR </h4>
      </div>

      <div class="modal-body">
          <h4>Enter HR Details</h4>
            <!-- form start -->
            <?php $this->load->helper("form"); ?>
            <form id="admin-form" role="form" action="<?php echo base_url() ?>hr/hr/create" method="post" role="form" class="custom-form">
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="company_name">First Name</label>
                            <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="company_name">Last Name</label>
                            <input type="text" class="form-control required" value="<?php echo set_value('lname'); ?>" id="lname" name="lname" maxlength="128" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="company_name">Email</label>
                                <input type="email" class="form-control required" value="<?php echo set_value('email'); ?>" id="email" name="email" maxlength="128" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_code">Country Code</label>
                                <input type="number" class="form-control required" id="phone_code" value="<?php echo set_value('phone_code'); ?>" name="phone_code" maxlength="4" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website_url">Mobile</label>
                                <input type="tel" pattern="[789][0-9]{9}" class="form-control required" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="128" required>
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
        <h4 class="modal-title" id="myModalLabel2">Edit HR </h4>
      </div>

      <div class="modal-body">
          <h4>Edit HR Details</h4>
            <!-- form start -->
            <?php $this->load->helper("form"); ?>
            <form id="admin-edit-form" role="form" action="<?php echo base_url() ?>hr/hr/edit" method="post" role="form" class="custom-form">
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="company_name">First Name</label>
                            <input type="text" class="form-control required" value="" id="edit_fname" name="fname" maxlength="128" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="company_name">Last Name</label>
                            <input type="text" class="form-control required" value="<?php echo set_value('lname'); ?>" id="edit_lname" name="lname" maxlength="128" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="company_name">Email</label>
                                <input type="email" class="form-control required" value="<?php echo set_value('email'); ?>" id="edit_email" name="email" maxlength="128" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_code">Country Code</label>
                                <input type="number" class="form-control required" id="edit_phone_code" value="<?php echo set_value('phone_code'); ?>" name="phone_code" maxlength="4" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website_url">Mobile</label>
                                <input type="tel" pattern="[789][0-9]{9}" class="form-control required" id="edit_mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="128" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <label for="title" style="margin-left: 15px;">Permissions</label>
                      <div class="col-md-12" id="edit-permissions">

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

    $("#admin-form-add-new").submit(function(e) {
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
                  $("#admin-form-add-new").trigger("reset");
                  $('#myModal1').modal('hide');
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
                  $('#myModal1').modal('hide');
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
          "url": "<?php echo base_url("hr/hr/getListData"); ?>",
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
                <?php if ($permission->block == 1) { ?>
                  str += '<a class="btn btn-sm " href="javascript:blockAdmin(' + row.userId + ')" title="Block"><i class="fa fa-ban"></i></a>';
                <?php } ?>

              }else if (row.status == 2) {
                <?php if ($permission->unblock == 1) { ?>
                  str += '<a class="btn btn-sm " href="javascript:unblockAdmin(' + row.userId + ')" title="Unblock"><i class="fa fa-check"></i></a>';
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

  $('.itemName').select2({
         placeholder: '--- Select Employee ---',
         ajax: {
           url: '<?php echo base_url('hr/hr/employee-search'); ?>',
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

    function blockAdmin(id) {
      swal({
        title: "Are you sure?",
        text: "HR will be blocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'hr/hr/block/'; ?>'+id,
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
        text: "HR will be unblocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'hr/hr/unblock/'; ?>'+id,
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
        $("#edit-permissions").html("");
        $.ajax({
                type: 'GET',
                url: '<?php echo base_url().'hr/hr/edit/'; ?>'+id,
                dataType: 'JSON',
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 1) {

                      var adminData = data.data[0];
                      $('#admin-edit-form').attr('action','<?php echo base_url().'hr/hr/edit/'; ?>'+id);
                      $('#edit_fname').val(adminData.fname);
                      $('#edit_lname').val(adminData.lname);
                      $('#edit_email').val(adminData.email);
                      $('#edit_phone_code').val(adminData.phone_code);
                      $('#edit_mobile').val(adminData.mobile);
                      $('#myModal3').modal('toggle');

                      var table = $('<table/>');
                      table.addClass('table table-striped');
                      table.append('<tr><th></th><th>VIEW</th><th>ADD</th><th>EDIT</th><th>DELETE</th><th>BLOCK</th><th>UNBLOCK</th></tr>');
                      for(var i=0; i<adminData.permissions.length; i++){
                        var item = adminData.permissions[i];
                        var str = "";
                            str += "<td>"+item.permission+"</td>";
                            str += "<td><input type='checkbox' name='"+item.permission+"[]' value='view' "+(item.view==1?"checked":"")+" disabled></td>";
                            str += "<td><input type='checkbox' name='"+item.permission+"[]' value='add' "+(item.add==1?"checked":"")+"></td>";
                            str += "<td><input type='checkbox' name='"+item.permission+"[]' value='edit' "+(item.edit==1?"checked":"")+"></td>";
                            str += "<td><input type='checkbox' name='"+item.permission+"[]' value='delete' "+(item.delete==1?"checked":"")+"></td>";
                            str += "<td><input type='checkbox' name='"+item.permission+"[]' value='block' "+(item.block==1?"checked":"")+"></td>";
                            str += "<td><input type='checkbox' name='"+item.permission+"[]' value='unblock' "+(item.unblock==1?"checked":"")+"></td>";
                        table.append('<tr>'+str+'</tr>');
                      }
                      $('#edit-permissions').append(table);

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
                      url: '<?php echo base_url().'hr/hr/delete/'; ?>'+id,
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


</script>
