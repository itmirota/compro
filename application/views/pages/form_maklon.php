<section class="pages">
  <div class="container py-4 mb-4 form_kunjungan">
    <!-- <div class="header-desc" style="margin: 80px;">
        <h2>Ingin informasi lebih lanjut tentang kami?</h2>
        <p>kami sangat senang dapat membantu anda, katakan kepada kami apa yang ingin anda ketahui kami akan bantu anda semaksimal mungkin.</p>
    </div> -->

    <div class="row">
        <p class="paragraf">Kami menerima siapa pun, baik personal maupun grup dtanpa batasan usia, untuk datang dan mengunjungi pabrik kami dari Senin hingga Jumat pada jam yang telah ditentukan. Silakan mengisi form di bawah dan pastikan Anda sudah meng-klik tombol Submit. Tim Kami akan segera menghubungi Anda segera setelah Anda melakukan reservasi.</p>
        <div class="row">
            <div class="col-md-12">
                <h2 class="myH2">Formulir Pendaftaran Maklon</h2>
                <form role="form" action="<?php echo base_url('maklon/saveMaklon') ?>" method="post" id="simpan_maklon" role="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="mb-2"><strong>Informasi Perusahaan</strong></label>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="nama nama_perusahaan" required>
                                <label for="nama_perusahaan">Instansi</label>
                            </div>

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
                                <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                                </select>
                                <label for="id_kecamatan">Kecamatan</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Leave a comment here" style="height: 100px" required></textarea>
                                <label for="alamat">Detail Alamat Perusahaan</label>
                            </div>

                            <label class="mb-2"><strong>Informasi PIC</strong></label>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="nama lengkap" required>
                                <label for="nama_pic">Nama PIC</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_telpon" name="no_telpon" placeholder="Nomor Kontak PIC" >
                                <label for="no_telpon">No. Kontak</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="email PIC" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan PIC" required>
                                <label for="jabatan">Jabatan</label>
                            </div>
                        </div>
                        <div class="col-md-6">     
                            <label class="mb-2"><strong>Rencana Maklon</strong></label>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="sumber_info" name="sumber_info" required>
                                    <option selected> -pilih Sumber Info-</option>
                                    <option value="iklan"> Iklan</option>
                                    <option value="website"> Website</option>
                                    <option value="kerabat"> Kerabat</option>
                                    <option value="sales"> Sales</option>
                                </select>
                                <label for="sumber_info">Sumber Info</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sumber_person" name="sumber_person">
                                <label for="sumber_person">Nama Sales</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="kategori_produk_maklon" name="kategori_produk_maklon" required>
                                    <option selected> -pilih produk-</option>
                                    <?php foreach ($kategori as $k) { ?>
                                        <option value="<?= $k->id_maklon_kategoriproduk?>"><?= $k->nama_kategoriproduk?></option>
                                    <?php } ?>
                                </select>
                                <label for="kategori_produk_maklon">Kategori Produk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="produk_exist" name="produk_exist" required>
                                    <option selected> --</option>
                                    <option value="sudah"> sudah</option>
                                    <option value="belum"> belum</option>
                                </select>
                                <label for="produk_exist">Sudah Memiliki Produk?</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="ijin_halal" name="ijin_halal" required>
                                    <option selected> --</option>
                                    <option value="sudah"> sudah</option>
                                    <option value="belum"> belum</option>
                                </select>
                                <label for="ijin_halal">Sudah Memiliki Ijin Halal?</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="ijin_bpom" name="ijin_bpom" required>
                                    <option selected> --</option>
                                    <option value="sudah"> sudah</option>
                                    <option value="belum"> belum</option>
                                </select>
                                <label for="ijin_bpom">Sudah Memiliki Ijin BPOM?</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="haki" name="haki" required>
                                    <option selected> --</option>
                                    <option value="sudah"> sudah</option>
                                    <option value="belum"> belum</option>
                                </select>
                                <label for="haki">Sudah Memiliki Sertifikat HAKI?</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="plan_produksi" name="plan_produksi" placeholder="Tanggal Kunjungan" required>
                                <label for="plan_produksi">Rencana Produksi</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="estimasi_nilai_project" name="estimasi_nilai_project" placeholder="Tanggal Kunjungan" required>
                                <label for="estimasi_nilai_project">Estimasi Nilai Project</label>
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
        $("#id_kecamatan").hide();
        $("#sumber_person").hide();

        sumberperson();
        loadkabupaten();
        loadkecamatan();
    });

    function sumberperson(){
    $("#sumber_info").change(function(){
        var sumber_info = $("#sumber_info").val(); 

        if (sumber_info == 'sales'){
            $("#sumber_person").show();
        }else{
            $("#sumber_person").hide();
        };
    });
    } 

    function loadkabupaten(){
    $("#id_provinsi").change(function(){
        var getprovinsi = $("#id_provinsi").val(); 

        $.ajax({
            type : "POST",
            dataType : "JSON",
            url :  "<?= base_url(); ?>Wilayah/getdatakabupaten",
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
    function loadkecamatan(){
    $("#id_kabupaten").change(function(){
        var getkabupaten = $("#id_kabupaten").val(); 

        $.ajax({
            type : "POST",
            dataType : "JSON",
            url :  "<?= base_url(); ?>Wilayah/getdatakecamatan",
            data : {kabupaten : getkabupaten},
            success : function(data){
                console.log(data);

                var html = ' ';
                var i;
                for ( i=0; i < data.length ; i++){
                        
                    html += 
                    '<option value="'+ data[i].dis_id +'">'+ data[i].dis_name +'</option>';
                }
                $("#id_kecamatan").html(html);
                $("#id_kecamatan").show();
            }

        });

    });
    } 
</script>