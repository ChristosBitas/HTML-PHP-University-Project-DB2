
<!DOCTYPE html>
<html>
<head>
  <title>Customers of flight</title>
</head>
<body>
  
<center>
<form method="POST" action="#" > <!-- Creating drop down list -->
  <br></br>
  Flight Code:
  <select name="Flight_option">   
  
    <option disabled selected>-- Select Flight code --</option> 
    <?php
        include "DbConnection.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT flight_no  From FLIGHTS");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='".$data['flight_no'] ."'>" .$data['flight_no'] ."</option>";  // Displaying data from database in drop down list           
        }	

        if(isset($_POST['submit']))
        {
  
          $getflight=$_POST['Flight_option']; // Getting the selected value from drop down list and stored to a variable

        }      
    ?>  
  </select>
  <input type="submit" name="submit" value="Search"/> <!-- Creating search button and action for drop down list --> 
</form> 

<br></br>


<?php
       
         $records2 = mysqli_query($db, "SELECT customers.customer_code,customer_surname,customer_name,citizenship,date_of_birth FROM customers,reservations 
                                   WHERE reservations.flight_no='$getflight' AND customers.customer_code=reservations.customer_code"); // Mysql query

?>

<?php

 if (mysqli_num_rows($records2) > 0){

?>

    <center><table border="3"></center> <!--Creating table to display mysql results-->
    <tr>        
        <td>customer_code</td>
        <td>customer_surname</td>
        <td>customer_name</td>
        <td>citizenship</td>
        <td>date_of_birth</td>
    </tr>   
      
  <?php

  while($data2 = mysqli_fetch_array($records2)){ // Displaying mysql results to a table 
  ?>
  
  <tr>
    <td><?php echo $data2['customer_code']; ?></td>
    <td><?php echo $data2['customer_surname']; ?></td>
    <td><?php echo $data2['customer_name']; ?></td>
    <td><?php echo $data2['citizenship']; ?></td>
    <td><?php echo $data2['date_of_birth']; ?></td> 
  </tr>	
  
  <?php
  }
}
  mysqli_close($db);  // closing connection with database
  ?>
  </table>
</center>
</body>
</html>
