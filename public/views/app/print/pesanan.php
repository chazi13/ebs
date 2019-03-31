<div class="card">
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Pemesan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesanan as $i => $p) : ?>
                <tr>
                    <td><?= ($i + 1) ?></td>
                    <td><?= $p->transaction_id ?></td>
                    <td><?= $p->tgl_transaction ?></td>
                    <td><?= $p->nama ?></td>
                    <td>
                        <?php if ($p->status == 'Selesai') : ?>
                        <button class="btn btn-sm btn-success"><?= ucfirst($p->status) ?></button>
                        <?php else : ?>
                        <button class="btn btn-sm btn-warning">Tertunda</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('pesanan/detail_print_order/' . $p->transaction_id) ?>" class="btn btn-sm btn-primary detail-modal" data-toggle="modal" data-target="#modal-detail" onclick="return false">
                            <i class="fa fa-search"></i>
                        </a>
                        <?php if ($p->status == 'Pending') : ?>
                        <a href="<?= base_url('transaction/confirm/' . $p->transaction_id) ?>" class="btn btn-sm btn-success alert-confirm-pesanan"><i class="fa fa-check"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-detail-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" id="detail-pesanan">

    </div>
</div> 