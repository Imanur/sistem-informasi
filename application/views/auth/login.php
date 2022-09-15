<main id="main">

    <div class="login-content">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>/assets/img/undraw_login.svg" alt="Image" class="img-fluid mt-5">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3 class="mt-5">Silahkan Masuk</h3>
                            </div>

                            <?= $this->session->flashdata('message'); ?>

                            <form action="<?= base_url('auth/login'); ?>" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="username" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>" autocomplete="off" autofocus>
                                </div>
                                <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                                <input type="submit" value="Masuk" class="btn login btn-block btn-primary">
                            </form>
                            <br>
                            <form action="<?= base_url('auth/register'); ?>">
                                <input type="submit" value="Daftar" class="btn login btn-block btn-success">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</main><!-- End #main -->