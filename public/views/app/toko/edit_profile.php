<div class="card">
    <div class="card-body">
        <form action="<?= base_url('toko/update_profil') ?>" method="post" class="form-image" submit="return false">
            <div class="row">
                <?php foreach ($toko as $t) : ?>
                <div class="col-md-4 col-sm-12">
                    <h4 class="card-title">Preview Foto Toko</h4>
                    <div class="text-center d-block mb-4">
                        <?php if ($t->foto_toko) : ?>
                        <img src="<?= base_url($t->foto_toko) ?>" alt="" class="w-100  user-avatar ">
                        <?php else : ?>
                        <img src="<?= base_url(@$foto) ?>" alt="" class="w-100 user-avatar invisible">
                        <i class="fa fa-store fa-10x"></i>
                        <?php endif; ?>
                    </div>
                    <div class="custom-file col">
                        <input type="file" name="foto_toko" class="custom-file-input upload-foto" />
                        <label class="custom-file-label" for="upload-foto" data-browse="Pilih File">Pilih File</label>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="nama_toko">Nama Toko</label>
                        <input type="text" name="nama_toko" id="nama_toko" value="<?= $t->nama_toko ?>" class="form-control" placeholder="Nama Toko" required />
                        <input type="hidden" name="toko_id" value="<?= $t->toko_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_toko">Deskripsi Toko</label>
                        <textarea name="deskripsi_toko" id="deskripsi_toko" cols="30" rows="8" class="form-control" placeholder="Isi keterangan toko" required><?= $t->deskripsi_toko ?></textarea>
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