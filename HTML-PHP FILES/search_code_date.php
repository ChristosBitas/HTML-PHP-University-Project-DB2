
<!DOCTYPE html>
<html>
<head>
  <title>Number of reservations and total cost</title>
</head>
<body>


<center>
<form name="search" method="post"><br>
       
       Customer code: <input type="text" name="customer_code"><br><br> <!-- Creating textfield for customer code -->
       Date (Year/Month/Day): <input type="text" name="date"><br><br>  <!-- Creating textfield for date -->
       <input type="submit" value="search"> <!-- Creating search button with action -->
       
</form>


<br></br>
       

<?php   

      // Initialization of variables in case no value is entered from the keyboard
      
      $customer_code=''; 
      $date='';
      
      if(isset($_POST['customer_code'])){

        $customer_code=$_POST['customer_code']; // Getting and stored the value from text of customer code
 
      } 
      

      if(isset($_POST['date'])){

        $date=$_POST['date']; // Getting and stored the value from text of date

      } 
           
      include "DbConnection.php";  // Using database connection file here
      $records = mysqli_query($db, "SELECT count(reservation_number) ,sum(cost) FROM reservations WHERE customer_code='$customer_code'
                                    AND month(reservation_date)=month('$date')");  // Use select query here 
     
?>

<?php  

if( $customer_code=!'' && $date!='' && mysqli_num_rows($records) > 0){

?>

   <center><table border="3"></center> <!-- Creating table to display mysql results -->
 
     <tr>        
     <td>Number_Of_Reservations</td>
     <td>Total_cost (€)</td>
    
     </tr>   

     <?php
  
  
     while($data = mysqli_fetch_array($records)){ // Displaying mysql results to a table 

     ?>
  
     <tr>
         <td><?php echo $data['count(reservation_number)']; ?></td>
         <td><?php echo $data['sum(cost)']; ?></td> 
     </tr>	
  
     <?php

    }
}


      mysqli_close($db);  // Closing connection with database

      ?>

      </table>
</center>
</body>
</html>
