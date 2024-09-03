  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Kunjungan Industri
      </h1>
      
      <a style="margin:20px 0;" class="btn btn-blue pull-right" data-toggle="modal" data-target="#modal-add">
        Tambah Info Kunjungan
      </a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- .VIEW TABEL DATA ---->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Kunjungan Industri</strong></h3>
            </div>
            <div class="box-body table-responsive">  
              <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>
                <div class="col-md-12">
                    <?php echo $this->session->flashdata('gagal'); ?>
                </div>
              </div>
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Barcode</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$ld->judul_info?></td>
                    <td><?=$ld->deskripsi?></td>
                    <td><img src="<?= base_url('assets/images/qrcode/info_kunjungan/'.$ld->barcode); ?>" width="100"></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach;?>
                <?php }else { ?>
                      <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.VIEW TABEL DATA ---->

          <!-- .ADD DATA ---->
          <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Kunjungan</h4>
                </div>
                <div id="loading"></div>
                <div class="modal-body"> 
                  <form action="<?=base_url('kunjunganindustri/simpanInfo')?>" id="addBarang" method="post" role="form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12 mb-4">
                        <div class="form-group mb-3">
                          <label for="judul_info">Judul</label>
                          <input type="text" class="form-control" name="judul_info" placeholder="masukkan nama judul disini">
                        </div>

                        <div class="form-group mb-3">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea class="form-control" name="deskripsi" placeholder="Tulis deskripsi disini" style="height: 100px"></textarea>    
                        </div>

                        <div class="form-group mb-3">
                          <label for="file_video">video</label>
                          <input type="file" class="form-control" id="file_video" name="file_video" placeholder="file_video">
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" style="float:right;background-color:rgba(0,74,173,1);color:#fff">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.ADD DATA ---->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->