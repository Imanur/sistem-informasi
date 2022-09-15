<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Identifikasi Penyakit Kulit</h1>
    </div>
    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Identifikasi Penyakit Kulit</h6>
                </div>
                <div class="card-body">

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Nama Lengkap : <?= $tp['nama']; ?></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Jenis Kelamin : <?= $tp['jenis_kelamin']; ?></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Usia : <?= $tp['usia']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $data        = $arr_data;
                    $question    = $data['parent'];
                    $dt_gejala   = $data['dt_gejala'];
                    if ($question) {
                    ?>

                        <form action="<?= base_url('user/tambah_pertanyaan'); ?>" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_pertanyaan" value="<?= $question['id']; ?>">
                                <h2><?= $question['pertanyaan']; ?></h2>
                                <input type="hidden" name="id_identifikasi" value="<?= $id_identifikasi; ?>">
                            </div>
                            <div class="form-group" style="font-size: 14pt;">
                                <?php foreach ($dt_gejala as $dg) : ?>
                                    <div class="col-lg-12">
                                        <input type="radio" name="kode_gejala" value="<?= $dg['kode_gejala']; ?>">
                                        <label for=""><?= $dg['gejala']; ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Lanjut</button>

                        </form>
                    <?php }

                    if ($hasil) {
                        echo '
                            <div class="row">
                                <div class="col-md-12">';
                        echo isset($hasil['hasil']) ? $hasil['hasil'] : '';
                        echo '</div>
                            </div>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->