<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h2>Form Login</h2>
    <form action="<?= base_url('Login/login_process'); ?>" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail" aria-describedby="EmailHelp">
            <div id="EmailHelp" class="form-text">Masukkan email anda dengan benar!</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>
</div>
<?= $this->endSection(); ?>