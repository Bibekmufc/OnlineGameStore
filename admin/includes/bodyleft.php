<div id="bodyleft">
		<h3>Product Management</h3>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php?view_cat">View Categories</a></li>
			<li><a href="index.php?view_prod">View Products</a></li>
		</ul>	

	</div>
	<!-- end of bodyleft -->

	<?php 
		if(isset($_GET['view_cat'])){
			include ("cat.php");
		}
		if(isset($_GET['view_prod'])){
			include ("products.php");
		}
	 ?>