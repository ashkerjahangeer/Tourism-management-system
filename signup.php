<?php 
	include ("header.php") 
?>
	<main>
		<div class="signup">
		    <h2 style="text-align: center;">Sign Up to create your account</h2><hr>
		    <?php 
		    	if (isset($_GET['error'])) {
		    		if ($_GET['error']=="emptyfields") {
		    			echo '<p class="loginerror">Fill in all fields</p>';
		    		}
		    		else if ($_GET['error']=="wrongpassword") {
		    			echo '<p class="loginerror">Wrong password</p>';
		    		}
		    		else if ($_GET['error']=="dupfound") {
		    			echo '<p class="loginerror">Username already taken</p>';
		    		}
		    	}
		    ?>
		    <form method="post" action="includes/usersignupinc.php">
				<p>Email ID:</p>
				<p><input class="main-form" type="text" name="mailid" placeholder="Email"></p>
				<p>Password:</p>
				<p><input class="main-form" type="password" name="password" placeholder="Password"></p>
				<p>Repeat Password:</p>
				<p><input class="main-form" type="password" name="repeat-password" placeholder="Repeat Password"></p>
				<button class="submit" type="submit" name="signup-submit">Sign Up</button>
		    </form>
      	</div>
	</main>