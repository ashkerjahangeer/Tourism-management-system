<?php 
	include ("header.php"); 
	if (isset($_SESSION['userid'])) {
?>
	<main>

		<h2 align="center">Welcome <?php echo $name ?></h2>
	<?php }?>
		<div class="indeximage">
			<img class="imagepics" style="height:385px;" src="images/pic.jpg">
			<img class="imagepics" style="height:385px;" src="images/pic1.jpg">
		</div>
	</main>

<?php 
	include ("footer.php"); 
?>