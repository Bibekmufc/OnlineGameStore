<div class="scroll" id="bodyright">
	<h3>View Products</h3>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Sr. No.</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Product Name</th>
				<th>Product Images</th>
				<th>Description</th>
				<th>Price</th>
				<th>Brand Name</th>
				<th>In Stock?</th>
				<th>Keyword</th>
				<th>Added Date</th>
			</tr>
			<?php 
	include ("includes/function.php"); echo viewProducts();
 ?>
		</table>
	</form>
</div>

