<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Form Pelanggan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>


</head>


<body>
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


                </div>

            </nav>
        </div>
    </div>
    <div class="container-fluid" style="background-color: gray;">

        <div class="row" style="padding-top:50px;"></div>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row" style="border-radius: 15px; padding-bottom: 10px; background-color: #4DE1FF;">
                    <div class="col-md-12" style="padding-top:20px;">
                        <div class="page-header">
                            <h2>Kritik</h2>
                        </div>

                        <form action=<?php echo base_url("kritik/simpan_kritik"); ?> method="post">



                            <div class="form-group">
                                <label>Tuliskan Kritik Anda</label>
                                <textarea class="form-control" rows="5" name="isi_kritik" id="isi_kritik"></textarea>
                            </div>





                            <input type="submit" class="btn btn-primary" name="submit" value="Kirim Kritik">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top:300px;"></div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>