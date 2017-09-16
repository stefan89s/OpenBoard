<?php

class Articles extends Controller {

    public function index() {
        $articleModel = $this->model('articleModel');
        $this->view('articles/index', ['articles' => $articleModel->getArticles()]);
    }

    //function for a single article
    public function single() {
        $articleModel = $this->model('articleModel');
        $this->view('articles/single', ['article' => $articleModel->getSingle(),
                                        'comment' => $this->insertComment(),
                                        'comments' => $this->selectComments()]);
    }

    //search field
    public function search() {
        if(!empty($_POST['searchInput'])) {
            $articleModel = $this->model('articleModel');
            $user = $this->model('userModel');
            $this->view('articles/search', ['resoults' => $articleModel->searchResults(), 'users' => $user->searchUser()]);
        } else {
            echo "field is empty";
        }
        
    }

    //writing article
    public function writeArticle() {
        $articleModel = $this->model('articleModel');
        if(isset($_POST['publishButton'])) {
            $articleModel->insertArticle();
            header('Location:' . ROOT_PATH . "public/articles/index");
        }
        $this->view('articles/writeArticle', ['category' => $this->selectCategory()]);
    }

    //edit article view
    public function editArticle() {
        $article = $this->model('articleModel');
        $this->view('articles/editArticle', ['article' => $article->getSingle(),
                                             'edit' => $this->edit()]);
    }

    //edit article
    public function edit() {
        $article = $this->model('articleModel');
        if(isset($_POST['editButton'])) {
            $article->editArticle();
            header('Location: ../profile/dashboard');
        }
    }

    //view for delete article
    public function deleteArticle() {
        $article = $this->model('articleModel');
        $this->view('articles/deleteArticle', ['delete' => $this->delete(),
                                               'article' => $article->getSingle()]);
    }

    //delete article
    public function delete() {
        $article = $this->model('articleModel');
        if(isset($_POST['deleteButton'])) {
            $article->deleteArticle();
            header('Location: ../profile/dashboard');
        }
    }

    //select category
    public function selectCategory() {
        if(isset($_POST['publishButton'])) {
            switch($_POST['selectCategory']) {
                case opinion:
                    echo 'opinion';
                    break;

                case culture:
                    echo 'culture';
                    break;

                default:
                    echo 'other';
                    break;
            }
        }
        
    }

    //insert a comment
    public function insertComment() {
        $comment = $this->model('commentModel');
        if(isset($_POST['commentButton'])) {
            $comment->insertComment();
            header('Location:' . ROOT_PATH . "public/articles/index");
        }
    }

    //select comments
    public function selectComments() {
        $comments = $this->model('commentModel');
        return $comments->selectComments();
    }

}