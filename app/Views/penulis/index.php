<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2>List Penulis</h2>
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
            <th>nama Penulis</th>
            <th>Buku Karya</th>


        </tr>
        <?php $i = 10 * ($currentPage - 1);
        foreach ($data as $row) :
            $i += 1 ?>
        <tr>

            <td><?= $i; ?></td>
            <td><?= $row['namaPenulis'] ?></td>
            <td><?php
                    foreach ($row['judul'] as $judul) {
                        echo $judul['judul'] . ", ";
                    }



                    ?></td>



        </tr>
        <?php endforeach; ?>

    </table>
    <?= 1 //$pager->links('penulis', 'my_pagination') 
    ?>



</div>
<?= $this->endSection(); ?>