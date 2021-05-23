<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h2>Homepage</h2>
<a href="<?= base_url('Buku/index') ?>" class="btn btn-primary">List Buku</a>
<?= $this->endSection(); ?>