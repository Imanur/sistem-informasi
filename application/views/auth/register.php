<div class="login-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url(); ?>/assets/img/undraw_remotely.svg" alt="Image" class="img-fluid mt-5">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3 class="mt-5">Silahkan Mendaftar</h3>
                        </div>

                        <?= $this->session->flashdata('message'); ?>

                        <form action="<?= base_url('auth/register'); ?>" method="post">


                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>" autocomplete="off" autofocus>
                            </div>

                            <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" autocomplete="off">
                            </div>


                            <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                            </div>

                            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>

                            <div class="form-group last mb-3">
                                <label for="rpassword">Repeat Password</label>
                                <input type="password" class="form-control" id="rpassword" name="rpassword" autocomplete="off">
                            </div>

                            <?= form_error('rpassword', '<small class="text-danger pl-2">', '</small>'); ?>

                            <input type="submit" value="Daftar" class="btn login btn-block btn-success">
                        </form>
                        <br>
                        <form action="<?= base_url('auth/login'); ?>">
                            <input type="submit" value="Masuk" class="btn login btn-block btn-primary">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>