<?= $this->extend('pengajar/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content -->
<div class="container py-5">
    <div class="row d-flex justify-content-center">
        <!-- Exam Yang Telah Dibuat -->
        <div class="col-lg-<?php if ($judul == 'Make Exam') echo '6';
                            else echo '3' ?> mb-4">
            <div class="bg-white rounded-lg shadow-sm p-4">

                <a href="/pengajar/newExam/<?= $user['id']; ?>" class="removeUnderline">
                    <button type="button" class="btn btn-light btn-block rounded-pill shadow-sm">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Buat Ujian Baru
                    </button>
                </a>

                <hr>

                <?php foreach ($resultUjian as $ujian) : ?>
                    <?php if ($ujian['mapel']) { ?>
                        <?php $tanggal = explode("-", $ujian["tanggal"]); ?>

                        <a href="/pengajar/make_detail/<?= $user['id']; ?>/<?= $ujian['kode_soal']; ?>" class="removeUnderline">
                            <button type="button" class="btn btn-light btn-block shadow-sm mt-2">
                                <?php if (
                                    date("Y") < $tanggal[0] ||
                                    (date("Y") == $tanggal[0] && date("m") < $tanggal[1]) ||
                                    (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") < $tanggal[2])
                                ) {
                                ?>
                                    <!-- Upcoming Example -->
                                    <div class="small text-info text-uppercase">
                                    <?php } elseif (date("Y") == $tanggal[0] && date("m") == $tanggal[1] && date("d") == $tanggal[2]) { ?>
                                        <!-- Today Example -->
                                        <div class="small text-warning text-uppercase">
                                        <?php } else { ?>
                                            <!-- Success Example -->
                                            <div class="small text-success text-uppercase">
                                            <?php } ?>

                                            <?= $ujian['mapel']; ?></div>
                                            <?= $ujian['materi']; ?>
                            </button>
                        </a>

                    <?php } else { ?>
                        <a href="/pengajar/make_detail/<?= $user['id']; ?>/<?= $ujian['kode_soal']; ?>" class="removeUnderline">
                            <button type="button" class="btn btn-light btn-block shadow-sm mt-2">
                                <div class="small text-secondary text-uppercase">Untitled</div>
                                Untitled
                            </button>
                        </a>
                    <?php } ?>
                <?php endforeach; ?>

            </div>
        </div>

        <?= $this->renderSection('detail'); ?>



    </div>
</div>

<?= $this->endSection(); ?>