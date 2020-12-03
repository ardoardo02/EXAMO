<?php
session_start();
if (!isset($_SESSION['murid'])) {
    header("Location: /landing/login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Examo</title>

    <link rel="shortcut icon" href="/img/favicon-01.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Link to your css file -->
    <link rel="stylesheet" href="/css/exams.css">

</head>

<body>
    <!-- Navbar -->
    <div class="navbar navbar-expand-md navbar-light bg-light sticky-top pr-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/murid"><img src="/img/examoArtboard1.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/murid">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/murid/exams">Exams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Activity</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/img/favicon-01.png" class="userNavbar">User</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Exams -->
    <div class="container-fluid">
        <div class="row topm botm">

            <div class="col-lg-12">
                <h4>Database</h4>
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <div class="row">
                        <?php foreach ($ujian as $matkul) : ?>
                            <?php if ($matkul["mapel"] == "Pemrograman Web") { ?>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <button type="button" class="btn btn-light btn-block shadow-sm my-1" data-toggle="modal" data-target="#myModal">
                                        <div class="small text-info text-uppercase"><?php echo $matkul["mapel"]; ?></div>
                                        <h5 class="desc"><?php echo $matkul["materi"]; ?></h5>
                                        <p class="desc"><?php echo $matkul["sTime"];
                                                        echo "-";
                                                        echo $matkul["eTime"]; ?></p>
                                    </button>
                                </div>
                        <?php }
                        endforeach; ?>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Deskripsi
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <h4>Calculus</h4>
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <div class="row">
                        <?php foreach ($ujian as $matkul) : ?>
                            <?php if ($matkul["mapel"] == "Kalkulus Lanjut") { ?>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <button type="button" class="btn btn-light btn-block shadow-sm my-1" data-toggle="modal" data-target="#myModal">
                                        <div class="small text-info text-uppercase"><?php echo $matkul["mapel"]; ?></div>
                                        <h5 class="desc"><?php echo $matkul["materi"]; ?></h5>
                                        <p class="desc"><?php echo $matkul["sTime"];
                                                        echo "-";
                                                        echo $matkul["eTime"]; ?></p>
                                    </button>
                                </div>
                        <?php }
                        endforeach; ?>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Deskripsi
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <h4>Web Programming</h4>
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <div class="row">
                        <?php foreach ($ujian as $matkul) : ?>
                            <?php if ($matkul["mapel"] == "Sistem Operasi") { ?>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <button type="button" class="btn btn-light btn-block shadow-sm my-1" data-toggle="modal" data-target="#myModal">
                                        <div class="small text-info text-uppercase"><?php echo $matkul["mapel"]; ?></div>
                                        <h5 class="desc"><?php echo $matkul["materi"]; ?></h5>
                                        <p class="desc"><?php echo $matkul["sTime"];
                                                        echo "-";
                                                        echo $matkul["eTime"]; ?></p>
                                    </button>
                                </div>
                        <?php }
                        endforeach; ?>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Deskripsi
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>