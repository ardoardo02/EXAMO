<?php
session_start();
if (!isset($_SESSION['pengajar'])) {
    header("Location: /landing/login");
    exit;
}
if ($_SESSION['id'] != $user['id']) {
    header("Location: /pengajar/index/" . $_SESSION['id']);
    exit;
}

$nama = explode(" ", $user['firstName']);
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/pengajar/index/<?= $user['id']; ?>"><img src="/img/examoArtboard1.png" width="100px"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-auto">
                    <?php if ($judul == "Make Exam" || $judul == "Edit Exam") { ?>
                        <a class="nav-link" href="/pengajar/index/<?= $user['id']; ?>" style="margin-right: 10px; margin-top: 4px;">Ujian Saya</a>
                    <?php } else { ?>
                        <a class="nav-link" href="/pengajar/make/<?= $user['id']; ?>" style="margin-right: 10px; margin-top: 4px;">+ Buat Ujian</a>
                    <?php } ?>
                </li>
                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle border rounded-pill bg-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 10px; padding-left: 10px;">
                        <img src="/img/usericon.png" class="rounded-circle" height="30px" width="30px" style="margin-right: 10px;">
                        <?= $nama[0]; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/pengajar/profile/<?= $user['id']; ?>">
                            <i class="fa fa-user mr-2"></i> Profil
                        </a>
                        <a class="dropdown-item" href="/landing/logout">
                            <i class="fa fa-sign-out-alt mr-2"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>