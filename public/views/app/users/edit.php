<div class="card">
    <div class="card-body">
        <form action="<?= base_url('users/update_user') ?>" method="post" class="form-image" submit="return false;">
            <?php foreach ($user_profile as $u) : ?>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <?php $foto = ($u->foto) ? $u->foto : 'public/assets/img/blank_user.png'; ?>
                    <h4 class="card-title">Preview Foto Profil</h4>
                    <div class="text-center d-block mb-4">
                        <img src="<?= base_url($foto) ?>" alt="image profile" class="rounded-circle w-50 bg-light p-2 user-avatar">
                    </div>
                    <div class="custom-file col">
                        <input type="file" name="foto" class="custom-file-input upload-foto" />
                        <label class="custom-file-label" for="upload-foto" data-browse="Pilih File">Pilih File</label>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="form-group form-row">
                        <?php if ($this->uri->segment(2) !== 'kantin') : ?>
                        <div class="col col-md-6 col-sm-12 mt-sm-3">
                            <label for="no_induk"><?= ($this->uri->segment(2) == 'siswa') ? 'NIS' : 'NIP'; ?></label>
                            <input type="text" name="no_induk" id="no_induk" value="<?= $u->no_induk ?>" class="form-control" placeholder="123456" />
                        </div>
                        <?php endif; ?>

                        <div class="col col-sm-12 <?= ($this->uri->segment(2) !== 'kantin') ? 'col-md-6' : '' ?> mt-sm-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="<?= $u->nama ?>" class="form-control" placeholder="Nama Lengkap" required />
                            <input type="hidden" name="user_id" value="<?= $u->user_id ?>">
                            <input type="hidden" name="level" value="<?= $u->level ?>">
                        </div>

                        <?php if ($this->uri->segment(2) == 'siswa') : ?>
                        <div class="col-12 mt-3">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="<?= $u->kelas ?>" class="form-control" placeholder="X TKJ" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group form-row mb-0">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" value="<?= $u->email ?>" class="form-control" placeholder="example@mail.com" required />
                        </div>

                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="telp">Telephone / WA</label>
                            <input type="tel" name="telp" id="telp" value="<?= $u->telp ?>" class="form-control" placeholder="085141****" required />
                        </div>
                    </div>
                    <div class="form-group form-row mb-0">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="<?= $u->username ?>" class="form-control" placeholder="Username" required />
                        </div>

                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="********" />
                            <small id="password-help" class="form-text text-muted">Kosongkan Password Jika Tidak Ingin Diubah!</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </form>
    </div>
</div> 
<a href="#" class="btn btn-danger back">
    <i class="flaticon-back fa-lg"></i> Kembali
</a>