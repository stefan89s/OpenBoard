<?php

class UserModel extends Model {

    //signing up user
    public function signUp() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "INSERT INTO users(username, password) VALUES 
        (:username, :password)";
        $this->query($sql);
        $this->bind(':username', $username);
        $this->bind(':password', $password);
        $this->execute();
        
        //signin in a new users
        $sql2 = "SELECT * FROM users WHERE username = :username
        AND password = :password";
        $this->query($sql2);
        $this->bind(':username', $username);
        $this->bind(':password', $password);
        return $this->fetchSingle();

    }

    //selecting user for signing in
    public function selectUser() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = :username 
                AND password = :password";
        $this->query($sql);
        $this->bind(':username', $username);
        $this->bind(':password', $password);
        return $this->fetchSingle();
    }

    //selecting all users
    public function selectAll() {
        $sql = "SELECT * FROM users";
        $this->query($sql);
        return $this->fetchAll();
    }

    //insert user into image table
    public function insertImage() {
        $userId = $_SESSION['id'];
        $sql = "INSERT INTO images(id, status) VALUES
        (:id, :status)";
        $this->query($sql);
        $this->bind(':id', $userId);
        $this->bind(':status', 0);
        $this->execute();
    }

    //select user image
    public function selectImage() {
        $userId = $_SESSION['id'];
        $sql = "SELECT * FROM images WHERE id = :id";
        $this->query($sql);
        $this->bind(':id', $userId);
        return $this->fetchSingle();
    }

    //update user image
    public function updateImage() {
        $userId = $_SESSION['id'];
        $sql = "UPDATE images SET status = :status WHERE id = :id";
        $this->query($sql);
        $this->bind(':id', $userId);
        $this->bind(':status', 1);
        $this->execute();
    }

    //show user
    public function showUser() {
        $userId = $_GET['user'];
        $sql = "SELECT * FROM users WHERE id = :id";
        $this->query($sql);
        $this->bind(':id', $userId);
        return $this->fetchSingle();
    }

    //show user image
    public function showImage() {
        $userId = $_GET['user'];
        $sql = "SELECT * FROM images WHERE id = :id";
        $this->query($sql);
        $this->bind(':id', $userId);
        return $this->fetchSingle();
    }

    //insert about me informations
    public function aboutMe() {
        if(!empty($_POST['aboutMe'])) {
            $aboutMe = $_POST['aboutMe'];
            $userId = $_SESSION['id'];

            $sql = "UPDATE users SET about_me = :about_me WHERE id = :id";
            $this->query($sql);
            $this->bind(':about_me', $aboutMe);
            $this->bind(':id', $userId);
            $this->execute();  
        } 
    }

    //select about me
    public function selectAboutMe() {
        if(isset($_SESSION['id']) && !isset($_GET['user'])) {
            $userId = $_SESSION['id'];
        } else {
            $userId = $_GET['user'];
        }
        
        $sql2 = "SELECT about_me FROM users WHERE id = :id";
        $this->query($sql2);
        $this->bind(':id', $userId);
        return $this->fetchSingle();
    }

    //searching for user
    public function searchUser() {
        if(isset($_POST['searchButton'])) {
            $userName = $_POST['searchInput'];
            $sqlUser = "SELECT * FROM users WHERE username = :username";
            $this->query($sqlUser);
            $this->bind(':username', $userName);
            $result = $this->fetchSingle();
            $user = $result['id'];
            $sqlArticle = "SELECT * FROM article WHERE user_id = :user_id";
            $this->query($sqlArticle);
            $this->bind(':user_id', $user);
            return $this->fetchAll();
        }
    }

}