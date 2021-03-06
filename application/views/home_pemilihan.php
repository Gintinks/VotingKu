<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>VotingKu</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
	.titlecard {
		color: grey;
		font-size: 18px;
	}
</style>
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light static-top navbar-dark bg-dark">

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="navbar-toggler-icon"></span>
					</button> <a class="navbar-brand" href="#">VotingKu</a>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="main">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pemilihan">Pilih KB</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="hasil_pemilihan">Cek hasil Pemilihan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="kritik">Kritik dan Saran</a>
							</li>

						</ul>
						<ul class="navbar-nav ml-auto">
							<?php
							if ($this->session->userdata('status') == "login") : ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["NIM"]; ?></a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="login/logout">Logout</a>
										<a class="dropdown-item" href="#">Cek Data</a>
									</div>
								</li>

							<?php else : ?>
								<li class="nav-item">
									<a class="nav-link" href='login' id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Login
									</a>
								</li>
							<?php endif; ?>

						</ul>
					</div>


				</nav>
				<?php
				if ($this->session->userdata('warning') == 1) : ?>
					<div class="alert alert-danger">
						<strong>Alert!</strong> Anda Sudah melakukan pemilihan dan tidak dapat melakukan lagi
					</div>
					<?php $this->session->unset_userdata('warning');
					$this->session->set_userdata('warning', 0); ?>
				<?php endif; ?>
				<div class="jumbotron card card-block">
					<div class="conatiner" style="padding:50px;" id="aboutTab">

						<div class="row">

							<div class="col-sm-4 text-center">

								<img src="assets2\images\icons\Nominee.png" width="100" height="100" alt="" />
								<h2 class="normalFont" style="font-size:28px;">Nominasi</h2>
								<p><em>Pengguna Dapat Melihat Kandidat Dari Ketua BEM</em></p>

							</div>

							<div class="col-sm-4 text-center">

								<img src="assets2\images\icons\Vote.png" width="100" height="100" alt="" />
								<h2 class="normalFont" style="font-size:28px;">Voting Online</h2>
								<p><em>Melakukan Pemilihan Langsung Secara Online Tanpa Repot</em></p>

							</div>

							<div class="col-sm-4 text-center">

								<img src="assets2\images\icons\Stats.png" width="100" height="100" alt="" />
								<h2 class="normalFont" style="font-size:28px;">Lihat Hasil</h2>
								<p><em>Hasil Dapat Langsung Dilihat Sesaat Setelah Pemilihan Selesai</em></p>

							</div>



						</div>


					</div>
				</div>
				<div class="row col-12">
					<div class="row col-12">
						<?php $i = 1;
						foreach ($posts2 as $post) : ?>
							<div class="col-md-4" style="padding-bottom: 30px;">
								<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
					max-width: 300px;
					margin: auto;
                    text-align: center;">
									<div class="gallery">
										<img src="assets/images/placeholder.jpg" alt="John" style="width:100%">
									</div>

									<p class="titlecard" style="padding-top: 10px;">Calon Ketua <?php echo $post->nama; ?> <p class="titlecard">
									<p class="titlecard" >&<p class="titlecard">
									<p class="titlecard">Calon  Wakil Ketua <?php echo $post->nama2; ?> <p class="titlecard">
									
									
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingOne">
												<h5 class="mb-0">
												<form action="<?php echo base_url("komentar"); ?>" method="post">
                                                    <button name="ID_ketua" value="<?php echo $post->ID_ketua; ?>" class="btn btn-info"> <strong>PILIH</strong></button>
                                                </form>
												</h5>
											</div>

											
										</div>
										
									</div>
								</div>
							</div>

						<?php
							$i++;
						endforeach;
						?>
					</div>
				</div>

				<div class="row" style="border: 5px solid #999;">
					<div class="col-sm-12 text-center">
						<div class="page-header" style="padding-top:30px;padding-bottom:30px;">

							<br>
							<h1 class="specialHead">PILIH SEKARANG</h1>
							<p><strong>Current Time : <span id="time"></span>
									<span id="day"></span></strong></p>

							<br>
							<a href="#" class="btn btn-info"> <strong>Ayo Pilih</strong></a>
						</div>
					</div>
				</div>

				<script>
					function time() {
						var date = new Date();
						var time = date.toLocaleTimeString();
						var options = {
							weekday: 'long',
							year: 'numeric',
							month: 'long',
							day: 'numeric'
						};
						var day = date.toLocaleDateString('en-US', options);
						document.getElementById('time').innerHTML = time;
						document.getElementById('day').innerHTML = day;
					}
					setInterval(function() {
						time();
					}, 1000);
				</script>
				<div class="row" style="padding-top:50px;"></div>




				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>