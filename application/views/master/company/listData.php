<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1><small>Company Management/</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Company Management</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>master/company/add"><i class="fa fa-plus frm-icon"></i> Add New Company </a>
          </div>
      </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box custom-box">
                <div class="box-body table-responsive no-padding">

                  <table id="example" class="table table-striped table-bordered" style="width:100%" onclick="pagereload()">
                    <thead>
                      <tr>
                          <th>Id</th>
                          <th>Company Name</th>
                          <th>Company LOGO</th>
                          <th>Website </th>
                          <th>Address</th>
                          <th>Created On</th>
                          <th>Status</th>
                          <th class="text-center">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      if(!empty($companyRecords))
                      {
                          foreach($companyRecords as $record)
                          {
                      ?>
                      <tr>
                          <td><?php echo $record->id ?></td>
                          <td> <a href="<?php echo base_url().'master/company/edit/'.$record->id; ?>"><?php echo $record->name ?></a></td>
                          <td>
                            <?php if(!empty($record->logo)){?>
                           <img alt="User Image" src="<?php echo base_url(); ?>uploads/company/<?php echo $record->logo; ?>" class="twPc-avatarImg" style="width:172px;">
                           <?php } else  { ?>
                                  <img alt="User Image" src="<?php echo base_url(); ?>assets/dist/img/dog-logo.png" class="twPc-avatarImg" style="width:172px;">
                              <?php }?>

                          </td>
                          <td><?php echo $record->website ?></td>
                          <td><?php echo $record->address ?></td>
                          <td><?php echo date("d-m-Y", strtotime($record->created)) ?></td>
                          <td>
                            <?php if ($record->status==0) { ?>
                              <button type="button" class="btn btn-danger btn-xs"> Deactive </button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-success btn-xs"> Active </button>
                              <?php }?>
                          </td>
                          <td class="text-center">
                            <?php if ($record->status==0) { ?>
                              <a class="btn btn-sm " href="javascript:activeCompany(<?php echo $record->id; ?>)" title="Active"><i class="fa fa-check"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm " href="javascript:blockCompany(<?php echo $record->id; ?>)" title="Deactive"><i class="fa fa-ban"></i></a>
                              <?php }?>

                              <a class="btn btn-sm " href="<?php echo base_url().'master/company/edit/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                              <a class="btn btn-sm " href="javascript:deleteCompany(<?php echo $record->id; ?>)" title="Delete"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>
                      <?php
                          }
                      }
                      ?>
                    </tbody>

                  </table>

                </div><!-- /.box -->
              </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "master/company/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#example').dataTable({
  order: [[0, 'desc']]
});
  } );

// delete company

  function deleteCompany(id) {
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: 'GET',
            url: '<?php echo base_url().'master/company/delete/'; ?>'+id,
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                console.log('Submission was successful.');
                console.log(data);
                if (data.status == true) {
                  swal(data.message, {
                    icon: "success",
                  }).then((value) => {
                    location.reload();

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

//block company

  function blockCompany(id) {
    swal({
  title: "Are you sure?",
  text: "Once Deactive, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: 'GET',
            url: '<?php echo base_url().'master/company/block/'; ?>'+id,
            dataType: 'JSON',
            success: function (data) {
              $('#loader').hide();
                console.log('Submission was successful.');
                console.log(data);
                if (data.status == true) {
                  swal(data.message, {
                    icon: "success",
                  }).then((value) => {
                    location.reload();

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

//active company


    function activeCompany(id) {
      swal({
    title: "Are you sure?",
    text: "You will be able to See Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
              type: 'GET',
              url: '<?php echo base_url().'master/company/active/'; ?>'+id,
              dataType: 'JSON',
              success: function (data) {
                $('#loader').hide();
                  console.log('Submission was successful.');
                  console.log(data);
                  if (data.status == true) {
                    swal(data.message, {
                      icon: "success",
                    }).then((value) => {
                      location.reload();

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
