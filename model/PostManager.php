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
//        $posts = new Post();
        return $req;
    }

    // SELECT one post
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute([$postId]);
        $post = $req->fetch();

        return $post;
    }

    public function createPost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date, id) 
            VALUES (?,?,NOW(), ?)');
        $newPost = $req->execute([$post->getTitle(), $post->getContent(),
            $post->getCreationDate(), $post->getId()]);

        return $newPost;
    }

    // UPDATE a post
    public function updatePost($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $updatePost = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $updatePost->execute([$title, $content, $postId]);
    }

    // DELETE a post
    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $deletePost = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletePost->execute([$postId]);
    }
}
