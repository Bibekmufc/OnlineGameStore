<div id="bodyright">
	<h3>Add New Products</h3>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Select Category Name : </td>
				<td> 
					<select name="cat_name">
						<?php include("includes/function.php"); echo getCategory(); ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Enter Product's Name : </td>
				<td><input type="text" name="prod_name"/></td>
			</tr>
			<tr>
				<td>Upload Product Image 1 : </td>
				<td><input type="file" name="prod_img1"/></td>
			</tr>
			<tr>
				<td>Upload Product Image 2 : </td>
				<td><input type="file" name="prod_img2"/></td>
			</tr>
			<tr>
				<td>Upload Product Image 3 : </td>
				<td><input type="file" name="prod_img3"/></td>
			</tr>
			<tr>
				<td>Upload Product Image 4 : </td>
				<td><input type="file" name="prod_img4"/></td>
			</tr>	
			<tr>
				<td>Enter Product's Descriptiom : </td>
				<td><input type="text" name="prod_desc"/></td>
			</tr>
			<tr>
				<td>Enter Product's Price : </td>
				<td><input type="text" name="prod_price"/></td>
			</tr>		
			<tr>
				<td>Enter Product's Brand : </td>
				<td><input type="text" name="prod_brand"/></td>
			</tr>	
			<tr>
				<td>Enter Product's Stock Availability : </td>
				<td><input type="text" name="prod_stock"/></td>
			</tr>	
			<tr>
				<td>Enter Product's Keyword : </td>
				<td><input type="text" name="prod_key"/></td>
			</tr>
		</table>
		<center><button name="add_prod">Add Product</button></center>
	</form>
</div>

<?php 
echo addProduct();
 ?>