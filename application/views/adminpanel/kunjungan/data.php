  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Kunjungan Industri
      </h1>

      <a type="button" style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add">
        Syarat & Ketentuan
      </a>
      <a href="<?=base_url('kalenderkunjungan')?>" target="_blank" style="margin-top:20px;" class="btn btn-blue">
        Lihat Kalender
      </a>
      <a style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#modal-add-kunjungan">
        Tambah Kunjungan
      </a>
      <a style="margin-top:20px;" class="btn btn-blue" data-toggle="modal" data-target="#export-kunjungan">
        export Kunjungan
      </a>

      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active"><a href="<?=base_url('admin/tabel_barangmasuk')?>"></a>Tabel Barang Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- .VIEW TABEL DATA ---->

          <!-- .BOX RELEASE ---->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Kunjungan Industri</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
            <div class="table-responsive">
              <!-- .tabel release -->
              <table id="release" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th style="width:100px">Hari/Tanggal</th>
                  <th>Jam</th>
                  <th style="width:100px">Institusi/Sekolah</th>
                  <th style="width:150px">Jurusan</th>
                  <th style="width:100px">PIC</th>
                  <!-- <th>Kontak</th>
                  <th>Email</th> -->
                  <th>Pengunjung</th>
                  <th>Pendamping</th>
                  <th>dokumen</th>
                  <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list_data)){ ?>
                <?php $no = 1;?>
                <?php foreach($list_data as $dk): ?>
                <tr style=color:<?= $dk->status === "T" ? 'red':($dk->status === "Y" ? 'green':($dk->status === "R"?'#c5c208':'')) ?>;>
                    <td><?=$no?></td>
                    <td><?=mediumdate_indo($dk->date)?> <a href="" data-toggle="modal" data-target="#edit-tanggal" onclick="edittanggal(<?php echo $dk->id_kunjungan?>)"><i class="fa fa-solid fa-pencil"></i></a></td>
                    <td><?=$dk->time?></td>
                    <td><?=$dk->instansi?></td>
                    <td><?=$dk->jurusan?></td>
                    <td><a href="" data-toggle="modal" data-target="#detail-kontak" onclick="detailKontak(<?php echo $dk->id_kunjungan?>)"><?=$dk->nama?> </a></i></td>
                    <!-- <td><a href="http://wa.me/<?=$dk->no_hp?>" target="_blank"><?=$dk->no_hp?></a></td>
                    <td><?=$dk->email?></td> -->
                    <td><?=$dk->jml_pengunjung.' orang'?></td>
                    <td><?=$dk->jml_pendamping.' orang'?></td>
                    <td><a data-toggle="modal" data-target="#modal-detail" onclick="detail(<?php echo $dk->id_kunjungan?>)" name="btn_detail" type="button" class="btn btn-blue btn-sm btn-detail"><i class="fa fa-eye"></i></a></td>
                    <!-- <td><a type="button" class="btn btn-danger btn-delete"  href="<?=base_url('barangmasuk/delete_barang/'.$dk->id_kunjungan)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-<?= $dk->status === "T" ? 'danger':($dk->status === "Y" ? 'success':($dk->status === "R" ?'warning':''))?>"><?= $dk->status === "T" ? 'batal':($dk->status === "Y" ? 'dijadwalkan': ($dk->status === "R" ?'pending':'perlu proses'))?></button>
                      <button type="button" class="btn btn-sm btn-<?= $dk->status === "T" ? 'danger':($dk->status === "Y" ? 'success':($dk->status === "R" ?'warning':''))?> dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url().'kunjunganindustri/updateStatus/'.$dk->id_kunjungan.'/Y'?>">dijadwalkan</a></li>
                        <li><a href="<?= base_url().'kunjunganindustri/updateStatus/'.$dk->id_kunjungan.'/R'?>">pending</a></li>
                        <li><a href="<?= base_url().'kunjunganindustri/updateStatus/'.$dk->id_kunjungan.'/T'?>">batal</a></li>
                      </ul>
                    </div>
                    </td>
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.BOX KARANTINA ---->

          <!-- /.VIEW TABEL DATA ---->

          <!-- .DETAIL DATA ---->
          <div class="modal fade" id="modal-add-kunjungan">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Kunjungan</h4>
                </div>
                <div id="loading"></div>
                <form action="<?=base_url('kunjunganindustri/save/'.$UserId)?>" role="form" id="addBarang" method="post">
                  <div class="modal-body"> 
                  <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group mb-3">
                                <label for="instansi">Instansi</label>
                                <input type="text" class="form-control" name="instansi" placeholder="masukkan nama instansi disini" required>
                            </div>

                            <div class="form-group mb-3">
  	                            <label for="nama">Nama Lengkap Penanggung Jawab</label>
                                <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap disini" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" name="npwp" placeholder="masukkan NPWP disini">
                            </div>

                            <div class="form-group mb-3">
                                <label for="no_ktp">No. KTP</label>
                                <input type="text" class="form-control" name="no_ktp" placeholder="masukkan No KTP disini">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="alamat email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="no_hp">Nomor Telp</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="nomor telpon">
                            </div>

                        </div>
                        <div class="col-md-6">     
                            
                            <div class="form-group mb-3">
                                <label for="id_provinsi">Provinsi</label>
                                <select class="form-control" id="id_provinsi" name="id_provinsi" required>
                                    <option selected> -pilih provinsi-</option>
                                    <?php foreach ($dataprov as $prov) { ?>
                                        <option value="<?= $prov->prov_id?>"><?= $prov->prov_name?></option>
                                    <?php } ?>
                                </select>
                            </div>

                             <div id="info"></div> 
                            <div class="form-group mb-3">
                                <label for="id_kabupaten">Kota/Kabupaten</label>
                                <select class="form-control" id="id_kabupaten" name="id_kabupaten" required>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Leave a comment here" style="height: 100px"></textarea>
                                 
                            </div>

                            <div class="form-group mb-3">
                                <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                                <input type="datetime-local" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan" placeholder="Tanggal Kunjungan" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jurusan">jurusan</label>
                                <input type="text" class="form-control" name="jurusan" placeholder="jurusan">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jml_pengunjung">Jumlah Pengunjung</label>
                                        <input type="text" class="form-control" name="jml_pengunjung" placeholder="Jumlah Pengunjung" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jml_pendamping">Jumlah Pendamping</label>
                                        <input type="text" class="form-control" name="jml_pendamping" placeholder="Jumlah Pendamping" required>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="form-group mb-3">-->
                            <!--    <label for="file_ktp">Foto KTP</label>-->
                            <!--    <input type="file" class="form-control" id="file_ktp" name="file_ktp" placeholder="file_ktp" required>-->
                            <!--</div>-->

                            <!--<div class="form-group mb-3">-->
                            <!--    <label for="lampiran">surat permohonan kunjungan</label>-->
                            <!--    <input type="file" class="form-control" id="userfile" name="userfile" placeholder="permohonan_kunjungan" required>-->
                            <!--</div>-->
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
          <!-- /.DETAIL DATA ---->

          <!-- .SYARAT KETENTUAN ---->
          <div class="modal fade" id="modal-add">
            <div class="modal-dialog" style="width:90%;">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Syarat dan Ketentuan</h4>
                </div>
                <div id="loading"></div>
                <form class="form-horizontal" action="<?=base_url('kunjunganindustri/syaratkunjungan')?>" role="form" id="addBarang" method="post">
                  <div class="modal-body"> 
                    <div class="form-group">  
                      <div class="col-lg-12">
                        <?php 
                        if(isset($syarat)){
                        foreach($syarat as $data){?>
                        <textarea id="deskripsi" name="deskripsi" rows="10" cols="80"><?php echo $data->deskripsi?></textarea>
                        <?php }
                        }else{?>
                        <textarea id="deskripsi" name="deskripsi" rows="10" cols="80"></textarea>
                        <?php } ?>
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
          <!-- /.SYARAT KETENTUAN ---->

          <!-- .DETAIL DATA ---->
          <div class="modal fade" id="modal-detail">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Dokumen Lampiran</h4>
                </div>
                <div id="loading"></div>
                <form class="form-horizontal" action="<?=base_url('kunjunganindustri/syaratkunjungan')?>" role="form" id="addBarang" method="post">
                  <div class="modal-body"> 
                    <div class="form-group">      
                        <div class="col-sm-12" name="file" id="file">
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
          <!-- /.DETAIL DATA ---->

          <!-- .EDIT TANGGAL ---->
          <div class="modal fade" id="edit-tanggal">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Tanggal</h4>
                </div>
                <div id="loading"></div>
                <form action="<?=base_url('kunjunganindustri/edittanggalkunjungan')?>" role="form" id="edittanggal" method="post">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group mb-3">
                          <input type="hidden" class="form-control" name="id_kunjungan" id="id_kunjungan">
                        </div>
                        <div class="form-group mb-3">
                        <label for="instansi">Tanggal</label>
                          <input type="datetime-local" class="form-control" name="tgl_kunjungan" id="tanggal_kunjungan">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <input type="submit" value="Update" class="btn pull-right btn btn-success"></input>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.EDIT TANGGAL ---->

          <!--  -->
          <!-- .DETAIL DATA ---->
          <div class="modal fade" id="detail-kontak">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Detail PIC</h4>
                </div>
                <div class="modal-body">
                  <form id="detailkontakpic">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--  -->

          <!-- .Export Kunjungan ---->
          <div class="modal fade" id="export-kunjungan">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Export Kunjungan</h4>
                </div>
                  <form action="<?=base_url('kunjunganindustri/exportKunjungan')?>" role="form" id="exportkunjungan" method="post">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                          <label for="tgl_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl_awal">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                          <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir">
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <input type="submit" value="export" class="btn pull-right btn btn-success"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div><a href="http://"></a>

  <script>
    $(document).ready(function(){
      $("#id_kabupaten").hide();

      loadkabupaten();
  });

  function loadkabupaten(){
      $("#id_provinsi").change(function(){
          var getprovinsi = $("#id_provinsi").val(); 

          $.ajax({
              type : "POST",
              dataType : "JSON",
              url :  "<?= base_url(); ?>Kunjunganindustri/getdatakabupaten",
              data : {provinsi : getprovinsi},
              success : function(data){
                  console.log(data);

                  var html = ' ';
                  var i;
                  for ( i=0; i < data.length ; i++){
                        
                      html += 
                      '<option value="'+ data[i].city_id +'">'+ data[i].city_name +'</option>';
                  }
                  $("#id_kabupaten").html(html);
                  $("#id_kabupaten").show();
              }

          });

      });
  } 
  function detail($id){
    $.ajax({
      url:"<?php echo site_url("kunjunganindustri/detailkunjungan")?>/" + $id,
      type: "get",
      success:function(hasil){
        var $obj = $.parseJSON(hasil);

        if ($obj.id_kunjungan != ''){
          $file = $obj.file;
          var $urlfile = "<?php echo site_url("assets/dokumen_kunjungan")?>/" + $file;

          var html = ' ';
          html += 
          '<label class="mb-4"> Foto KTP</label>';
          html += 
          '<embed type="application/pdf" src="'+ $urlfile +'" width="850" height="400"></embed>';
          html += 
          '<label class="mb-4">Surat Perintah</label>';
          html += 
          '<embed type="application/pdf" src="'+ $urlfile +'" width="850" height="400"></embed>';

          $("#file").html(html);
        }
      }
    });
  };

  function detailKontak($id){
    $.ajax({
      url:"<?php echo site_url("kunjunganindustri/detailkunjungan")?>/" + $id,
      type: "get",
      success:function(hasil){
        var $obj = $.parseJSON(hasil);
        if ($obj.id_kunjungan != ''){

          var html = ' ';
          html += 
          '<div class="form-group">'+
          '<label for="no_hp">Kontak PIC</label>'+
          '<a href="http://wa.me/" target="_blank"><p>'+$obj.no_hp+'</p></a>'+
          '</div>'+
          '<div class="form-group">'+
          '<label for="no_hp">Email PIC</label>'+
          '<p>'+$obj.email+'</p>'+
          '</div>';

          $("#detailkontakpic").html(html);
        }
      }
    });
  };

  function edittanggal($id){
    $.ajax({
      url:"<?php echo site_url("kunjunganindustri/detailkunjungan")?>/" + $id,
      dataType:"JSON",
      type: "get",
      success:function(hasil){      
        console.log(hasil);
        document.getElementById("id_kunjungan").value = hasil.id_kunjungan;
        document.getElementById("tanggal_kunjungan").value = hasil.tgl_kunjungan;
      }
    });
  };
</script>

  <!-- /.content-wrapper -->