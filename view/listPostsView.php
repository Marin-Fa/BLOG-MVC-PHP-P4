<?php $title = 'Single ticket for Alaska'; ?>

<?php ob_start(); ?>
<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <!-- <h2 class="subheading">Hello! Welcome to</h2> -->
                <h1 class="mb-4 mb-md-0">Jean Forteroche</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <p>Far far away, behind the mountains, far from the industrial wolrd, lives the peacefull place in the world.</p>
                            <div class="mouse">
                                <a href="" class="mouse-icon">
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


<?php
while ($data = $posts->fetch()) {
?>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="case">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="img w-100 mb-3 mb-md-0" style="background-image: url(public/images/alaska-3.jpg);"></a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                                <div class="text w-100 pl-md-3">
                                    <h2><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h2>
                                    <p>
                                        <?= substr(nl2br(htmlspecialchars($data['content'])), 0, 150) ?>
                                        <br />
                                        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Comments</a></em>
                                    </p>
                                    <ul class="media-social list-unstyled">
                                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                    </ul>
                                    <div class="meta">
                                        <p class="mb-0"><a href="#"><em>le <?= $data['creation_date_fr'] ?></em></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>