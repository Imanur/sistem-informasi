<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penyakit Kulit</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 pb-3">
            <button type="button" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary"><i class="fas fa-plus"> Tambah Penyakit</i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>


    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Penyakit Kulit</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Penyakit</th>
                                    <th scope="col">Penyakit Kulit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tampil_penyakit as $tp) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $tp['kode']; ?></td>
                                        <td><?= $tp['penyakit']; ?></td>
                                        <td>
                                            <button type="submit" href="<?= base_url('penyakit/ubah_penyakit/' . $tp['id']); ?>" data-toggle="modal" data-target="#ubah<?= $tp['id']; ?>" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <button href="<?= base_url('penyakit/hapus_penyakit/' . $tp['id']); ?>" data-toggle="modal" data-target="#hapus<?= $tp['id']; ?>" class=" btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Create Modal-->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/penyakit/tambah_penyakit'); ?>" method="post">

                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode" name="kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penyakit" class="col-sm-2 col-form-label">penyakit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penyakit" name="penyakit">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit Modal-->
    <?php foreach ($tampil_penyakit as $tp) : ?>
        <div class="modal fade" id="ubah<?= $tp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('penyakit/ubah_penyakit/' . $tp['id']); ?>" method="post">

                            <div class="form-group row">
                                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $tp['kode']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penyakit" class="col-sm-2 col-form-label">Penyakit</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penyakit" name="penyakit" value="<?= $tp['penyakit']; ?>">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Hapus Modal-->
    <?php foreach ($tampil_penyakit as $tp) : ?>
        <div class="modal fade" id="hapus<?= $tp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('penyakit/hapus_penyakit/' . $tp['id']); ?>" method="post">

                            <p>Apakah anda yakin ingin menghapus <?= $tp['kode']; ?> dan <?= $tp['penyakit']; ?>?</p>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>