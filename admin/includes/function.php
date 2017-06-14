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



    $query = "insert into products (pro_name, cat_id, img1, img2, img3, img4, description, price, brand, stock,keyword, added_date) values ($pro_name', '$cat_id','$img1','$img2','$img3','$img4', '$description', '$price', '$brand', '$stock','$keyword', NOW())";
    $result = $con->query($query);
    if($result == true){
       echo "<script>alert('Product has been added successfully!'); </script>";
		}
			else{
				echo "<script>alert('Product could not be been added at this time!'); </script>";
			}
}

}






 ?>





