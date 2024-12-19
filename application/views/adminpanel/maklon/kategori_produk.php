  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Kategori Produk Maklon
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active">List Kategori Produk</li>
      </ol>

      <a type="button" style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Kategori Produk
      </a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- .VIEW TABEL DATA ---->

          <!-- .BOX ---->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Data Kategori Produk</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th class="text-center" >Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$ld->nama_kategoriproduk?></td>
                    <td class="text-center">
                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit" onclick="edit(<?=$ld->id_maklon_kategoriproduk?>)"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a type="button" class="btn btn-sm btn-danger btn-delete"  href="<?=base_url('maklon/hapusKategoriMaklon/'.$ld->id_maklon_kategoriproduk)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a></td>
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
          <!-- /.BOX ---->

          <!-- /.VIEW TABEL DATA ---->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- .INPUT DATA ---->
      <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Kategori Produk</h4>
            </div>
            <form class="form-horizontal" action="<?=base_url('maklon/saveKategoriMaklon')?>" role="form" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">      
                  <label for="nama_produk" class="col-sm-4 control-label">Nama Kategori Produk :</label>
                    <div class="col-sm-8">
                    <input type="text" name="nama_kategoriproduk" class="form-control" placeholder="Masukkan Kategori Produk" required>
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

      <!-- .EDIT DATA ---->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Update Kategori Produk</h4>
            </div>
            <form class="form-horizontal" action="<?=base_url('maklon/updateKategoriMaklon')?>" role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">      
              <label for="nama_produk" class="col-sm-4 control-label">Nama Kategori Produk :</label>
                <div class="col-sm-8">
                <input type="hidden" id="id_kategoriproduk" name="id_kategoriproduk" class="form-control" required>
                <input type="text" id="nama_kategoriproduk" name="nama_kategoriproduk" class="form-control" required>
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

  <script>
  function edit(id){
    $.ajax({
      type : "POST",
      dataType : "JSON",
      url :  "<?= base_url();?>maklon/detailKategoriProduk",
      data : {id : id},
      success : function(data){
        $('#id_kategoriproduk').val(data.id_maklon_kategoriproduk);
        $('#nama_kategoriproduk').val(data.nama_kategoriproduk);
      }
    });
  };
  </script>
