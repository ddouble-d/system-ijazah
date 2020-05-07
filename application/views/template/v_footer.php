<!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer> -->
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="< ?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="< ?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
  <script src="< ?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-pie-demo.js"></script> -->

  <!-- DataTables -->
  <script src="<?=base_url()?>assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
  <script src="<?=base_url()?>assets/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="<?=base_url()?>assets/sweetalert2-8.18.5/package/dist/sweetalert2.min.js"></script>

  <!-- Flashdata -->
  <script src="<?=base_url();?>assets/myscript.js"></script>

  <!-- <script type="text/javascript">
  $('#accordionSidebar').on('click', 'li', function(){
    $('.active').removeClass('active'); // triggered on every event bubble :(
      $(this).addClass('active'); // leaving only the main parent with active class
    });
    </script> -->


  <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable({
      // language: {
      //   sProcessing: 'Sedang Proses...',
      //   sLengthMenu: "Tampilan _MENU_ entri",
      //   sZeroRecords: "Tidak ditemukan data yang sesuai",
      //   sInfo: "Tampilan _START_ sampai _END_ dari _TOTAL_ entri",
      //   sInfoEmpty: "Tampilan 0 sampai 0 dari 0 entri",
      //   sInfoFiltered: "(disarin dari _MAX_ entri keseluruhan)",
      //   sInfoPosstFix: "",
      //   sSearch: "Cari:",
      //   sUrl: "",
      //   paginate: {
      //     next: '→', //or '<i class="fas fa-chevron-right"></i>'
      //     previous: '←' //'<i class="fas fa-chevron-left"></i>'
      //   }
      // }
    });


    $("ul li").click(function(){
      $("li").removeClass("active");
      $(this).addClass("active");
    });
  });
  </script>




</body>

</html>
