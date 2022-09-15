<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pertanyaan Detail</h1>
    </div>
    <!-- Content Row -->

    <div class="row">
        <div class="pb-4">
            <a href="<?= base_url('pertanyaan'); ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Pertanyaan Detail</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pertanyaan/tambah_gejala_pertanyaan_detail'); ?>" method="post" class="pb-3">
                        <div class="form-group row">
                            <label for="gejala" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-8">
                                <input type="hidden" id="id_pertanyaan" name="id_pertanyaan" value="<?= $pd['id']; ?>">
                                <input type="text" class="form-control" value="<?= $pd['pertanyaan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Gejala</label>
                            <div class="col-sm-8">
                                <?= form_dropdown('kode_gejala', $pilihan_gejala, '', ' class="form-select" id="kode_gejala"') ?>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="display table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Gejala</th>
                                    <th scope="col">Gejala</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tampil_kode_gejala as $tkg) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $tkg['kode_gejala']; ?></td>
                                        <td><?= $tkg['gejala']; ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#hapus<?= $tkg['id']; ?>" class=" btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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

    <!-- Hapus Modal-->
    <?php foreach ($tampil_kode_gejala as $tkg) : ?>
        <div class="modal fade" id="hapus<?= $tkg['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('pertanyaan/hapus_gejala_pertanyaan_detail/' .  $tkg['id']); ?>" method="post">
                            <p>Apakah anda yakin ingin menghapus <?= $tkg['kode_gejala']; ?> dan gejala <?= $tkg['gejala']; ?> ?</p>
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