<style>

.tabproduk{
  display: none;
}

.deskripsi p{
    text-align : justify;
}
</style>

<section class="pages produkkami">
    <div class="header-produkkami">
        <div class="container header-image">
            <div class="image-header d-none d-md-block" style="background: url(<?php echo base_url().'assets/landingpage/images/produkkami.webp'?>); background-repeat: no-repeat; background-size:cover ;background-position: center;"></div>
            <div class="text-block d-none d-md-block">
                <h2><strong>Produk Susu Mirota KSM</strong></h2>
                <p>PT. Mirota KSM memproduksi susu bubuk untuk semua segmentasi usia mulai dari ibu menyusui hingga lansia.</p>
            </div>
        </div>
    </div>

    <div class="produk mt-4">
      <div class="container">
        <h2 class="separator header-text mt-4 mb-4">PRODUK KAMI</h2>
        <div class="body-produk" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-sine">
            <!-- <h2 class="separator header-text mb-4 mt-4">PRODUK MIROTA</h2> -->
            <div class="owl-carousel owl-theme">
                <?php foreach ($list_data as $ld) { ?>
                  <div class="d-flex flex-wrap justify-content-center">
                    <div class="d-flex flex-column align-items-center" style="width:200px">
                        <button style="border:none;background:none" onclick="openCity(event, <?= $ld->id_produk ?>)">
                        <img src="<?= base_url().'assets/landingpage/images/produk/'.$ld->gambar_produk?>" alt="Lactona Ibu" style="width:100%;height:auto">
                        </button>
                        <h1 class="judul-produk m-0"><?= $ld->nama_produk?></h1>
                        <h3 class="subjudul text-center m-0" style="font-size:12px"><?= $ld->keterangan_produk?></h3>
                    </div>
                  </div>
                <?php } ?>
            </div>

            <?php foreach ($list_data as $ld) { ?>
            <div class="tabproduk mt-4" id="<?= $ld->id_produk ?>">
            <div class="row" >
              <div class="col-md-6">
                <img src="<?= base_url().'assets/landingpage/images/produk/'.$ld->gambar_produk?>" alt="Lactona Ibu" style="width:100%;height:auto">
              </div>
              <div class="col-md-6 d-flex align-items-center" >
                <div class="produk">
                  <h3 class="subjudul"><?= $ld->keterangan_produk ?></h3>
                  <h1 class="judul"><?= $ld->nama_produk ?></h1>
                  <div class="deskripsi">
                  <?= $ld->deskripsi_produk ?>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <div class="container info-produk mt-4"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-sine">
        <hr>
      <div class="row">
        <div class="col-md-6">
          <img src="assets/landingpage/images/nutri.webp" srcset="">
        </div>
        <div class="col-md-6 p-4">
          <h1 class="judul">Tinggi Omega 3 & 6</h1>
          <p>Omega 3 & 6 berperan dalam mengoptimalkan perkembangan kognitif, aktivitas otot, hingga pertumbuhan fisik si Kecil.</p>
          <h1 class="judul">Tinggi Kolin</h1>
          <p>Kolin berfungsi untuk pembentukan fosfatidilkolin dan penyusun asetilkolin.</p>
          <h1 class="judul">Tinggi Protein</h1>
          <p>Protein diperlukan untuk membangun dan memperbaiki jaringan tubuh.</p>
          <h1 class="judul">Tinggi DHA</h1>
          <p>DHA berfungsi meningkatkan fungsi kognitif serta pembentukan otak secara menyeluruh pada otak anak.</p>
        </div>
      </div>
    </div>

</section>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabproduk");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>