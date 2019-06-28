<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p align="right"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?= $this->session->flashdata('message'); ?>
        <nav class="navbar navbar-light bg-light">
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
        </nav>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Order identity</th>
                            <th>Order Date</th>
                            <th>Description</th>
                            <th>Total price</th>
                            <th>Order status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($dpesanan as $ps) { ?>
                        <tbody>
                            <tr>
                                <td><?= $ps['IdDPesanan']; ?></td>
                                <td class="text-center"><?= $ps['Jumlah']; ?></td>
                                <td><?= $ps['SubTotal']; ?></td>
                                <td><?= $ps['IdPesanan']; ?></td>
                                <td><?= $ps['KdBarang']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-circle btn-sm editdp" data-toggle="modal" data-target="#ModalBukti1" data-jml="<?= $ps['Jumlah']; ?>" data-idp="<?= $ps['IdDPesanan']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-circle btn-sm hapusdpsnn" data-id="<?= $ps['IdDPesanan']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
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