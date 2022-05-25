<?php

include_once 'db.php';
if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["email"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $email = mysqli_real_escape_string($conn, $_POST["email"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $query = "SELECT * FROM users WHERE email = '$email'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          header("refresh:0; url=registration.html");
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                          header("refresh:1; url=login.html");
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("User does not exist please create account")</script>'; 
                header("refresh:1; url=userregistration.html"); 
           }  
      }  
 }  


     mysqli_close($conn);

?>


