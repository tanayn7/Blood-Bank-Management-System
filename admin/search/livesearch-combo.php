<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Find Data</title>
    <style>

        body{
            margin: 0px;
            padding: 0px;
        }

        #container{
            margin-top: 55px;
            background: linear-gradient(rgb(255, 255, 255), rgb(233, 53, 53));
            text-align: center;
            min-height: 100vh;
            margin-bottom: 30px;
        }

        #searchdata{
            height: 100px;
            background-color: lightcoral;
        }

        #iconid{
            font-size: 22px;
            margin-right: 10px;
        }

        #box1{
            height: 35px;
            width: 27%;
            margin-top: 30px;
            font-size: 20px;
            margin-right: 100px;
            background-color: pink;
            color: black;
            outline-style: none;
        }

        #btn{
            height: 40px;
            width: 100px;
            margin-top: 30px;
            font-size: 20px;
            margin-left: 100px;
            background-color: lightsalmon;
            outline-style: none;
            border: 1px solid black;
        }

        #btn:hover{
            background-color: salmon;
            border: 2px solid black;
        }

        #displaydata{
            margin-top: 20px;
        }

        #box1:hover{
            background-color: lightpink;
            outline-style: auto;
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
            background-color: salmon; /* rgb(248, 164, 196) */
            border: 2px solid black;
        }
        
        th {
            background-color: palevioletred; /* #588c7e */
            color: white;
            white-space: nowrap;
            text-align: center;
            padding: 5px 13px 15px 13px;
            font-size: 19px;
            border: 1.3px solid black;
        }

        td {
            padding: 20px;
            border: 1.4px solid black;
            white-space: nowrap;
        }

    </style>
</head>
<body>
    
    <!-- Header -->    
    <?php   include "../common/header.php" ?>

    <div id="container">

        <div id="searchdata">
            <form action="" method="post">
                <span id="iconid"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input id="box1" type="text" name="search" placeholder="Enter blood group">
                <input id="btn" type="submit" name="submit" value="Search">
            </form>
        </div>

        <div id="displaydata">
            
            <!-- php start-->
            <?php

                if(isset($_POST["search"])) 
                {

                    $search_value=$_POST["search"];

                    $server   = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "dbms_project";

                    $con=new mysqli($server, $username, $password, $database);
                    

                    if($con->connect_error){
                        echo 'Connection Faild: '.$con->connect_error;
                    }
                    else{
                        $sql = "select * from blood_donars where Blood_Group like '%$search_value%' ";

                        $res=$con->query($sql);

                        echo "<table>
                                    <tr>
                                        <th style='text-align:center'> Name </th>
                                        <th style='text-align:center'> Age </th>
                                        <th style='text-align:center'> Gender </th>
                                        <th style='text-align:center'> DOB</th>
                                        <th style='text-align:center'> City</th>
                                        <th style='text-align:center'> Blood Group</th>
                                        <th style='text-align:center'> Mob. Number</th>
                                        <th style='text-align:center'> Email-ID</th>
                                        <th style='text-align:center'> Reg. Date</th>            
                                    </tr>";

                        while($row=$res->fetch_assoc()){

                            // output data of each row
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

                    $con->close();
                }
            ?>   <!-- php end -->

        </div>


    </div>


        <!-- Footer -->    
        <?php   include "../common/footer.php"  ?>
</body>
</html>