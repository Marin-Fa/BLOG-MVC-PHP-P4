<?php $title = 'Manage Comments'; ?>

<?php ob_start(); ?>

<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');"
     data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
             data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
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

<div class="container">
    <div class="row header-dashboard py-5">
        <div class="col-md-12 text-center">
            <h2>Manage Posts</h2>
            <a href="index.php?action=showAdminPanel" class="btn btn-primary">Manage posts</a>
            <a href="index.php?action=createPostView" class="btn btn-primary">Create a post</a>
            <a href="index.php?action=errorView" class="btn btn-primary">Test Display Error view</a>
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
                                        <p class="text-center">Author</p>
                                        <h3 class="text-center">
                                            <?= strip_tags($comment['author']) ?>
                                        </h3>
                                        <p class="text-center">Content</p>
                                        <h3 class="text-center">
                                            <?= $comment['comment'] ?>
                                        </h3>
                                        <p class="text-center">Creation date</p>
                                        <h3 class="text-center">
                                            <?= strip_tags($comment['comment_date_fr']) ?>
                                        </h3>
                                        <p class="text-center">Post ID</p>
                                        <h3 class="text-center">
                                            <?= $comment['post_id'] ?>
                                        </h3>
                                        <p class="text-center">Status</p>
                                        <h3 class="text-center">
                                            <?= $comment['status'] ?>
                                        </h3>
                                        <br>
                                        <p class="text-center">Available options</p>
                                        <div class="d-flex justify-content-center">
                                            <a href="index.php?action=supComment&amp;id=<?= $comment['id'] ?>"
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
