<div class="card">
    <div class="card-body">
        <form action="<?= base_url('transaction/insert_depo') ?>" method="post" class="basic-form form-nominal">
            <div class="form-group form-row">
                <div class="col-md-6 col-sm-12 pb-sm-2">
                    <label for="select-user">Pilih User</label>
                    <select name="user_id" id="select-user" class="form-control select-2" required>
                        <option value="" class="disbaled" disabled selected>-- Pilih User --</option>
                        <?php foreach ($users as $i => $user) : ?>
                            <option value="" class="" disabled><?= ucfirst($i) ?></option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u->user_id ?>"><?= $u->nama ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="nominal">Nominal</label>
                    <div class="input-icon">
                        <span class="input-icon-addon">Rp</span>
                        <input type="text" name="jml_tabung" id="nominal" class="form-control input-rupiah">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
</div> 