<div class="content-wrapper">    
    <section class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>
      <section class="content">
        <div class="row">
          <div class="col-lg-6">
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

          <?php if($role == ROLE_ADMIN | $role == ADMIN_KUNJUNGAN) { ?>
          <div class="col-lg-6">
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
                  <p class="title-pengunjung">Total Pengunjung</p>
                  <p class="pengunjung"><?= $totalpengunjung ?></p>
                </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="row">
          
          <div class="col-lg-6">
            <div class="box box-solid" style="padding:15px" >
              <canvas id="myChart"></canvas>
            </div>
          </div>

          <?php if($role == ROLE_ADMIN | $role == ADMIN_HRD) { ?>
          <div class="col-lg-6">
            <div class="col-lg-6">
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
          </div>
          <?php } ?>
        </div>
      </section>
    </section>
</div>
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

        chartX.push(tanggal+' '+bulan+' '+tahun);
        chartY.push(data.countIp);
      });

      const chartData = {
        labels: chartX,
        datasets: [{
          label: 'pengunjung website',
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