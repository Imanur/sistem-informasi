<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Identifikasi Penyakit Kulit</h1>
    </div>
    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Identifikasi Penyakit Kulit</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Gejala Penyakit</th>
                                    <th scope="col">Penyakit Kulit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($history_identifikasi as $hi) : ?>
                                    <tr>
                                        <th scope="col"><?= $no++; ?></th>
                                        <td><?= $hi['nama']; ?></td>
                                        <td><?= $hi['jenis_kelamin']; ?></td>
                                        <td><?= $hi['usia']; ?></td>
                                        <td><?= $hi['kategori']; ?></td>
                                        <td><?= $hi['gejala']; ?></td>
                                        <td><?= $hi['penyakit']; ?> / <?= $hi['alias']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->