<?php
$host ="localhost";
$user ="root";
$password="";
$database="andysauto";

//Connecting to database server/Login database server
$conn = mysqli_connect($host, $user, $password);
if(!$conn){
    die ("Connection failed" . mysqli_connect_error()); echo "<br />";
} else{
    echo "Connection sucessful"; echo "<br />";
}

//CREATE DATABASE

$sql = "CREATE DATABASE IF NOT EXISTS andysauto";
if(mysqli_query($conn, $sql)){
    echo "Database $database created successfully"; echo "<br />";
} else{
    echo "Error Creating Database" . mysqli_query_error($conn); echo "<br />";
}

//select database and create table
mysqli_select_db($conn, $database);

/*
Table structure for table customerinfo
*/

$sql = "CREATE TABLE IF NOT EXISTS customersinfo(
    customerID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(25) NOT NULL,
    lastname VARCHAR(25) NOT NULL,
    address1 TEXT NOT NULL,
    town VARCHAR(25) NOT NULL,
    county VARCHAR(25) NOT NULL,
    postcode VARCHAR(25) NOT NULL,
    telephone_number INT(15) NOT NULL,
    mobile_number INT(15) NOT NULL,
    email VARCHAR(50),
    record_creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
    )";
    
    $sql2 = "CREATE TABLE IF NOT EXISTS users(
        userID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        record_creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
        )";    

    $ret = mysqli_query($conn, $sql);
    if($ret){
        echo "Table Customerinfo created successfully"; echo "<br />";
    } else{
        echo "Error Creating Table:" . mysqli_error($conn); echo "<br />";
    }

    $ret1 = mysqli_query($conn, $sql2);
    if($ret1){
        echo "Table Users created successfully"; echo "<br />";
         // Redirect user to index page
         header("refresh:2; url=userregistration.html");
    } else{
        echo "Error Creating Table:" . mysqli_error($conn); echo "<br />";
    }

   mysqli_close($conn);
?>