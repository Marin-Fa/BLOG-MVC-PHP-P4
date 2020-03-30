<?php

namespace Blog\model;

use Blog\model\Post;

class PostManager extends Manager
{
    /**
     * Get all posts
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 10');
        return $req;
    }
    /**
     * Get one specific post
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute([$postId]);
        $post = $req->fetch();
        return $post;
    }
    /**
     * Create a a post
     */
    public function createPost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date, picture) VALUES (?,?,NOW(),?)');
        $req->execute([
            $post->getTitle(),
            $post->getContent(),
            $post->getPicture()
        ]);
        return $req;
    }
    /**
     * Update a post
     */
    public function updatePost($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $updatePost = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $updatePost->execute([$title, $content, $postId]);
    }
    /**
     * Delete a post
     */
    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $deletePost = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletePost->execute([$postId]);
    }
}
