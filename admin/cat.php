<div id="bodyright">
	<h3>Add New Category</h3>
	<form method="post">
		<table>
			<tr>
				<td>Enter Category Name : </td>
				<td><input type="text" name="cat_name"/></td>
			</tr>
		</table>
		<center><button name="add_cat">Add Category</button></center>
	</form>
</div>

<?php 
	include ("includes/function.php"); echo addCategory();
 ?>