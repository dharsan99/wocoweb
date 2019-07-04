

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>WoCo</b> Admin System | Version 1.0
        </div>
        <strong>Copyright &copy; 2019-2020 <a href="<?php echo base_url(); ?>" target="_blank">WoCo</a>.</strong> All rights reserved.
    </footer>

    <div id="loader" style="width: 100%;height: 100%;background: #e2e4e475;display:none;position:fixed;top: 0;left: 0;z-index: 999999999;">
      <img src='<?php echo base_url(); ?>assets/website/loading.gif' width="64" height="64" style="margin-top: 25%;margin-left: 50%;"/>
    </div>



    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>

    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');


      $(document).ready(function() {

          $('#checkbox-switch-role').change(function() {
            var checkVal = 0;
              if(this.checked) {
                 checkVal = 1;
                  //$(this).prop("checked", true);
              }
              $('#loader').show();
              $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'admin/switch-mode/'; ?>'+checkVal,
                  dataType: 'JSON',
                  success: function (data) {
                    $('#loader').hide();
                      if (data.status == 1) {
                      window.location.replace("<?php echo base_url('dashboard'); ?>");
                      }else {
                        swal("Failed!", data.message, "error");
                      }
                  },
                  error: function (data) {
                    $('#loader').hide();
                      swal("Error", 'An error occurred.', "error");
                  },
              });

          });
      });
    </script>

  </body>
  <script>$('body .dropdown-toggle').dropdown(); </script>
</html>
