<?php

namespace Blog\model;

use Blog\model\Post;

class PostManager extends Manager
{
    // SELECT all posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        $posts = new Post();
        return $req;
    }
    // SELECT one post
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    // UPDATE a post
    public function updatePost($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $updatePost = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $updatePost->execute(array($title, $content, $postId));
    }
    // DELETE a post
    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $deletePost = $db->prepare('DELETE FROM p4_posts WHERE post_id = ?');
        $deletePost->execute(array($postId));
    }
}
