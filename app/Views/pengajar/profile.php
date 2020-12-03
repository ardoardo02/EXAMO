<?= $this->extend('pengajar/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5 d-flex justify-content-center">

    <form action="/pengajar/password" action="post">
        <h1>Ini Halaman Profil</h1>
        <h3><?php echo 'Halo ' . $user['firstName'] . ' ' . $user['lastName']; ?></h3>
        <br>
        <input type="number" name="userid" value="<?= $user['id']; ?>" hidden>
        <button type="submit" class="btn btn-primary">Ganti Kata Sandi</button>
    </form>

</div>

<?= $this->endSection(); ?>