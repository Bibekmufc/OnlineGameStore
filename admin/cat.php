<div id="bodyright">
	<h3>View Current Categories</h3>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Sr. No.</th>
				<th>Category Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
				<?php include ("includes/function.php");  echo viewCategory(); 
				?>
		</table>
		</form>
	<h4>Add New Category</h4>
	<form method="post">
		<table >
			<tr>
				<td>Enter Category Name : </td>
				<td><input type="text" name="cat_name"/></td>
			</tr>
		</table>
		<center><button name="add_cat">Add Category</button></center>
	</form>
</div>

<?php 
	echo addCategory();
 ?>