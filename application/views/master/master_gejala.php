<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gejala Penyakit Kulit</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 pb-3">
            <button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-primary"><i class="fas fa-plus"> Tambah Gejala</i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Gejala Penyakit Kulit</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Gejala</th>
                                    <th scope="col">Gejala Penyakit Kulit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tampil_gejala as $tg) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $tg['kode']; ?></td>
                                        <td><?= $tg['gejala']; ?></td>
                                        <td>
                                            <button type="submit" href="<?= base_url('gejala/ubah_gejala/' . $tg['id']); ?>" data-toggle="modal" data-target="#ubah<?= $tg['id']; ?>" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <button href="<?= base_url('gejala/hapus_gejala/' . $tg['id']); ?>" data-toggle="modal" data-target="#hapus<?= $tg['id']; ?>" class=" btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>

                                            <!-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> -->
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
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('gejala/tambah_gejala'); ?>" method="post">

                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode" name="kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="gejala" name="gejala">
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
    <?php foreach ($tampil_gejala as $tg) : ?>
        <div class="modal fade" id="ubah<?= $tg['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('gejala/ubah_gejala/' . $tg['id']); ?>" method="post">

                            <div class="form-group row">
                                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $tg['kode']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="gejala" name="gejala" value="<?= $tg['gejala']; ?>">
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
    <?php foreach ($tampil_gejala as $tg) : ?>
        <div class="modal fade" id="hapus<?= $tg['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('gejala/hapus_gejala/' . $tg['id']); ?>" method="post">

                            <p>Apakah anda yakin ingin menghapus <?= $tg['kode']; ?> dan <?= $tg['gejala']; ?>?</p>
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