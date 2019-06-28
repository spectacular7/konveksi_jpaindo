    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Status Bahan Baku</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>KdBBaku</th>
                            <th>NamaBBaku</th>
                            <th>Description</th>
                            <th>Total price</th>
                            <th>Order status</th>
                            <th>Proof of payment</th>
                            <th>Payment status</th>
                            <th>customer identity</th>
                            <th>Employee identity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($detail as $ps) { ?>
                        <tbody>
                            <tr>
                                <td><?= $ps['KdBBaku']; ?></td>
                                <td><?= $ps['NamaBBaku']; ?></td>
                                <td><?= $ps['Jenis']; ?></td>
                                <td><?= $ps['Jenis']; ?></td>
                                <td class="text-center"><?= $ps['TersediaM2']; ?></td>
                                <td class="text-center"><?= $ps['ukuranbbdm2']; ?></td>
                                <td class="text-center"><?= $ps['jumlah']; ?></td>
                                <td class="text-center"><?= $ps['digunakan']; ?></td>
                                <?php if ($ps['StatusPesanan'] == 'T') { ?>
                                    <td class="text-center"><?= $ps['sisa']; ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($ps['StatusBB'] == 'Y') {
                                            echo '<span class="badge badge-success">Avaliable</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Not Avaliable</span>';
                                        } ?></td>
                                </tr>
                            <?php } else {
                            echo "<td colspan='2' class='text-center text-success'>Sudah Dikonfirmasi";
                        }
                        ?>
                        </tbody>
                    <?php
                } ?>
                </table>
                <p align="right">
                    <a href="<?= base_url('pesanan'); ?>"><button type="button" class="btn btn-secondary text-center">Back</button></a>
                    <?php
                    if ($ps['StatusPesanan'] == 'T') { ?>
                        <a href="<?= base_url('pesanan/konfirmasipesanan'); ?>/<?= $ps['IdPesanan']; ?>/<?= $pegawai['IdPeg']; ?>"><button type="button" class="btn btn-primary">Confirmation</button></a>
                    <?php
                } else { ?>
                        <a href="<?= base_url('pesanan/batalkanpesanan'); ?>/<?= $ps['IdPesanan']; ?>/<?= $pegawai['IdPeg']; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                    <?php
                } ?>
                </p>
            </div>
        </div>
    </div>