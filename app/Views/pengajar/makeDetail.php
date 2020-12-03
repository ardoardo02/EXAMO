<?= $this->extend('pengajar/make'); ?>

<?= $this->section('detail'); ?>

<?php
if ($ujian['userid'] != $user['id']) {
    header('Location: /pengajar/make/' . $user['id']);
    exit;
}
?>

<!-- Pengaturan Exam -->
<div class="col-lg-7">
    <div class="bg-white rounded-lg shadow-sm p-5">
        <!-- Make exam form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
            <li class="nav-item">
                <a data-toggle="pill" href="#nav-tab-info" class="nav-link tabHover active rounded-pill">
                    <i class="fa fa-info mr-1"></i>
                    Info
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="pill" href="#nav-tab-question" class="nav-link tabHover rounded-pill">
                    <i class="fa fa-question mr-1"></i>
                    Pertanyaan
                </a>
            </li>
            <li>
                <form action="/pengajar/delete" method="post">
                    <?= csrf_field(); ?>

                    <input type="number" name="kode" value="<?= $ujian['kode_soal']; ?>" hidden>
                    <input type="number" name="userid" value="<?= $user['id']; ?>" hidden>

                    <button type="submit" class="btn" data-toggle="tooltip" data-placement="top" title="Hapus Ujian Ini" onclick="return confirm('Are you sure want to delete this exam?');"><i class="fa fa-trash-alt"></i></button>
                </form>
            </li>
        </ul>
        <!-- End -->


        <!-- Make exam form content -->
        <div class="tab-content">

            <!-- info -->
            <div id="nav-tab-info" class="tab-pane fade show active">

                <form role="form" action="/pengajar/save" method="post" name="inputI">
                    <?= csrf_field(); ?>

                    <input type="number" name="kode" value="<?= $ujian['kode_soal']; ?>" hidden>
                    <input type="number" name="userid" value="<?= $user['id']; ?>" hidden>

                    <div class="form-group">
                        <label> Mata Pelajaran </label>
                        <input type="text" name="mapel" value="<?= $ujian['mapel']; ?>" placeholder="Contoh : Pemrograman Web" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Materi </label>
                        <input type="text" name="materi" value="<?= $ujian['materi']; ?>" placeholder="Contoh : HTML, CSS & JS" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Tingkatan </label>
                        <?php $val = $ujian['tingkat']; ?>
                        <select class="custom-select" name="tingkatan">
                            <option value=""> Pilih Tingkatan </option>
                            <option <?php if ($val == 'ES') echo 'selected'; ?> value="ES">Sekolah Dasar</option>
                            <option <?php if ($val == 'JHS') echo 'selected'; ?> value="JHS">Sekolah Menengah Pertama</option>
                            <option <?php if ($val == 'SHS') echo 'selected'; ?> value="SHS">Sekolah Menengah Akhir</option>
                            <option <?php if ($val == 'Univ') echo 'selected'; ?> value="Univ">Universitas</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> Tanggal </label>
                                <div class="input-group">
                                    <input type="date" name="tanggal" value="<?= $ujian['tanggal']; ?>" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> Mulai </label>
                                <input type="time" name="sTime" value="<?= $ujian['sTime']; ?>" required class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group mb-4">
                                <label> Berakhir </label>
                                <input type="time" name="eTime" value="<?= $ujian['eTime']; ?>" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" type="checkbox" name="randomize" id="randomize" <?php if ($ujian['randomize'] == '1') echo 'checked'; ?>>
                            <label class="custom-control-label" for="randomize">Acak Nomor Pertanyaan</label>
                        </div>
                    </div>
                    <button type="submit" name="input1" class="btn btn-primary btn-block rounded-pill shadow-sm text-center"> Simpan </button>

                </form>
            </div>
            <!-- End -->

            <!-- question -->
            <div id="nav-tab-question" class="tab-pane fade">
                <!-- question 1 -->
                <form role="form" action="" method="post" name="inputQ">
                    <div class="container pt-2 pb-1 rounded-lg" style="background-color: whitesmoke;">
                        <div class="form-group">
                            <label> Pertanyaan 1 <button class="btn" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></button></label>
                            <input type="text" name="q1" placeholder="Masukkan pertanyaan anda" class="form-control">
                            <div class="question-divider">
                                <div class="divider-text">
                                    jawaban
                                </div>
                            </div>
                            <button class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Pilihan Ganda"><img src="/img/abcd.png" style="width: 25px; height: 25px"></button>
                            <button class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Essay"><img src="/img/fill_in.png" style="width: 25px; height: 25px"></button>
                        </div>
                    </div>
                    <!-- add new question -->
                    <button type="button" class="btn btn-light-new rounded-pill shadow-sm mt-4" data-toggle="modal" data-target="#addQuestionModal"><i class="fa fa-plus mr-1"></i>Buat Pertanyaan Baru</button>
                    <button type="submit" name="input2" class="btn btn-primary btn-block rounded-pill shadow-sm text-center mt-4"> Simpan </button>
                </form>
            </div>
            <!-- End -->


        </div>
        <!-- End -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Jenis Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer modalKiri">
                <button type="button" class="btn btn-light-new" data-dismiss="modal" data-toggle="modal" data-target="#pilganModal"><img src="/img/abcd.png" class="icon"><label class="ml-2">Pilihan Ganda</label></button>
                <button type="button" class="btn btn-light-new" data-dismiss="modal" data-toggle="modal" data-target="#essayModal"><img src="/img/fill_in.png" class="icon"><label class="ml-3">Essay</label></button>
            </div>
        </div>
    </div>
</div>

<!-- pilgan Modal -->
<div class="modal fade" id="pilganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Pilihan Ganda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaan" placeholder="Masukkan pertanyaan">
                    </div>
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <div class="form-check form-check">
                            <input class="form-check-input mt-2" type="radio" name="opsi" value="opsi1">
                            <input type="text" class="form-control" id="jawaban" name="jawaban1" placeholder="Opsi 1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check">
                            <input class="form-check-input mt-2" type="radio" name="opsi" value="opsi1">
                            <input type="text" class="form-control" name="jawaban2" placeholder="Opsi 2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check">
                            <input class="form-check-input mt-2" type="radio" name="opsi" value="opsi1">
                            <input type="text" class="form-control" name="jawaban3" placeholder="Opsi 3">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check">
                            <input class="form-check-input mt-2" type="radio" name="opsi" value="opsi1">
                            <input type="text" class="form-control" name="jawaban4" placeholder="Opsi 4">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check">
                            <input class="form-check-input mt-2" type="radio" name="opsi" value="opsi1">
                            <input type="text" class="form-control" name="jawaban5" placeholder="Opsi 5">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- essay Modal -->
<div class="modal fade" id="essayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Essay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaan" placeholder="Masukkan pertanyaan">
                    </div>
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <input type="text" class="form-control" id="jawaban" name="jawaban" placeholder="MAsukkan jawaban">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>