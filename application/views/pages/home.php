<!-- <div class="contaner">
  <img src="image/carousel1.jpg" alt="Snow" style="width:100%;">
  <div class="bottom-left">
    <H2 style="padding-top:60%;padding-right:60%">
      halo
    </H2>
    <button>TEST</button>
  </div>
</div> -->

<style>
.text-judul {
  font-size: 20px;
  font-family: Arial;
  position: relative;
  overflow: hidden;
}


.text-judul:after {
  display: inline-block;
  content: "";
  height: 4px;
  background: #f00;
  position: absolute;
  width: 100%;
  top: 50%;
  margin-top: -2px;
  margin-left: 10px;
}
</style>

<!--CAROUSEL DESKTOP-->
<div id="carouselExampleInterval" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
        <img src="<?php echo base_url().'assets/landingpage/images/lactonaskim_desktop.webp'?>" class="d-block w-100 img-carousel">
        </div>
        <!-- <div class="carousel-item" data-bs-interval="3000">
        <img src="<?php echo base_url().'assets/landingpage/images/skim.webp'?>" class="d-block w-100 img-carousel" alt="...">
        </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--CAROUSEL DESKTOP-->

<!--CAROUSEL MOBILE-->
<div id="carouselMobile" class="carousel slide d-block d-lg-none" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="3000">
    <img src="<?php echo base_url().'assets/landingpage/images/lactonaskim_mobile.webp'?>" class="d-block w-100 img-carousel">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--CAROUSEL MOBILE-->
<!-- <section class="layanan">
  <h2 class="header-text d-none d-lg-block">Mirota KSM Konsisten Ikut Serta Dalam Mencerdaskan Bangsa</h2>
  <div class="page-content">
    <div class="card-desc" style="background: url(<?php echo base_url().'assets/landingpage/images/tentangkami.webp'?>); background-repeat: no-repeat; background-size:cover ;background-position: center;">
      <div class="content-desc" >
        <h2 class="title-desc">Tentang Kami</h2>
        <p class="desc"><span>PT. Mirota KSM</span> Memproduksi dan memasarkan susu formula berkualitas yang berorientasi pada kepuasan konsumen.</p>
        <a href="#sejarah" class="btn-cta">LIHAT SELENGKAPNYA</a>
      </div>
    </div>
    <div class="card-desc" style="background: url(<?php echo base_url().'assets/landingpage/images/produkkami_edit.png'?>); background-repeat: no-repeat; background-size:cover ;background-position: center;">
      <div class="content-desc">
        <h2 class="title-desc">Produk Kami</h2>
        <p class="desc">produk-produk dari PT Mirota KSM telah hadir dan menjadi pilihan konsumen di banyak wilayah di Indonesia</p>
        <a href="#produk" class="btn-cta">LIHAT SELENGKAPNYA</a>
      </div>
    </div>
    <div class="card-desc" style="background: url(<?php echo base_url().'assets/landingpage/images/kunjunganindustri_edit.png'?>); background-repeat: no-repeat; background-size:cover ;background-position: center;">
      <div class="content-desc">
        <h2 class="title-desc">Kunjungan Industri</h2>
        <p class="desc">Sumbangsih PT Mirota KSM pada dunia pendidikan dalam rangka mencerdaskan masyarakat indonesia</p>
        <a href="<?php echo base_url('kunjunganindustri')?>" class="btn-cta">LIHAT SELENGKAPNYA</a>
      </div>
    </div>
    <div class="card-desc" style="background: url(<?php echo base_url().'assets/landingpage/images/maklon_edit.png'?>); background-repeat: no-repeat; background-size:cover ;background-position: center;">
      <div class="content-desc">
        <h2 class="title-desc">Peluang Kerjasama</h2>
        <p class="desc">Ingin memiliki produk dengan brand anda sendiri?
          Mari jalin kerjasama dengan PT Mirota KSM untuk wujudkan produk impianmu</p>
          <a href="<?php echo base_url('maklon')?>" class="btn-cta">LIHAT SELENGKAPNYA</a>
      </div>
    </div>
  </div>
