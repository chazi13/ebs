<div class="row">
    <?php foreach ($kantin as $k) : ?>
    <?php if ($k->nama_toko) : ?>
    <div class="col-md-4 col-sm-12">
        <div class="card card-random-bg">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 p-0">
                        <div class="icon-big text-center bg-white p-1 rounded">
                            <a href="<?= base_url('kantin/' . $k->toko_id) ?>" class="text-white">
                                <img src="<?= base_url($k->foto_toko) ?>" alt="" class="w-100 rounded">
                            </a>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <h4 class="card-title">
                                <a href="<?= base_url('kantin/' . $k->toko_id) ?>" class="text-white"><?= $k->nama_toko ?></a>
                            </h4>
                            <p class="card-category text-white"><?= $k->deskripsi_toko ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div> 