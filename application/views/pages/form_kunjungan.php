<section class="pages">
  <div class="container py-4 mb-4 form_kunjungan">
    <!-- <div class="header-desc" style="margin: 80px;">
        <h2>Ingin informasi lebih lanjut tentang kami?</h2>
        <p>kami sangat senang dapat membantu anda, katakan kepada kami apa yang ingin anda ketahui kami akan bantu anda semaksimal mungkin.</p>
    </div> -->

    <div class="row">
        <p class="paragraf">Kami menerima siapa pun, baik personal maupun grup dtanpa batasan usia, untuk datang dan mengunjungi pabrik kami dari Senin hingga Jumat pada jam yang telah ditentukan. Silakan mengisi form di bawah dan pastikan Anda sudah meng-klik tombol Submit. Tim Kami akan segera menghubungi Anda segera setelah Anda melakukan reservasi.</p>
        <div class="row">
            <div class="col-md-3">
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-primary" style="background-color:rgba(0,74,173,1);color:#fff" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                Ketentuan Umum
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-body">
                        <?= $syarat ?>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </div>
                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('gagal'); ?>
                    </div>
                </div>
                <h2 class="myH2">Formulir Kunjungan Industri</h2>
                <form role="form" action="<?php echo base_url('kunjunganindustri/save') ?>" method="post" id="simpan_kunjungan" role="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="instansi" name="instansi" placeholder="nama Instansi" required>
                                <label for="instansi">Instansi</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" required>
                                <label for="nama">Nama Lengkap Penanggung Jawab</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Nomor NPWP" >
                                <label for="npwp">NPWP</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="nomor KTP" required>
                                <label for="no_ktp">No. KTP</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="alamat email" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="nomor telpon" required>
                                <label for="no_hp">Nomor Telp</label>
                            </div>

                        </div>
                        <div class="col-md-6">     
                            
                            <div class="form-floating mb-3">
                                <select class="form-select" id="id_provinsi" name="id_provinsi" required>
                                    <option selected> -pilih provinsi-</option>
                                    <?php foreach ($dataprov as $prov) { ?>
                                        <option value="<?= $prov->prov_id?>"><?= $prov->prov_name?></option>
                                    <?php } ?>
                                </select>
                                <label for="id_provinsi">Provinsi</label>
                            </div>

                            <!-- <div id="info"></div> -->
                            <div class="form-floating mb-3">
                                <select class="form-select" id="id_kabupaten" name="id_kabupaten" required>
                                </select>
                                <label for="id_kabupaten">Kota/Kabupaten</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Leave a comment here" style="height: 100px" required></textarea>
                                <label for="alamat">Alamat</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan" placeholder="Tanggal Kunjungan" required>
                                <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan" required>
                                <label for="jurusan">jurusan</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="jml_pengunjung" name="jml_pengunjung" placeholder="Jumlah Pengunjung" required>
                                        <label for="jml_pengunjung">Jumlah Pengunjung</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="jml_pendamping" name="jml_pendamping" placeholder="Jumlah Pendamping" required>
                                        <label for="jml_pendamping">Jumlah Pendamping</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="file_ktp" name="file_ktp" placeholder="file_ktp" required>
                                <label for="file_ktp">Foto KTP</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="userfile" name="userfile" placeholder="permohonan_kunjungan" required>
                                <label for="lampiran">surat permohonan kunjungan</label>
                            </div>

                            <button type="submit" class="btn btn-primary" style="float:right;background-color:rgba(0,74,173,1);color:#fff">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</section>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

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
</script>