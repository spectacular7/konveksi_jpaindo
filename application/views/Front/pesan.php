<!-- BREADCRUMBS -->
<div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="./index2.html">Beranda</a></li>
            <li><a href="./pilih-pola.html">Pilih Pola</a></li>
            <li><a href="./pilih-desain.html"></a>Pilih Desain</li>
        </ul>
    </div>
</div>

<div class="space20"></div>
<!-- DESAIN PAKAIAN -->
<form action="<?= base_url(''); ?>" method="post">
    <div class="shop-single">
    <div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12">
    <div class="row">
    <div class="col-md-5 col-sm-6">                                    
        <div class="sync1">
            <div class="item"> 
                <img src="<?= base_url('assets/img/design/') .$GbrDesain; ?>" alt="">
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-6">
        <div class="product-single">
            <div class="sub2 text-left">
                <h5>Kaos</h5>
                <h6><?= $Jenis ?></h6>
            </div>
            <div class="space50"></div>
            <div class="row select-wraps">
                <div class="form-group">
                    <div class="table-responsive">            
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Ukuran</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getall as $gt) { ?>
                                    <tr>
                                        <input type="text" name="barang<?= $gt['Ukuran']; ?>" value="<?= $gt['KdBarang']; ?>" hidden>
                                        <input type="text" id="hrg<?= $gt['Ukuran']; ?>" value="<?= $gt['Harga']; ?>" hidden>
                                        <td><?= $gt['NamaBrg']; ?></td>
                                        <td class="col-md-1 col-sm-1" align="center"><?= $gt['Ukuran']; ?></td>
                                        <td><?= $gt['Harga']; ?></td>
                                        <td class="col-md-2 col-sm-2"><input type="text"class="form-control"></input></td>
                                        <td><input type="text"class="form-control"></input></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <th valign="bottom" >Total : </th>
                                    <td>
                                        <Input type="text"class="form-control" name="total" id="total" placeholder="0" value=""></Input>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="space20"></div>
                <h3>JUDUL</h3>
                <div class="space20"></div>
                <table class="table sm">
                    <tbody>
                    <tr>
                        <td class="col-md-4 col-sm-4">Nama</td>
                        <td><input type="text" name="nama" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="alamat" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td><input type="text" name="desa" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td><input type="text" name="kec" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Kabupaten / Kota</td>
                        <td><input type="text" name="kab" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td><input type="text" name="notelp" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><textarea name="deskripsi" class="form-control"></textarea></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <a class="addtobag" href="./daftarpesanan.html">Pesan
        <div class="sep"></div>
    </a>
</div>
</div>
</div>
<div class="clearfix space80"></div>
</div>
</div>
</div>
</div>

<div class="clearfix space20"></div>