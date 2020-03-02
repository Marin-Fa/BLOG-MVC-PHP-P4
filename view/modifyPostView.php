<?php $title = 'Modify a post'; ?>

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

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ftco-animate">
                    <form action="index.php?action=modifyPost&amp;id=<?= $post['id'] ?>" method="post"
                          class="p-5 bg-light">
                        <div class="form-group">
                            <label for="title">Title</label><br/>
                            <input type="text" name="title" id="title" cols="30" rows="10"
                                   class="form-control text-center" value="<?= $post['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="adminform">Content</label><br/>
                            <textarea type="text" name="content" id="adminform" cols="160" rows="30"
                                      class="form-control"><?= $post['content'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post" class="btn py-3 px-4 btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>