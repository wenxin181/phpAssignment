<?php
    $host='localhost';
    $dbuser='root';
    $dbpassword='';
    $dbname = "mumudb";
    $conn=mysqli_connect($host,$dbuser,$dbpassword,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

