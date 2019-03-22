<div class="card">
    <div class="card-body">
        <form action="<?= base_url('toko/update_item') ?>" method="post" class="form-image">
            <div class="row">
                <?php foreach ($item as $i) : ?>
                <div class="col-md-4 col-sm-12">
                    <h4 class="card-title">Preview Foto Item</h4>
                    <div class="text-center d-block mb-4">
                        <img src="<?= base_url($i->foto_item) ?>" alt="" class="w-100 user-avatar">
                        <!-- <i class="fa flaticon-picture fa-10x"></i> -->
                    </div>
                    <div class="custom-file col">
                        <input type="file" name="foto_item" class="custom-file-input upload-foto" />
                        <label class="custom-file-label" for="upload-foto" data-browse="Pilih File">Pilih File</label>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="nama_item">Nama Item</label>
                        <input type="text" name="nama_item" id="nama_item" value="<?= $i->nama_item ?>" class="form-control" placeholder="Nama Item" required />
                        <input type="hidden" name="toko_id" value="<?= $i->toko_id ?>">
                        <input type="hidden" name="item_id" value="<?= $i->item_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_item">Deskripsi Item</label>
                        <textarea name="deskripsi_item" id="deskripsi_item" cols="30" rows="5" class="form-control" placeholder="Isi keterangan Item" required><?= $i->deskripsi_item ?></textarea>
                    </div>

                    <div class="form-row form-group">
                        <div class="col-md-6 col-sm-12">
                            <label for="harga_item">Harga</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">Rp</span>
                                <input type="number" name="harga_item" id="harga_item" value="<?= $i->harga_item ?>" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" value="<?= $i->stok ?>" class="form-control" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
</div>
<a href="#" class="btn btn-danger back">
    <i class="flaticon-back fa-lg"></i> Kembali
</a> 