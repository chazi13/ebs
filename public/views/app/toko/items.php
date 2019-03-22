<div class="card">
    <div class="card-header">
        <div class="d-flex align-item-center">
            <h4 class="card-title">Daftar Item</h4>
            <a href="<?= base_url('toko/item/tambah') ?>" class="btn btn-primary btn-round ml-auto">Tambah Item</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Foto Item</td>
                    <td>Nama Item</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $n => $i) : ?>
                <tr>
                    <td><?= $n + 1 ?></td>
                    <td><img src="<?= base_url($i->foto_item) ?>" alt="" width="100px"></td>
                    <td><?= $i->nama_item ?></td>
                    <td><?= rupiah($i->harga_item) ?></td>
                    <td><?= $i->stok ?></td>
                    <td>
                        <a href="<?= base_url('toko/item/edit/' . $i->item_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="<?= base_url('toko/item/hapus/' . $i->item_id) ?>" class="btn btn-danger btn-sm alert-confirm" onclick="return false"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div> 