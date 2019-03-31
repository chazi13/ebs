<div class="card rounded shadow bg-primary">
    <div class="card-body">
        <div class="row">
            <?php foreach ($toko as $t) : ?>
            <div class="col-md-4 col-sm-12">
                <div class="p-2 bg-white rounded">
                    <img src="<?= base_url($t->foto_toko) ?>" alt="" class="w-100 rounded">
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <h4 class="card-title text-white"><?= $t->nama_toko ?></h4>
                <p class="card-category text-white"><?= $t->deskripsi_toko ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card card-item-list">
            <div class="card-body">
                <div class="card-title">Item</div>
                <table class="table datatable table-custom-padding">
                    <thead>
                        <th width="30%">Gambar</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </thead>
                    <?php foreach ($item as $i) : ?>
                    <tr>
                        <td><img src="<?= base_url($i->foto_item) ?>" alt="" width="100%"></td>
                        <td>
                            <h4><?= $i->nama_item ?></h4>
                            <h5><?= rupiah($i->harga_item) ?></h5>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn rounded-circle btn-sm add-to-cart" data="<?= urlencode(json_encode($i)) ?>">
                                <i class="fa fa-plus text-primary fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <form action="<?= base_url('transaction/insert_order') ?>" method="post" class="basic-form">
                <input type="hidden" name="user_toko_id" value="<?= $toko[0]->user_id ?>">
                <input type="hidden" name="toko_id" value="<?= $toko[0]->toko_id ?>">
                <input type="hidden" name="jenis" value="<?= ($toko[0]->jenis_toko == 'kantin') ? 'jajanan' : $toko[0]->jenis_toko ?>">
                <div class="card-body">
                    <div class="card-title">Pesanan</div>
                    <table class="table table-custom-padding table-pesanan">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th width="40%">Item</th>
                                <th width="20%">Qty</th>
                                <th width="27%">Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list-pesanan"></tbody>
                    </table>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-md">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 