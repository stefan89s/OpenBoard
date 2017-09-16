<?php

$delete = $data['delete'];
$article = $data['article'];

?>

<div class = "row">
    <div class = "col-md-1"></div>
    <div clas = "col-md-10">
        <div class = "row">
            <div class = "col-md-12 red-color margin-top">
                <h1>Are you sure you want to delete the article:</h1>
            </div>
        </div>
        <div class = "row blue-color">
            <div class = "col-md-8">
                <h1><?php echo $article['title'] ?></h1>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-12">
                <form>
                    <button type = "submit" name = "cancelDelete" class = "btn btn-primary btn-block bigger-margin-top">Cancel</button>
                </form>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-12">
                <form action="<?php $delete; ?>" method = "POST">
                    <button type = "submit" name = "deleteButton" class = "btn btn-danger btn-block bigger-margin-top">Delete</button>
                </form>
            </div>
        </div>

    </div>
</div>












