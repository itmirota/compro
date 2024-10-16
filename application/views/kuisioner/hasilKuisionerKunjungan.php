<div class="content-wrapper mb-4">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>Kuisioner Kunjungan Industri</strong></h3>
          </div>
          <div class="box-body">
            <table id="datatableScrollX" class="table table-hover" width="200%">
              <thead>
              <tr>
                <th>No</th>
                <th>Instansi</th>
                <th>Nama</th>
                <th>No. Hp</th>
                <th>Kesan Kunjungan</th>
                <th>yang menarik dari kunjungan</th>
                <th>interaksi dan komunikasi Tim PT. Mirota KSM</th>
                <th>Kesesuaian antara materi dengan jurusan/minat</th>
                <th>mengenal perusahaan sebelumnya</th>
                <th>mengenal produk sebelumnya</th>
                <th>pernah mengonsumsi produk PT Mirota KSM</th>
                <th>kegiatan di Aula</th>
                <th>kegiatan di Pabrik</th>
                <th>produk susu yang dicoba</th>
                <th>saran</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              foreach ($list_data as $ld): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td width="500px"><?= $ld->instansi ?></td>
                  <td><?= $ld->nama ?></td>
                  <td><?= $ld->no_hp ?></td>
                  <?php 
                  $jawaban = explode('|',$ld->jawaban);

                  foreach ($jawaban as $key) { ?>
                    <td style="width:200vh"><?= $key ?></td>
                  <?php } ?>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>
