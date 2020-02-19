<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <!-- <h2 class="subheading">Hello! Welcome to</h2> -->
                <h1 class="mb-4 mb-md-0"><?= $this->msg ?></h1>
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

<form action="" method="post" class="p-5 bg-light">
    <div class="form-group">
        <label for="adminform">Comment</label><br />
        <textarea name="adminform" id="adminform" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Post a post" class="btn py-3 px-4 btn-primary">
    </div>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>