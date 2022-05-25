<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Andy Automobile</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="customcss/style.css">
        <style> 
          body {
              padding-top: 60px;
          }
      </style>
  </head>
  <body>
<!--Starting navigation bar-->  
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="login.html">Andy Auto</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.html">Register Customer <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <!--Pull right navigation items-->
    <ul class="nav navbar-nav navbar-right">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="images/avatar.png" width="40" height="40" alt="avatar" />
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
    </ul>
    <!--End right navigation items-->
  </div>
</nav>
<!--End navigation bar-->

<?php

include_once 'db.php';
   $num = 1;
      $query = "SELECT * FROM customersinfo";  
      $result = mysqli_query($conn, $query);  
         if(mysqli_num_rows($result) > 0)  
         {  
           echo '<table class="table table-striped title1" >';
                echo'<thead align="left">';
                  echo'<tr>';
                    echo "<th>#</th>";
                     echo "<th>FIRSTNAME</th>";
                     echo "<th>LASTNAME</th>";
                     echo "<th>ADDRESS 1</th>";
                     echo "<th>TOWN</th>";
                     echo "<th>COUNTY</th>";
                     echo "<th>POSTCODE</th>";
                     echo "<th>TELEPHONE NUMBER</th>";
                     echo "<th>MOBILE NUMBER</th>";
                     echo "<th>EMAIL</th>";
                     echo "<th>CAPTURED ON</th>";
                  echo "</tr>";
               echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_assoc($result))  
            {  
                  echo "<tr>";
				         echo "<td>".$num++."</td>";
				         echo "<td>" . $row['firstname'] . "</td>";
				         echo "<td>" . $row['lastname'] . "</td>";
				         echo "<td>" . $row['address1'] . "</td>";
				         echo "<td>" . $row['town'] . "</td>";
				         echo "<td>" . $row['county'] . "</td>";
				         echo "<td>" . $row['postcode'] . "</td>";
				         echo "<td>" . $row['telephone_number'] . "</td>";
                     echo "<td>" . $row['mobile_number'] . "</td>";  
                     echo "<td>" . $row['email'] . "</td>"; 
                     echo "<td>" . $row['record_creation_date'] . "</td>"; 
                  echo "</tr>";
            }
            echo'</tbody>';
         echo'</table>';
         }  else{
            echo"<br />";
            echo "Opps! No record found!";
         }
           

mysqli_close($conn);
?>
</body>
</html>

