<?php 

    include_once 'class/register.php';
    $re = new register();

    if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
        $register = $re->addRegister($_POST, $_FILES);
    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Form Registrasi</title>
</head>
<body>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card shadow">
                    <?php 
                    
                    if (isset($register)) {
                        ?>
                        <div class="alert alert-success alert-dismissiblefade show" role="alert">
                            <strong><?= $register ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php

                    }
                    
                    ?>
                    <div class="card-header d-flex align-items-center">
                            <div class="col-md-6">
                                <h1>Tambah Murid</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-primary float-right">Lihat Info Murid</a>
                            </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama anda">

                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="masukkan email anda">

                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="masukkan nomor hp anda">

                            <label for="photo">Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo">

                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" class="form-control"></textarea>

                            <input type="submit" class="mt-3 btn btn-success" class="form-control" value="registrasi">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>