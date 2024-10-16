<div class="content-wrapper mb-4">
  <div class="container" style="padding:100px 0; min-height:80vh">
    <form action="<?=base_url('kuisioner/saveKuisionerKunjungan')?>" id="addBarang" method="post" role="form" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12 mb-4">
          <div class="card mb-4">
            <div class="card-body">
                <label class="mb-4" for="kunjungan_id"><b>Kuisioner Kunjungan Industri</b></label>
                <div class="alert alert-success" role="alert">
                  
                  <p class="m-0 text-center mb-3">Terimakasih kami ucapkan atas partisipasi</p>
                  <p class="m-0 text-center mb-3"> yang telah mengikuti kunjungan industri pada hari ini,</p>
                  <p class="m-0 text-center mb-3">kami meminta kesediaannya untuk dapat mengisi kuisioner yang telah kami siapkan, </p>
                  <p class="m-0 text-center mb-3">yang nantinya akan kami jadikan sebagai bahan evaluasi guna meningkatkan pelayanan kunjungan industri. </p>
                  <p class="m-0 text-center">Selamat menikmati freedrink dan snack yang sudah disediakan.</p>
                </div>
              <div class="form-group mb-3">
                  <input type="hidden" class="form-control-plaintext" name="kunjungan_id" value="<?= $id_kunjungan ?>">
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                  <label class="mb-4" for="instansi"><b>Asal Instansi</b></label>
                  <input type="text" class="form-control" name="instansi" placeholder="masukkan nama instansi disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                  <label class="mb-4" for="nama"><b>Nama</b></label>
                  <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                  <label class="mb-4" for="no_hp"><b>No. HP</b></label>
                  <input type="text" class="form-control" name="no_hp" placeholder="masukkan nomor HP disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                  <label class="mb-4" for="kesan"><b>Bagaimana kesan anda tentang keseluruhan kunjungan ini?
                  </b></label>
                  <input type="text" class="form-control" name="kesan" placeholder="masukkan kesan disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="poin_menarik"><b>Apa poin menarik dari kunjungan ini?</b></label>
                <!-- <input type="text" class="form-control" name="poin_menarik" > -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="poin_menarik" value="pemaparan materi" required>
                  <label class="form-check-label" for="poin_menarik1">
                    Pemaparan Materi
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="poin_menarik" value="quiz" required>
                  <label class="form-check-label" for="poin_menarik2">
                    Quiz
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="poin_menarik" value="visit pabrik" required>
                  <label class="form-check-label" for="poin_menarik3">
                    Visit Pabrik
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="poin_menarik" value="freedrink" required>
                  <label class="form-check-label" for="poin_menarik4">
                    Free Drink & Snack
                  </label>
                </div>
              </div>
            </div>
          </div>
          
          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="interaksi_tim"><b>Bagaimana pendapat anda tentang interaksi dan komunikasi Tim PT MIROTA KSM kepada peserta kunjungan?</b></label>
                <input type="text" class="form-control" name="interaksi_tim" placeholder="tuliskan kesan bersama Tim Mirota disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="kesesuaian_materi"><b>Bagaimana Kesesuaian antara materi dengan jurusan/minat anda?</b></label>
                <input type="text" class="form-control" name="kesesuaian_materi" placeholder="tuliskan jawaban anda disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="pengetahuan_mirota"><b>Apakah anda telah mengenal PT Mirota KSM sebagai pabrik susu sebelum kegiatan kunjungan industri?</b></label>
                <!-- <input type="text" class="form-control" name="pengetahuan_mirota" placeholder="tuliskan jawaban anda disini"> -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pengetahuan_mirota" value="sudah" required>
                  <label class="form-check-label" for="pengetahuan_mirota1">
                    ya, sebelumnya sudah tau
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pengetahuan_mirota" value="belum" required>
                  <label class="form-check-label" for="pengetahuan_mirota2">
                    belum
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="pengetahuan_produk"><b>Apakah anda telah mengenal produk Lactona, Prosteo dan Prolansia sebagai produk susu PT Mirota KSM sebelumnya ?</b></label>
                <!-- <input type="text" class="form-control" name="pengetahuan_produk" placeholder="tuliskan jawaban anda disini"> -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pengetahuan_produk" value="sudah" required>
                  <label class="form-check-label" for="pengetahuan_produk1">
                    ya, sebelumnya sudah mengenal
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pengetahuan_produk" value="belum" required>
                  <label class="form-check-label" for="pengetahuan_produk2">
                    belum
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="konsumsi_produk"><b>Apakah anda pernah mengonsumsi produk - produk dari PT Mirota KSM sebelumnya ?</b></label>
                <!-- <input type="text" class="form-control" name="konsumsi_produk" placeholder="tuliskan jawaban anda disini"> -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="konsumsi_produk" value="sudah" required>
                  <label class="form-check-label" for="konsumsi_produk1">
                    ya, saya pernah
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="konsumsi_produk" value="belum" required>
                  <label class="form-check-label" for="konsumsi_produk2">
                    belum
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="kegiatan_aula"><b>Apakah kegiatan di Aula, Anda mendapatkan informasi mengenai Profil Perusahaan dan Produk dengan baik?
                (Anda boleh menyampaikan masukan)</b></label>
                <input type="text" class="form-control" name="kegiatan_aula" placeholder="tuliskan pendapat anda disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="kegiatan_pabrik"><b>Apakah kegiatan di Pabrik, anda mendapatkan informasi mengenai Kegiatan Produksi dengan baik?
                (Anda boleh menyampaikan masukan)</b></label>
                <input type="text" class="form-control" name="kegiatan_pabrik" placeholder="tuliskan pendapat anda disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="freedrink"><b>Bagaimana pendapat anda tentang produk susu yang anda coba?</b></label>
                <input type="text" class="form-control" name="freedrink" placeholder="tuliskan pendapat anda disini" required>
              </div>
            </div>
          </div>

          <div class="card m-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label class="mb-4" for="saran"><b>Apakah ada saran untuk meningkatkan pengalaman kunjungan industri di masa depan?</b></label>
                <input type="text" class="form-control" name="saran" placeholder="tuliskan saran anda disini" required>
              </div>
            </div>
          </div>
        </div>
      </div>
        <button type="submit" class="btn btn-primary" style="float:right;background-color:rgba(0,74,173,1);color:#fff;margin:10px">Submit</button>
    </form>
  </div>
</div>
    