<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">


                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Ubah Password</h4>
                        <div>
                            <a href="<?php echo url('dashboard') ?>" class="btn btn-primary">
                                <span>Back</span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/user/change') ?>" method="POST">

                            <input type="hidden" name="id" value="<?php echo $id ?>">

                            <div class="form-group">
                                <label for="password">Password Sebelumnya</label>
                                <input id="password" type="password" class="form-control" name="old_password" tabindex="1" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>