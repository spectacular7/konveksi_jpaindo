<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pemesan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?= $this->session->flashdata('message'); ?>

        <!-- <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"><small>Show
                    <select class="custom-select mr-sm-2 col-6">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="0">All</option>
                    </select>
                    Entries</small></a>
            <form class="form-inline">
                Search :
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav> -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten Atau Kota</th>
                            <th>No telp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemesan as $ps) { ?>
                            <tr>
                                <td><?= $ps['IdPemesan']; ?></td>
                                <td><?= $ps['Nama']; ?></td>
                                <td><?= $ps['Alamat']; ?></td>
                                <td><?= $ps['Desa']; ?></td>
                                <td><?= $ps['Kecamatan']; ?></td>
                                <td><?= $ps['KabOrKota']; ?></td>
                                <td><?= $ps['NoTelp']; ?></td>
                                <td><?= $ps['Email']; ?></td>
                                <td>
                                    <button class="btn btn-primary btn-circle btn-sm editdp" data-toggle="modal" data-target="#ModalBukti1" data-jml="" data-idp="">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-circle btn-sm hapusdpsnn" data-toggle="modal" data-target="#ModalBukti1" data-idp="">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal 1-->
    <div class="modal fade" id="ModalBukti1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukti1">Batalkan konfirmasi pembayaran pesanan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form id="editdpesan" method="post" action="">
                </div>
                <div class="modal-body">
                    <div class="form-group" id="body">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="" id="tblmdlbkt">
                        <button id="btn" type="submit" class="btn btn-primary">Yes</button></form>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
</div>

<!-- End of Main Content -->
</div>