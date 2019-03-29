<div class="card">
    <div class="card-header">
        <div class="d-flex align-item-center">
            <h4 class="card-title">Profil Toko</h4>
            <a href="<?= base_url('toko/edit_profil/' . $data['toko'][0]->toko_id) ?>" class="btn btn-primary btn-round ml-auto">Edit Profil</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($data['toko'] as $t) : ?>
            <div class="col-md-4 col-sm-12 text-center">
                <?php if ($t->foto_toko) : ?>
                <img src="<?= base_url($t->foto_toko) ?>" alt="" class="w-100">
                <?php else : ?>
                <i class="fa fa-store fa-10x"></i>
                <?php endif; ?>
            </div>
            <div class="col-md-8 col-sm-12">
                <h4 class="card-title"><?= ($t->nama_toko) ? $t->nama_toko : 'Nama Toko' ?></h4>
                <p class="text-justify"><?= ($t->deskripsi_toko) ? $t->deskripsi_toko : 'Deskripsi Toko' ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
