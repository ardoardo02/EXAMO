<?php
session_start();
if (isset($_SESSION['pengajar'])) {
    header("Location: /pengajar/index/" . $_SESSION['id']);
    exit;
} elseif (isset($_SESSION['admin'])) {
    header("Location: #");
    exit;
} elseif (isset($_SESSION['murid'])) {
    header("Location: /murid");
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST['email_signin'];
    $password = $_POST['password_signin'];

    foreach ($users as $user) :
        // Cek Email
        if ($user['email'] == $email) {
            // Cek Password
            if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                if ($user["status"] == "pengajar") {
                    header("Location: /pengajar/index/" . $_SESSION['id']);
                    $_SESSION['pengajar'] = true;
                    exit;
                } elseif ($user["status"] == "admin") {
                    header("Location: #");
                    $_SESSION['admin'] = true;
                    exit;
                } elseif ($user["status"] == "murid") {
                    header("Location: /murid");
                    $_SESSION['murid'] = true;
                    exit;
                }
            }
        }
    endforeach;

    // kalau ada salah
    echo "<script> alert('Email / Password Salah') </script>";
}
?>

<?= $this->extend('landing/template'); ?>

<?= $this->section('content'); ?>

<!-- Login form -->
<div class="App">
    <div class="vertical-center">
        <div class="inner-block">
            <form action="" method="post">
                <h3>Login</h3>


                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email_signin" id="email_signin" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password_signin" id="password_signin" />
                </div>

                <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Sign
                    in</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>