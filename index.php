<?php

require_once 'Autoloader.php';

use Blog\Autoloader;

use Blog\controller\{
    PostController,
    CommentController,
    ContactController,
    UserController
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
        $user = new UserController();
        $user->showRegisterPage();
    } elseif ($_GET['action'] == 'addNewUser') {
        $user = new UserController();
        $user->addNewUser($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'showLoginPage') {
        $view = new UserController();
        $view->showLoginPage();
    } elseif ($_GET['action'] == 'welcome') {
        $userLogedIn = new UserController();
        $userLogedIn->welcome($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'logOut') {
        $session = new UserController();
        $session->logOut();
    } elseif ($_GET['action'] == 'showAdminPanel') {
        $admin = new UserController();
        $admin->showAdminPanel($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'showLoginAdminPanel') {
        $admin = new UserController();
        $admin->showLoginAdminPanel();
    }
} else {
    $post = new PostController();
    $post->listPosts();
}
