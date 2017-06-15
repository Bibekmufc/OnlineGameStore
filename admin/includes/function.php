<?php 
	function addCategory() {
		include ("includes/dbh.php");
	if(isset($_POST['add_cat'])){
		$name=$_POST['cat_name'];
		$add_cat = $con->prepare("insert into category (name) values ('$name')");
		if($add_cat->execute()){
			echo "<script>alert('Category has been added successfully!'); </script>";
		}
			else{
				echo "<script>alert('Category could not be been added at this time!'); </script>";
				echo "<script>window.open('index.php?view_cat','_self');</script>";
				}
		};
	}


	function getCategory(){
		include("includes/dbh.php");
			$qget = "select * from category";
			$fetch_cat = $con->query($qget);
			while($row = $fetch_cat -> fetch_assoc()){
				echo"<option value ='".$row['id']."'>".$row['name']."</option>";
			}
	}

	function viewCategory(){
		include ("includes/dbh.php");
		$qget = "select * from category ORDER BY name";
			$fetch_cat = $con->query($qget);
			$i = 1;
			while($row = $fetch_cat -> fetch_assoc()):
				echo "<tr>
					<td>".$i++."</td>
					<td>".$row['name']."</td>
					<td><a href = 'index.php?edit_cat=".$row['id']."'>Edit</a></td>
					<td><a href = 'delete_cat.php?delete_cat=".$row['id']."'>Delete</a></td>
					</tr>";
			endwhile;
				}


	function viewProducts(){
		include ("includes/dbh.php");
		$pget = "select * from products";
			$fetch_Prod = $con->query($pget);
			$i = 1;
			while($row = $fetch_Prod -> fetch_assoc()):
				echo "<tr>
					<td>".$i++."</td>
					<td><a href = 'index.php?edit_pro=".$row['pro_id']."'>Edit</a></td>
					<td><a href = 'delete_prod.php?delete_pro=".$row['pro_id']."'>Delete</a></td>
					<td style = 'min-width: 200px'>".$row['pro_name']."</td>
					<td style = 'min-width: 200px'>
						<img src = '../resources/products/".$row['img1']."'/>
						<img src = '../resources/products/".$row['img2']."'/>
						<img src = '../resources/products/".$row['img3']."'/>
						<img src = '../resources/products/".$row['img4']."'/>
					</td>
					<td>".$row['description']."</td>
					<td>".$row['price']."</td>
					<td>".$row['brand']."</td>
					<td>".$row['stock']."</td>
					<td>".$row['keyword']."</td>
					<td style = 'min-width: 200px'>".$row['added_date']."</td>
						</tr>";
			endwhile;
				}	




	function addProduct(){
		include ("includes/dbh.php");
		if(isset($_POST['add_prod'])){
		$pro_name = $_POST['prod_name'];	
		$cat_id=$_POST['cat_name'];

		$img1 = $_FILES['prod_img1']['name'];
		$img1_tmp= $_FILES['prod_img1']['tmp_name'];

		$img2 = $_FILES['prod_img2']['name'];
		$img2_tmp= $_FILES['prod_img2']['tmp_name'];
		
		$img3 = $_FILES['prod_img3']['name'];
		$img3_tmp= $_FILES['prod_img3']['tmp_name'];
		
		$img4 = $_FILES['prod_img4']['name'];
		$img4_tmp= $_FILES['prod_img4']['tmp_name'];

		move_uploaded_file($img1_tmp, "../resources/products/$img1");
		move_uploaded_file($img2_tmp, "../resources/products/$img2");
		move_uploaded_file($img3_tmp, "../resources/products/$img3");
		move_uploaded_file($img4_tmp, "../resources/products/$img4");

		$description = $_POST['prod_desc'];
		$price = $_POST['prod_price'];
		$brand = $_POST['prod_brand'];
		$stock = $_POST['prod_stock'];
		$brand = $_POST['prod_brand'];
		$keyword = $_POST['prod_key'];



			$add_cat = $con->prepare("insert into products (pro_name, cat_id, img1, img2, img3, img4, description, price, brand, stock, keyword, added_date) values ('$pro_name', '$cat_id','$img1','$img2','$img3','$img4', '$description', '$price', '$brand', '$stock','$keyword', NOW())");
		if($add_cat->execute()){
			echo "<script>alert('Product has been added successfully!'); </script>";
		}
			else{
				echo "<script>alert('Product could not be been added at this time!'); </script>";
				}
		};

}

	function editCategory(){
		include ("includes/dbh.php");
		if(isset($_GET['edit_cat'])){
			$cat_id = $_GET['edit_cat'];
			$eget = "select * from category where id = $cat_id";
			$fetch_cat = $con->query($eget);
			while($row = $fetch_cat -> fetch_assoc()){

						echo "<form method='post'>
		<table >
			<tr>
				<td>Enter New Category Name : </td>
				<td><input type='text' name='new_cat_name' value = '".$row['name']."' /></td>
			</tr>
		</table>
		<center><button name='update_cat'>Update Category</button></center>
	</form>";
		if(isset($_POST['update_cat'])){
				$new_cat_name = $_POST['new_cat_name'];
				$update_cat = $con -> prepare("update category SET name = '$new_cat_name' where id = '$cat_id'");
				if($update_cat -> execute()){
					echo "<script>alert('Category has been updated successfully!');</script>";
					echo "<script>window.open('index.php?view_cat','_self');</script>";
				}
			}		
		}
		}
	}

		function deleteCategory(){
			
				include ("includes/dbh.php");
				$delete_cat_id = $_GET['delete_cat'];
				$delete_cat = $con -> prepare("delete from category where id = '$delete_cat_id'");
				if($delete_cat -> execute()){
					echo "<script>alert('Category has been deleted successfully!');</script>";
					echo "<script>window.open('index.php?view_cat','_self');</script>";
				}
			}		

		function deleteProduct(){
			include ("includes/dbh.php");

			$delete_prod_id = $_GET['delete_pro'];
			$delete_pro = $con -> prepare("delete from products where pro_id = '$delete_prod_id'");
			if($delete_pro -> execute()){
					echo "<script>alert('Product has been deleted successfully!');</script>";
					echo "<script>window.open('index.php?view_prod','_self');</script>";
				}

		}			

		function editProduct(){
			include ("includes/dbh.php");

			if(isset($_GET['edit_pro'])){
				$pro_id = $_GET['edit_pro'];

				$pget = "select * from products where pro_id = '$pro_id'";
				$fetch_pro = $con->query($pget);
				while($row = $fetch_pro -> fetch_assoc()){

				echo "<form method='post' enctype='multipart/form-data'>
					<table>
						<tr>
							<td>Update Category Name : </td>
							<td> 
								<select name='cat_name'>
								<option value = '".$row['cat_id']."'></option>";
									 echo getCategory();
								echo "</select>
							</td>
						</tr>
						<tr>
							<td>Update Product's Name : </td>
							<td><input type='text' name='prod_name' value = '".$row['pro_name']."'/></td>
						</tr>
						<tr>
							<td>Upload Product Image 1 : </td>
							<td>
								<input type='file' name='prod_img1'/>
								<img src = '../resources/products/".$row['img1']."' style = 'width:60px; height: 60px' />
							</td>
						</tr>
						<tr>
							<td>Upload Product Image 2 : </td>
							<td>
								<input type='file' name='prod_img2'/>
								<img src = '../resources/products/".$row['img2']."' style = 'width:60px; height: 60px' />
							</td>
						</tr>
						<tr>
							<td>Upload Product Image 3 : </td>
							<td>
								<input type='file' name='prod_img3'/>
								<img src = '../resources/products/".$row['img3']."' style = 'width:60px; height: 60px' />
							</td>
						</tr>
						<tr>
							<td>Upload Product Image 4 : </td>
							<td>
								<input type='file' name='prod_img4'/>
								<img src = '../resources/products/".$row['img4']."' style = 'width:60px; height: 60px' />
							</td>
						</tr>	
						<tr>
							<td>Update Product's Description : </td>
							<td><input type='text' name='prod_desc' value = '".$row['description']."'/></td>
						</tr>
						<tr>
							<td>Update Product's Price : </td>
							<td><input type='text' name='prod_price' value = '".$row['price']."'/></td>
						</tr>		
						<tr>
							<td>Update Product's Brand : </td>
							<td><input type='text' name='prod_brand' value = '".$row['brand']."'/></td>
						</tr>	
						<tr>
							<td>Update Product's Stock Availability : </td>
							<td><input type='text' name='prod_stock' value = '".$row['stock']."'/></td>
						</tr>	
						<tr>
							<td>Update Product's Keyword : </td>
							<td><input type='text' name='prod_key'/ value = '".$row['keyword']."'></td>
						</tr>
					</table>
					<center><button name='update_prod'>Update Product</button></center>
				</form>";

		if(isset($_POST['update_prod'])){
		$pro_name = $_POST['prod_name'];	
		$cat_id=$_POST['cat_name'];

		$img1 = $_FILES['prod_img1']['name'];
		$img1_tmp= $_FILES['prod_img1']['tmp_name'];

		$img2 = $_FILES['prod_img2']['name'];
		$img2_tmp= $_FILES['prod_img2']['tmp_name'];
		
		$img3 = $_FILES['prod_img3']['name'];
		$img3_tmp= $_FILES['prod_img3']['tmp_name'];
		
		$img4 = $_FILES['prod_img4']['name'];
		$img4_tmp= $_FILES['prod_img4']['tmp_name'];

		move_uploaded_file($img1_tmp, "../resources/products/$img1");
		move_uploaded_file($img2_tmp, "../resources/products/$img2");
		move_uploaded_file($img3_tmp, "../resources/products/$img3");
		move_uploaded_file($img4_tmp, "../resources/products/$img4");

		$description = $_POST['prod_desc'];
		$price = $_POST['prod_price'];
		$brand = $_POST['prod_brand'];
		$stock = $_POST['prod_stock'];
		$keyword = $_POST['prod_key'];

				$up_pro = $con -> prepare("update products SET pro_name = '$pro_name', cat_id= '$cat_id', img1 = '$img1', img2 = '$img2', img3 = '$img3', img4 = '$img4', description = '$description', price = '$price', brand = '$brand', stock = '$stock', keyword = '$keyword'   where pro_id = '$pro_id'");
				if($up_pro -> execute()){
					echo "<script>alert('Product has been updated successfully!');</script>";
					echo "<script>window.open('index.php?view_prod','_self');</script>";
				}

				}
			}
		}

	}
 ?>





