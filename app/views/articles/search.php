<?php

$resoults = $data['resoults'];
$users = $data['users'];
//print_r($resoults);
echo "<br>";
//print_r($users);

?>

<div class = "row">
    <div class = "col-md-4 text-center">
        <h1 class = "yellow">Search results:</h1>
    </div>
</div>

<div class = "row margin-top"><!--search based on articles--> 
    <?php foreach($resoults as $resoult) : ?>
    
    <div class = "col-md-8 bigger-margin-left">
        <a href=""><h2><?php echo $resoult['title']; ?></h2></a>
        <p><?php echo $resoult['author'] ?></p>
    </div>
    <?php endforeach; ?>
</div><!--end-->

<div class = "row"><!--search based on users-->
    <?php foreach($users as $resoult) : ?>
    <div class = "col-md-8 bigger-margin-left">
        <a href=""><h2><?php echo $resoult['title']; ?></h2></a>
        <p><?php echo $resoult['author']; ?></p>
    </div>
    <?php endforeach; ?>
</div><!--end-->








