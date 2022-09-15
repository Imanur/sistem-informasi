<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemetaan Pertanyaan</h1>
    </div>
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-6 pb-3">
            <button type="button" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary"><i class="fas fa-plus"> Tambah Pertanyaan</i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Pemetaan Pertanyaan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Total Gejala</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tampil_pertanyaan as $tp) : ?>

                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $tp['gejala']; ?></td>
                                        <td><?= $tp['pertanyaan']; ?></td>
                                        <td><?= $tp['total_gejala']; ?></td>
                                        <td>
                                            <a href="<?= base_url('pertanyaan/pertanyaan_detail'); ?>/<?= $tp['id'] ?>" class=" btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('pertanyaan/ubah_pertanyaan'); ?>/<?= $tp['id'] ?>" data-toggle="modal" data-target="#ubah<?= $tp['id'] ?>" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('pertanyaan/hapus_pertanyaan'); ?>/<?= $tp['id'] ?>" data-toggle="modal" data-target="#hapus<?= $tp['id'] ?>" class=" btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                    <form action="<?= base_url('pertanyaan/tambah_pertanyaan'); ?>" method="post">

                        <div class="form-group row">
                            <label for="parent" class="col-sm-2 col-form-label">Parent</label>
                            <div class="col-sm-10">
                                <?= form_dropdown('parent', $pilihan_gejala, '', ' class="form-control" id="parent"') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_last" id="is_last" value="1"> Is Last Question
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ubah Modal-->
    <?php foreach ($tampil_pertanyaan as $tp) : ?>
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
                        <form action="<?= base_url('pertanyaan/ubah_pertanyaan/' . $tp['id']); ?>" method="post">

                            <div class="form-group row">
                                <label for="parent" class="col-sm-2 col-form-label">Parent</label>
                                <div class="col-sm-10">
                                    <?= form_dropdown("parent", $pilihan_gejala, $tp['parent'], " class='form-control' id='parent'") ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan"><?= $tp['pertanyaan']; ?></textarea>
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

    <!-- hapus Modal-->
    <?php foreach ($tampil_pertanyaan as $tp) : ?>
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
                        <form action="<?= base_url('pertanyaan/hapus_pertanyaan/' . $tp['id']); ?>" method="post">

                            <p>Apakah anda yakin ingin menghapus <?= $tp['parent']; ?> dan <?= $tp['pertanyaan']; ?>?</p>

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