<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2>Admin Page</h2>
    <div class="d-inline">
        <a href="<?= base_url("Admin/index") ?>" class="btn btn-primary">List Buku</a>
        <a href="<?= base_url("Penulis/index") ?>" class="btn btn-primary">List Penulis</a>
    </div>
</div>
<?= $this->endSection(); ?>