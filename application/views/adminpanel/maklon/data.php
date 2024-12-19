  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel  Maklon
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active">List Maklon</li>
      </ol>

      <a href="#" type="button" style="margin:20px 0;" class="btn btn-blue pull-right" data-toggle="modal" data-target="#modal-export">
        <i class="fa fa-download" aria-hidden="true"></i>
        export
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
              <h3 class="box-title"><strong>Data Maklon</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th width="100px">Nama Perusahaan</th>
                  <th width="100px">Alamat</th>
                  <th>PIC</th>
                  <th>Info Maklon</th>
                  <th>Rencana Produk</th>
                  <th>Existing Product</th>
                  <th width="100px">Perizinan</th>
                  <th>Plan Produksi</th>
                  <th>Nilai Project Awal(estimasi)</th>
                  <th class="text-center" >Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=mediumdate_indo($ld->datecreated)?></td>
                    <td><?=$ld->nama_perusahaan?></td>
                    <td><?=$ld->alamat?>, <?=$ld->dis_name?>, <?=$ld->city_name?>, <?=$ld->prov_name?></td>
                    <td>
                        <p><?=$ld->nama_pic?></p>
                        <p><?=$ld->jabatan?></p>
                        <p><?=$ld->no_telpon?></p>
                        <p><?=$ld->email?></p>
                    </td>
                    <td>
                        <?php if ($ld->sumber_info == 'sales'){?>
                        <?=$ld->sumber_info?> / <?=$ld->sumber_person?>
                        <?php } else {?>
                        <?=$ld->sumber_info?>
                        <?php } ?>
                    </td>
                    <td><?=$ld->nama_kategoriproduk?></td>
                    <td><?=$ld->produk_exist?></td>
                    <td>
                        <p><strong>Halal :</strong><?=$ld->ijin_halal?></p>
                        <p><strong>BPOM :</strong><?=$ld->ijin_bpom?></p>
                        <p><strong>HAKI :</strong><?=$ld->haki?></p>
                    </td>
                    <td><?=mediumdate_indo($ld->plan_produksi)?></td>
                    <td><?=$ld->estimasi_nilai_project?></td>

                    <td class="text-center">
                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit" onclick="edit(<?=$ld->id_maklon?>)"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a type="button" class="btn btn-sm btn-danger btn-delete"  href="<?=base_url('maklon/hapusKategoriMaklon/'.$ld->id_maklon)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a></td>
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

      <!-- .EXPORT DATA ---->
      <div class="modal fade" id="modal-export">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Export Maklon</h4>
            </div>
            <form class="form-horizontal" action="<?=base_url('maklon/export')?>" role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">      
                <label for="nama_produk" class="col-sm-4 control-label">Tanggal Awal :</label>
                <div class="col-sm-8">
                <input type="date" name="tgl_awal" class="form-control">
                </div>
              </div>
              <div class="form-group">      
                <label for="nama_produk" class="col-sm-4 control-label">Tanggal Akhir :</label>
                <div class="col-sm-8">
                <input type="date" name="tgl_akhir" class="form-control">
                </div>
              </div>  
            </div>
            <div class="modal-footer">
                <input type="submit" value="Export" class="btn pull-right btn btn-success"></input>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.EXPORT DATA ---->

      <!-- .EDIT DATA ---->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Update Maklon</h4>
            </div>
            <form class="form-horizontal" action="<?=base_url('maklon/updateKategoriMaklon')?>" role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">      
              <label for="nama_produk" class="col-sm-4 control-label">Nama Maklon :</label>
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
      <!-- /.EDIT DATA ---->
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
  
