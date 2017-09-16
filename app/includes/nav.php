<body>
<?php
if(isset($_POST['logoutButton'])) {
		session_destroy();
		header('Location:' . ROOT_PATH . 'public/home/index');
}
?>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

	 <ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
		    <a class="nav-link" href="<?php echo ROOT_PATH ?>public/home/index">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="<?php echo ROOT_PATH ?>public/articles/index">All Articles</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="<?php echo ROOT_PATH ?>public/users/index">All Authors</a>
		  </li>
			
			<?php if(isset($_SESSION['id'])) : ?>

		  <li class="nav-item">
		    <a class="nav-link" href="<?php echo ROOT_PATH ?>public/profile/index"><?php echo $_SESSION['username'] ?></a>
		  </li>

			<li class="nav-item">
				<form action="" method = "POST">
					<button type = "submit" name = "logoutButton" class = "btn btn-primary margin-left">Log Out</button>
				</form>
		</li>

	<?php endif; ?>		
			
 	</ul>

	 <ul class="nav navbar-nav navbar-right"><!--search field-->
		<form action="<?php echo ROOT_PATH . 'public/articles/search' ?>" method = "POST" class="form-inline">
				<input type="text" name = "searchInput" class = "form-control inline" placeholder = "Search...">
				<button type = "submit" name = "searchButton" class = "btn btn-success button-left">Search</button>
			</form>

	 </ul><!--end of search field-->

</nav>

<div class="container"><!--the start of container class-->





























