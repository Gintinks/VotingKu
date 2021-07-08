


<html>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <?php foreach ($posts as $post): ?>
          <h5>Username  : <?php echo $post->username; ?></h5>
          <h5>Nama      : <?php echo $post->namaLengkap; ?></h5>
          <h5>Email     : <?php echo $post->email; ?></h5>
        <?php endforeach; ?>
      </div>

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php foreach ($posts as $post): ?>
                <h3>Rp <?php echo $post->saldo; ?></h3>
                <p>Saldo</p>        
                <?php endforeach; ?>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="" class="small-box-footer"><i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php if ($posts2 == null) { ?>
                <h3>Rp 0</h3>

                <p>Pemasukan terakhir</p>
              <?php }else { ?>
                <?php foreach ($posts2 as $post): ?>
                <h3>Rp <?php echo $post->pemasukan; ?></h3>

                <p>Pemasukan terakhir</p>
                <?php endforeach; ?>
                <?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="daftar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php if ($posts3 == null) { ?>
                <h3>Rp 0</h3>

                <p>Pengeluaran terakhir</p>
              <?php }else { ?>
                <?php foreach ($posts3 as $post): ?>
                <h3>Rp <?php echo $post->pengeluaran; ?></h3>

                <p>Pengeluaran terakhir</p>
                <?php endforeach; ?>
                <?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="daftar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 </body>
</html>
