<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Identifikasi Penyakit</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
                </div>
                <div class="card-body">

                    <body class="tubuh">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <form action="#" method="post" class="f1">
                                        <div class="f1-steps">
                                            <div class="f1-progress">
                                                <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
                                            </div>
                                            <div class="f1-step active">
                                                <div class="f1-step-icon"><i class="fas fa-user"></i></div>
                                                <p>Biodata</p>
                                            </div>
                                            <div class="f1-step">
                                                <div class="f1-step-icon"><i class="fas fa-home"></i></div>
                                                <p>Alamat</p>
                                            </div>
                                            <div class="f1-step">
                                                <div class="f1-step-icon"><i class="fas fa-key"></i></div>
                                                <p>Akun</p>
                                            </div>
                                            <div class="f1-step">
                                                <div class="f1-step-icon"><i class="fas fa-address-book"></i></div>
                                                <p>Sosial</p>
                                            </div>
                                        </div>

                                        <!-- step 1 -->
                                        <fieldset>
                                            <h4 class="mb-4"></h4>
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="nama_awal" placeholder="Nama Lengkap" class="form-control" autocomplete="off" autofocus>
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
                                                <button type="button" class="btn btn-primary btn-next">Lanjut</button>
                                            </div>
                                        </fieldset>

                                        <!-- step 2 -->
                                        <fieldset>
                                            <h4 class="mb-4"></h4>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Rumah</label>
                                                <input type="text" name="alamat_rumah" placeholder="Alamat Rumah" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Kantor</label>
                                                <textarea name="alamat_kantor" placeholder="Alamat Kantor" class="form-control" autocomplete="off"></textarea>
                                            </div>
                                            <div class="f1-buttons">
                                                <button type="button" class="btn btn-warning btn-previous">Kembali</button>
                                                <button type="button" class="btn btn-primary btn-next">Lanjut</button>
                                            </div>
                                        </fieldset>

                                        <!-- step 3 -->
                                        <fieldset>
                                            <h4 class="mb-4"></h4>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email" class="form-control" autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Ulangi password</label>
                                                <input type="password" name="ulangi_password" placeholder="Ulangi password" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="f1-buttons">
                                                <button type="button" class="btn btn-warning btn-previous">Kembali</button>
                                                <button type="button" class="btn btn-primary btn-next">Lanjut</button>
                                            </div>
                                        </fieldset>

                                        <!-- step 4 -->
                                        <fieldset>
                                            <h4 class="mb-4"></h4>
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook" placeholder="Facebook" class="form-control" autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" placeholder="Twitter" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Google plus</label>
                                                <input type="text" name="google_plus" placeholder="Google plus" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="f1-buttons">
                                                <button type="button" class="btn btn-warning btn-previous">Kembali</button>
                                                <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->