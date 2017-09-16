<?php

$allUsers = $data['users'];

?>

<div class = "row bigger-margin-top">
    <div class = "col-md-3 text-center">
        <h1 class = "yellow">All Authors:</h1> <br>
    </div>  
</div>

<div class = "row">
    <div class = "col-md-2"></div>
    <div class = "col-md-4">
    <?php foreach($allUsers as $user) : ?>

        <div class = "row margin-top">
            <div class = "col-md-4 fill img base-padding">
                <img src="../../public/css/profileImages/profile<?php echo $user['id']; ?>.jpg" alt="">
            </div>
            <div class = "col-md-8 fill-yellow base-padding">
                <a href="<?php echo ROOT_PATH ?>public/profile/user?user=<?php echo $user['id'] ?>"><?php echo "<h2>" . $user['username'] . "</h2>" ?></a>
            </div>
  
        </div>

    <?php endforeach; ?>
    </div>
</div>








