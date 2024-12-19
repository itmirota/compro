  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Data Produk
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active">List Produk</li>
      </ol>

      <a type="button" style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Produk
      </a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('msg_berhasil')){ ?>
              <div class="alert alert-success alert-dismissible" style="width:100%">
                  <button href="#" class="close" data-dismiss="alert" aria-label="close" style="color:#fff">&times;</button>
                  <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
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
              <h3 class="box-title"><strong>Data Produk</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar Produk</th>
                  <th>Nama Produk</th>
                  <th>Keterangan</th>
                  <th>Deskripsi</th>
                  <th class="text-center" >Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><img src="<?= base_url('assets/landingpage/images/produk/').$ld->gambar_produk?>" class="img-thumbnail" style="max-width:150px"></td>
                    <td><?=$ld->nama_produk?></td>
                    <td><?=$ld->keterangan_produk?></td>
                    <td><?=$ld->deskripsi_produk?></td>
                    <td class="text-center">
                    <a href="<?=base_url('editproduk/'.$ld->id_produk)?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a type="button" class="btn btn-sm btn-danger btn-delete"  href="<?=base_url('produk/delete/'.$ld->id_produk)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a></td>
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
              <h4 class="modal-title">Tambah Produk</h4>
            </div>
            <form class="form-horizontal" action="<?=base_url('tambahProduk')?>" role="form" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">      
                  <label for="nama_produk" class="col-sm-4 control-label">Judul Produk :</label>
                    <div class="col-sm-3">
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan Judul produk" required>
                    </div>
                </div> 
                <div class="form-group">      
                  <label for="keterangan_produk" class="col-sm-4 control-label">Keterangan Produk :</label>
                    <div class="col-sm-3">
                    <input type="text" name="keterangan_produk" class="form-control" placeholder="Masukkan keterangan produk" required>
                    </div>
                </div> 
                <div class="form-group">  
                  <label for="gambar_produk" class="col-sm-4 control-label">Gambar produk :</label>
                  <!-- <div class="col-sm-3">
                  <input type="file" name="gambar_produk" class="form-control">
                  <span>(resolusi 700x400)</span>
                  </div> -->
                  <div class="col-sm-3">
                  <input type="text" name="gambar_produk" class="form-control" placeholder="Masukkan keterangan produk" required>
                  </div> 
                </div> 

                <div class="form-group">  
                  <label for="deskripsi" class="col-sm-4 control-label">deskripsi :</label>
                  <div class="col-sm-7">
                    <textarea id="deskripsi_produk" name="deskripsi_produk" rows="10" cols="100"></textarea>
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
  function edit($id){
    $.ajax({
      url:"<?php echo site_url("produk/edit")?>/" + $id,
      type: "get",
      success:function(hasil){
        var $obj = $.parseJSON(hasil);
        if ($obj.id_produk != ''){
          alert($obj.produk);
          $('#judul_produk').val($obj.nama_produk);
          $('#produk-edit').val($obj.produk);
          // $('#nama_hadiah').val($obj.nama_hadiah);
          // $('#poin').val($obj.poin);
        }
      }
    });
  };
  </script>
