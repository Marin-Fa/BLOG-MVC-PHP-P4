<?php $title = 'Error'; ?>

<?php ob_start(); ?>

<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');"
     data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
             data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h2 class="mb-4 mb-md-0"><?= 'Error' ?></h2>
                <p><?= $this->p ?></p>
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

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
