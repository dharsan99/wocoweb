
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Company Management/Add New Company</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Add New Company</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>master/company"><i class="glyphicon glyphicon-th-list frm-icon"></i> Back to List</a>
          </div>
      </div>
    </section>

    <section class="content">

        <div class="row" id="myModal2" role="dialog" aria-labelledby="myModalLabel2">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->



                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <div class="cmp-form">
                    <form role="form" id="addUser" enctype="multipart/form-data" action="<?php echo base_url() ?>master/company/addCompany" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('name'); ?>" id="name" name="name" maxlength="200">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website URL</label>
                                        <input type="url" class="form-control required website" id="website" value="<?php echo set_value('website'); ?>" name="website" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="message" class="form-control required" id="address" name="address" maxlength="500">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_logo">Company Logo</label>
                                        <input type="file" class="form-control required" id="password" name="logo" accept='image/*' >
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer" style="text-align:center;">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                  </div>
                </div>
            </div>

        </div>


        <div class="row">
          <div class="col-md-12">

          </div>
        </div>
    </section>
</center>
</div>

<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>

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

    $("#addUser").submit(function(e) {
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
                if (data.status == 1) {
                  $("#addUser").trigger("reset");
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
