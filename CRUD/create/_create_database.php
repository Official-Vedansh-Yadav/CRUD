<?php

  $server = "localhost";
  $user = "root";
  $password = "";

  $conn = mysqli_connect($server,$user,$password);

  if (!$conn) {
      die("CAN NOT TO CONNECT DUE TO ERROR --=>" . mysqli_connect_error());
      exit;
  }

  $sql = "CREATE DATABASE crud";
  $result = mysqli_query($conn,$sql);

  if ($result) {
    header("location: /CRUD/create/_create_table.php");
  }else{
    echo "UNABLE TO CREATE DATABASE MAY BE YOU ALREADY HAVE A DATABASE `crud` IN YOUR PHPMYADMIN";
  }
  ?>