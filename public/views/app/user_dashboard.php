<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/banking.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">Tabunganku</h3>
                <p>Layanan untuk menyipan uang dan menggunakannya dengan aplikasi EBS</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/transfer-money.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">Transfer</h3>
                <p>Layanan EBS yang memungkinkan user melakukan transfer ke user lain</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/ice-cream-shop.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">Jajan</h3>
                <p>Layanan EBS untuk memesan dan membeli jajanan di kantin</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/stationery.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">ATK</h3>
                <p>Layanan EBS bagi user yang ingin menambah alat - alat tulis nya</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/printer.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">Print</h3>
                <p>Layanan EBS untuk melakukan print dan pembayarannya secara online</p>
            </div>
        </div>
    </div>
    <?php if ($this->auth->is_level('siswa')) : ?>
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/receipt.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">Seragam</h3>
                <p>Layanan khusus EBS bagi siswa untuk melakukan pembelian seragam</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card shadow">
            <div class="card-body text-center">
                <img src="<?= base_url('public/assets/img/receipt.png') ?>" alt="" width="30%">
                <h3 class="text-uppercase mt-2">SPP</h3>
                <p>Layanan khusus EBS bagi siswa untuk melakukan pembayaran SPP</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div> 