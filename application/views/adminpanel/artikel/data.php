  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Data Lowongan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active">List Artikel</li>
      </ol>

      <a type="button" style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Artikel
      </a>

      <a type="button" style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add-kategori">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Kategori
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
              <h3 class="box-title"><strong>Data Artikel</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th width="100px">Penulis</th>
                  <th width="100px">Kategori</th>
                  <th width="100px">Tanggal</th>
                  <th>Gambar Thumbnail</th>
                  <th class="text-center" >Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$ld->judul_artikel?></td>
                    <td><?=$ld->penulis?></td>
                    <td><?=$ld->nama_kategori?></td>
                    <td><?=mediumdate_indo($ld->datecreated)?></td>
                    <td><img src="<?= base_url('assets/images/artikel/').$ld->gambar_artikel?>" alt="" srcset="" class="img-thumbnail" style="max-width:150px"></td>
                    <td class="text-center">
                    <a href="<?=base_url('editartikel/'.$ld->id_artikel)?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a type="button" class="btn btn-sm btn-danger btn-delete"  href="<?=base_url('artikel/delete/'.$ld->id_artikel)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a></td>
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
              <h4 class="modal-title">Tambah Artikel</h4>
            </div>
            <form class="form-horizontal" action="<?=base_url('tambahArtikel')?>" role="form" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">      
                  <label for="nama_lowongan" class="col-sm-4 control-label">Judul Artikel :</label>
                    <div class="col-sm-3">
                    <input type="text" name="judul_artikel" class="form-control" placeholder="Masukkan Judul Artikel" required>
                    </div>
                </div>

                <div class="form-group">      
                  <label for="slug" class="col-sm-4 control-label">Slug :</label>
                    <div class="col-sm-3">
                    <input type="text" name="slug" class="form-control" placeholder="Masukkan Slug Disini" required>
                    </div>
                </div>

                <div class="form-group">      
                  <label for="penulis" class="col-sm-4 control-label">Penulis :</label>
                    <div class="col-sm-3">
                    <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis Disini" required>
                    </div>
                </div>

                <div class="form-group">      
                  <label for="kategori" class="col-sm-4 control-label">Kategori :</label>
                    <div class="col-sm-3">
                    <td><select class="form-control" name="kategori" required>
                      <option>- Pilih Kategori -</option>
                      <?php foreach($list_kategori as $lk){ ?> 
                      <option value="<?=$lk->id_kategori?>"> <?=$lk->nama_kategori?></option>
                      <?php } ?>
                    </select></td>
                    </div>
                </div> 
                <div class="form-group">  
                  <label for="deskripsi" class="col-sm-4 control-label">Gambar Artikel :</label>
                  <div class="col-sm-3">
                  <input type="file" name="gambar_artikel" class="form-control" required>
                  <span>(resolusi 700x400)</span>
                  </div>
                </div> 

                <div class="form-group">      
                  <label for="nama_lowongan" class="col-sm-4 control-label">Credit Image :</label>
                    <div class="col-sm-3">
                    <input type="text" name="credit_image" class="form-control" placeholder="Masukkan Credit Disini" required>
                    </div>
                </div>

                <div class="form-group">  
                  <label for="deskripsi" class="col-sm-4 control-label">Artikel :</label>
                  <div class="col-sm-7">
                    <textarea id="artikel-add" name="artikel" rows="10" cols="100"></textarea>
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

      <!-- .INPUT DATA ---->
      <div class="modal fade" id="modal-add-kategori">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Kategori Artikel</h4>
            </div>
            <div id="loading"></div>
            <form class="form-horizontal" action="<?=base_url('tambahKategori')?>" role="form" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">      
                  <label for="nama_lowongan" class="col-sm-4 control-label">Nama Kategori :</label>
                    <div class="col-sm-6">
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan Kategori Artikel" required>
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
      url:"<?php echo site_url("artikel/edit")?>/" + $id,
      type: "get",
      success:function(hasil){
        var $obj = $.parseJSON(hasil);
        if ($obj.id_artikel != ''){
          alert($obj.artikel);
          $('#judul_artikel').val($obj.judul_artikel);
          $('#artikel-edit').val($obj.artikel);
          // $('#nama_hadiah').val($obj.nama_hadiah);
          // $('#poin').val($obj.poin);
        }
      }
    });
  };
  </script>
