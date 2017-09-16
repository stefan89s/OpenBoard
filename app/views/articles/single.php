<?php

    $article = $data['article'] ;
    $insertComment = $data['comment'];
    $comments = $data['comments'];

   // print_r($article);

?>

<div class = "row margin-top fill-green">

    <div class = "col-md-8">
        <?php echo "<h2>" . $article['title'] . "</h2>"; ?>
    </div>
    <div class = "col-md-1"></div>
    <div class = "col-md-3">
        <h3>Category: <span class = "purple-color"><?php echo $article['category'] ?></span></h3>
    </div>
</div>

<div class = "row fill">
    <div class = "col-md-12 margin-top">
        <?php echo "<p>" .  nl2br($article['article']) . "</p>" ?>
    </div>
</div>

<div class = "row fill">
    <div class = "col-md-6">
        <?php echo "<h5>" . $article['author'] . "</h5>" ?>
    </div>

    <div class = "col-md-4">
    
    </div>

    <div class = "col-md-2">
        <?php echo "<h6>" . $article['date'] . "</h6>" ?>
    </div>
</div>

<?php if(isset($_SESSION['id'])) : ?>
<div class = "row"><!--comments-->

    <div class = "col-md-6 light-gray margin-top margin-left">
        <form action="<?php $insertComment ?>" method = "POST">
            <input type="hidden" name = "username" value = "<?php echo $_SESSION['username']; ?>">
            <textarea name="comment" id="" cols="70" rows="7" placeholder = "Leave a comment..." class = "margin-top text-area"></textarea>
            <button type = "submit" name = "commentButton" class = "btn btn-success margin-bottom">Comment</button>
        </form>
    </div>

</div>
<?php endif; ?>

<h2 class = "margin-top">Comments:</h2>

<?php foreach($comments as $comment) : ?>
<div class = "margin-left comment-border">
    
<div class = "row">
   
    <div class = "col-md-6 fill base-padding">
        <?php echo "<p>" . nl2br($comment['comment']) . "</p>"; ?>
    </div>  
</div>
<div class = "row">
    <div class = "col-md-6">
    <div class = "row">
    <div class = "col-md-3 fill">
        <?php echo "<p>" . $comment['author'] . "</p>"; ?>
    </div>
    <div class = "col-md-5 fill"></div>
    <div class = "col-md-4 fill">
        <?php echo "<p>" . $comment['date'] . "</p>"; ?>
    </div>
</div>
</div>
</div>
  
</div>
<?php endforeach; ?> 
































