<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pilih KB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>

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

        <div class="row" style="border: 5px solid #999;margin-left: 10px; ;margin-right: 10px; background-color: #4DE1FF;">
            <div style="text-align: center;margin: auto;padding-bottom: 30px; ">
                <h1>Hasil</h1>
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

                                <p class="titlecard" style="padding-top: 10px;">Calon Ketua <?php echo $post->nama; ?>
                                <p class="titlecard">
                                <p class="titlecard">&
                                <p class="titlecard">
                                <p class="titlecard">Calon Wakil Ketua <?php echo $post->nama2; ?>
                                <p class="titlecard">


                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <div style="text-align: center;margin: auto;padding-bottom: 30px; ">
                                                    <h1>Jumlah Pemilih : <?php echo $post->jumlah_pemilih; ?></h1>
                                                </div>
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

        </div>


        <div class="row" style="padding-top:50px;"></div>
    </div>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>