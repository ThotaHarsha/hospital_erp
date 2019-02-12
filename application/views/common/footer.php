<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018-2019 <a href="#" class="text-muted">Hospital_Erp</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script>
    window.onload = function(){
  <?PHP if($this->session->flashdata('success')){?>
    showToastInCustomPosition('Success', 'success', "<?= $this->session->flashdata('success')?>");
  <?PHP } ?>
  <?PHP if($this->session->flashdata('failed')){?>
    showToastInCustomPosition('Failed', 'error', "<?= $this->session->flashdata('failed')?>");
  <?PHP } ?>
  }
  showToastInCustomPosition = function(h, color, t) {
    $.toast({
      heading: h,
      text: t,
      icon: color,
      position: {
        left: 643,
        top: 20
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  </script>
</body>

</html>