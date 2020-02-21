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

<div class="container">
    <div class="row header-dashboard py-5">
        <div class="col-md-12 text-center">
            <h2>Posts</h2>
            <a href="" class="btn btn-primary">Manage comments</a>
            <a href="" class="btn btn-primary">Create a post</a>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="case">
                        <div class="row">
                            <?php
                            while ($data = $posts->fetch()) {
                            ?>
                                <div class="col-xl-4 col-lg-6 col-md-12 card py-5 card-dashboard">
                                    <div class="text w-100 pl-md-3">
                                        <h3 class="text-center">
                                            Title
                                        </h3>
                                        <p class="text-center">
                                            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                                        </p>
                                        <h3 class="text-center">
                                            Comments number
                                        </h3>
                                        <p class="text-center">
                                            <?= $posts->getNbComments() ?>
                                        </p>
                                        <h3 class="text-center">
                                            Creation date
                                        </h3>
                                        <p class="text-center">
                                            <?= strip_tags($posts->getCreationDate('d-m-Y')) ?>
                                        </p>
                                        <h3 class="text-center">
                                            Available options
                                        </h3>
                                        <div class="d-flex justify-content-center">
                                            <a href="index.php?p=post-admin&id=<?= $posts->getId() ?>" class="btn btn-primary btn-sm mx-2">See</a>
                                            <a href="index.php?p=post-edit&id=<?= $posts->getId() ?>" class="btn btn-warning btn-sm mx-2">Modify</a>
                                            <a href="index.php?p=post-delete&id=<?= $posts->getId() ?>" class="delete-post btn btn-danger btn-sm mx-2">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            $posts->closeCursor();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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