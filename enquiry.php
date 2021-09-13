<?php 
	include("includes/config.php");
	include("header.php");
	if (isset($_POST['enquiry-booking'])) {
		
		if (isset($_GET['bid'])) {
		    $bid=$_GET['bid'];
		    $pid=$_GET['pid'];
		}
		else{
			header("Location:viewbooking.php?error=bidorpidmissing");
		}
		if (isset($_SESSION['userid'])) {
			echo '<h2 align=center style="padding:30px 0px 0px 0px;"">Enter Enquiry Details</h2><hr width=500px>';
			echo '<form align="center" method="post" action="includes/insertenquiry.php?pid='.$pid.'&bid='.$bid.'"><input class="enquiry-form" style="width:500px; height:100px" type="text" name="enquiry" placeholder="Enter enquiry details here"></input><br>
			<button class="enquirysubmit" type="submit" name="enquiry-submit">Submit</button></form>';
		}
		else{
			header("Location:signin.php?error=nosession");
		}
	}
	

	else if(isset($_SESSION['userid'])) {

	 	?>
	 	<table style="width: 100%">
  		<tr>
		    <th>Enquiry ID</th>
		    <th>Username</th>
		    <th>Booking ID</th>
		    <th>Package ID</th>
		    <th>Enquiry Date</th>
		    <th>Enquiry</th>
		    <th>Response</th>
  		</tr>

  		<?php 
  		$uid=$_SESSION['userid'];
		$query = "SELECT enquiry.eid,enquiry.bid,enquiry.pid,enquiry.enquirydate,enquiry.enquiry,enquiry.response,users.username from enquiry JOIN users ON enquiry.uid='$uid' AND enquiry.uid = users.uid";
    	$query_run = mysqli_query($connection,$query);
    	echo'<h2 style="text-align:center">Enquiry</h2>';
	    while($result = mysqli_fetch_assoc($query_run)){
	    	?>
	    	<tr>
			    <td><?php echo $result['eid']; ?></td>
			    <td><?php echo $result['username']; ?></td>
			    <td><?php echo $result['bid']; ?></td>
			    <td><?php echo $result['pid']; ?></td>
			    <td><?php echo $result['enquirydate']; ?></td>
			    <td><?php echo $result['enquiry']; ?></td>
			    <td><?php echo $result['response']; ?></td>
	  		</tr>

    	<?php } ?>
    	</table>
    <?php  

	}

	else if(!isset($_SESSION['userid'])) {
		header("Location:signin.php?error=nosession");
	}

	else{
		header("Location:index.php?error=notauthorised");
	}
	?>

	<!-- <textarea class="enquirydetails" name="enquiry" rows="10" cols="30">Enter enquiry details here.</textarea> -->

