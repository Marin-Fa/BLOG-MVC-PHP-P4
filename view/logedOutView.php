<?php $title = 'Logout'; ?>

<?php ob_start(); ?>
<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <?php if ($this->msg) : ?>
                    <h1 id="contact_header" class="mb-4 mb-md-0"><?= $this->msg ?></h1>
                <?php endif ?>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <div class="mouse">
                                <a href="#" class="mouse-icon">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="text text-center">
                <h2><a href="index.php">Back to my posts</a></h2>

            </div>

        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>