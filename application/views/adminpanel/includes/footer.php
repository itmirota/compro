

<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Company Profile</b> | Version 2.0
        </div>
        <strong>Copyright &copy; IT Mirota 2024 <a href="<?php echo base_url(); ?>">PT Mirota KSM</a>.</strong> All rights reserved.
    </footer>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap.min.js"></script>



<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminlte2/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/adminlte2/dist/js/demo.js"></script>
<!-- page script -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<!-- CK Editor -->
<!-- <script src="<?php echo base_url(); ?>assets/adminlte2/bower_components/ckeditor/ckeditor.js"></script> -->
<!-- CKeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

  ClassicEditor.create( document.querySelector( '#artikel-edit' ) )
      .catch( error => {
          console.error( error );
      } );

  ClassicEditor
      .create( document.querySelector( '#artikel-add, #deskripsi_produk' ))
      .catch( error => {
          console.error( error );
      } );

      ClassicEditor
      .create( document.querySelector( '#deskripsi' ) )
      .catch( error => {
          console.error( error );
      } );
</script>

<script>
 	$(document).ready(function() {

		<?php if (isset($_SESSION['swal_icon'])){ ?>
				Swal.fire({
				icon: '<?php echo $_SESSION['swal_icon'] ?>',
				title: '<?php echo $_SESSION['swal_title'] ?>',
				text: '<?php echo $_SESSION['swal_text'] ?>',
				showConfirmButton: false,
  			timer: 1500
				})
		<?php } ?>

    // .DATATABLE 
    var table = $('#karantina, #release, #datakeluar, #datatable').DataTable( {
        lengthChange: true,
        paging   : true,
        info   : true,
        responsive: true,
        ordering: false,
    } );
    // ./DATATABLE 

        // .DATATABLE 
        var table = $('#datatableScrollX').DataTable( {
        scrollX: true,
    } );
    // ./DATATABLE 

    new DataTable('#myTable', {
});
    
      $('.btn-delete').on('click',function(){
          var getLink = $(this).attr('href');
          swal({
                  title: 'Delete Data',
                  text: 'Yakin Ingin Menghapus Data ?',
                  html: true,
                  confirmButtonColor: '#d9534f',
                  showCancelButton: true,
                  },function(){
                  window.location.href = getLink
              });
          return false;
      });

      $('.btn-release').on('click',function(){
          var getLink = $(this).attr('href');
          swal({
                  title: 'Release',
                  text: 'Yakin Ingin Release Barang ?',
                  html: true,
                  confirmButtonColor: '#00A65A',
                  showCancelButton: true,
                  },function(){
                  window.location.href = getLink
              });
          return false;
      });

      $(document).ready(function(){
          $("#load").fadeOut(200);
      });

  });

  $(".form_datetime").datetimepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayBtn: true,
    pickTime: false,
    minView: 2,
    maxView: 4,
  });

  var windowURL = window.location.href;
  pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
  var x= $('a[href="'+pageURL+'"]');
      x.addClass('active');
      x.parent().addClass('active');
  var y= $('a[href="'+windowURL+'"]');
      y.addClass('active');
      y.parent().addClass('active');
</script>
</body>
</html>