<?php

    $Id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbms_project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $deletequery = " DELETE FROM `blood_donars` WHERE ID=$Id ";
    $query = mysqli_query($conn, $deletequery);

    if($conn->query($deletequery) == true){
        header('location:display-new.php');
    }
    else{
        echo "ERROR : $deletequery <br> $conn->error";
    }

    $conn->close();

?>