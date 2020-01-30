<?php $title = 'Contact'; ?>

<?php ob_start(); ?>
<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-2.jpg');" data-stellar-background-ratio="0.5">
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

<section class="ftco-section contact-section">
    <div class="container">
        <div class="col-md-12 text-center">
            <form action="index.php?action=addMessage" method="post" class="bg-light p-4 p-md-5 contact-form">
                <div class="form-group">
                    <label for="name" type="hidden"></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email" type="hidden"></label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label for="message" type="hidden"></label>
                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Send Message" id="send_message" class="btn btn-primary py-3 px-5">
                </div>
            </form>


        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>