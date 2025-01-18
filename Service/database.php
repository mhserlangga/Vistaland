<?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database_name = "vistaland";

  $db = mysqli_connect($hostname, $username, $password, $database_name);

  if($db -> connect_error){
    echo "Connection Error";
    die("Connection Failed");
  }

  // echo "Connection";

?>