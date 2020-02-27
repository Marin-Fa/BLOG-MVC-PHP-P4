<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
    <div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                 data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <!-- <h2 class="subheading">Hello! Welcome to</h2> -->
                    <h1 class="mb-4 mb-md-0"><?= htmlspecialchars($post['title']) ?></h1>
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
                    <em>le <?= $post['creation_date_fr'] ?></em>
                    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    <p><a href="index.php">Retour à la liste des billets</a></p>


                    <h3 class="mb-5" id="comments">Comments</h3>
                    <?php
                    while ($comment = $comments->fetch()) {
                    ?>
                    <div class="pt-5 mt-5" id="comment_list">
                        <!-- <h3 class="mb-5">Comments</h3> -->
                        <ul class="comment-list">
                            <li class="comment">
                                <!-- <div class="vcard bio">
                                    <img src="public/images/person_1.jpg" alt="Image placeholder">
                                </div> -->
                                <div class="comment-body">
                                    <h3><?= htmlspecialchars($comment['author']) ?></h3>
                                    <div class="meta mb-3"><?= $comment['comment_date_fr'] ?></div>
                                    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary py-3 px-5" value="Report">
                                    </div>
                                    <!-- <p><a href="#" class="reply">Reply</a></p> -->
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                            <!-- END comment-list -->

                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Leave a comment</h3>

                                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post"
                                      class="p-5 bg-light">
                                    <div class="form-group">
                                        <label for="author">Author</label><br/>
                                        <input type="text" id="author" name="author"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comment</label><br/>
                                        <textarea name="comment" id="comment" cols="30" rows="10"
                                                  class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                    </div>

                                </form>
                            </div>


                            <form action="controller/ImageController.php" method="post" enctype="multipart/form-data">
                                Select image to upload:
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>

                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>