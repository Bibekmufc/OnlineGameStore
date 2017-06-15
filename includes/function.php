<?php 
	function giftCards(){
		include("includes/dbh.php");
		$cget = "select * from category where id= '11'";
		$fetch_cat = $con->query($cget);
		$row_cat = $fetch_cat->fetch_assoc();
		$cat_id = $row_cat['id'];	
		echo"<h3>".$row_cat['name']."</h3>";

		$pget = "select * from products where cat_id= '11' LIMIT 0, 3";
		$fetch_pro = $con->query($pget);
	while($row_pro = $fetch_pro->fetch_assoc()){
		echo"<li>
				<a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>
					<h4>".$row_pro['pro_name']."</h4>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
							<button id = 'pro_btn'><a href = '#'>Cart</a></button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
			</li>";		
	}
}
	function Games(){
		include("includes/dbh.php");
		$cget = "select * from category where id= '2' LIMIT 0, 3";
		$fetch_cat = $con->query($cget);
		$row_cat = $fetch_cat->fetch_assoc();
		$cat_id = $row_cat['id'];	
		echo"<h3>".$row_cat['name']."</h3>";

		$pget = "select * from products where cat_id= '2'";
		$fetch_pro = $con->query($pget);
	while($row_pro = $fetch_pro->fetch_assoc()){
		echo"<li>
				<a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>
					<h4>".$row_pro['pro_name']."</h4>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
							<button id = 'pro_btn'><a href = '#'>Cart</a></button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
			</li>";		
	}
}	
		function Consoles(){
		include("includes/dbh.php");
		$cget = "select * from category where id= '1' LIMIT 0, 3";
		$fetch_cat = $con->query($cget);
		$row_cat = $fetch_cat->fetch_assoc();
		$cat_id = $row_cat['id'];	
		echo"<h3>".$row_cat['name']."</h3>";

		$pget = "select * from products where cat_id= '1'";
		$fetch_pro = $con->query($pget);
	while($row_pro = $fetch_pro->fetch_assoc()){
		echo"<li>
				<a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>
					<h4>".$row_pro['pro_name']."</h4>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
							<button id = 'pro_btn'><a href = '#'>Cart</a></button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
			</li>";		
	}
}	
	function productDetails(){
		include ("includes/dbh.php");

		if(isset($_GET['pro_id'])){
			$pro_id = $_GET['pro_id'];
			$pdet = "select * from products where pro_id = '$pro_id'";
			$fetch_pro = $con->query($pdet);
			$row_pro = $fetch_pro->fetch_assoc();

			echo "<div id ='pro_img'>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<ul>
						<li><img src = 'resources/products/".$row_pro['img1']."' /></li>
						<li><img src = 'resources/products/".$row_pro['img2']."' /></li>
						<li><img src = 'resources/products/".$row_pro['img3']."' /></li>
						<li><img src = 'resources/products/".$row_pro['img4']."' /></li>
					</ul>	
					</div>
					<div id = 'pro_desc'>
						<h3>".$row_pro['pro_name']."</h3>
						<ul>
							<li>About the Product : ".$row_pro['description']."</li>
						</ul>
						<ul>
							<li>Brand : ".$row_pro['brand']."</li>
							<li>In Stock? : ".$row_pro['stock']."</li>
						</ul> <br clear ='all' />
							<center>
							<h4>Price : ".$row_pro['price']."</h4>
							<form method = 'post'>
								<button name = 'buy'>Buy Now</button>
								<button name = 'cart'>Add To Cart</button>
							</form>
						</center>
					</div>	<br clear ='all' />
					<div id = 'similar'>
						<h3> Similar Products </h3>
					</div>";



		}
	}


 ?>