<?php $title = 'Register'; ?>

<?php ob_start(); ?>
    <div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                 data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <?php if ($this->msg) : ?>
                        <h2 id="contact_header" class="mb-4 mb-md-0"><?= $this->msg ?></h2>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text">
                                <div class="mouse">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section scroll-to">
        <div class="container col-md-4">
            <p>Please fill this form to create an account.</p>
            <form action="index.php?action=addNewUser" method="post" class="bg-light p-4 p-md-5 contact-form">
                <div class="form-group <?= $this->username_err ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $this->username; ?>">
                    <span class="help-block"><?= $this->username_err; ?></span>
                </div>
                <div class="form-group <?= $this->password_err ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?= $this->password; ?>">
                    <span class="help-block"><?= $this->password_err; ?></span>
                </div>
                <div class="form-group <?= $this->confirm_password_err ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control"
                           value="<?= $this->confirm_password; ?>">
                    <span class="help-block"><?= $this->confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary py-3 px-5" value="submit" name="submit">
                    <input type="reset" class="btn btn-primary py-3 px-5" value="Reset">
                </div>
                <p>Already have an account? <a href="index.php?action=showLoginPage">Login here</a>.</p>
            </form>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>