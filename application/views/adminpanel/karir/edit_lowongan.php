  <!-- Content Wrapper. Contains page content -->
  <section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <a href="<?= base_url('datalowongan')?>"><i class="fa fa-arrow-left"> Kembali</i></a>

    </div>

    <div class="content">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title"><strong>Edit Data Lowongan</strong></h3>
        </div>
      <?php foreach ($list_data as $ld) { ?>
      <form class="form-horizontal" action="<?=base_url('karir/update?id='.$ld->id_lowongan)?>" role="form" id="updateLowongan" method="post">
        <div class="box-body">
          <div class="form-group">      
            <label for="nama_lowongan" class="col-sm-4 control-label">Judul lowongan :</label>
              <div class="col-sm-3">
              <input type="text" name="nama_lowongan" class="form-control" value="<?= $ld->nama_lowongan?>">
              </div>
          </div>
          <div class="form-group">      
            <label for="kategori" class="col-sm-4 control-label">Stok Untuk :</label>
              <div class="col-sm-3">
              <td><select class="form-control" name="kategori">
                <?php 
                switch ($ld->kategori) {
                  case 'freshgraduate':?>
                    <option value="<?= $ld->kategori?>"><?= $ld->kategori?></option>
                    <option value="profesional">freshgraduate</option>
                    <option value="magang">magang</option>
                  <?php break;

                  case 'profesional':?>
                    <option value="<?= $ld->kategori?>"><?= $ld->kategori?></option>
                    <option value="freshgraduate">freshgraduate</option>
                    <option value="magang">magang</option>
                  <?php break;
                  
                  default:?>
                    <option value="<?= $ld->kategori?>"><?= $ld->kategori?></option>
                    <option value="profesional">freshgraduate</option>
                    <option value="freshgraduate">freshgraduate</option>
                  <?php break;
                }?>
              </select></td>
              </div>
          </div>
          <div class="form-group">      
            <label for="lokasi" class="col-sm-4 control-label">Lokasi :</label>
              <div class="col-sm-3">
              <input type="text" name="lokasi" class="form-control" value="<?= $ld->wilayah?>">
              </div>
          </div>
          <div class="form-group">
            <label for="tgl_awal" class="col-sm-4 control-label" >Tanggal Mulai :</label>
            <div class="col-sm-3">
              <input type="date" name="tgl_awal" class="form-control"  value="<?= $ld->tgl_awal ?>">
            </div>
          </div>  
          <div class="form-group">
            <label for="tgl_akhir" class="col-sm-4 control-label" >Tanggal Akhir :</label>
            <div class="col-sm-3">
              <input type="date" name="tgl_akhir" class="form-control" value="<?= $ld->tgl_akhir ?>">
            </div>
          </div>  
          <div class="form-group">  
            <label for="deskripsi" class="col-sm-4 control-label">Deskripsi :</label>
            <div class="col-sm-6">
              <textarea id="deskripsi" name="deskripsi" rows="10" cols="80"><?= $ld->deskripsi ?></textarea>
            </div>
          </div> 
        </div>
        <div class="box-footer">
          <input type="submit" value="Simpan" class="btn pull-right btn btn-success"></input>
        </div>
      </form>
      <?php }?>
    </div>