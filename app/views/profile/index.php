<?php  

$imageStatus = $data['status'];
$uploadImage = $data['upload'];
$aboutMe = $data['aboutMe'];
$selectAbout = $data['selectAbout'];
$articles = $data['articles'];

?>

<div class = "row margin-top fill-user">

    <div class = "col-md-3"><!--first grid-->

        <div class = "row margin-left">
            <h3 class = "bigger-margin-top margin-bottom">My Articles:</h3>
            <?php foreach($articles as $article) : ?>
            <div class = "col-md-12">
                <a href = "<?php echo ROOT_PATH ?>public/articles/single?title=<?php echo $article['title']; ?>"><?php echo "<h4>" . $article['title'] . "</h4>" ?></a> <hr>
            </div>
            <?php endforeach; ?>
        </div>
    </div><!--end of first grid-->

    <div class = "col-md-7 margin-top bigger-margin-bottom fill-profile"><!--second grid, user-->
          
        <div class = "row margin-top base-padding">

            <div class = "col-md-4"><!--image space-->

                <?php if($imageStatus['status'] == 1) : ?>
                    <img src="../../public/css/profileImages/profile<?php echo $_SESSION['id']; ?>.jpg" class="img-circle" alt="image" width="150">
                <?php else : ?>

                    <img src="../../public/css/profileImages/image.jpg" class="img-circle" alt="image" width="150">

                <?php endif; ?>

                <p>change your image</p>
                <form action="<?php $data['upload']; ?>" method = "POST" enctype = "multipart/form-data">
                <label class="btn btn-primary btn-block no-margine">Browse
                    <input type="file" name = "image" hidden>
                </label><hr class = "no-margine">
                    <button type = "submit" name = "uploadButton" class = "btn btn-success no-margine">Upload</button>
                </form>
                
                <hr>
                <div class = "row">
                
                <h6 class = "margin-left">Manage your articles:</h6>
                <a href="<?php echo ROOT_PATH; ?>public/profile/dashboard"><h2 class = "margin-left fill-green base-padding">Dashboard</h2></a>
                </div><hr>
                
            </div><!--end of image space-->

            <div class = "col-md-8 profile"><!--about me box-->
                
                <div class = "row">
                    <div class = "col-md-1">
                    
                    </div>

                    <div class = "col-md-9">
                        <h1>About me</h1>
                        <?php echo $selectAbout['about_me'] ?>

                        <form action="$aboutMe" method = "POST">
                            <textarea name = "aboutMe" class = "form-control text-area" placeholder = "Upload..."></textarea>
                            <button type = "submit" name = "aboutButton" class = "btn btn-success margin-bottom">Update</button>
                        </form>
                    </div>

                    <div class = "col-md-1">
                    
                    </div>
                </div><!--end of about me box-->

            </div><!--end of profile box-->

        </div>
    </div><!--end of second grid-->

    <div class = "col-md-2 bigger-margin-top"><!--third grid-->
        
        <a href="../articles/writeArticle"><h2 class = "write-article base-padding">Write an Article</h2></a>
    </div>
</div><!--end of third grid-->


