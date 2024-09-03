<div class="content-wrapper">
  <div class="content">
  <div class="box">
    <div class="box-body">
    <?php foreach($detail as $d){ ?> 
      <form class="form-horizontal" action="<?=base_url('artikel/update/'.$d->id_artikel)?>" role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">      
            <label for="nama_lowongan" class="col-sm-4 control-label">Judul Artikel :</label>
              <div class="col-sm-3">
              <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" value="<?=$d->judul_artikel?>">
              </div>
          </div>
          <div class="form-group">      
            <label for="kategori" class="col-sm-4 control-label">Kategori :</label>
              <div class="col-sm-3">
              <td><select class="form-control" name="kategori"  id="kategori" required>
                <?php foreach($list_kategori as $lk){ ?> 
                <option value="<?=$lk->id_kategori?>" <?= $d->kategori_id === $lk->id_kategori ? 'selected':'' ?>> <?=$lk->nama_kategori?></option>
                <?php } ?>
              </select></td>
              </div>
          </div> 
          <div class="form-group">  
            <label for="deskripsi" class="col-sm-4 control-label">Gambar Artikel :</label>
            <div class="col-sm-3">
              <img class="img-thumbnail" src="<?= base_url().'assets/images/artikel/'.$d->gambar_artikel?>" alt="" srcset="">
            <input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control">
            <span>(resolusi 700x400)</span>
            </div>
          </div> 

          <div class="form-group">  
            <label for="artikel-edit" class="col-sm-4 control-label">Artikel :</label>
            <div class="col-sm-7">
              <textarea id="artikel-edit" name="artikel" rows="10" cols="100"><?=$d->artikel?></textarea>
            </div>
          </div> 
        </div>
        <div class="modal-footer">
          <input type="submit" value="Simpan" class="btn pull-right btn btn-success"></input>
        </div>
      </form>
      <?php } ?> 
    </div>
  </div>
  </div>
</div>