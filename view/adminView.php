<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

    <div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                 data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <h2 class="mb-4 mb-md-0"><?= $this->msg ?></h2>
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

    <div class="container">
        <div class="row header-dashboard py-5">
            <div class="col-md-12 text-center">
                <h3>Manage Posts</h3>
                <a href="index.php?action=showAdminCommentsView" class="btn btn-primary">Reported comments</a>
                <a href="index.php?action=createPostView" class="btn btn-primary">Create a post</a>
                <!--                <a href="index.php?action=errorView" class="btn btn-primary">Test Display Error view</a>-->
            </div>
        </div>

        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="case">
                            <div class="row">
                                <?php foreach ($comments as $comment) : ?>
                                    <div class="col-xl-4 col-lg-6 col-md-12 card py-5 card-dashboard">
                                        <div class="text w-100 pl-md-3">
                                            <p class="text-center">Title</p>
                                            <h4 class="text-center">
                                                <?= strip_tags($comment['title']) ?>
                                            </h4>
                                            <p class="text-center">Comments number</p>
                                            <h4 class="text-center">
                                                <?= $comment['nb_comments'] ?>
                                            </h4>
                                            <p class="text-center">Creation date</p>
                                            <h4 class="text-center">
                                                <?= strip_tags($comment['creation_date_fr']) ?>
                                            </h4>
                                            <br>
                                            <p class="text-center">Available options</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>"
                                                   class="btn btn-primary btn-sm mx-2">See</a>
                                                <a href="index.php?action=modifyPostView&amp;id=<?= $comment['post_id'] ?>"
                                                   class="btn btn-warning btn-sm mx-2">Modify</a>
                                                <a href="index.php?action=deletePost&amp;id=<?= $comment['post_id'] ?>"
                                                   class="delete-post btn btn-danger btn-sm mx-2">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>