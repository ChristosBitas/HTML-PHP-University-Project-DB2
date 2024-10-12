<!-- 

     3η ΕΡΓΑΣΙΑ ΒΑΣΗΣ ΔΕΔΟΜΕΝΩΝ     

     ΟΝΟΜΑΤΕΠΩΝΥΜΟ:ΧΡΗΣΤΟ ΜΠΙΤΑΣ  

     ΑΜ:19390158
     
     ΤΜΗΜΑ 02

-->


<?php

$db = mysqli_connect("localhost","CHRISTOS","1234","Chartered_Airlines"); // Database connection informations

if($db === false){
    die("ERROR: Could not connect to database Chartered Airlines. " . mysqli_connect_error()); // Database connection error message
}

?>


<!-- 

     Για την δημιουργία του χρήστη CHRISTOS χρησιμοποιήθηκαν οι παρακάτω εντολές στο MySqlWorkbench:

     CREATE USER CHRISTOS IDENTIFIED BY '1234';
     GRANT ALL PRIVILEGES ON database.* TO CHRISTOS;
     SHOW GRANTS FOR CHRISTOS;

-->