<?php

class Comments extends Controller {

    //insert a comment
    public function insertComment() {
        $comment = $this->model('commentModel');
        if(isset($_POST['commentButton'])) {
            $comment->insertComment();
        }
    }

}