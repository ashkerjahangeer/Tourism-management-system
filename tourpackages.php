<?php 
	include ("includes/config.php");
	include ("header.php");
?>

<table style="width: 100%">
  	<tr>
	    <th>Package id</th>
	    <th>Place</th>
	    <th>Description</th>
	    <th>Stay Amount</th>
	    <th>Food Amount</th>
	    <th>Travel Amount</th>
	    <th>No.Of.Days</th>
	    <th>No.Of.Nights</th>
	    <th>Image</th>
	    <th>Book Package</th>
  	</tr>

<?php 

	$query = "SELECT * from packages";
    $query_run = mysqli_query($connection,$query);
    echo'<h2 style="text-align:center">Tour Packages</h2>';
    while($result = mysqli_fetch_assoc($query_run)){
    	if($result['noofpackages']>0){
    	?>
    	<tr>
		    <td><?php echo $result['pid']; ?></td>
		    <td><?php echo $result['place']; ?></td>
		    <td><?php echo $result['description']; ?></td>
		    <td><?php echo $result['stayamount']; ?></td>
		    <td><?php echo $result['foodamount']; ?></td>
		    <td><?php echo $result['travelamount']; ?></td>
		    <td><?php echo $result['days']; ?></td>
		    <td><?php echo $result['nights']; ?></td>
		    <td><img style="width:350px;height:175px"src = 'images/<?php echo $result["image"]?>'/></td>
		    <td><form align="center" method="post" action="booktour.php?pid=<?php echo $result['pid']?>"><button class="book" type="submit" name="book-package">Book</button></form></td>
  		</tr>

    <?php }
    }
    ?>
  
</table>



