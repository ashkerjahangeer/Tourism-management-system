<?php 
	include("includes/config.php");
	include("header.php");
	if (isset($_POST['travel-details'])) {
		
		if (isset($_GET['bid'])) {
		    $bid=$_GET['bid'];
		}
		else{
			header("Location:viewbooking.php?error=bidorpidmissing");
		}
		if (isset($_SESSION['userid'])) {
			$query = "SELECT tid,booking.pid,booking.bid,travel.uid,vehiclename,startdate,hotelname,checkin,checkout,enddate from travel JOIN booking ON booking.bid='$bid' AND travel.bid = booking.bid";
    		$query_run = mysqli_query($connection,$query);
    		echo'<h2 style="text-align:center">Travel Details</h2>';
	    	while($result = mysqli_fetch_assoc($query_run)){
	    	?>
	 	<table style="width: 60%" align="center">
	  		<tr>
			    <th>Travel ID:</th>
			    <td><?php echo $result['tid']; ?></td>
			</tr>
			<tr>
			    <th>Package ID:</th>
			    <td><?php echo $result['pid']; ?></td>
			</tr>
			<tr>
			    <th>Booking ID:</th>
			    <td><?php echo $result['bid']; ?></td>
			</tr>
			<tr>
			    <th>User ID:</th>
			    <td><?php echo $result['uid']; ?></td>
			</tr>
			<tr>
			    <th>Vehicle Name:</th>
			    <td><?php echo $result['vehiclename']; ?></td>
			</tr>
			<tr>
			    <th>Travel Start Date:</th>
			    <td><?php echo $result['startdate']; ?></td>
			</tr>
			<tr>
			    <th>Hotel Name:</th>
			    <td><?php echo $result['hotelname']; ?></td>
			</tr>
			<tr>
			    <th>Check In Date:</th>
			    <td><?php echo $result['checkin']; ?></td>
			</tr>
			<tr>
			    <th>Check Out Date:</th>
			    <td><?php echo $result['checkout']; ?></td>
			</tr>
			<tr>
			    <th>Travel Start Date:</th>
			    <td><?php echo $result['enddate']; ?></td>
	  		</tr>
  		</table>

  		<?php 
			}
		}

		else{
			header("Location:signin.php?error=nosession");
		}
	}

	else{
		header("Location:index.php?error=notauthorised");
	}
	?>