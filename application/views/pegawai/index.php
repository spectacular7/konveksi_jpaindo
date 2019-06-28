<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Wellcome <?= $pegawai['Nama']; ?></h1>

  <div class="card mb-3" style="maax-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $pegawai['Foto'] ?>" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $pegawai['Nama']; ?></h5>
          <p class="card-text"><?= $pegawai['IdPeg']; ?></p>
          <p class="card-text"><?= $pegawai['Jabatan']; ?></p>
          <p class="card-text"><?= $pegawai['Email']; ?></p>
          <p class="card-text"><?= $pegawai['NoTelp']; ?></p>
          <p class="text-muted">Since : <?= date('d F Y', $pegawai['WaktuDaftar']); ?></p>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->