<?php

$articles = $data['articles'];

?>

<div class = "row">
    <?php foreach($articles as $article) : ?>
    <div class = "col-md-4 margin-top">
        <?php //echo "<h2>" . $article['title'] . "</h2>"; ?>
        <?php echo "<h2>" . substr($article['title'], 0, 50); 
        echo strlen($article['title']) > 50 ? "..." :  " " . "</h2>";
        ?>
    </div>

    <div class = "col-md-4 margin-top">
        <?php echo "<p>" . substr($article['article'], 0, 100); 
        echo strlen($article['article']) > 100 ? "..." :  " " . "</p>";
        ?>
    </div>

    <div class = "col-md-4 margin-top">
        <a href="<?php echo ROOT_PATH ?>public/articles/editArticle?title=<?php echo $article['title'] ?>"><button class = "btn btn-primary">Edit</button></a>
        <a href="<?php echo ROOT_PATH ?>public/articles/deleteArticle?title=<?php echo $article['title'] ?>"><button class = "btn btn-danger">Delete</button></a>
    </div>
    <?php endforeach; ?>
</div>











