<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
     $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
     $address1 = mysqli_real_escape_string($conn, $_POST['txtMsg']);
     $town = mysqli_real_escape_string($conn, $_POST['town']);
     $county = mysqli_real_escape_string($conn, $_POST['county']);
     $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
     $telephone_number = mysqli_real_escape_string($conn, $_POST['telephone_number']);
     $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $record_creation_date = date('Y-m-d H:i:s');

     $sql = "SELECT customerID FROM customersinfo WHERE email ='$email'";
     
     $ret = mysqli_query($conn, $sql);
     if(!$ret){
        die('Error!' . mysqli_error($conn));
     }
     if(mysqli_num_rows($ret) > 0){
      echo '<script>alert("Email is used by someone else please user different email")</script>';  
        header("refresh:0; url=registration.html");
     } else {

     $sql = "INSERT INTO customersinfo (firstname,lastname,address1,town,county,postcode,telephone_number,mobile_number,email,record_creation_date)
     VALUES ('$firstname','$lastname','$address1','$town','$county','$postcode','$telephone_number','$mobile_number','$email','$record_creation_date')";
     if (mysqli_query($conn, $sql)) {
      echo '<script>alert("Customer has been added successfully!")</script>'; 
        
        header("refresh:0; url=registration.html");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
   }

     mysqli_close($conn);
}
?>
