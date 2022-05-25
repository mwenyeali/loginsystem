<?php
include_once 'db.php';
if(isset($_POST["submit"]))  
{  
     if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"]) || empty($_POST["password"]))  
     {  
          echo '<script>alert("all Fields are required")</script>';  
     }  
     else  
     {  
          $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]); 
          $email = mysqli_real_escape_string($conn, $_POST["email"]);  
          $password = mysqli_real_escape_string($conn, $_POST["password"]); 
          $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]); 
          if($password !== $confirmpassword)
          {
               echo '<script>alert("Password do not match")</script>'; 
               header("refresh:0; url=userregistration.html");
          } 
          else {
               $sql = "SELECT userID FROM users WHERE email ='$email'";
     
               $ret = mysqli_query($conn, $sql);
               if(!$ret){
                  die('Error!' . mysqli_error($conn));
               }
               
               if(mysqli_num_rows($ret) > 0){
                    echo '<script>alert("email is used by someone else please use different email")</script>'; 
                    header("refresh:0; url=userregistration.html");
               } 
               else{
                    $password = password_hash($password, PASSWORD_DEFAULT);  
                    $query = "INSERT INTO users(fullname, email, password) VALUES('$fullname','$email', '$password')";  
                    if(mysqli_query($conn, $query))  
                    {  
                         echo '<script>alert("Registration Done")</script>';  
                         header("refresh:0; url=login.html");
                    } 
                    else
                    {
                         echo '<script>alert("Some thing went wrong try again")</script>';  
                         header("refresh:0; url=userregistration.html");
                    } 
     
               }

          }

     }  
} 

     mysqli_close($conn);

?>
