<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Item</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php foreach ($detail as $i => $d) : ?>
        <tr>
            <td><?= ($i + 1) ?></td>
            <td><img src="<?= base_url($d->foto_item) ?>" alt="" width="100px"></td>
            <td><?= $d->nama_item ?></td>
            <td><?= $d->jml_order ?></td>
            <td><?= rupiah($d->subtotal) ?></td>
            <?php $total += $d->subtotal; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" class="text-right">Total : </th>
            <th><?= rupiah($total) ?></th>
        </tr>
    </tfoot>
</table> 