<div class="modal-content">
    <?php foreach ($detail as $d) : ?>
    <form action="<?= base_url('printing/update') ?>" method="post" class="basic-form">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-detail-label">Detail Pesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <td>Nama File</td>
                            <td>:</td>
                            <td><?= $d->nama_file ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Print</td>
                            <td>:</td>
                            <td><?= $d->jml_print ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Print</td>
                            <td>:</td>
                            <td class="text-capitalize"><?= $d->jenis ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Lembar</td>
                            <td>:</td>
                            <td><input type="number" name="jml_lembar" value="<?= $d->jml_lembar ?>" class="rounded form-control px-2 py-1" id="jml_lembar"></td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>:</td>
                            <td><a href="<?= base_url($detail[0]->file) ?>" class="btn btn-primary" download>Download</a></td>
                        </tr>
                    </table>
                    <div class="text-right">
                        <div class="text-bold">
                            <?php 
                            $jenis = ($d->jenis == 'berwarna') ? 1000 : 500;
                            $total = $d->jml_print * $d->jml_lembar * $jenis;
                            ?>
                            <input type="hidden" name="jml_print" value="<?= $d->jml_print ?>">
                            <input type="hidden" name="harga_satuan" value="<?= $jenis ?>">
                            <h3 class="text-bold">Total : <span class="total"><?= rupiah($total) ?></span></h3>
                            <input type="hidden" name="total" value="<?php $total ?>">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Simpan" class="btn btn-primary">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
    <?php endforeach; ?>
</div> 