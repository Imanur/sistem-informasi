<form action="<?= base_url('identifikasi/tambah'); ?>" method="post" class="pb-3">
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-4">
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default select example">
                <option value="">-Pilih Jenis Kelamin-</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-4">
            <input type="text" class="form-select datepicker" id="tgl_lahir" name="tgl_lahir" autocomplete="off">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Mulai</button>
        </div>
    </div>
</form>