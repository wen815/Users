<?php
//include header file
include('Include/header.html');
//header
echo"<h2 id=\"vuh2a\">Name</h2>";
echo"<h2 id=\"vuh2\">Registration Date</h2>";
//require connecting file
require('Include/connect.php');
//select from database;
$q="select CONCAT(first_name,',',last_name) AS name,DATE_FORMAT('%M%d,%Y',registration_date) "
        . "AS dr from users";
$r= mysqli_query($dbc, $q);
if($r){//database works
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
    $ln=$row['name'];
    $dr=$row['dr'];
 require("Include/view_users.html");
 
}
}
else{
    echo "e";
}

