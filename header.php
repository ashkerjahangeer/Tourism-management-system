<?php 
	session_start();
	?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tourism Management System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<header>
			<div class="main">
				<h1>Tourism Management System</h1>
			</div>
			<div class="navbar">
				
				<a href="index.php">Home</a>
				<a href="tourpackages.php">Tour Packages</a>				  
				  	<?php 
					  	if (isset($_SESSION['userid']) || isset($_SESSION['adminid'])) {
					  		$name=$_SESSION['username'];
					  		echo "<div class='pushright'>
					  		<a href=#>$name</a>
					  		<a href='includes/logoutinc.php'>Log Out</a>
					  		</div>";
					  		echo '<a href="viewbooking.php">View Bookings</a>';
					  		echo '<a href="enquiry.php">Enquiry</a>';
					  		
					  	}
					  	else{
					  		echo "<div class='pushright'>
					  		<a class='pushright' href='signin.php'>Sign In</a>
					  		<a class='pushright' href='signup.php'>Sign Up</a>
					  		<a class='pushright' href='adminlogin.php'>Admin</a>
					  		</div>";
					  	} 
				  	?>
			  	<a href="about.php">About</a>
				  
			</div>
			
		</header>