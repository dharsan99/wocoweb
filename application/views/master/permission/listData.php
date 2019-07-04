
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Permission Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Permission Management</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="javascript:$('#myModal2').modal('toggle');"><i class="fa fa-plus frm-icon"></i> Add Permission </a>
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
                        <th>Role Id</th>
                        <th>Permission</th>
                        <th>Description</th>
                        <th>Created Date</th>
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
                                  <input type="text" data-column="3" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                              </div>
                            </td>


                            <td>
                              <div class="has-feedback">
                                  <input type="date" data-column="4" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                              </div>
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
    <h4 class="modal-title" id="myModalLabel2">Add New Permission </h4>
  </div>

  <div class="modal-body">
      <h4>Enter Permission Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-form" role="form" action="<?php echo base_url() ?>master/permission/add" method="post" role="form" class="custom-form">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="role_id">Select Role Id</label>
                      <select class="itemName form-control" style="width:100%;height: 32px;" name="role_id" value="<?php echo set_value('role_id'); ?>" required >
                          <option value="">-- Select One --</option>
                          <?php foreach ($roles as $key => $value): ?>
                            <option value="<?php echo $value->roleId; ?>"><?php echo $value->role; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </div>
              </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="permission">Permission</label>
                            <input type="text" class="form-control required" value="<?php echo set_value('permission'); ?>" id="permission" name="permission" maxlength="128" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="3" cols="50" class="form-control required" value="<?php echo set_value('description'); ?>" id="description" name="description" maxlength="128" required></textarea>

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
    <h4 class="modal-title" id="myModalLabel2">Edit Permission </h4>
  </div>

  <div class="modal-body">
      <h4>Edit Permission Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="edit-admin-form" role="form" action="<?php echo base_url() ?>master/permission/editPermission" method="post" role="form" class="custom-form">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="role">Select Role Id</label>
                       <select id="edit_role_id" class="itemName form-control" style="width:100%;height: 32px;" name="role_id" value="" required >
                          <option value="">-- Select One --</option>
                          <?php foreach ($roles as $key => $value): ?>
                            <option value="<?php echo $value->roleId; ?>"><?php echo $value->role; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>

                </div>
              </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="permission">Permission</label>
                          <input type="text" class="form-control required" value="" id="edit_permission" name="permission" maxlength="128" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edit_description">Description</label>
                            <textarea rows="3" cols="50" class="form-control required" value="" id="edit_description" name="description" maxlength="128" required></textarea>

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
var dataTable;

    $('.search-input-text').on( 'keyup click', function () {   // for text boxes
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
                console.log('Submission was successful.');
                console.log(data);
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
                console.log('An error occurred.');
                console.log(data);
                swal("Error", data.message, "error");
            },
        });
    });

    $("#edit-admin-form").submit(function(e) {
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
                  $("#edit-admin-form").trigger("reset");
                  $('#myModal3').modal('hide');
                  dataTable.ajax.reload();
          				swal("Success", data.message, "success");
          			}else {
          				swal("Failed!", data.message, "error");
          			}
            },
            error: function (data) {
              $('#loader').hide();
                console.log('An error occurred.');
                console.log(data);
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
          "url": "<?php echo base_url("master/permission/getListData"); ?>",
          "dataType": "json",
          "type": "POST",
          "data":{ 'ci_csrf_token' : '' }
        },
        "columns": [
          { "data": "id" },
          { "data": "role" },
          { "data": "permission" },
          { "data": "description" },
          { "data": "created" },
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
            orderable: false,
            "render": function ( data, type, row ) {
              var str = "<div style='width:120px'>";
              if (row.status == 1) {
                str += '<a class="btn btn-sm " href="javascript:blockAdmin(' + row.id + ')" title="Block"><i class="fa fa-ban"></i></a>';
              }else if (row.status == 2) {
                str += '<a class="btn btn-sm " href="javascript:unblockAdmin(' + row.id + ')" title="Block"><i class="fa fa-check"></i></a>';
              }
              str += '<a class="btn btn-sm " href="javascript:editPermission(' + row.id + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
              str += '<a class="btn btn-sm " href="javascript:deletePermission(' + row.id + ')" title="Delete"><i class="fa fa-trash"></i></a>';
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
    text: "You will be able to See Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $('#loader').show();
      $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'master/admin/block/'; ?>'+id,
              dataType: 'JSON',
              success: function (data) {
                $('#loader').hide();
                  console.log('Submission was successful.');
                  console.log(data);
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
                  console.log('An error occurred.');
                  console.log(data);
                  swal("Error", 'An error occurred.', "error");
              },
          });

    } else {
      swal("Your imaginary file is safe!");
    }
  });
    }



        function unblockAdmin(id) {
          swal({
        title: "Are you sure?",
        text: "You will be able to See Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'master/admin/unblock/'; ?>'+id,
                  dataType: 'JSON',
                  success: function (data) {
                    $('#loader').hide();
                      console.log('Submission was successful.');
                      console.log(data);
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
                      console.log('An error occurred.');
                      console.log(data);
                      swal("Error", 'An error occurred.', "error");
                  },
              });

        } else {
          swal("Your imaginary file is safe!");
        }
      });
        }



            function editPermission(id) {
              //
              $('#loader').show();
              $.ajax({
                      type: 'GET',
                      url: '<?php echo base_url().'master/permission/editPermission/'; ?>'+id,
                      dataType: 'JSON',
                      success: function (data) {
                        $('#loader').hide();
                          if (data.status == 1) {

                            var adminData = data.data[0];
                            //
                            // $('#edit_company_name').val(adminData.company_name);
                            // $('#edit_company_id').val(adminData.company_id);
                            // $('#edit_fname').val(adminData.fname);
                            // $('#edit_lname').val(adminData.lname);
                            // $('#edit_email').val(adminData.email);
                            // $('#edit_phone_code').val(adminData.phone_code);
                            $('#edit-admin-form').attr('action','<?php echo base_url() ?>master/permission/editPermission/'+adminData.id);
                            $('#edit_role_id').val(adminData.role_id);
                            $('#edit_permission').val(adminData.permission);
                            $('#edit_description').val(adminData.description);
                            $('#edit_role_id option[value='+adminData.role_id+']').attr('selected','selected');
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


            function deletePermission(id) {
              swal({
            title: "Are you sure?",
            text: "You will be able to See Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $('#loader').show();
              $.ajax({
                      type: 'GET',
                      url: '<?php echo base_url().'master/permission/delete/'; ?>'+id,
                      dataType: 'JSON',
                      success: function (data) {
                        $('#loader').hide();
                          console.log('Submission was successful.');
                          console.log(data);
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
                          console.log('An error occurred.');
                          console.log(data);
                          swal("Error", 'An error occurred.', "error");
                      },
                  });

            } else {
              swal("Your imaginary file is safe!");
            }
          });
            }


</script>
