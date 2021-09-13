<?php 
	include ("header.php") 
?>
	<main>
		<div class="adminlogin">
	  		<h2 style="text-align: center;">Sign In to your admin account</h2><hr>
	  		<?php 
		    	if (isset($_GET['error'])) {
		    		if ($_GET['error']=="emptyfields") {
		    			echo '<p class="loginerror">Fill in all fields</p>';
		    		}
		    		else if ($_GET['error']=="wronguserid_or_password") {
		    			echo '<p class="loginerror">Wrong username or password</p>';
		    		}
		    	}
		    ?>
	  		<form method="post" action="includes/adminlogininc.php">
			  	<p>Email ID:</p>
			    <p><input class="main-form" type="text" name="mailid" placeholder="Email"></p>
			    <p>Password:</p>
			    <p><input class="main-form" type="password" name="password" placeholder="Password"></p>
			    <button class="submit" type="submit" name="adminlogin-submit">Admin login</button>
	  		</form>
		</div>
	</main>