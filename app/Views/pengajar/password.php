<?= $this->extend('pengajar/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <form action="/pengajar/gantiPass" action="post">
                <input type="number" name="userid" value="<?= $user['id']; ?>" hidden>

                <div class="form-group">
                    <label for="pass1">Kata Sandi Lama</label>
                    <input type="password" class="form-control" name='pass1' id="pass1" placeholder="Masukkan Kata Sandi Lama">
                </div>

                <div class="form-group">
                    <label for="pass2">Kata Sandi Baru</label>
                    <input type="password" class="form-control" name='pass2' id="pass2" placeholder="Masukkan Kata Sandi Baru">
                </div>

                <button type="submit" class="btn btn-primary">Ganti</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>