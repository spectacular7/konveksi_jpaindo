<html>

<body>


    <form action="<?= base_url('pesanpakaian/inputPesananbaru'); ?>/<?= $JenisPakaian['KodeJenis']; ?>/<?= $gambar['KdPola']; ?>/<?= $gambar['KdDesain']; ?>" method="post">
        <table>
            <tr>
                <td>Nama Jenis</td>
                <td>:</td>
                <td><?= $JenisPakaian['NamaJenis']; ?></td>
            <tr>
                <td>Desain</td>
                <td>:</td>
                <td><img src="<?= base_url('assets/img/desasin'); ?>/<?= $gambar['GbrDesain']; ?>" width="200"></td>
            </tr>
        </table>
        <tr>
            <td>Deskripsi
            <td><input type="text" name="desk">

        <tr>
            <table>
                <th>Nama barang</th>
                <th>Ukuran</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
                <?php
                foreach ($barang as $brg) { ?>
                    <tr>
                        <input type="text" name="barang<?= $brg['Ukuran']; ?>" value="<?= $brg['KdBarang']; ?>" hidden>
                        <input type="text" id="hrg<?= $brg['Ukuran']; ?>" value="<?= $brg['Harga']; ?>" hidden>
                        <td><?= $brg['NamaBrg']; ?></td>
                        <td align="center"><?= $brg['Ukuran']; ?></td>
                        <td><?= $brg['Harga']; ?></td>
                        <td><Input type="number" name="jumlah<?= $brg['Ukuran']; ?>" id="<?= $brg['Ukuran']; ?>" placeholder="0" value="<?= set_value('jumlah' . $brg['Ukuran']); ?>"> </td>
                        <td id="ht<?= $brg['Ukuran']; ?>"></td>
                        <td><Input type="number" name="harga<?= $brg['Ukuran']; ?>" id="jml<?= $brg['Ukuran']; ?>" placeholder="0" value="0" hidden></td>
                    <?php }
                ?>
                <tr>
                    <td colspan="3">
                    <td>
                        <p align="right" id="ptot"></p>
                    <td id="httot">
                    <td><Input type="number" name="total" id="total" placeholder="0" value="0" hidden>
                </tr>

            </table>
            <table>
                <tr>
                    <td>Nama
                    <td><input type="text" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                    <td>Alamat
                    <td><input type="text" name="alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                    <td>Desa
                    <td><input type="text" name="desa">
                        <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                    <td>Kecamatan
                    <td><input type="text" name="kec">
                        <?= form_error('kec', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                    <td>Kabupaten Or Kota
                    <td><input type="text" name="kab">
                        <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                    <td>No Telp
                    <td><input type="text" name="notelp">
                        <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                    <td>Email
                    <td><input type="text" name="email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                <tr>
                </tr>
            </table>
            <button type="submit">Pesan</button>
    </form>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/adit.js"></script>
    <script src="<?= base_url('assets/'); ?>js/adit.1.js"></script>