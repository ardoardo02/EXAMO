<?= $this->extend('pengajar/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
function bulan($bulan)
{
    if ($bulan == 1) return "Januari";
    if ($bulan == 2) return "Februari";
    if ($bulan == 3) return "Maret";
    if ($bulan == 4) return "April";
    if ($bulan == 5) return "Mei";
    if ($bulan == 6) return "Juni";
    if ($bulan == 7) return "Juli";
    if ($bulan == 8) return "Agustus";
    if ($bulan == 9) return "September";
    if ($bulan == 10) return "Oktober";
    if ($bulan == 11) return "November";
    if ($bulan == 12) return "Desember";
}

function cekIsiUjian($objek, $jadwal)
{
    foreach ($objek as $ujian) :
        if ($ujian["mapel"]) :
            $tanggal = explode("-", $ujian["tanggal"]);

            if ($jadwal == "upcoming") {
                if (
                    date("Y") < $tanggal[0] ||
                    (date("Y") == $tanggal[0] && date("m") < $tanggal[1]) ||
                    (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") < $tanggal[2])
                ) {
                    return true;
                }
            } elseif ($jadwal == "today") {
                if (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") == $tanggal[2]) {
                    return true;
                }
            } elseif ($jadwal == "finish") {
                if (
                    date("Y") > $tanggal[0] ||
                    (date("Y") == $tanggal[0] && date("m") > $tanggal[1]) ||
                    (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") > $tanggal[2])
                ) {
                    return true;
                }
            }

        endif;
    endforeach;
    return false;
}
?>

<?php if (cekIsiUjian($resultUjian, "today") || cekIsiUjian($resultUjian, "upcoming") || cekIsiUjian($resultUjian, "finish")) { ?>

    <!-- ISI Today EXAMS -->
    <?php if (cekIsiUjian($resultUjian, "today")) : ?>
        <div class="container-fluid" style="margin-top: 25px;">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ujian Hari Ini</h1>
            </div>

            <div class="row">
                <?php
                foreach ($resultUjian as $dataUjian) {
                    if ($dataUjian["mapel"]) :
                        $tanggal = explode("-", $dataUjian["tanggal"]);
                        $waktu1 = explode(":", $dataUjian['sTime']);
                        $waktu2 = explode(":", $dataUjian['eTime']);

                        if (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") == $tanggal[2]) { ?>
                            <!-- Today Example -->
                            <button type="button" class="btn col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    <?php echo $dataUjian["mapel"]; ?>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $dataUjian["materi"]; ?>
                                                </div>
                                                <div class="text-xs text-muted">
                                                    <?php
                                                    echo $tanggal[2] . " " . bulan($tanggal[1]) . " " . $tanggal[0] . ", " . $waktu1[0] . ":" . $waktu1[1] . " - " . $waktu2[0] . ":" . $waktu2[1] . " WIB";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php } ?>

                    <?php endif; ?>
                <?php } ?>

            </div>
        </div>
    <?php endif; ?>

    <!-- ISI UPCOMING EXAMS -->
    <?php if (cekIsiUjian($resultUjian, "upcoming")) : ?>
        <div class="container-fluid" style="margin-top: 25px;">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ujian Akan Datang</h1>
            </div>

            <div class="row">
                <?php
                foreach ($resultUjian as $dataUjian) {
                    if ($dataUjian["mapel"]) :
                        $tanggal = explode("-", $dataUjian["tanggal"]);
                        $waktu1 = explode(":", $dataUjian['sTime']);
                        $waktu2 = explode(":", $dataUjian['eTime']);

                        if (
                            date("Y") < $tanggal[0] ||
                            (date("Y") == $tanggal[0] && date("m") < $tanggal[1]) ||
                            (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") < $tanggal[2])
                        ) { ?>
                            <!-- Upcoming Example -->
                            <button type="button" class="btn col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    <?php echo $dataUjian["mapel"]; ?>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $dataUjian["materi"]; ?>
                                                </div>
                                                <div class="text-xs text-muted">
                                                    <?php
                                                    echo $tanggal[2] . " " . bulan($tanggal[1]) . " " . $tanggal[0] . ", " . $waktu1[0] . ":" . $waktu1[1] . " - " . $waktu2[0] . ":" . $waktu2[1] . " WIB";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php } ?>

                    <?php endif; ?>
                <?php } ?>

            </div>
        </div>
    <?php endif; ?>

    <!-- ISI FINISHED EXAMS -->
    <?php if (cekIsiUjian($resultUjian, "finish")) : ?>
        <div class="container-fluid" style="margin-top: 25px;">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ujian Selesai</h1>
            </div>

            <div class="row">
                <?php
                foreach ($resultUjian as $dataUjian) {
                    if ($dataUjian["mapel"]) :
                        $tanggal = explode("-", $dataUjian["tanggal"]);
                        $waktu1 = explode(":", $dataUjian['sTime']);
                        $waktu2 = explode(":", $dataUjian['eTime']);

                        if (
                            date("Y") < $tanggal[0] ||
                            (date("Y") == $tanggal[0] && date("m") > $tanggal[1]) ||
                            (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") > $tanggal[2])
                        ) { ?>
                            <!-- Finished Example -->
                            <button type="button" class="btn col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    <?php echo $dataUjian["mapel"]; ?>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $dataUjian["materi"]; ?>
                                                </div>
                                                <div class="text-xs text-muted">
                                                    <?php
                                                    echo $tanggal[2] . " " . bulan($tanggal[1]) . " " . $tanggal[0] . ", " . $waktu1[0] . ":" . $waktu1[1] . " - " . $waktu2[0] . ":" . $waktu2[1] . " WIB";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php } ?>

                    <?php endif; ?>
                <?php } ?>

            </div>
        </div>
    <?php endif; ?>

    <!-- ISI MY EXAMS -->
    <div class="container-fluid" style="margin-top: 25px;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ujian Saya</h1>
        </div>

        <div class="row">

            <?php
            foreach ($resultUjian as $dataUjian) {
                if ($dataUjian["mapel"]) :
                    $tanggal = explode("-", $dataUjian["tanggal"]);
                    $waktu1 = explode(":", $dataUjian['sTime']);
                    $waktu2 = explode(":", $dataUjian['eTime']);

                    if (
                        date("Y") < $tanggal[0] ||
                        (date("Y") == $tanggal[0] && date("m") < $tanggal[1]) ||
                        (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") < $tanggal[2])
                    ) {
            ?>
                        <!-- Upcoming Example -->
                        <button type="button" class="btn col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <?php echo $dataUjian["mapel"]; ?>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $dataUjian["materi"]; ?>
                                            </div>
                                            <div class="text-xs text-muted">
                                                <?php
                                                echo $tanggal[2] . " " . bulan($tanggal[1]) . " " . $tanggal[0] . ", " . $waktu1[0] . ":" . $waktu1[1] . " - " . $waktu2[0] . ":" . $waktu2[1] . " WIB";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    <?php } elseif (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") == $tanggal[2]) { ?>
                        <!-- Today Example -->
                        <button type="button" class="btn col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <?php echo $dataUjian["mapel"]; ?>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $dataUjian["materi"]; ?>
                                            </div>
                                            <div class="text-xs text-muted">
                                                <?php
                                                echo $tanggal[2] . " " . bulan($tanggal[1]) . " " . $tanggal[0] . ", " . $waktu1[0] . ":" . $waktu1[1] . " - " . $waktu2[0] . ":" . $waktu2[1] . " WIB";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    <?php } else { ?>
                        <!-- Success Example -->
                        <button type="button" class="btn col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <?php echo $dataUjian["mapel"]; ?>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $dataUjian["materi"]; ?>
                                            </div>
                                            <div class="text-xs text-muted">
                                                <?php
                                                echo $tanggal[2] . " " . bulan($tanggal[1]) . " " . $tanggal[0] . ", " . $waktu1[0] . ":" . $waktu1[1] . " - " . $waktu2[0] . ":" . $waktu2[1] . " WIB";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    <?php } ?>

                <?php endif; ?>
            <?php } ?>

        </div>
    </div>

<?php } else { ?>

    <!-- Make Exam Example -->
    <a href="/pengajar/make/<?= $user['id']; ?>">
        <button type="button" class="btn col-xl-3 col-md-6 mb-4" style="margin-top: 20px;">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col mr-2">
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <i class="fa fa-plus-circle"></i> BUAT UJIAN BARU
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </button>
    </a>

<?php } ?>

<?= $this->endSection(); ?>