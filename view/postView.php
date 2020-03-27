<!--         Display a post          -->
<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');"
     data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
             data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h2 class="mb-4 mb-md-0"><?= htmlspecialchars($post['title']) ?></h2>
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


<section class="ftco-section scroll-to">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ftco-animate">
                <em>le <?= $post['creation_date_fr'] ?></em>
                <p><?= $post['content'] ?></p>
                <p><a href="index.php">Go back to list posts</a></p>
                <!--         Display all comments           -->
                <h3 class="mb-5" id="comments">Comments</h3>
                <?php
                while ($comment = $comments->fetch()) {
                    ?>
                    <div class="pt-5 mt-5" id="comment_list">
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="comment-body">
                                    <h3><?= htmlspecialchars($comment['author']) ?></h3>
                                    <div class="meta mb-3"><?= $comment['comment_date_fr'] ?></div>
                                    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                                    <div class="form-group">
                                        <a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>"
                                           class="btn btn-primary">Report</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
                <!--         Add Comment Form           -->
                <?php if (isset($_SESSION['username']) and !empty($_SESSION['username'])) : ?>
                    <div class="comment-form-wrap pt-5">
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post"
                              class="p-5 bg-light">
                            <div class="form-group">

                                <label for="author">Author</label><br/>
                                <input type="text" id="author" name="author"
                                       value="<?= $_SESSION['username'] ?>" readonly="readonly">
                            </div>
                            <div class="form-group <?= $this->comment_err ? 'has-error' : ''; ?>">
                                <label for="comment">Comment</label><br/>
                                <textarea name="comment" id="comment" cols="30" rows="10"
                                          class="form-control"></textarea>
                                <span class="help-block"><?= $this->comment_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit"
                                       class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                    </div>
                <?php else : ?>
                    <br>
                    <h4 class="mb-5"><?= $this->info ?></h4>
                <?php endif ?>

            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>