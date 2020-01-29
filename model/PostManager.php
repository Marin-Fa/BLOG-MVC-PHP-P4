<?php
require_once 'model/Manager.php';
class PostManager extends Manager
// MODEL
// Regroupe toutes les fontions des posts
{
    // Afficher tous les billets FRONTPAGE
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        $posts = [];
        while ($post = $req->fetch()) {
            $postAttr = [
                'id' => $post['id'],
                'title' => $post['title'],
                'content' => $post['content'],
                'creation_date' => $post['creation_date'],
            ];
            $posts[] = new Post($postAttr);
        }

        return $posts;
        var_dump($posts);
    }
    // Afficher 1 seul billet
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        $postAttr = [
            'id' => $post['id'],
            'title' => $post['title'],
            'content' => $post['content'],
            'creation_date' => $post['creation_date'],
        ];
        $post = new Post($postAttr);

        return $post;
    }
}
