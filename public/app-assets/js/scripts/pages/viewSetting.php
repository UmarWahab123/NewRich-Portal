        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Settings</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">

                  <?php if(!empty($this->session->flashdata('success'))) { ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?= $this->session->flashdata('success'); ?>
                      </div>
                  <?php } ?>

                  <?php if(!empty($this->session->flashdata('error'))) { ?>
                      <div class="alert alert-danger alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?= $this->session->flashdata('error'); ?>
                      </div>
                  <?php } ?>

                  <div class="x_panel">
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Heading</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php if(!empty($counter)) { foreach($counter as $val) { ?>
                            <tr>
                              <td><?php echo $val->id;?> </td>
                              <td><?php echo $val->heading;?></td>
                              
                              <td>
                                  <a href="<?= base_url(); ?>Adminhome/EditSetting/<?= $val->id;?>">
                                      <span class="glyphicon glyphicon-pencil btn btn-info btn-xs"></span>
                                  </a> 
<!--                                  <a class="btn btn-warning">Edit</a> |-->
                              </td>
                            </tr>
                          <?php } } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/Admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>assets/Admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url(); ?>assets/Admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url(); ?>assets/Admin/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url(); ?>assets/Admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src=".<?= base_url(); ?>assets/Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/Admin/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url(); ?>assets/Admin/build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>