<?php
require 'controller/PostController.php';
require 'controller/CommentController.php';
require 'controller/ContactController.php';
require 'controller/BackendController.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = new PostController();
            $post->post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $comment = new CommentController();
                $comment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } elseif ($_GET['action'] == 'showContactPage') {
        $message = new ContactController();
        $message->showContactPage();
    } elseif ($_GET['action'] == 'addMessage') {
        // if (isset($_GET['id']) && $_GET['id'] > 0 || null) {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
            $message = new ContactController();
            $message->addMessage($_POST['name'], $_POST['email'], $_POST['message']);
        } else {
            echo 'Fill in the form please';
        }
        // }
    }
    // elseif ($_GET['action'] == 'onecomment') {
    //     if (isset($_GET['id']) && $_GET['id'] > 0) {
    //         $comment = new CommentController();
    //         $comment->oneComment($_GET['post'], $_GET['id']);
    //     }
    // } elseif ($_GET['action'] == 'update') {
    //     $comment = new CommentController();
    //     $comment->updateActionComment($_POST['author'], $_POST['comment'], $_POST['postId'], $_POST['id']);
    // }
} else {
    $post = new PostController();
    $post->listPosts();
}
