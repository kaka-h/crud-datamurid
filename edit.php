<?php 

    include_once 'class/register.php';
    $re = new register();

    if(isset ($_GET['id'])) {
        $id = base64_decode($_GET['id']);
    }

    if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
        $register = $re->editStudent($_POST, $_FILES, $id);
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

    <title>Form Edit</title>
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
                                <h1>Edit Murid</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-primary float-right">Lihat Info Murid</a>
                            </div>
                    </div>
                    <div class="card-body">
                        <?php 
                            $getStudentResult = $re->getStudentById($id);
                            if(isset($getStudentResult) ) {
                                while ($row = mysqli_fetch_assoc($getStudentResult)) {
                                    ?>
                                        <form method="POST" enctype="multipart/form-data">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">

                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">

                                            <label for="phone">Phone</label>
                                            <input type="phone" class="form-control" id="phone" name="phone" value="<?= $row['phone'] ?>">

                                            <label for="photo">Foto</label>
                                            <input type="file" class="form-control" id="photo" name="photo" >
                                            <img width='200px' class="img-thumbnail" src="<?= $row['photo'] ?>" alt="">
                                            <br>

                                            <label for="address">Alamat</label>
                                            <textarea name="address" id="address" class="form-control"><?= $row['address'] ?></textarea>

                                            <input type="submit" class="mt-3 btn btn-success" class="form-control" value="Edit Murid">
                                        </form>
                                    <?php
                                }
                            }  else {
                                echo "Data tidak ditemukan";    
                            }
                        ?>
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