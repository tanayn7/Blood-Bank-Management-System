<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Display Data </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-color:  lightsalmon;
            background: linear-gradient(rgb(255, 255, 255), rgb(233, 53, 53));
        }

        #header{
            text-align: center;
            font-size: 45px;
            font-weight: 700;
            letter-spacing: 3px;
            font-family: 'Segoe UI';
            color: chocolate;
            /* background-color: #f2f2f2; */
            color:darkblue;
            /* background-color: palevioletred; */
            margin-top: 95px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            color: #588c7e;
            font-family: monospace;
            font-size: 17px;
            text-align: left;
            margin: 0 auto;
            margin-top: 50px;
            color:black;
            overflow: scroll;
            margin-bottom: 150px;
            border: 2px solid blue;
        }

        th{
            background-color: black; /* #588c7e */
            color: white;
            white-space: nowrap;
            text-align: center;
            padding: 9px 13px 35px 13px;
            font-size: 19px;
            border: 1.3px solid blueviolet;
            background-color: salmon;
            color:black;
            border: 1.2px solid black;
        }

        td{
            padding: 20px;
            border: 1.5px solid black;
            white-space: nowrap;
        }

        tr{
            background-color: #f2f2f2;
            border: 1px solid black;
        } 

        tr:nth-child(even) {
            background-color: lightgray;
        } 

        tr:hover{
            background-color: lightblue;
        }
    </style>
</head>
<body>

    
    <!-- Header -->    
    <?php   include "../common/header.php" ?>
    
    <div id="header">
        All Registered Donors Information
    </div>
    
    <?php

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

        $selectquery = " SELECT * FROM blood_donars ";
        $result = $conn->query($selectquery);

        if ($result->num_rows > 0) {
    ?>
        
        <table>
            <tr id="firstrow">
                <th  style='text-align:center'> Name </th>
                <th  style='text-align:center'> Age </th>
                <th style='text-align:center'> Gender </th>
                <th style='text-align:center'> DOB </th>
                <th style='text-align:center'> City </th>
                <th style='text-align:center'> Blood Group </th>
                <th style='text-align:center'> Mob. Number </th>
                <th style='text-align:center'> Email-ID </th>
                <th style='text-align:center'> Reg. Date </th>
                <th style='text-align:center' colspan="2"> Operation </th>             
            </tr>
    
    <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
    ?>

                <tr>
                        <td>  <?php  echo $row['Name'];             ?>  </td>
                        <td>  <?php  echo $row['Age'];              ?>  </td>
                        <td>  <?php  echo $row['Gender'];           ?>  </td>
                        <td>  <?php  echo $row['DOB'];              ?>  </td>
                        <td>  <?php  echo $row['City'];             ?>  </td>
                        <td style="text-align:center">  <?php  echo $row['Blood_Group'];  ?>  </td>
                        <td>  <?php  echo $row['Phone_Number'];     ?>  </td>
                        <td>  <?php  echo $row['Email_Address'];    ?>  </td>
                        <td>  <?php  echo $row['Registration_Date'];?>  </td>
                        <td style="border:1px solid black;"> 
                            <a href="update-new.php?id=<?php echo $row['ID']; ?>">
                                <i style="color:green;" class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                            </a>  
                        </td>
                        <td style="border:1px solid black;"> 
                            <a href="delete-new.php?id=<?php echo $row['ID']; ?>"> 
                                <i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>  
                        </td>  
                </tr>

    <?php                
            }
    ?>
    
        </table>
    
    <?php
        } 
        else {
            echo "0 results";
        }

        $conn->close();
    ?>


    <!-- Footer -->    
    <?php   include "../common/footer.php"  ?>
    
</body>
</html>