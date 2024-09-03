<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
  <div class="pull-right" style="margin:20px 0;">
    <button class="btn btn-primary me-2" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah Data</button>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-body table-responsive no-padding">
          <table id="dataTable" class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Barcode</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <?php
            if(!empty($kategori)){
            $no = 1;
            foreach ($kategori as $k): ?>
            <tbody>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $k->nama_kategori ?></td>
                <td><img src="<?= base_url('assets/images/qrcode/kategori_kuisioner/'.$k->barcode); ?>" width="100"></td>
                <td class="text-center">              
                  <a href="<?= base_url('list-soal/'.$k->id_kategori)?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                  <a href="<?= base_url('hapusKategori/'.$k->id_kategori)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            </tbody>
            <?php endforeach; }else{?>
              <td colspan="3" class="text-center">data tidak tersedia</td>
            <?php }?>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?=base_url('kuisioner/saveKategori')?>" role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Kategori Kuisioner</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="col-md-10">
            <label for="soal" class="form-label">Kategori</label>
            <input type="text" name="kategori" placeholder="tulis kategori disini" class="form-control tabel-PR" required/>
          </div>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>