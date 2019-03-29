<div class="row">
    <?php for ($i = count($data) - 1; $i >= 0; $i--) : ?>
    <div class="col-md-3 col-sm-6">
        <div class="card card-stats card-round card-<?= $data[$i]['color'] ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center"><i class="fa <?= $data[$i]['icon'] ?>"></i></div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?= ucfirst($data[$i]['level']) ?></p>
                            <h4 class="card-title"><?= $data[$i]['jml'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endfor; ?>
</div> 