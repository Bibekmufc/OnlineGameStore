<?php 
			
		function signup(){
			include ("includes/dbh.php");
			if(isset($_POST['usignup'])){
				$uname = $_POST['uname'];
				$uemail = $_POST['uemail'];
				$upass = $_POST['upass'];
				$uaddress = $_POST['uaddress'];
				$udob = $_POST['udob'];
				$unumber = $_POST['unumber'];


				$reg = $con->prepare("insert into users (name, email, password, address, dob, number, reg_date) values ('$uname', '$uemail','$upass','$uaddress','$udob','$unumber', NOW())");
					if($reg->execute()){
						echo "<script> alert('Registered Successfully. Please Enter Your Login Credentials to Proceed.')</script>";
						echo "<script>window.open('index.php','_self');</script>";
					}else{
						echo "<script> alert ('Something went wrong. Cant signup at this moment. Please Try Again Later')</script>";
					}

			}
		}
		



			function getIp() {
		    $ip = $_SERVER['REMOTE_ADDR'];
		 
		    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		        $ip = $_SERVER['HTTP_CLIENT_IP'];
		    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    }
		 
		    return $ip;
		}

	function cart(){
		include ("includes/dbh.php");
		if(isset($_POST['cart_btn'])){
			$ip = getIp();
			$pro_id = $_POST['pro_id'];


			$check = "select * from cart where pro_id = '$pro_id' AND ip = '$ip'";
			$check = $con->query($check);
			$rowCount = $check ->num_rows;
			if($rowCount == 1){
				echo"<script>alert('Product is already in the cart.');</script>";
			}
			else{
			$add = $con->prepare("insert into cart (pro_id, qty, ip) values ('$pro_id', '1', '$ip')");
			if($add->execute()){
				echo"<script>window.open('index.php', '_self');</script>";
				}
				else{
				echo"<script>alert('Could not be added at this time');</script>";	
				}
			}
		}
	}




	function cartCount(){	
	include ("includes/dbh.php");
		$ip = getIp();
		$sql = "select * from cart where ip = '$ip'";
		if($result = mysqli_query($con, $sql)){	
		$rowCount = $result->num_rows;
		echo $rowCount;
		}else{
		}
	}



	function cartDisplay(){
	include ("includes/dbh.php");
	$ip = getIp();
	$get = "select * from cart where ip = '$ip'";
	$fetch = $con->query($get);
	$rowCount = $fetch->num_rows;
	$net_total = 0;
	$sub_total = 0;

	if($rowCount == 0){
		echo "<center><h2> No products in cart</h2></center>";
	}else{
		if(isset($_POST['up_qty'])){
			$quantity = $_POST['qty'];

			foreach ($quantity as $key => $value) {
				$update_qty = $con -> prepare("update cart set qty = '$value' where id ='$key' ");
				if($update_qty->execute()){
					echo "<script>window.open('cart.php','_self');</script>";
				}
			}
		}
		echo "<table cellpadding='0' cellspacing='0'>
	 			<tr>
	 				<th>Image</th>
	 				<th>Product Name</th>
	 				<th>Quantity</th>
	 				<th>Price</th>
	 				<th>Remove From Cart</th>
	 				<th>Sub-total</th>

	 			</tr>";
	while($row = $fetch->fetch_assoc()):
		$pro_id = $row['pro_id'];
		$cart_id = $row['id'];
		$pro = "select * from products where pro_id = '$pro_id'";
		$fetch_pro = $con->query($pro);
		$prow = $fetch_pro->fetch_assoc();
		echo "<tr>
				<td><img src='resources/products/".$prow['img1']."' /></td>
				<td>".$prow['pro_name']."</td>
				<td><input type ='text' name ='qty[".$row['id']."]' value='".$row['qty']."'/><input type = 'submit' name = 'up_qty' value= 'Save'/></td>
				<td>".$prow['price']."</td>
				<td><a href='delete.php?delete_id=".$prow['pro_id']."'>Remove</a></td>
				<td>";	
						$qty = $row['qty'];
						$price =$prow['price'];
						$sub_total =  $row['qty']*$prow['price'];
						echo $sub_total;
						$net_total = $net_total + $sub_total;
				echo "</td>
			</tr>";
			endwhile;
				echo "<tr>
					<td></td>
					<td><button id = 'cart1'><a href = 'index.php'>Continue Shopping</a></button></td>
					<td><button id = 'cart1'>Proceed To Checkout</button></td>
					<td></td><td></td>
					<td><b>Total Cost Rs : $net_total</b></td>
					</tr>";
					
	}
}
	function deleteCart(){

		include ("includes/dbh.php");
		if(isset($_GET['delete_id'])){
			$pro_id = $_GET['delete_id'];
			$delete = "delete from cart where pro_id = '$pro_id'";
			$res = $con -> query($delete);
			if($res = $con -> query($delete)){
				echo "<script> alert('Product has been removed from cart') </script>";
				echo "<script> window.open('cart.php', '_self'); </script>";
		}
		}
	}


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
				<form method = 'post' enctype = 'multipart/form-data'>
				<a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>
					<h4>".$row_pro['pro_name']."</h4>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
							<input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
							<button id = 'pro_btn' name= 'cart_btn'>Cart</button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
				</form>
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
				<form method = 'post' enctype = 'multipart/form-data'>
				<a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>
					<h4>".$row_pro['pro_name']."</h4>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
							<input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
							<button id = 'pro_btn' name = 'cart_btn'>Cart</button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
				</form>
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
				<form method = 'post' enctype = 'multipart/form-data'>
				<a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>
					<h4>".$row_pro['pro_name']."</h4>
					<img src = 'resources/products/".$row_pro['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
							<input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
							<button id = 'pro_btn' name = 'cart_btn'>Cart</button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
				</form>
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
			$cat_id = $row_pro['cat_id'];
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
								<input type = 'hidden' value ='".$row_pro['pro_id']."' name = 'pro_id' /> 
								<button name = 'buy'>Buy Now</button>
								<button name = 'cart_btn'>Add To Cart</button>
							</form>
						</center>
					</div>	<br clear ='all' />
					<div id = 'similar'>
						<h3> Products You May Like </h3>
						<ul>";
							echo cart();
							$similar = "select * from products where pro_id != '$pro_id' and cat_id = $cat_id LIMIT 0, 5";
							$fetch_prod = $con->query($similar);
							while($row = $fetch_prod->fetch_assoc()){
								echo "<li>
									<a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>
										<img src = 'resources/products/".$row['img1']."' />	
									<p>".$row['pro_name']."</p>	
									<p>".$row['price']."</p>
									</a>
								</li>";
							}

						echo "</ul>

					</div>";
		}
	}

	function category(){
		include ("includes/dbh.php");

		$cat = "select * from category";
		$fetch = $con->query($cat);
		while($row = $fetch->fetch_assoc()){
			echo "<li><a href ='cat_detail.php?cat_id=".$row['id']."'>".$row['name']."</a></li>";
		}
	}	

	function categoryDetails(){
		include ("includes/dbh.php");

		
		if(isset($_GET['cat_id'])){
			$cat_id = $_GET['cat_id'];
			

			$gcat = "select * from products where cat_id = $cat_id";
			$fetch = $con->query($gcat);


			$cname = "select * from category where id = '$cat_id'";
			$fetch_name = $con->query($cname);
			$rown = $fetch_name->fetch_assoc();
			$cat_name = $rown['name'];
			echo "<h3>$cat_name</h3>";


			while($rowp = $fetch->fetch_assoc()){
				echo"<li>
				<form method = 'post' enctype = 'multipart/form-data'>
				<a href = 'pro_detail.php?pro_id=".$rowp['pro_id']."'>
					<h4>".$rowp['pro_name']."</h4>
					<img src = 'resources/products/".$rowp['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$rowp['pro_id']."'>View</a></button>
							<input type = 'hidden' value = '".$rowp['pro_id']."' name = 'pro_id' />
							<button id = 'pro_btn' name = 'cart_btn'>Cart</button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
				</form>
			</li>";		
			}
		}
	}

	function search(){
		include ("includes/dbh.php");
		if(isset($_GET['search'])){
		$find = $_GET['find'];

		$sql = "select * from products where pro_name like '%$find%' or keyword like '%$find%'";
		$search = $con->query($sql);
		echo "<div id ='bodyleft'><ul>";

		$rowCount = $search->num_rows;
		if($rowCount==0) {
			echo "<h2>Product Not Found. Please check your spellings and try again.<h2>";
		}
		else{
		while($row = $search->fetch_assoc()):
			echo "<li>
				<a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>
					<h4>".$row['pro_name']."</h4>
					<img src = 'resources/products/".$row['img1']."' />
					<center>
							<button id = 'pro_btn'><a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>View</a></button>
							<button id = 'pro_btn'><a href = '#'>Cart</a></button>
							<button id = 'pro_btn'><a href = '#'>Wishlist</a></button>
					</center>
				</a>
			</li>";	
			endwhile;
			}	
			echo "</ul></div>";	
	
	}
	}
 ?>