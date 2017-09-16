
<?php

$articles = $data['articles'];

?>

<div class = "row margin-top">
    <div class = "col-lg-1">
    
    </div>

    <div class = "col-lg-10"><!--articles-->
        <div class = "row">
            <?php foreach ($articles as $article) : ?>
            <div class = "col-md-4 article-border">
                <!--article box-->
                <h5 class = "margin-top purple-color">Category: <span class = "category"><?php echo $article['category'] ?></span></h5>
                <a href="<?php echo ROOT_PATH ?>public/articles/single?title=<?php echo $article['title']; ?>"><h2><?php echo $article['title']  ?></h2></a>
                <p><?php echo substr($article['article'], 0, 250); echo strlen($article['article']) > 250 ? "..." : "" ?></p>
                 
                <div class = "row">
                    <div class = "col-md-6">
                        <h5><?php echo $article['author']  ?></h5>
                    </div>
                        <p><?php echo $article['date'] ?></p>
                    <div class = "col-md-6">

                    </div>
                </div>
                <!--end of article box-->
            </div>
            <?php endforeach; ?>
        </div>    
    </div><!--end of articles-->

    <div class = "col-lg-1 fill-yellow">
    
    </div>
</div>
















