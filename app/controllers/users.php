<?php

class Users extends Controller {

    /*public function signUp() {
        echo 'this is register';
        $user = $this->model('userModel');
        echo "<br>" . $user->name;
        
    }*/

    //selecting all users
    public function index() {
        $userModel = $this->model('userModel');
        $this->view('users/index', ['users' => $userModel->selectAll()]);
    }

}







