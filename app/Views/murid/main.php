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
    <link rel="apple-touch-icon" href="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Link to your css file -->
    <link rel="stylesheet" type="text/css" href="/css/main.css">

</head>

<body>
    <!-- Navbar -->
    <div class="navbar navbar-expand-md navbar-light bg-light sticky-top px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/murid"><img src="/img/examoArtboard1.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/murid">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/murid/exams">Ujian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jadwal</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expandaed="false"><img src="/img/favicon-01.png" class="userNavbar">User</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Searchbar -->
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-xs-12 col-md-12 col-lg-4 offset-lg-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukkan kode ujian disini!" />
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Elemen 3 Kolom -->

    <div class="container-fluid">
        <div class="row text-center padding">
            <div class="col-lg-1"></div>

            <!-- Jadwal -->
            <div class="col-lg-3">
                <h4>Ujian Terbaru</h4>
                <div class="box">
                    <ul>
                        <button type="button" class="btn btn-light btn-block shadow-sm my-1 btn-outline-dark">
                            <h5>Database : SQL & T-SQL</h5>
                            <p>Monday, 5 October 2020</p>
                            <p>10.00 - 12.00(GMT+7)</p>
                        </button>
                        <button type="button" class="btn btn-light btn-block shadow-sm my-4 btn-outline-dark">
                            <h5>Database : SQL & T-SQL</h5>
                            <p>Monday, 5 October 2020</p>
                            <p>10.00 - 12.00(GMT+7)</p>
                        </button>
                        <button type="button" class="btn btn-light btn-block shadow-sm my-1 btn-outline-dark">
                            <h5>Database : SQL & T-SQL</h5>
                            <p>Monday, 5 October 2020</p>
                            <p>10.00 - 12.00(GMT+7)</p>
                        </button>
                    </ul>
                </div>
            </div>
            <!-- End -->

            <!-- Nilai -->
            <div class="col-lg-4">
                <h4>Hasil Ujian</h4>
                <div class="box">
                    <ul>
                        <a href="#">
                            <li class="shadow-sm">
                                <h5>Object Oriented Programming</h5>
                                <p>Score</p>
                                <div class="scores shadow-sm">
                                    <div class="oop">73/100</div>
                                </div>
                            </li>
                        </a>
                        <a href="#">
                            <li class="shadow-sm">
                                <h5>Operating System</h5>
                                <p>Score</p>
                                <div class="scores shadow-sm">
                                    <div class="os">90/100</div>
                                </div>
                            </li>
                        </a>
                        <a href="#">
                            <li class="shadow-sm">
                                <h5>Automata Theory</h5>
                                <p>Score</p>
                                <div class="scores shadow-sm">
                                    <div class="at">40/100</div>
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <!-- End -->

            <!-- Pencapaian -->
            <div class="col-lg-3">
                <h4>Pencapaian</h4>
                <div class="box">
                    <ul>
                        <a href="#">
                            <li class="shadow-sm">You have no achievement yet</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <!-- End -->
        </div>
    </div>
    <!-- End -->

    <hr style="width: 85%">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5c11086934.js" crossorigin="anonymous"></script>
</body>

</html>