<?php $controller = new Profile; 

$imageStatus = $data['status'];
$user = $data['showUser'];
$aboutMe = $data['aboutMe'];
$articles = $data['articles'];

?>

<div class = "row margin-top fill-user">

    <div class = "col-md-5"><!--first grid-->
        <div class = "row margin-left margin-top">
            
            <h3 class = "bigger-margin-top margin-bottom">My Articles:</h3>
            <?php foreach($articles as $article) : ?>
            <div class = "col-md-12">
                <a href = "<?php echo ROOT_PATH ?>public/articles/single?title=<?php echo $article['title']; ?>"><?php echo "<h2>" . $article['title'] . "</h2>" ?></a> <hr>
            </div>
            <?php endforeach; ?>
        </div>

    </div><!--end of first grid-->

    <div class = "col-md-7 margin-top margin-bottom fill-profile"><!--second grid, user--> 
        
        <div class = "row margin-top base-padding">

            <div class = "col-md-4"><!--image space-->

                <?php if($imageStatus['status'] == 1) : ?>
                    <img src="../../public/css/profileImages/profile<?php echo $user['id']; ?>.jpg" class="img-circle" alt="image" width="150">
                <?php else : ?>

                    <img src="../../public/css/profileImages/image.jpg" class="img-circle" alt="image" width="150">

                <?php endif; ?>

                <h2><?php echo $user['username'] ?></h2>

            </div><!--end of image space-->

            <div class = "col-md-8 profile"><!--profile box-->
                
                <div class = "row">
                    <div class = "col-md-1">
                    
                    </div>

                    <div class = "col-md-10">
                        <h1>About me</h1>
                        <p><?php echo $aboutMe['about_me']; ?></p>

                    </div>

                    <div class = "col-md-1 fill-profile">
                    
                    </div>
                </div>

            </div><!--end of profile box-->

        </div>
    </div><!--end of second grid-->

    <div><!--third grid-->
        
        
    </div>
</div><!--end of third grid-->


