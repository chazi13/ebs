<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Petugas</h3>
    </div>
    <form class="basic-form" action="<?= base_url('users/add_user') ?>" method="post" onsubmit="return false">
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" required />
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com" required />
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required />
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" min="8" class="form-control" placeholder="*********" required />
                </div>
            </div>
            <div class="form-row">
                <label for="level">Level Petugas</label>
                <select name="level" id="level" class="form-control">
                    <option value="bmt">BMT</option>
                    <option value="seragam">Toko Seragam</option>
                    <option value="atk">Toko ATK</option>
                    <option value="print">Print</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
</div> 