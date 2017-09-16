<?php

class Home extends Controller {

    public function index() {
        $this->view('home/index', ['signUp' => $this->signUp(),
                                   'signIn' => $this->signIn()]);
    }

    //signing in the user
    public function signIn() {
        $user = $this->model('userModel');
        if(isset($_POST['signinButton'])) {
            $userInfo = $user->selectUser();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['username'] = $userInfo['username'];
            header('Location:' . ROOT_PATH . 'public/profile/index');
        }
    }

    //signing up the user
    public function signUp() {
        $user = $this->model('userModel');
        if(isset($_POST['signupButton'])) {
            $userInfo = $user->signUp();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['username'] = $userInfo['username']; 
            $user->insertImage();  
            header('Location:' . ROOT_PATH . 'public/profile/index');
        }   
    }

    //logut user
    public function logout() {
        if(isset($_POST['logoutButton'])) {
            session_destroy();
            header('Location' . ROOT_PATH . 'public/home/index');
        }
    }

}