</section> -->

<section class="artikel">
 <div class="container">
 <h2 class="separator header-text">ARTIKEL</h2>
 <div class="owl-carousel owl-theme">
      <?php foreach($artikel as $a){?>
      <div class="d-flex justify-content-center">
        
        <div class="card card-artikel" data-aos="fade-up" data-aos-duration="2000">
          <a href="<?= base_url('artikel/'.$a->slug)?>">
          <img src="<?= base_url('assets/images/artikel/').$a->gambar_artikel?>" class="card-img-artikel" alt="<?=$a->gambar_artikel?>">
          </a>
          <div class="card-body p-0">
            <a href="<?= base_url('artikel/'.$a->slug)?>">
            <h5 class="judul-artikel-preview"><?= $a->judul_artikel ?></h5>
            </a>
            <div class="text-artikel-preview mb-2">
              <?= $a->artikel ?>
            </div>
          </div>
        </div>
     </div>
     <?php } ?>
 </div>
 </div>
</section>

<section class="CTA" id="sejarah">
  <div class="container"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-sine">

    <div class="header-desc">
      <h2 class="separator mb-4">sejarah Mirota</h2>
      <div class="d-flex flex-wrap">
        <div class="p-2 d-flex align-items-center col-md-6">
          <img src="assets/landingpage/images/mirota-dulu.webp" alt="Gedung mirota ksm jaman dulu" srcset="">
        </div>
        <div class="p-4 d-flex align-items-center col-md-6">
          <div class="about">
            <h3 class="subjudul">Tentang Mirota</h3>
            <h3 class="judul">50 Tahun Lebih Ikut Serta Dalam Mencerdasakan Bangsa</h3>
            <p style="text-align:justify; font-size:16px">PT Mirota KSM merupakan perusahaan industri susu bubuk di Indonesia yang didirikan pada tahun <span>1973</span> oleh ibu <span>Tini Yuniarti</span> dan Bapak <span>Hendro Sutikno</span> beserta keluarga.</p>
            <p style="text-align:justify; font-size:16px">Dengan visi perusahaan "Menjadi perusahaan produsen susu formula yang unggul di Indonesia dan menjadi perusahaan yang bermanfaat bagi masyaraka".</p>
            <a href="<?php echo base_url('tentangkami')?>" class="btn-header-cta">TENTANG KAMI</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="produk" id="produk">
  <div class="container"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-sine">
    <div class="header-produk-desc">
    <h2 class="separator mb-4">Produk Mirota</h2>
      <div class="d-flex flex-wrap">
        <div class="p-4 d-flex align-items-center col-md-6">
          <div class="produk-text">
          <h3 class="subjudul">Produk Kami</h3>
          <h3 class="judul">Susu Formula Untuk Semua Kalangan Usia</h3>
          <p style="text-align:justify">Mirota KSM menyediakan susu formula untuk segala usia mulai dari <span>Lactona ibu untuk ibu hamil, Lactona 1+ untuk 1-3 tahun, Lactona 3+ untuk 3 - 12 tahun, lactona skim dan prosteo plus untuk remaja, hingga prolansia untuk lansia</span>. Seluruh produk susu Mirota KSM diproses dengan menerapkan standar Good Manufacturing Practices (GMP) dan mengacu pada sistem jaminan mutu HACCP dan ISO 22000.</p>
          <a href="<?php echo base_url('produk')?>" class="btn-header-cta">Selengkapnya</a>
          </div>
        </div>
        <div class="p-2 col-md-6">
          <img style="width:100%; max-width:600px;padding:5%" src="assets/landingpage/images/nutri.webp" alt="" srcset="">
        </div>
      </div>
    </div>
  </div>
</section>