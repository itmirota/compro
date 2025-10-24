<div class="content-wrapper">    
    <section class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>
      <section class="content">
        <div class="col-12">
          <div class="box box-solid" style="border-radius:15px">
            <div class="box-body">
              <div class="row">
                <div class="col-lg-8">
                  <h2 class="p-2"> Hai, <b><?php echo $name; ?></b></h2>
                  <h4>apa kabarmu? tetap semangat ya di hari <?= hari_indo(DATE('l'))?> ini</h4>
                </div>
                <div class="col-lg-4">
                  <img src="<?=base_url().'assets/images/cute_girl.webp'?>" style="width:100%" alt="" srcset="">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <h4><strong>info pengunjung website</strong></h4>
                <div class="box box-solid">
                  <div class="box-body">
                      <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
              <?php if($role == ROLE_ADMIN | $role == ADMIN_KUNJUNGAN) { ?>
              <div class="col-12">
                <div class="col-lg-6">
                  <div class="box box-solid" style="padding:15px" >
                    <div class="row">
                    <div class="col-lg-3">
                      <p class="dashboard-icon"><i class="fa fa-users"></i></p>
                    </div>
                    <div class="col-lg-9">
                      <p class="title-pengunjung">Pengunjung Hari ini</p>
                      <p class="pengunjung"><?= $pengunjunghariini ?></p>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="box box-solid" style="padding:15px" >
                    <div class="row">
                    <div class="col-lg-3">
                      <p class="dashboard-icon"><i class="fa fa-users"></i></p>
                    </div>
                    <div class="col-lg-9">
                      <p class="title-pengunjung">Pengunjung Online</p>
                      <p class="pengunjung"><?= $pengunjungonline ?></p>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="box box-solid" style="padding:15px" >
                    <div class="row">
                    <div class="col-lg-3">
                      <p class="dashboard-icon"><i class="fa fa-users"></i></p>
                    </div>
                    <div class="col-lg-9">
                      <p class="title-pengunjung">Total Pengunjung <?= DATE('Y')?></p>
                      <p class="pengunjung"><?= $totalpengunjung ?></p>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="box box-solid" style="padding:15px" >
                    <div class="row">
                    <div class="col-lg-3">
                      <p class="dashboard-icon"><i class="fa fa-users"></i></p>
                    </div>
                    <div class="col-lg-9">
                      <p class="title-pengunjung">Total Pengunjung Bulan ini</p>
                      <p class="pengunjung"><?= $pengunjungbulanini ?></p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6">
            <h4><strong>info pengunjung perbulan</strong></h4>
            <div class="box box-solid">
              <div class="box-body">
              <a type="button" class="btn btn-sm btn-blue pull-right" data-toggle="modal" data-target="#modal-add">
                Filter
              </a>
              <strong><span>Tahun : <?= empty($tahun) ? DATE('Y'):$tahun?></span></strong>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan</th>
                  <th>Pengunjung</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($data_pengunjung)){ ?>
                <?php 
                  $no = 1;
                  $total = 0;
                ?>
                <?php foreach($data_pengunjung as $ld): ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=bulan($ld->bulan)?></td>
                    <td><?=$ld->countIp?></td>
                </tr>
                <?php
                $total = $total+ $ld->countIp;
                $no++; 
                ?>
                <?php endforeach;?>
                <?php }else { ?>
                      <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="2" style="text-align:right">Total</th>
                    <th><?=$total?></th>
                  </tr>
                </tfoot>
              </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <?php if($role == ROLE_ADMIN | $role == ADMIN_HRD) { ?>
            <div class="col-lg-6">
              <h4><strong>info lowongan aktif</strong></h4>
              <div class="box box-solid" style="padding:15px" >
                <div class="row">
                <div class="col-lg-3">
                  <p class="dashboard-icon"><i class="fa fa-users"></i></p>
                </div>
                <div class="col-lg-9">
                  <p class="title-pengunjung">Lowongan Aktif</p>
                  <p class="pengunjung"><?= $jumlahlowongan ?></p>
                </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <h4><strong>info pelamar</strong></h4>
              <div class="box box-solid" style="padding:15px" >
                <div class="row">
                <div class="col-lg-3">
                  <p class="dashboard-icon"><i class="fa fa-users"></i></p>
                </div>
                <div class="col-lg-9">
                  <p class="title-pengunjung">Total Pelamar</p>
                  <p class="pengunjung"><?= $totalpelamar ?></p>
                </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>
    </section>
</div>

<!-- .INPUT DATA ---->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filter Tahun</h4>
      </div>
      <form class="form-horizontal" action="<?=base_url('dashboard')?>" role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">      
            <label for="tahun" class="col-sm-4 control-label">Tahun :</label>
              <div class="col-sm-6">
              <input class="form-control" type="number" name="tahun" placeholder="YYYY" min="1999" max="<?=DATE('Y')?>">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= base_url(); ?>assets/js/jQuery-3.2.1.min.js"></script>
<script>
  $.ajax({
    type : "GET",
    dataType : "JSON",
    url :  "<?= base_url(); ?>adminpanel/User/getChart",
    success : data => {
      let chartX = []
      let chartY = []
      data.map( data => {
        const month = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agust","Sep","Okt","Nov","Des"];

        const d = new Date(data.date);
        let tahun = d.getFullYear();
        let bulan = month[d.getMonth()];
        let tanggal = d.getDate();

        chartX.push(bulan);
        chartY.push(data.countIp);
      });

      console.log(chartX);
      console.log(chartY);

      const chartData = {
        labels: chartX,
        datasets: [{
          label: 'pengunjung website '+<?=DATE('Y')?>,
          data: chartY,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
        }]
      };

      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'line',
        data: chartData,
      });
    }
  });
</script>