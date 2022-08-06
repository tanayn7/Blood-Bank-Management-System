<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Data From DataBase</title>
    <style>
        body{
            padding: 0px;
            margin: 0px;
            background: linear-gradient(rgb(255, 255, 255), rgb(233, 53, 53));
        }

        #header{
            margin-top: 90px;
            text-align: center;
            font-size: 45px;
            font-weight: 600;
            letter-spacing: 5px;
            font-family: 'Segoe UI';
            color: green
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
            border: 3px solid darkblue;
        }
        th{
            background-color: lightcoral; /* #588c7e */
            border: 1.4px solid black;
            color: black;
            white-space: nowrap;
            text-align: center;
            padding: 5px 13px 15px 13px;
            font-size: 19px;
        }
        td{
            padding: 20px;
            border: 1.5px solid black;
            white-space: nowrap;
        }
        tr{
            background-color: #f2f2f2;
        } 
        tr:nth-child(even) {
            background-color: lightgray;
        } 

        tr:hover{
            background-color: lightsteelblue;
            transform: scale(1.020);
            transition: 1s ease-in-out;
            font-weight: 600;
            color: darkred;
            border: 12px solid gray;
        }
    </style>
</head>
<body>

        <!-- Header -->    
        <?php   include "../common/header.php" ?>


        <div id="header">
            All Donors Information Data
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

        $sql = " SELECT Name, Age, Gender, DOB, City, Blood_Group, Phone_Number, Email_Address, Registration_Date FROM blood_donars ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th> Name </th>
                        <th> Age </th>
                        <th> Gender </th>
                        <th> DOB</th>
                        <th> City</th>
                        <th> Blood Group</th>
                        <th> Mob. Number</th>
                        <th> Email-ID</th>
                        <th> Reg. Date</th>            
                    </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Age'] . "</td>
                        <td>" . $row['Gender'] . "</td>
                        <td>" . $row['DOB'] . "</td>
                        <td>" . $row['City'] . "</td>
                        <td style='text-align:center'>" . $row['Blood_Group'] . "</td>
                        <td>" . $row['Phone_Number'] . "</td>
                        <td>" . $row['Email_Address'] . "</td>
                        <td>" . $row['Registration_Date'] . "</td>
                    </tr>";
            }
            echo "</table>";
        } 
        else {
            echo "0 results";
        }

        $conn->close();
    ?>

    <!-- Footer  -->    
    <?php   include "../common/footer.php"  ?> 
    
</body>
</html>