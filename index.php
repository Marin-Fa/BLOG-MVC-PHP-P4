<?php

require_once 'Autoloader.php';

use Blog\Autoloader;

use Blog\controller\{
    PostController,
    CommentController,
    ContactController,
    RegisterController
};

Autoloader::register();
session_start();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'post') {
        $post = new PostController();
        $post->post();
    } elseif ($_GET['action'] == 'addComment') {
        $comment = new CommentController();
        $comment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
    } elseif ($_GET['action'] == 'showContactPage') {
        $message = new ContactController();
        $message->showContactPage();
    } elseif ($_GET['action'] == 'addMessage') {
        $message = new ContactController();
        $message->addMessage($_POST['name'], $_POST['email'], $_POST['message']);
    } elseif ($_GET['action'] == 'showRegisterPage') {
        $user = new RegisterController();
        $user->showRegisterPage();
    } elseif ($_GET['action'] == 'addNewUser') {
        $user = new RegisterController();
        $user->addNewUser($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'showLoginPage') {
        $view = new RegisterController();
        $view->showLoginPage();
    } elseif ($_GET['action'] == 'login') {
        $userSelected = new RegisterController();
        $userSelected->login($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'welcome') {
        $userLogedIn = new RegisterController();
        $userLogedIn->welcome($_POST['username']);
    } elseif ($_GET['action'] == 'getUsername') {
        // $username = new PostController();
        // $username->getUsername($_GET['username']);
        // var_dump($_GET['username']);
    } elseif ($_GET['action'] == 'logOut') {
        $session = new RegisterController();
        $session->logOut();
    }
} else {
    $post = new PostController();
    $post->listPosts();
    // elseif ($_GET['action'] == 'onecomment') {
    //     if (isset($_GET['id']) && $_GET['id'] > 0) {
    //         $comment = new CommentController();
    //         $comment->oneComment($_GET['post'], $_GET['id']);
    //     }
    // } elseif ($_GET['action'] == 'update') {
    //     $comment = new CommentController();
    //     $comment->updateActionComment($_POST['author'], $_POST['comment'], $_POST['postId'], $_POST['id']);
    // }
    // } else {
    //     $post = new PostController();
    //     $post->listPosts();
}
