<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Employee Type Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Employee Type Management</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="javascript:$('#myModal2').modal('toggle');"><i class="fa fa-plus frm-icon"></i> Add New Employee Type </a>
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
                        <th>Description</th>
                        <th>Created</th>
                        <th>Created By</th>
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
                                  <input type="date" data-column="3" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                              </div>
                            </td>
                            <td>
                              <div class="has-feedback">
                                  <input type="text" data-column="4" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
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
    <h4 class="modal-title" id="myModalLabel2">Add New Employee Type </h4>
  </div>

  <div class="modal-body">
      <h4>Enter Employee Type Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-form" role="form" action="<?php echo base_url() ?>admin/emptype/add" method="post" role="form" class="custom-form">
            <div class="box-body">
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
    <h4 class="modal-title" id="myModalLabel2">Edit Employee Type </h4>
  </div>

  <div class="modal-body">
      <h4>Edit Employee Type Details</h4>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form id="admin-edit-form" role="form" action="<?php echo base_url() ?>admin/emptype/edit" method="post" role="form" class="custom-form">
            <div class="box-body">
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
          "url": "<?php echo base_url("admin/emptype/getListData"); ?>",
          "dataType": "json",
          "type": "POST",
          "data":{ 'ci_csrf_token' : '' }
        },
        "columns": [
          { "data": "id" },
          { "data": "title" },
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
              if (data.length > 20) {
                return data.substring(0,20)+".....";
              }else {
                return data;
              }
            }
          },
          {
            "targets": 3,
            "render": function ( data, type, row ) {
               var todayTime = new Date(data);
               var month = todayTime .getMonth() + 1
               var day   = todayTime .getDate();
               var year = todayTime .getFullYear();
               return (day<10?`0${day}`:day) + "/" + (month<10?`0${month}`:month) + "/" + year;
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
              str += '<a class="btn btn-sm " href="javascript:editEmptype(' + row.id + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
              str += '<a class="btn btn-sm " href="javascript:deleteEmptype(' + row.id + ')" title="Delete"><i class="fa fa-trash"></i></a>';
              str += '</div>';
              return str;
            }
          }
        ]
  });

});

    function blockAdmin(id) {
      swal({
        title: "Are you sure?",
        text: "Sub Admin will be blocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'admin/subadmin/block/'; ?>'+id,
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
        text: "Sub Admin will be unblocked.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#loader').show();
          $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'admin/subadmin/unblock/'; ?>'+id,
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


    function editEmptype(id) {
        $('#loader').show();
        $.ajax({
                type: 'GET',
                url: '<?php echo base_url().'admin/emptype/edit/'; ?>'+id,
                dataType: 'JSON',
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 1) {

                      var adminData = data.data[0];
                      $('#admin-edit-form').attr('action','<?php echo base_url().'admin/emptype/edit/'; ?>'+id);
                      $('#edit_title').val(adminData.title);
                      $('#edit_description').val(adminData.description);
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


    function deleteEmptype(id) {
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
                      url: '<?php echo base_url().'admin/emptype/delete/'; ?>'+id,
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
