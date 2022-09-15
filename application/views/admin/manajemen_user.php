<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Pengguna</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Manajemen Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tampil_pengguna as $tp) :
                                    $status = 'Terverifikasi';
                                    if ($tp['is_verification'] == 0) {
                                        $status = 'Belum terverifikasi';
                                    } ?>

                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $tp['username']; ?></td>
                                        <td><?= $tp['email']; ?></td>
                                        <td><?= $status ?></td>
                                        <td>
                                            <?php if ($tp['is_verification'] == 0) { ?>
                                                <button href="<?= base_url(); ?>admin/verification/<?= $tp['id']; ?>" data-toggle="modal" data-target="#verif<?= $tp['id']; ?>" class=" btn btn-warning btn-sm"><i class="fas fa-window-close"></i></button>
                                            <?php } else if ($tp['is_verification'] == 1) { ?>
                                                <button href="<?= base_url(); ?>admin/unverification/<?= $tp['id']; ?>" data-toggle="modal" data-target="#unverif<?= $tp['id']; ?>" class=" btn btn-success btn-sm"><i class="fas fa-check-square"></i></button>
                                            <?php } else {
                                                echo '<button type="button" class="btn btn-warning btn-sm"><i class="fas fa-window-close"></i></button>';
                                            } ?>

                                            <button href="<?= base_url('admin/userdel/' . $tp['id']); ?>" data-toggle="modal" data-target="#hap<?= $tp['id']; ?>" class=" btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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


    <!-- verifikasi Modal-->
    <?php foreach ($tampil_pengguna as $tp) : ?>
        <div class="modal fade" id="verif<?= $tp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin memverifikasi?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url(); ?>admin/verification/<?= $tp['id']; ?>" method="post">
                            <p>Apakah anda yakin ingin memverifikasi <?= $tp['username']; ?>?</p>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Verifikasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- unverifikasi Modal-->
    <?php foreach ($tampil_pengguna as $tp) : ?>
        <div class="modal fade" id="unverif<?= $tp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin tidak memverifikasi?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url(); ?>admin/unverification/<?= $tp['id']; ?>" method="post">
                            <p>Apakah anda yakin ingin tidak memverifikasi <?= $tp['username']; ?>?</p>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Verifikasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- hapus Modal-->
    <?php foreach ($tampil_pengguna as $tp) : ?>
        <div class="modal fade" id="hap<?= $tp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url(); ?>admin/hapus_pengguna/<?= $tp['id']; ?>" method="post">
                            <p>Apakah anda yakin ingin menghapus <?= $tp['username'] ?>?</p>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->