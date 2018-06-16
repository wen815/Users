<?php


//include header file
include('Include/header.html');
//title
echo"<h1 id='regh1'>Register</h1>";
//include form
include('Include/form.html');
//ensure the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    //array to record errors
    $errors=array();
        //check first name
    if(!empty($_POST['fn'])){
      $fn=$_POST['fn'];     
    }
else{
   $errors[]= 'Please input your first name';
}
 //check last name
    if(!empty($_POST['ln'])){
      $ln=$_POST['ln'];      
    }
else{
   $errors[]= 'Please input your last name';
}
 //check email
    if(!empty($_POST['email'])){
      $email=$_POST['email'];      
    }
else{
   $errors[]= 'Please input your email';
}
 //check password
    if(!empty($_POST['pass1'])){
      $pass1=$_POST['pass1'];      
    }
else{
   $errors[]= 'Please input your password';
}
 //confirm password
    if(($_POST['pass2']==$_POST['pass1'])){
      $pass2=$_POST['pass1'];      
    }
else{
   $errors[]= 'The two passwords should be the same';
}
//print errors if existent
if(!empty($errors)){
    echo"<b>Registtration failed!</b>";
  foreach($errors as $content){
      echo "<p>$content</p>";
  }

}
  else{//No errors
//require connecting file
require('Include/connect.php');
//insert the data to the database
$q="insert into users(first_name,last_name,email,pass,registration_date)"
        . "values('$fn','$ln','$email',MD5('$pass1'),NOW())";
$r= mysqli_query($dbc, $q);
if($r){//if database works
         echo "Registration successed!"; 
}
else{//if database does not work
    echo "mysqli_error($dbc)";
}
  }
}



