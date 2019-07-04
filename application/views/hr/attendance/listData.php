

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Attendance Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Attendance Management</h3>
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
                        <th>Name</th>
                        <th>Checkin Time</th>
                        <th>Checkout Time</th>
                        <th>Checkin Location</th>
                        <th>Checkout Location</th>
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
                              <div class="has-feedback" style="width: 120px;">
                                  <input type="text" data-column="1" class="form-control search-input-text" id="inputValidation" placeholder="Search" style="width: 110px;">
                                  <span class="glyphicon glyphicon-search form-control-feedback" style="right: -7px;"></span>
                              </div>
                            </td>

                            <td>
                              <div class="has-feedback">
                                  <input type="date" data-column="2" class="form-control search-input-text" id="inputValidation" placeholder="Search">
                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
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
                              <div class="has-feedback">
                                  <input type="text" data-column="5" class="form-control search-input-text" id="inputValidation" placeholder="Search">
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
<!-- modal -->

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
          "url": "<?php echo base_url("hr/attendance/getListData"); ?>",
          "dataType": "json",
          "type": "POST",
          "data":{ 'ci_csrf_token' : '' }
        },
        "columns": [
          { "data": "id" },
          { "data": "name" },
          { "data": "checkin_date" },
          { "data": "checkout_date" },
          { "data": "checkin_comment" },
          { "data": "checkout_comment" },
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
              return data;
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
            orderable: false,
            "render": function ( data, type, row ) {
              var str = "<div style='width:120px'>";
              // str += '<a class="btn btn-sm " href="javascript:editAttendance(' + row.id + ')" title="Edit"><i class="fa fa-pencil"></i></a>';
              str += '<a class="btn btn-sm " href="javascript:deleteAttendance(' + row.id + ')" title="Delete"><i class="fa fa-trash"></i></a>';
              str += '</div>';
              return str;
            }
          }
        ]
  });

});




    function deleteAttendance(id) {
        swal({
            title: "Are you sure ?",
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
                      url: '<?php echo base_url().'hr/attendance/delete/'; ?>'+id,
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

    $('#add-attendance-department').on('change', function() {
        $('#add-attendance-head').html('');

  $.ajax({
          type: 'GET',
          url: '<?php echo base_url().'hr/attendance/getusers/'; ?>'+this.value,
          dataType: 'JSON',
          success: function (data) {
            $('#loader').hide();
              if (data.status == true) {
                var str = "";
                for (var i = 0; i < data.data.length; i++) {
                  var row = data.data[i];
                  str += '<option value="'+row.userId+'">'+row.name+'('+row.email+')</option>';
                }
                $('#add-attendance-head').html(str);
              }
              else {
                swal("Failed!", data.message, "error");
                  $('#add-attendance-head').html('');
              }
          },
          error: function (data) {
            $('#loader').hide();
              swal("Error", 'An error occurred.', "error");
                $('#add-attendance-head').html('');
          },
      });
});



</script>
