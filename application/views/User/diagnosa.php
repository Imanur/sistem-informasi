<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Diagnosa Penyakit Kulit</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lengkapi Data Diri</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('user/tambah'); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default select example">
                                <option value="">-Pilih Jenis Kelamin-</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-select datepicker" placeholder="Tanggal Lahir" id="tgl_lahir" name="tgl_lahir" autocomplete="off">
                        </div>
                        <div class="f1-buttons">
                            <button type="submit" class="btn btn-primary btn-next">Lanjut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->