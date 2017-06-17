<div id="header"> 
			<div id="logo">	
				<img src="resources/logo.png">
			</div> 
			<!--end of logo-->
		<div id="links">
			<ul>
				<li><a href="loginpage.php">Login</a></li>
				<li><a href="#">Signup</a></li>
			</ul>
		</div>	
		<!--end of links-->

		<div id="search">
			<form method="get" action="search.php" enctype="multipart/form-data">
				<input type="text" name="find" placeholder="Search For Products">
				<button name="search" id="search_btn"> Go!</button>
				<button name="cart" id="cart_btn"><a href="cart.php">Cart <?php echo cartCount(); ?> </button>
			</form>
		</div>
		<!-- end of search -->

		</div> 
		<!-- end of header -->