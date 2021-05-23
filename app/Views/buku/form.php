<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <h2>Form Insert</h2>
    <form action="<?= isset($val) ? base_url('Admin/editDataProcess')  : base_url('Admin/addDataProcess') ?>"
        method="POST">

        <div class="mb-3">
            <label for="exampleInputISBN" class="form-label">ISBN</label>
            <input name="isbn" type="text" class="form-control" id="exampleInputISBN"
                value="<?= isset($data[0]['isbn']) ? $data[0]['isbn'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputCover" class="form-label">Cover</label>
            <input name="cover" type="text" class="form-control" id="exampleInputCover"
                value="<?= isset($data[0]['cover']) ? $data[0]['cover'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputJudul" class="form-label">Judul</label>
            <input name="judul" type="text" class="form-control" id="exampleInputJudul"
                value="<?= isset($data[0]['judul']) ? $data[0]['judul'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputTahunTerbit" class="form-label">Tahun Terbit</label>
            <input name="tahunTerbit" type="text" class="form-control" id="exampleInputTahunTerbit"
                value="<?= isset($data[0]['tahunTerbit']) ? $data[0]['tahunTerbit'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputNamaPenulis" class="form-label">Nama Penulis</label>
            <input name="namaPenulis" type="text" class="form-control" id="exampleInputNamaPenulis"
                value="<?= isset($data[0]['namaPenulis']) ? $data[0]['namaPenulis'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputGenre" class="form-label">Kategori Buku</label>
            <input name="namaKategori" type="text" class="form-control" id="exampleInputGenre"
                value="<?= isset($data[0]['namaKategori']) ? $data[0]['namaKategori'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputStatus" class="form-label">Status Buku</label>
            <input name="statusBuku" type="text" class="form-control" id="exampleInputStatus"
                value="<?= isset($data[0]['statusBuku']) ? $data[0]['statusBuku'] : "" ?>">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary"><?= isset($val) ? "Simpan" : "Tambah" ?></button>
        </div>

    </form>
</div>
<?= $this->endSection(); ?>