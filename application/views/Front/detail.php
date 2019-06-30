<!-- BREADCRUMBS -->
<div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="./index2.html">Beranda</a></li>
            <li><a href="./detailpesanan.html">Detail Pesanan</a></li>
        </ul>
    </div>
</div>
<div class="space20"></div>
<!-- DESAIN PAKAIAN -->
<div class="shop-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        <div class="product-single">
                        <div class="sub2 text-left">
                            <h5>Detail Pesanan</h5>
                        </div>
                        <div class="space50"></div>
                        <div class="row select-wraps">
                            <?php echo form_open_multipart('daftarpesanan/buktipembayaran/'.$get_pesananby_id['IdPesanan']);?>
                            <div class="table-responsive">            
                                <table class="table table-striped text-left" >
                                    <tbody>
                                        <tr>
                                            <td class="col-md-3">Id Pesanan</td>
                                            <td width="10px">:</td>
                                            <td><?= $get_pesananby_id['IdPesanan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemesan</td>
                                            <td>:</td>
                                            <td><?= $get_pesananby_id['Nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pesan</td>
                                            <td>:</td>
                                            <td><?= $get_pesananby_id['TglPesan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td><?= $get_pesananby_id['Deskripsi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                    if ($get_pesananby_id['StatusPesanan'] == 'T') {
                                                        echo "Menunggu Konfirmasi";
                                                    } else {
                                                        echo "Sudah di Konfirmasi";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Pembayaran</td>
                                            <td>:</td>
                                            <td style="font-weight:bold;">
                                                <?php
                                                    if ($get_pesananby_id['StatusPembayaran'] == 'T') {
                                                        echo "Menunggu Konfirmasi";
                                                    } else {
                                                        echo "Sudah di Konfirmasi";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bukti Pembayaran</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                    if (!$get_pesananby_id['BuktiPembayaran']) {
                                                        echo "Belum Mengirim Bukti Pembayaran";
                                                    } else {
                                                        echo "Sudah Mengirim Bukti Pembayaran";
                                                    }
                                                ?>
                                                <input type="file" name="bukti" size="20" />
                                                <div class="space30"></div>
                                                <input class="btn btn-black text-left btnknfrm" type="submit" value="Upload" >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="space60"></div>
                                <table border="0" class="table">
                                    <tr>
                                        <td> Jenis Pakaian</td>
                                        <td> Nama Barang</td>
                                        <td> Ukuran</td>
                                        <td> Harga</td>
                                        <td> Jumlah</td>
                                        <td> Sub Total</td>
                                    </tr>
                                    <?php foreach ($get_all as $dps) { ?>
                                        <tr>
                                            <td><?= $dps['NamaJenis']; ?></td>
                                            <td><?= $dps['NamaBrg']; ?></td>
                                            <td><?= $dps['Ukuran']; ?></td>
                                            <td><?= $dps['Harga']; ?></td>
                                            <td><?= $dps['Jumlah']; ?></td>
                                            <td><?= $dps['SubTotal']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td>Total Harga :</td>
                                        <td><?= $get_pesananby_id['TotalHarga']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        </div>
                    </div>                                    
                </div>
                <div class="col-md-5 col-sm-6">                                    
                <div class="sync1">
                <div class="item"> 
                <img src="<?= base_url('assets/front') ?>/images/undraw_credit_card_payment_yb88.png">
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix space80"></div>
</div>
</div>
</div>
</div>

<div class="clearfix space20"></div>