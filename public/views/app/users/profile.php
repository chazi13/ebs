<div class="card">
    <div class="card-body">
        <?php foreach ($user_profile as $u) : ?>
        <div class="row">
            <div class="col-md-4 col-sm-12 text-center">
                <?php $foto = ($u->foto) ? $u->foto : 'public/assets/img/blank_user.png'; ?>
                <img src="<?= base_url($foto) ?>" alt="image profile" class="rounded-circle w-50 bg-light p-2">
            </div>
            <div class="col-md-8 col-sm-12">
                <table class="table">
                    <?php if ($u->no_induk) : ?>
                    <tr>
                        <td><?= ($u->level !== 'siswa') ? 'NIP' : 'NIS' ?></td>
                        <td>:</td>
                        <td><?= $u->no_induk ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td width="20%">Nama</td>
                        <td width="5%">:</td>
                        <td><?= $u->nama ?></td>
                    </tr>
                    <?php if ($u->kelas) : ?>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $u->kelas ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= ($u->email) ? $u->email : '-' ?></td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td><?= ($u->telp) ? $u->telp : '-' ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $u->username ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div> 
<a href="#" class="btn btn-danger back">
    <i class="flaticon-back fa-lg"></i> Kembali
</a>