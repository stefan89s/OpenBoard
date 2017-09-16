<?php if(!isset($_SESSION['id'])) : ?>

<div class = "row">
    <div class = "col-md-9">
        <div class = "row">
            <div class = "col-md-12 fill bigger-margin-top">
                <div class = "row">
                    <div class = "col-md-10 color bigger-margin-bottom">
                        <h1 class = "margin-left margin-top">Welcome to the Board!</h1>

                        <h2 class = "margin-left">Find articles, authors, topics...</h2>
                    </div>

                    <div class = "col-md-2">
                        
                    </div>
                </div>
                <img src="../../public/css/forest.jpg" alt="" class = "margin-bottom">
            </div>
        </div>
    </div>

    <div class = "col-md-3 bigger-margin-top light-gray"><!--input forms-->
    
        <form method="POST" action="<?php  ?>">
            <input type= "text" name = "username" class = "form-control margin-top" placeholder = "Username"><br>
            <input type = "text" name = "password" class = "form-control" placeholder = "Password"><br>
            <button type = "submit" name = "signinButton" class = "btn btn-success">Sign In</button>
        </form>

        <form method="POST" action="<?php $data['signUp']; ?>">
            <input type= "text" name = "username" class = "form-control bigger-margin-top" placeholder = "Username"><br>
            <input type = "text" name = "password" class = "form-control" placeholder = "Password"><br>
            <button type = "submit" name = "signupButton" class = "btn btn-success">Sign Up</button>
        </form>

    </div><!--end of input forms-->

    <?php print_r($data['signIn']); ?>
</div>

<?php else : ?>

you are logged in as <?php echo $_SESSION['username'];

   ?>

<?php endif; ?>
