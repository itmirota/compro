<section class="pages">
  <div class="container py-4 karir">
      
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
        <div class="col-md-12">
            <?php echo $this->session->flashdata('gagal'); ?>
        </div>
    </div>

    <div class="container header-image">
      <div class="image-header d-none d-md-block" style="background: url(<?php echo base_url().'assets/landingpage/images/karir.webp'?>); background-repeat: no-repeat; background-size:cover ;background-position: center;"></div>
      <div class="text-block d-none d-md-block">
          <h2><strong>Kembangkan Potensi Terbaikmu</strong></h2>
          <p><span>Mirota KSM</span> sangat bangga dengan potensimu yang bertalenta dan memiliki latar belakang profesional dan mau berkembang bersama kami. Mari gabung bersama kami.</p>
      </div>
    </div>
    
    <div class="row lowongan mt-4">
    <h2 class="header-text mb-4">Lowongan Pekerjaan</h2>

      <?php  
      if (COUNT($list_data) > 0){
      foreach($list_data as $ld):?>
      <div class="row mb-4">
        <div class="col-lg-12">
        <div class="card card-lowongan">
          <div class="card-body">
          <h5><?= $ld->nama_lowongan?></h5>
          <div class="row">
            <div class="col-lg-3">
              <p><i class="fa fa-map-pin"></i> <?= $ld->wilayah ?></p>
            </div>
            <div class="col-lg-3">
              <i class="fa  fa-clock"></i> ditutup <?= $ld->selisih ?> hari lagi
            </div>
            <div class="col-lg-6" >
            <a href="" class="btn btn-sm btn-cta" style="float:right" data-bs-toggle="modal" data-bs-target="#modal<?= $ld->id_lowongan?>">LIHAT SELENGKAPNYA</a>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modal<?= $ld->id_lowongan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Deskripsi Lowongan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?= $ld->deskripsi ?>
              <div class="d-grid gap-2">
                <a href="<?php echo base_url('formulir/'.$ld->id_lowongan)?>" class="btn btn-cta">Apply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      endforeach;
      }else{?>
      <div class="row mb-4">
        <div class="col-lg-12">
        <div class="card card-lowongan">
          <div class="card-body">
            <h4 class="text-center">Lowongan Tidak Tersedia</h4>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>