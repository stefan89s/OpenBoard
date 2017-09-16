<?php  if(isset($_SESSION['id'])) : ?>

<div class = "row">
    <div class = "col-md-2">
        
    </div>
    <div class = "col-md-8 fill-user margin-top">
        <form action="" method = "POST">
            <input type="text" name = "title" placeholder = "Title" class = "form-control margin-top">
            <textarea name="article" rows = 15 placeholder = "Article..." class = "form-control margin-top margin-bottom text-area"></textarea>
            <button type = "submit" name = "publishButton" class = "btn btn-success btn-block margin-bottom">Publish</button>
    </div>

    <div class = "col-md-2 margin-top">
        <label for="" class = "form-control">Choose Category</label>
        <form action = $data['category'] method = "POST">
                <select name="selectCategory" class = "form-control">
                    <option value="other">Other</option>
                    <option value="opinion" >Opinion</option>
                    <option value="culture">Culture</option>
                    <option value="news">News</option>
                </select>
            <!--<button type = "submit" name = "choseCategory" class = "btn btn-success">Chose Category</button>-->

        </form>
        </form>
    </div>

</div>

<?php  endif; ?>










