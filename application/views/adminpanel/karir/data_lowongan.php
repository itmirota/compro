  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Data Lowongan
      </h1>

      <a type="button" style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Lowongan
      </a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('berhasil')){ ?>
              <div class="alert alert-success alert-dismissible" style="width:100%">
                  <button href="#" class="close" data-dismiss="alert" aria-label="close" style="color:#fff">&times;</button>
                  <strong>Success!</strong><br> <?php echo $this->session->flashdata('berhasil');?>
              </div>
            <?php } ?>
        </div>
        <div class="col-md-12">
            <?php echo $this->session->flashdata('gagal'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- .VIEW TABEL DATA ---->

          <!-- .BOX RELEASE ---->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Data Lowongan</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lowongan</th>
                  <th>Kategori</th>
                  <th>lokasi</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal akhir</th>
                  <th class="text-center" >Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$ld->nama_lowongan?></td>
                    <td><?=$ld->kategori?></td>
                    <td><?=$ld->wilayah?></td>
                    <td><?=mediumdate_indo($ld->tgl_awal)?></td>
                    <td><?=mediumdate_indo($ld->tgl_akhir)?></td>
                    <td class="text-center">
                    <a href="<?=base_url('karir/detaillowongan?id='.$ld->id_lowongan)?>" type="button" class="btn btn-blue btn-sm btn-detail" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                    <a type="button" class="btn btn-red btn-sm btn-delete"  href="<?=base_url('karir/delete?id='.$ld->id_lowongan)?>" name="btn_delete" style="margin:auto;" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach;?>
                <?php }else { ?>
                      <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                <?php } ?>
                </tbody>
              </table>
              <!-- /.tabel release -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.BOX KARANTINA ---->

          <!-- /.VIEW TABEL DATA ---->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- .INPUT DATA ---->
      <div class="modal fade" id="modal-add">
        <div class="modal-dialog" style="width:90%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Data Lowongan</h4>
            </div>
            <div id="loading"></div>
            <form class="form-horizontal" action="<?=base_url('karir/save')?>" role="form" id="addBarang" method="post">
              <div class="modal-body">
                <div class="form-group">      
                  <label for="nama_lowongan" class="col-sm-4 control-label">Judul lowongan :</label>
                    <div class="col-sm-3">
                    <input type="text" name="nama_lowongan" class="form-control" placeholder="Masukkan Nama Lowongan">
                    </div>
                </div>
                <div class="form-group">      
                  <label for="kategori" class="col-sm-4 control-label">Stok Untuk :</label>
                    <div class="col-sm-3">
                    <td><select class="form-control" name="kategori">
                      <option value="">- Pilih Kategori -</option>
                      <option value="freshgraduate">freshgraduate</option>
                      <option value="profesional">profesional</option>
                      <option value="magang">magang</option>
                    </select></td>
                    </div>
                </div>
                <div class="form-group">      
                  <label for="lokasi" class="col-sm-4 control-label">Lokasi :</label>
                    <div class="col-sm-3">
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
                    </div>
                </div>
                <div class="form-group">
                  <label for="tgl_awal" class="col-sm-4 control-label" >Tanggal Mulai :</label>
                  <div class="col-sm-3">
                    <input type="date" name="tgl_awal" class="form-control" placeholder="Klik Disini">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="tgl_akhir" class="col-sm-4 control-label" >Tanggal Akhir :</label>
                  <div class="col-sm-3">
                    <input type="date" name="tgl_akhir" class="form-control" placeholder="Klik Disini">
                  </div>
                </div>  
                <div class="form-group">  
                  <label for="deskripsi" class="col-sm-4 control-label">Deskripsi :</label>
                  <div class="col-sm-6">
                    <textarea id="deskripsi" name="deskripsi" rows="10" cols="80"></textarea>
                  </div>
                </div> 
              </div>
              <div class="modal-footer">
                <input type="submit" value="Simpan" class="btn pull-right btn btn-success"></input>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.INPUT DATA ---->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
