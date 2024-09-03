<section class="page-artikel mb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <!-- konten -->
        <h1 class="judul-artikel"><?= $artikel->judul_artikel?></h1>
        <p class="info-artikel"><?= $artikel->name.' | '. mediumdate_indo($artikel->datecreated)?></p>
        <img src="<?= base_url('assets/images/artikel/').$artikel->gambar_artikel?>" class="img-thumbnail mb-4" style="border-radius:15px;border:none;" alt="<?= $artikel->slug?>">
        <div class="text-artikel"><?= $artikel->artikel?></div>
        <!-- konten -->
      </div>
      <div class="col-lg-3">
      <div class="row"  style="margin-top:15vh">
      <hr>
        <h3 class="judul-menu">Artikel Terkait</h3>
        <?php if((COUNT($artikel_terkait) != 0)){ ?>
        <?php foreach($artikel_terkait as $data):?>
          <a href="<?= base_url('artikel/'.$data->slug)?>">
          <div class="d-flex align-items-center p-2">
            <div class="flex-shrink-0">
              <a href="<?= base_url('artikel/'.$data->slug)?>">
              <img src="<?= base_url('assets/images/artikel/').$data->gambar_artikel?>" width="100px" alt="<?= $data->slug?>">
              </a>
            </div>
            <div class="flex-grow-1 ms-3">
              <a href="<?= base_url('artikel/'.$data->slug)?>">
              <h1 class="judul-baru m-0"><?= $data->judul_artikel?></h1>
              </a>
              <p class="info-artikel-baru m-0"><?= $data->nama_kategori.' | '.mediumdate_indo($data->datecreated) ?></p>
            </div>
          </div>
          </a>
        <?php endforeach;?>
        <?php } else { ?>
          <div class="alert alert-light" role="alert">
            <p class="info-artikel-baru m-0"> Tidak ada artikel terkait </p>
          </div>  
        <?php } ?>
      </div>
      <hr>
      <div class="row">
        <h3 class="judul-menu">Artikel Terbaru</h3>
        <?php foreach($artikel_terbaru as $new){?>
          <a href="<?= base_url('artikel/'.$new->slug)?>">
            <div class="d-flex align-items-center p-2">
              <div class="flex-shrink-0">
                <a href="<?= base_url('artikel/'.$new->slug)?>">
                <img src="<?= base_url('assets/images/artikel/').$new->gambar_artikel?>" width="100px" alt="<?= $new->slug?>">
                </a>
              </div>
              <div class="flex-grow-1 ms-3">
                <a href="<?= base_url('artikel/'.$new->slug)?>">
                <h1 class="judul-baru m-0"><?= $new->judul_artikel?></h1>
                </a>
                <p class="info-artikel-baru m-0"><?= $new->nama_kategori.' | '.mediumdate_indo($new->datecreated) ?></p>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
      </div>

    </div>

  </div>
</section>