<?php 

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "crud";

    $conn = mysqli_connect($server,$user,$password,$database);

    // Showing Error if connection was not successful
    if (!$conn) {
        die("UNABLE TO CONNECT TO THE DATABASE DUE TO ERROR --=> " . mysqli_connect_error());
        exit;
    } 

    $sql = "CREATE TABLE `dbvedansh1`.`notes` ( `sno.` INT NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(100) NOT NULL ,  `description` VARCHAR(500) NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sno.`)) ENGINE = InnoDB;";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        header("location: /CRUD");
    }else{
        echo "UNABLE TO CREATE TABLE MAY BE YOU ALREADY HAVE A TABLE `notes` in your database `crud` OR YOU NOT HAVE DATABASE `crud`"
    }

?>