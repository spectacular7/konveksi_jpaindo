<!-- BREADCRUMBS -->
            <div class="bcrumbs">
                <div class="container">
                    <ul>
                        <li><a href="<?= base_url('Front') ?>">Beranda</a></li>
                        <li><a href="<?= base_url('Front/pola/') ?>">Pilih Pola</a></li>
                        <li><a href="./pilih-desain.html"></a>Pilih Desain</li>
                    </ul>
                </div>
            </div>

            <div class="space20"></div>
<!-- PILIH DESAIN -->
            <div class=" heading-sub text-center">
                <h5>Pilih Desain</h5>
            </div>
            <div class="container padding20">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="product-carousel3">
                            <?php foreach ($desain as $d) {?>
                                <div class="pc-wrap">
                                    <div class="product-item">
                                        <div class="item-thumb">
                                            <div class="tpc-content">
                                                <img src="<?= base_url('assets/img/design/'). $d['GbrDesain']; ?>" class="img-responsive" alt=""/>
                                                <div class="tpc-overlay">
                                                    <div class="tpc-overlay-inner">
                                                        <div class="tpc-info">
                                                            <h4><a href="#">Desain 01</a></h4>
                                                            <a href="<?= base_url('Front/pesan/'). $d['KdDesain']; ?>" class="cart-btn">Pilih</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR PILIH DESAIN -->
            <div class="clearfix space20"></div>
            <!-- POLICY -->
                <div class="policy-item" id="policy2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="pi-wrap">
                                    <i class="fa fa-plane"></i>
                                    <h4>Gratis Ongkir<span>Pengiriman secara gratis</span></h4>
                                    <p>
                                        Dapatkan pengiriman barang pesanan secara gratis untuk daerah Kab. Bandung
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="pi-wrap">
                                    <i class="fa fa-money"></i>
                                    <h4>Jaminan Uang<span>7 hari pengembalian uang</span></h4>
                                    <p>
                                        Pengembalian barang dalam 7 hari jika barang yg diterima dalam keadaan rusak
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="pi-wrap">
                                    <i class="fa fa-clock-o"></i>
                                    <h4>Waktu Kerja<span>Buka: 09:00 - Tutup: 22:00</span></h4>
                                    <p>
                                        Waktu dan Jam kerja untuk pelayanan offline kami dari hari Senin-Sabtu mulai pukul 09.00-22.00
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="pi-wrap">
                                    <i class="fa fa-life-ring"></i>
                                    <h4>Online 24 Jam<span>Pelayanan online 24 jam sehari</span></h4>
                                    <p>
                                        Pelayanan online 24 jam untuk membantu anda dalam bertransaksi
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- AKHIR POLICY -->