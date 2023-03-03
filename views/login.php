<section class="section">

    <div class="container">


        <div class="row" style="margin-top: 10rem">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">


                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/login') ?>" method="POST" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan isi username anda.
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                                <div class="invalid-feedback">
                                    Silahkan isi kata sandi anda.
                                </div>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>