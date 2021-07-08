<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table V01</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets2/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="content-wrapper">
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1">Nama</th>
                                    <th class="column2">Tempat</th>
                                    <th class="column3">Tanggal</th>
                                    <th class="column4">Deskripsi</th>
                                    <th class="column5">Keterangan</th>
                                    <th class="column6"></th>
                                    <th class="column7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts2 as $post) : ?>
                                    <tr>
                                        <td class="column1"><?php echo $post->idTransaksi; ?></td>
                                        <td class="column2"><?php echo $post->Date; ?></td>
                                        <td class="column3"><?php echo $post->pemasukan; ?></td>
                                        <td class="column4"><?php echo $post->pengeluaran; ?></td>
                                        <td class="column5"><?php echo $post->Keterangan; ?></td>
                                        <td class="column6"><a href="<?php echo base_url('daftar/delete/'.$post->idTransaksi); ?>">Hapus</a></td>
                                     
                                    </tr>


                                <?php endforeach; ?>
                               

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets2/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets2/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets2/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets2/js/main.js"></script>

</body>

</html>