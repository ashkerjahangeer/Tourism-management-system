<?php 
	include("includes/config.php");
	include ("header.php");
	if (isset($_POST['book-package'])) {
	 	if (isset($_GET['pid'])) {
		    $pid=$_GET['pid'];
		}
		else{
			header("Location:tourpackages.php?error=nopid");
		}
		$uid=$_SESSION['userid'];	 
		if (isset($_SESSION['userid'])) {
			$date= date("Y-m-d");
			?>
			<main>
				<div class="booktourpackage">
					<h2 style="text-align: center;">Booking</h2><hr>
					<form method="post" action="includes/bookings.php?pid=<?php echo $pid?>">
						<p>No.Of.Adults:</p>
						<p><input class="main-form" type="text" name="noofadults" placeholder="No.Of.Adults" required></p>
						<p>No.Of.Children:</p>
						<p><input class="main-form" type="text" name="noofchildren" placeholder="No.Of.Children" required></p>
						<p>Mobile No:</p>
						<p><input class="main-form" type="text" name="mobileno" placeholder="Mobile Number" required></p>
						<p>Address:</p>
						<p><input class="main-form" type="text" name="address" placeholder="Address" required></p>
						<p>Travel Mode:</p>
  						<input type="radio" name="travelmode" value="Flight"> Flight
						<input type="radio" name="travelmode" value="Train"> Train
						<input type="radio" name="travelmode" value="Bus"> Bus
						<p>Tour Date:</p>
						<p><input class="main-form" type="date" min="<?php echo $date?>" name="tourdate" required></p>
						<button class="submit" type="submit" name="book-tourpackage">Book</button>
					</form>
				</div>
			</main>
		<?php }
		else {
			header("Location:signin.php?error=nosession");
		}
	}
	else{
		header("Location:tourpackages.php?error=notauthorised");
	}
	 ?>