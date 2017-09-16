<?php

class CommentModel extends Model {

    //select article id
    public function articleId() {
        $articleTitle = $_GET['title'];
        $sqlArticle = "SELECT * FROM article WHERE title = :title";
        $this->query($sqlArticle);
        $this->bind(':title', $articleTitle);
        return $this->fetchSingle();
    }

    //insert a comment from a user
    public function insertComment() {
        $article = $this->articleId();
        $articleId  = $article['id'];
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $sql = "INSERT INTO comments(author, comment, article_id) 
        VALUES(:author, :comment, :article_id)";
        $this->query($sql);
        $this->bind(':author', $username);
        $this->bind(':comment', $comment);
        $this->bind(':article_id', $articleId);
        $this->execute(); 
    }

    //select comments 
    public function selectComments() {
        $article = $this->articleId();
        $articleId  = $article['id'];
        $sql = "SELECT * FROM comments WHERE article_id = :article_id";
        $this->query($sql);
        $this->bind(':article_id', $articleId);
        return $this->fetchAll();
    }

}


















