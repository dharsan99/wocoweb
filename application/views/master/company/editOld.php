<?php
// echo "<pre>";
// print_r($companyInfo);


$id = $companyInfo[0]->id;
$name = $companyInfo[0]->name;
$website = $companyInfo[0]->website;
$address = $companyInfo[0]->address;

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1><small>Company Management/Edit Company</small></h1>
      <div class="row">
        <div class="col-xs-6">
            <h3>Edit Company</h3>
        </div>
          <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>master/company"><i class="glyphicon glyphicon-th-list frm-icon"></i> Back to List</a>
          </div>
      </div>
    </section>


    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Company </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="cmp-form">



                      <form role="form" action="<?php echo base_url() ?>master/company/editCompany/<?php echo $id; ?>" method="post" id="editCompany" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" value="<?php echo $name; ?>" id="name" name="name" maxlength="200">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website URL</label>
                                        <input type="url" class="form-control website" id="website" value="<?php echo $website; ?>" name="website" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="message" class="form-control" id="address" value="<?php echo $address; ?>" name="address" maxlength="500">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_logo">Company Logo</label>
                                        <input type="file" class="form-control required" id="logo" name="logo" accept='image/*' >
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer" style="text-align:center;">
                            <input type="submit" class="btn btn-primary" value="Submit" />

                        </div>
                      </form>
                  </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <?php
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
