<div class="card">
    <div class="card-header">
        <div class="d-flex align-item-center">
            <h4 class="card-title">Table <?= $title ?></h4>
            <?php if ($this->uri->segment(2) == 'petugas') : ?>
            <a href="<?= base_url('users/add_petugas') ?>" class="btn btn-primary btn-round ml-auto">Tambah</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Username</td>
                    <td>Level</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $i => $u) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $u->nama ?></td>
                    <td><?= $u->email ?></td>
                    <td><?= $u->username ?></td>
                    <td><?= $u->level ?></td>
                    <td>
                        <a href="<?= base_url('user/' . $this->uri->segment(2) . '/profil/' . $u->user_id) ?>" class="btn btn-sm btn-info mr-1" title="Detail"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url('user/' . $this->uri->segment(2) . '/edit/' . $u->user_id) ?>" class="btn btn-sm btn-primary mr-1" title="Edit"><i class="fa fa-pen"></i></a>
                        <!-- <a href="<?= base_url('users/hapus/' . $u->user_id) ?>" class="btn btn-sm btn-danger mr-1" title="Hapus"><i class="fa fa-trash-alt"></i></a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div> 