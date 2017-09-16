<?php

class Profile extends Controller {

    //view for logged in user
    public function index() {
        $user = $this->model('userModel');
        $articles = $this->model('articleModel');
        $this->view('profile/index', ['upload' => $this->uploadImage(),                                       'status' => $this->selectImage(),
                                      'aboutMe' => $this->aboutMe(),
                                      'selectAbout' => $user->selectAboutMe(),
                                      'articles' => $articles->userArticles()]);
    }

    //view for users profile
    public function user() {
        $user = $this->model('userModel');
        $articles = $this->model('articleModel');
        $this->view('profile/user', ['showUser' => $user->showUser(), 
                                     'status' => $user->showImage(),
                                     'aboutMe' => $user->selectAboutMe(),
                                     'articles' => $articles->userArticles()]);
    }

    //upload profile image
    public function uploadImage() {
        $user = $this->model('userModel');

        if(isset($_POST['uploadButton'])) {
            $image = $_FILES['image'];
            $imageName = $image['name'];
            $imageSize = $image['size'];
            $imageTemp = $image['tmp_name'];
            $imageError = $image['error'];
            $imageType = $image['type'];

           // $imageExt = explode('.', $imageName);
           // print_r($imageExt);

           $newName = 'profile' . $_SESSION['id'] . '.jpg';

            if($imageSize < 1000000) {
                move_uploaded_file($imageTemp, "../public/css/profileImages/" . $newName);
            } else {
                echo "<h5 class = red-color>Your file is too big!</h5>";
            }
            

            $user->updateImage();
            
        }
        
    }

    //selecting current image
    public function selectImage() {
        $user = $this->model('userModel');
        return $user->selectImage();
    }
    
    //selecting articles from the user
    public function dashboard() {
        $this->view('profile/dashboard', ['articles' => $this->userArticles()]);
    }

    //getting user articles
    public function userArticles() {
        $articleModel = $this->model('articleModel');
        return $articleModel->userArticles();
    }

    //show user
    public function showUser() {
        $user = $this->model('userModel');
        $user->showUser();
    }

    //about me information
    public function aboutMe() {
        $user = $this->model('userModel');
        if(isset($_POST['aboutButton'])) {
            $user->aboutMe();
        }
    }

}





