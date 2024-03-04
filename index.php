<?php 

    include_once 'class/register.php';
    $re = new register();

    

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Seluruh Murid</title>
    <link rel="stylesheet" href="style.scss">
</head>
<body>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <?php 
                    
                    if (isset($register)) {
                        ?>
                        <div class="alert alert-danger alert-dismissiblefade show" role="alert">
                            <strong><?= $register ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php

                    }
                    
                    ?>
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6">
                                <h1>Info Seluruh Murid</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="addstudent.php" class="btn btn-primary float-right">Tambah Murid</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            
                            $allstudent = $re->allStudent();
                            if($allstudent) {
                                while ($row = mysqli_fetch_assoc( $allstudent )) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $row['nama']?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <td><img src="<?= $row['photo'] ?>" width="100px"></td>
                                                <td><?= $row['address'] ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-primary">Edit</a>
                                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    

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