<?php
require 'controller/PostController.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $post = new PostController();
        var_dump($post);
        $post->listPosts();
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = new PostController();
            $post->post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
} else {
    echo 'Erreur';
}
