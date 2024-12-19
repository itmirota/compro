  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Data Pelamar
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active"><a href="<?=base_url('admin/tabel_barangmasuk')?>"></a>Tabel Pelamar</li>
      </ol>

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

            <?php if($this->session->flashdata('gagal')){ ?>
              <div class="alert alert-danger alert-dismissible" style="width:100%">
                  <button href="#" class="close" data-dismiss="alert" aria-label="close" style="color:#fff">&times;</button>
                  <strong>Success!</strong><br> <?php echo $this->session->flashdata('gagal');?>
              </div>
            <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- .VIEW TABEL DATA ---->

          <!-- .BOX RELEASE ---->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Data Pelamar</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-resposive">  
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Melamar</th>
                  <th>Nama Pelamar</th>
                  <th>Posisi</th>
                  <th>Domisili</th>
                  <th>Email</th>
                  <th>No. WA</th>
                  <th class="text-center">Dokumen</th>
                  <th class="text-center">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=mediumdate_indo($ld->date)?></td>
                    <td><?=$ld->nama_pelamar?></td>
                    <td><?=$ld->nama_lowongan?></td>
                    <td><?=$ld->alamat_pelamar?></td>
                    <td><?=$ld->email_pelamar?></td>
                    <td><a href="https://wa.me/<?=$ld->no_wa?>" target="_blank" rel="noopener noreferrer"><?=$ld->no_wa?></a></td>
                    <td class="text-center"><a data-toggle="modal" data-target="#modal-dokumen" onclick="detail(<?= $ld->id_pelamar?>)" type="button" class="btn btn-blue btn-sm btn-detail"><i class="fa fa-file"></i></a></td>
                    <td class="text-center">
                    <a type="button" class="btn btn-sm btn-red btn-delete"  href="<?=base_url('karir/delete_pelamar?id='.$ld->id_pelamar)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
    </section>
    <!-- /.content -->
  </div>


  <!-- .DETAIL DATA ---->
  <div class="modal fade" id="modal-dokumen">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Dokumen Lampiran</h4>
        </div>
        <div id="loading"></div>
        <div class="modal-body"> 
          <div class="form-group">      
              <div class="col-sm-12" name="file" id="file">
              </div>
          </div>
        </div>
        <div class="modal-footer"></div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.DETAIL DATA ---->

  <!-- /.content-wrapper -->

  <script>
  function detail($id){
    $.ajax({
      url:"<?php echo site_url("karir/getDataPelamar")?>/" + $id,
      type: "get",
      success:function(hasil){
        var $obj = $.parseJSON(hasil);

        if ($obj.id_kunjungan != ''){
          $file_surat = $obj.file_surat;
          $file_cv = $obj.file_cv;
          $file_ijazah = $obj.file_ijazah;
          $file_lampiran = $obj.file_lampiran;

          var $file_surat = "<?= site_url("assets/dokumen_pelamar")?>/" + $file_surat;
          var $file_cv = "<?= site_url("assets/dokumen_pelamar")?>/" + $file_cv;
          var $file_ijazah = "<?= site_url("assets/dokumen_pelamar")?>/" + $file_ijazah;
          var $file_lampiran = "<?= site_url("assets/dokumen_pelamar")?>/" + $file_lampiran;

          var html = ' ';
          html += 
          '<label class="mb-4"> Surat Lamaran</label>';
          html += 
          '<embed type="application/pdf" src="'+ $file_surat +'" width="850" height="400"></embed>';
          html += 
          '<label class="mb-4">File CV</label>';
          html += 
          '<embed type="application/pdf" src="'+ $file_cv +'" width="850" height="400"></embed>';
          html += 
          '<label class="mb-4">File Ijazah</label>';
          html += 
          '<embed type="application/pdf" src="'+ $file_ijazah +'" width="850" height="400"></embed>';
          
          if($obj.file_lampiran != ""){
          html += 
          '<label class="mb-4">Lampiran Lainnya</label>';
          html += 
          '<embed type="application/pdf" src="'+ $file_lampiran +'" width="850" height="400"></embed>';
          }

          $("#file").html(html);
        }
      }
    });
  };
  </script>
