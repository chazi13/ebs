<div class="card">
    <div class="card-body">
        <table class="table datatable table-custom-padding">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th width="15%">No Transaksi</th>
                    <th width="10%">Tanggal</th>
                    <th width="5%">Jenis</th>
                    <th width="30%">Keterangan</th>
                    <th width="15%">Debet</th>
                    <th width="15%">Kredit</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_deb = 0;
                $total_kre = 0; ?>
                <?php foreach ($transaksi as $i => $t) : ?>
                <tr>
                    <td><?= ($i + 1) ?></td>
                    <td><?= $t->transaction_id ?></td>
                    <td><?= $t->tgl_transaction ?></td>
                    <td><?= ucfirst($t->jenis) ?></td>
                    <td><?= $t->keterangan ?></td>
                    <td><?= ($t->jenis == 'isi saldo') ? rupiah($t->total) : '-' ?></td>
                    <td><?= ($t->jenis !== 'isi saldo') ? rupiah($t->total) : '-' ?></td>
                    <?php 
                    if ($t->jenis == 'isi saldo') {
                        $total_deb += $t->total;
                    } else {
                        $total_kre += $t->total;
                    }
                    ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total</th>
                    <th><?= rupiah($total_deb) ?></th>
                    <th><?= rupiah($total_kre) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div> 