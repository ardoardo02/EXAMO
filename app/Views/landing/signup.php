<?= $this->extend('landing/template'); ?>

<?= $this->section('content'); ?>

<div class="App">
    <div class="vertical-center">
        <div class="inner-block">
            <form action="/landing/tambahUser" method="post">
                <h3>Register</h3>
                <p style="text-align: center">Murid</p>
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="firstname" id="firstName" />
                </div>

                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lastname" id="lastName" />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" />
                </div>

                <div class="form-group">
                    <label>Institute</label>
                    <input type="text" class="form-control" name="institute" id="institute" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">
                    Sign up
                </button>
                <p class="my-1" style="text-align: center;">Anda seorang pengajar? <a href="/landing/signup/guru">Daftar disini!</a></p>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>