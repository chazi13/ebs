<div class="card">
    <div class="card-body">
        <form action="<?= base_url('transaction/pull_cash') ?>" method="post" class="basic-form" onsubmit="return false">
            <div class="form-group form-row">
                <div class="col-md-6 col-sm-12 pb-sm-2">
                    <label for="select-user">Pilih User</label>
                    <select name="user_id" id="select-user" class="form-control select-2" required>
                        <option value="" class="disbaled" disabled selected>-- Pilih User --</option>
                        <?php foreach ($users as $i => $user) : ?>
                            <option value="" disabled><?= ucfirst($i) ?></option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u->user_id ?>"><?= $u->nama ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="nominal">Nominal</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" name="nominal" value="5000" class="selectgroup-input">
                            <span class="selectgroup-button"><?= rupiah('5000') ?></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="nominal" value="10000" class="selectgroup-input">
                            <span class="selectgroup-button"><?= rupiah('10000') ?></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="nominal" value="20000" class="selectgroup-input">
                            <span class="selectgroup-button"><?= rupiah('20000') ?></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="nominal" value="50000" class="selectgroup-input">
                            <span class="selectgroup-button"><?= rupiah('50000') ?></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="nominal" value="100000" class="selectgroup-input">
                            <span class="selectgroup-button"><?= rupiah('100000') ?></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
</div> 