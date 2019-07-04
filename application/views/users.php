
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus frm-icon"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
 <div>
  <?php
  if(!empty($userRecords))
  {
      foreach($userRecords as $record)
      {
  ?>

  <div class="twPc-div">
  <div class="emp-div">
    <a class="twPc-bg twPc-block"></a>

      <a title="Smith" href="#" class="twPc-avatarLink">
      <img alt="Smith" src="<?php echo base_url(); ?>assets/dist/img/avatar04.png" class="twPc-avatarImg">
    </a>

    <div class="twPc-divUser">
      <div class="twPc-divName">


            <b><a href='#'><?php echo $record->name ?></a></b>
        <p><span>Senior Software Developer</span></p>
        <p><span>AB12A</span></p>
      </div>

    </div>

    <div class="emp-dropdown">
               <button class="emp-dropbtn"><i class="fa fa-ellipsis-v"></i></button>
                 <div class="emp-dropdown-content twPc-Arrange">
                   <a href="<?php echo base_url().'editOld/'.$record->userId; ?>"><i class="fa fa-pencil"></i>Edit</a>
                    <a class="btn deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete" style="margin-left: -20px;"><i class="fa fa-trash"></i>Delete</a>
                   <a href="#"><i class="fa fa-ban"></i>Block</a>
                 </div>
              </div>
              <a href="emp-mng-profile.php"><button class="emp-button" style="margin-left: 70px; float: right;margin-top:10px; margin-right:20px; border: 1px solid #2a669d;border-radius: 35px;background-color:white;cursor: pointer;">Permanent</button></a>
  </div>

  <hr>

    <div class="twPc-divStats">

      <ul class="twPc-Arrange">
        <div style="float: left; width: 220px;">
        <li class="twPc-ArrangeSizeFit">
        <span><i class="fa fa-phone emp-icon"></i>
         <a href=''><?php echo $record->mobile ?></a>
         </span>
        </li>
      </div>
        <div style="float: left; width: 220px;">
        <li class="twPc-ArrangeSizeFit">
        <span><i class="fa fa-envelope"></i>
          <a href=''><?php echo $record->email ?></a>
        </span>

        </li>
             </div>
      </ul>
      <ul class="twPc-Arrange">
        <div style="float: left; width: 220px;">
        <li>
        <span><i class="fa fa-briefcase"></i>
           <a href=''><?php echo $record->role ?></a>
        </span>


        </li>
        </div>
        <div style="float: left; width: 220px;">
        <li class="twPc-ArrangeSizeFit">
        <span><i class="fa fa-users"></i>
            <a href=''><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></a>
       </span>

        </li>
            </div>
      </ul>
      <ul class="twPc-Arrange">
        <div style="float: left; width: 220px;">
        <li class="twPc-ArrangeSizeFit">
          <span><i class="fa fa-clock-o"></i>
            <a href='#'>11:00 AM</a>


</span>


        </li>
        </div>
        <div style="float: left; width: 220px;">
        <li class="twPc-ArrangeSizeFit">
        <span><i class="fa fa-user"></i>
   <a href=''> XYZ</a>

</span>

        </li>
       </div>
      </ul>

    </div>

  </div>

  <?php
      }
  }
  ?>
</div>

              <!--    <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Created On</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->name ?></td>
                        <td><?php echo $record->email ?></td>
                        <td><?php echo $record->mobile ?></td>
                        <td><?php echo $record->role ?></td>
                        <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary" href="<?= base_url().'login-history/'.$record->userId; ?>" title="Login history"><i class="fa fa-history"></i></a> |
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->userId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>

                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
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
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
