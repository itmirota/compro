<section class="pages">
  <div class="container py-4 karir">
    <!-- <div class="header-desc" style="margin: 80px;">
        <h2>Ingin informasi lebih lanjut tentang kami?</h2>
        <p>kami sangat senang dapat membantu anda, katakan kepada kami apa yang ingin anda ketahui kami akan bantu anda semaksimal mungkin.</p>
    </div> -->

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
        <div class="col-md-12">
            <?php echo $this->session->flashdata('gagal'); ?>
        </div>
    </div>

    <div class="row">
        <h2 class="header-text">Formulir Kerja</h2>
        <form role="form" action="<?php echo base_url('karir/savepelamar') ?>" method="post" id="simpan_kunjungan" role="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="hidden" class="form-control" name="posisi" id="posisi" placeholder="name@example.com" value="<?= $id_lowongan ?>">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="name@example.com" value="<?= $nama_lowongan ?>" readonly>
                        <label for="floatingInput">Posisi yang dilamar</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama_pelamar" id="nama_pelamar" placeholder="masukkan nama lengkap disini" required>
                        <label for="floatingInput">Nama Lengkap</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="masukkan alamat disini" required>
                        <label for="floatingInput">Alamat domisili sekarang</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="masukkan email disini" required>
                        <label for="floatingInput">Alamat Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="masukkan kontak disini" required>
                        <label for="floatingInput">Nomor yang bisa dihubungi (Whatsapp)</label>
                    </div>

                </div>

                <div class="col-md-6">
                    
                    <!-- <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="file_surat" id="file_surat" required>
                        <label for="floatingInput">Surat Lamaran(pdf)</label>
                    </div> -->

                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="file_cv" id="file_cv" required>
                        <label for="floatingInput">CV(pdf)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="file_ijazah" id="file_ijazah" required>
                        <label for="floatingInput">Ijazah(pdf)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="file_lampiran" id="file_lampiran">
                        <label for="floatingInput">lampiran pendukung(pdf) (optional)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
        </form>
    </div>
  </div>
</section>