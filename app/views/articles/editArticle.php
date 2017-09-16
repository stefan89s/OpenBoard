<?php

$article = $data['article'];
//print_r($article['title']);
$edit = $data['edit'];

?>

<div class = "row">
    <div class = "col-md-4 text-center margin-top">
        <h1 class = "yellow">Edit the article</h1>
    </div>
</div>

<div class = "row margin-top">
    <div class = "col-md-10">

        <div class = "row">
            <div class = "col-md-12">
                <form action="<?php $edit; ?>" method = "POST">
                    <input type="text" name = "title" class = "form-control margin-bottom" value = "<?php echo $article['title'] ?>">
                    <textarea name="article" id="" cols="30" rows="10" class = "form-control"><?php echo $article['article'] ?></textarea>
                    <button type = "submit" name = "editButton" class = "btn btn-primary btn-block margin-top">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>