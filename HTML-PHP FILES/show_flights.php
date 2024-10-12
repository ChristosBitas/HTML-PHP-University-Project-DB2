
<!DOCTYPE html>
<html>
<head>
  <title>Flights</title>
</head>
<body>

<h2><center>Flight Details</center></h2>
<center><table border="3"></center>  <!--Creating table to display mysql results-->
 
  <tr>        
    <td>Flight_no</td>
    <td>Departure</td>
    <td>Arrival</td>
    <td>Type_of_flight</td>
    <td>Seats</td>
    <td>Free_seats</td>
    <td>Departure_date</td>
  </tr>

<?php

include "DbConnection.php"; // Using database connection file 

$sql_records = mysqli_query($db,"select * from FLIGHTS") or die(mysqli_error()); // Mysql query



while($data = mysqli_fetch_array($sql_records)){ // Displaying mysql results to the table
?>
  
  <tr>
    <td><?php echo $data['flight_no']; ?></td>
    <td><?php echo $data['departure']; ?></td>
    <td><?php echo $data['arrival']; ?></td>
    <td><?php echo $data['Type_of_flight']; ?></td>
    <td><?php echo $data['seats']; ?></td>
    <td><?php echo $data['free_seats']; ?></td>
    <td><?php echo $data['departure_date']; ?></td>  
  </tr>	
  
<?php
}
?>
</table>

<?php 
  mysqli_close($db); // Close connection with the database
?>
</body>
</html>
