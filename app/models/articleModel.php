<?php

class ArticleModel extends Model {

    //insert an article from the user
    public function insertArticle() {
        $title = $_POST['title'];
        $article = $_POST['article'];
        $author = $_SESSION['username'];
        $category = $_POST['selectCategory'];
        $userId = $_SESSION['id'];
        $sql = "INSERT INTO article (title, article, author, category, user_id) 
        VALUES (:title, :article, :author, :category, :user_id)";
        $this->query($sql);
        $this->bind(':title', $title);
        $this->bind(':article', $article);
        $this->bind(':author', $author);
        $this->bind(':category', $category);
        $this->bind(':user_id', $userId);
        $this->execute();
    }

    //select all articles
    public function getArticles() {
        $sql = "SELECT * FROM article";
        $this->query($sql);
        return $this->fetchAll();
    }

    //select articles from one user
    public function userArticles() {
        if(isset($_SESSION['id']) && !isset($_GET['user'])) {
            $userId = $_SESSION['id'];
        } else {
            $userId = $_GET['user'];
        }
            
        $sql = "SELECT * FROM article WHERE user_id = :user_id";
        $this->query($sql);
        $this->bind(':user_id', $userId);
        return $this->fetchAll();
    }

    //select a single article
    public function getSingle() {
        $title = $_GET['title'];
        $sql = "SELECT * FROM article WHERE title = :title";
        $this->query($sql);
        $this->bind(':title', $title);
        return $this->fetchSingle();
    }

    //edit article
    public function editArticle() {
        $title = $_GET['title'];
        $title2 = $_POST['title'];
        $article = $_POST['article'];
        $sql = "UPDATE article SET title = :title2, article = :article WHERE title = :title";
        $this->query($sql);
        $this->bind(':title', $title);
        $this->bind(':title2', $title2);
        $this->bind(':article', $article);
        
        $this->execute();
    }

    //delete article
    public function deleteArticle() {
        $title = $_GET['title'];
        $sql = "DELETE FROM article WHERE title = :title";
        $this->query($sql);
        $this->bind(':title', $title);
        $this->execute();
        
    }

    //search field
    public function searchResults() {
        if(isset($_POST['searchButton'])) {
            $searchInput = $_POST['searchInput'];
            $sql = "SELECT * FROM article WHERE title LIKE :title";
            $this->query($sql);
            $this->bind(':title', "%$searchInput%");
            return $this->fetchAll(); 
        }
    }

}


















