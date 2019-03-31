<div class="card">
    <form action="<?= base_url('transaction/insert_print_order') ?>" method="post" class="form-image" onsubmit="return false">
        <div class="card-body">
            <div class="form-group form-row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nama-file">Nama File</label>
                    <input type="text" name="nama_file" id="nama-file" class="form-control" placeholder="Isi Nama File" required>
                    <input type="hidden" name="user_print_id" value="<?= $user_print[0]->user_id ?>">
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="jml-print">Jumlah Print</label>
                    <input type="number" min="0" name="jml_print" id="jml-print" class="form-control" placeholder="Isi Jumlah Print" required>
                </div>

                <div class="col-md-6 col-sm-12">
                    <label class="col-12 p-0" for="jenis">Pilih Jenis Print</label>
                    <input type="hidden" name="harga_satuan" id="harga-satuan" value="500">
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis" value="hitam-putih" class="selectgroup-input jenis-print" checked>
                            <span class="selectgroup-button">Hitam Putih</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis" value="berwarna" class="selectgroup-input jenis-print">
                            <span class="selectgroup-button">Berwarna</span>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="file">File</label>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input upload-foto" id="upload-file" required />
                        <label class="custom-file-label" for="upload-file" data-browse="Pilih File">Pilih File</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right"><input type="submit" value="Kirim" class="btn btn-primary text-right"></div>
    </form>
</div> 