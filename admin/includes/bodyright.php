<?php 
	if(!isset($_GET['view_cat'])){
	if(!isset($_GET['view_prod'])){ 
	if(!isset($_GET['add_prod'])){ 	
?>

	<div id="bodyright">
		<?php if(isset($_GET['edit_cat'])){
				include ("edit_cat.php");
			} 
				if(isset($_GET['edit_pro'])){
					include ("edit_pro.php");
				} 
		?>
	</div>
	<!-- end of bodyright -->
<?php } } }?>	