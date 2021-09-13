<?php
	include("includes/config.php");
	include("header.php");
	if(isset($_SESSION['userid'])){
		$uid=$_SESSION['userid'];
		$query = "SELECT booking.bid,booking.pid,booking.mobileno,booking.address,booking.travelmode,booking.bookingdate,booking.tourdate,packages.place,booking.noofadults,booking.noofchildren,packages.description,booking.stayamount,booking.foodamount,booking.travelamount,booking.totalamount,packages.days,packages.nights,packages.image FROM booking JOIN packages ON booking.uid='$uid' AND booking.pid=packages.pid";
		$query_run = mysqli_query($connection,$query);
		echo'<h2 style="text-align:center">Your Bookings</h2>';
		while($result = mysqli_fetch_assoc($query_run)){
			$pid=$result['pid'];
			$bid=$result['bid'];
    	?>
		<div class="viewbookingtable">
		<table align="center">
		  	<tr>
		  		<th>Booking ID</th>
		  		<td><?php echo $result['bid']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Package ID</th>
		  		<td><?php echo $result['pid']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Mobile No</th>
		  		<td><?php echo $result['mobileno']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Address</th>
		  		<td><?php echo $result['address']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Travel Mode</th>
		  		<td><?php echo $result['travelmode']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Booking Date & Time</th>
		  		<td><?php echo $result['bookingdate']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Tour Date</th>
		  		<td><?php echo $result['tourdate']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Place</th>
		  		<td><?php echo $result['place']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>No.Of.Adults</th>
		  		<td><?php echo $result['noofadults']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>No.Of.Children</th>
		  		<td><?php echo $result['noofchildren']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Description</th>
		  		<td><?php echo $result['description']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Stay Amount</th>
		  		<td><?php echo $result['stayamount']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Food Amount</th>
		  		<td><?php echo $result['foodamount']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Travel Amount</th>
		  		<td><?php echo $result['travelamount']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Total Amount</th>
		  		<td><?php echo $result['totalamount']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>No.Of.Days</th>
		  		<td><?php echo $result['days']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>No.Of.Nights</th>
		  		<td><?php echo $result['nights']; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Image</th>
		  		<td><img style="width:450px;height:225px" src = 'images/<?php echo $result["image"]?>'/></td>
		  	</tr>
		  	<tr>
		  		<th>Travel Details</th>
		  		<td><form method="post" action="traveldetails.php?bid=<?php echo $result['bid']?>"><button class="book" type="submit" name="travel-details">Travel Details</button></form></td>
		  	</tr>
		  	<tr>
		  		<th>Cancel/Enquiry</th>
		  		<td><form method="post" action="includes/cancelbooking.php?bid=<?php echo $result['bid']?>"><button class="book" type="submit" name="cancel-booking">Cancel</button></form><form method="post" action="<?php echo'enquiry.php?bid='.$bid.'&pid='.$pid.''?>"><button class="book" type="submit" name="enquiry-booking">Enquiry</button></form></td>
		  	</tr>
		</table>
		</div>
		<br>
		<br>
		<hr>
		<br>
		<br>
		<?php } ?>
    	
    <?php }
    else{
    	header("Location:index.php?error=notauthorised");
    } ?>
   