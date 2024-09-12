<div class="content-wrapper mb-4">
  <div class="container" style="padding-top:100px; min-height:80vh">
    <div class="card">
      <div class="card-body p-4">
      <div class="alert alert-success" role="alert">
          <h2><strong>INFORMASI</strong></h2>
          <p class="m-0 mb-3">Selamat datang pada sesi lapangan, saat ini kita akan berkeliling di pabrik <strong>PT. Mirota KSM</strong></p> 
          <p class="m-0 mb-3">1. tekan tombol  <strong>izin akses kamera</strong> pada tombol dibawah informasi ini, maka akan muncul notifikasi kemudian pilih izinkan</p>
          <p class="m-0 mb-3">2. pilih kamera <strong>(camera2 0, facing back)</strong> untuk dapat mengakses kamera belakang. Kemudian tekan Mulai Scan</p>
          <p class="m-0 mb-3">3. arahkan kamera ke spot barcode yang telah kami sediakan.</p>
          <p class="m-0 mb-3">4. jika visit sudah selesai, mohon dapat meluangkan waktunya untuk mengisi kuisioner yang telah kami siapkan dengan cara <a href="<?= base_url('kuisioner-kunjungan')?>" target="_blank">klik tulisan ini</a>, sebagai bahan evaluasi kami kedepannya.</p>
          <p class="m-0 mb-3">5. terimakasih telah mempercayai <strong>PT. Mirota KSM</strong> sebagai sarana belajar teman-teman.</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-6" id="scanbarcode">
              <!-- <div style="width:100%;" id="reader"></div> -->
              <div id="reader" width="600px"></div>
            </div>
        </div>
        <div id="info-kunjungan">
          <button class="btn btn-primary mb-4" onclick="scanbarcode()"><i class="fa fa-magnifying-glass"></i> scan lokasi lainnya</button>
          <h1 class="header-text text-center" id="judul_info"></h1>
          <div class="d-flex justify-content-center mb-4">
          <video controls style="border:10px; border-radius:15px; box-shadow: 1px 1px 4px #004aad, 0 0 5px #004aad;" width="100%" id="video_info">
          </video>
          </div>
          <div class="d-flex justify-content-center">
            <div class="deskripsi-info" id="deskripsi"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/dist/js/html5-qrcode.min.js"></script>
<!-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> -->
<script>
// QRCODE
let html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

function onScanSuccess(qrCodeMessage) {
  alert(qrCodeMessage);
  if(qrCodeMessage == 'kuisioner-kunjungan'){
    kuisioner();
  }else{
  $("#info-kunjungan").show();
  $("#scanbarcode").hide();
  $.ajax({
    url:"<?php echo site_url("kunjunganindustri/showInfo")?>/" + qrCodeMessage,
    dataType:"JSON",
    type: "get",
    success:function(hasil){
      console.log(hasil);
      document.getElementById("judul_info").innerHTML = hasil.judul_info;
      document.getElementById("deskripsi").innerHTML = hasil.deskripsi;
      
      const urlvideo = "<?= site_url("assets/video_kunjungan/")?>"+hasil.video_info;
      let html = ' ';
      html += 
      '<source src="'+urlvideo+'" type="video/mp4" />';

      $("#video_info").html(html);
    }
  });

  html5QrcodeScanner.clear();
  }
}

function kuisioner(){
  window.location.replace("<?= base_url("kuisioner-kunjungan")?>");
}

function onScanError(qrCodeMessage) {
}

function scanbarcode(){
  window.location.reload();
}
</script>