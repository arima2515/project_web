<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2>List Buku</h2>
    <form action="<?= base_url('Admin/showSearch') ?>" method="get">
        <div class="input-group mb-3">
            <input name='keyword' type="text" class="form-control" placeholder="Masukkan kata kunci yang anda cari.."
                aria-label="Search keyword" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary " type="submit" name="submit" id="button-addon2">Cari</button>
        </div>
    </form>
    <table class="table table-dark">
        <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tahun Terbit</th>
            <th>Nama Pengarang</th>
            <th>Genre Buku</th>
            <th>Status</th>
            <th></th>

        </tr>

        <?php $i = 10 * ($currentPage - 1);
        foreach ($data as $row) :
            $i += 1 ?>
        <tr>

            <td><?= $i; ?></td>
            <td><?= $row['isbn'] ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['tahunTerbit']; ?></td>
            <td><?= $row['namaPenulis']; ?></td>
            <td><?= $row['namaKategori'] ?></td>
            <td><?= $row['statusBuku']; ?></td>
            <td>
                <div class="d-flex justify-content-between ">
                    <div class="col"><a href="<?= base_url('Admin/editData/' . $row['isbn']) ?>"
                            class="btn btn-primary">Edit</a></div>
                    <div class="col"> <a href="<?= base_url('Admin/deleteData/' . $row['isbn']) ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin untuk menghapus data ?')">Delete</a></div>
                </div>


            </td>

        </tr>
        <?php endforeach; ?>

    </table>
    <div class="d-flex justify-content-between ">
        <div> <?= $pager->links('buku', 'my_pagination') ?></div>
        <div><a href="<?= base_url('Admin/addData') ?>" class="btn btn-primary">Tambah Data</a></div>
    </div>
    <br>


</div>
<?= $this->endSection(); ?>