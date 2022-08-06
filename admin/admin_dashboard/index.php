<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Dashboard</title>

    <style>
        body{
            padding: 60px;
            background: linear-gradient(rgb(255, 255, 255), rgb(233, 53, 53));
            background-repeat: no-repeat;
            height: 100vh;
            max-width: 100%;
        }

        #header{
            margin-bottom: 30px;
        }

        #piechart{
                border: 2px solid red;
                float: right;
                width: 46.2%;
                background-color: yellowgreen;
        }

        #outer{
            width: 48%;
            float: left;
        }

        #div1{
            position: absolute;
            margin-top: 50px;
            /* width: 48%;
            float: left; */
        }

        #indiv1{
            margin-bottom: 30px;
            text-align: center;
        }

        #indiv2{
            margin-top: 7px;
            display: flex;
        }

        .count{
            border: 3px solid blue;
            font-size: 20px;
            background-color: pink;
            padding: 15px;
            text-align: center;
        }

        #div2{
            color: yellow;
        }
    </style>
  </head>
  
  <body>

    <!-- Header -->    
    <?php   include "../common/header.php" ?>


    <?php

        // Query to remember
        // mysqli_connect();
        // mysqli_connect_error();
        // mysqli_query($connection, $sql);
        // mysqli_fetch_assoc();


        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "dbms_project";

        $connection = mysqli_connect($server, $username, $password, $database);  

        if(!$connection){
            die("Connection to this database failed due to " . mysqli_connect_error());
        }
        
        //Query to find total A+
        $sql  = " SELECT COUNT(Blood_Group) AS 'A+' FROM `blood_donars` WHERE Blood_Group = 'A+';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $A_positive_count = $row['A+'];


        //Query to find total A-
        $sql  = " SELECT COUNT(Blood_Group) AS 'A-' FROM `blood_donars` WHERE Blood_Group = 'A-';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $A_negative_count = $row['A-'];


        //Query to find total B+
        $sql  = " SELECT COUNT(Blood_Group) AS 'B+' FROM `blood_donars` WHERE Blood_Group = 'B+';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $B_positive_count = $row['B+'];


        //Query to find total B-
        $sql  = " SELECT COUNT(Blood_Group) AS 'B-' FROM `blood_donars` WHERE Blood_Group = 'B-';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $B_negative_count = $row['B-'];


        //Query to find total AB+
        $sql  = " SELECT COUNT(Blood_Group) AS 'AB+' FROM `blood_donars` WHERE Blood_Group = 'AB+';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $AB_positive_count = $row['AB+'];
        

        //Query to find total AB-
        $sql  = " SELECT COUNT(Blood_Group) AS 'AB-' FROM `blood_donars` WHERE Blood_Group = 'AB-';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $AB_negative_count = $row['AB-'];
        

        //Query to find total O+
        $sql  = " SELECT COUNT(Blood_Group) AS 'O+' FROM `blood_donars` WHERE Blood_Group = 'O+';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $O_positive_count = $row['O+'];


        //Query to find total O-
        $sql  = " SELECT COUNT(Blood_Group) AS 'O-' FROM `blood_donars` WHERE Blood_Group = 'O-';  ";
        $data = mysqli_query($connection, $sql);
        $row  = mysqli_fetch_assoc($data);
        $O_negative_count = $row['O-'];


        //Total Count (M+F)
        $sql = " SELECT COUNT(*) AS total FROM `blood_donars`; ";
        $data = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($data);
        $total_count = $row['total'];

        //Total Males
        $sql = " SELECT COUNT(Gender) AS male FROM `blood_donars` WHERE Gender='Male'; ";
        $data = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($data);
        $males = $row['male'];

        //Total Females
        $sql = " SELECT COUNT(Gender) AS female FROM `blood_donars` WHERE Gender='Female'; ";
        $data = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($data);
        $females = $row['female'];


        $connection->close(); //close connection
    ?>    






    <h1 id="header" style="text-align: center;"> 
        <i class="fa fa-user-circle-o" aria-hidden="true"></i> Admin Dashboard 
    </h1>

    <div id="piechart">  </div>

    <div id="outer">
        <div id="div2">
            <img src="cover.jpg" alt="blood-group image" height="275" width="700">
        </div>

        <div id="div1">
            <p id="indiv1">
                <span class="count">
                    <i class="fa fa-users" aria-hidden="true"></i> Total Donors : <?php echo $total_count;  ?> 
                </span>
            </p>
            <p id="indiv2">
                <span class="count" style="margin-right: 160px;">
                    <i class="fa fa-male" aria-hidden="true"></i> Male Doners  <?php echo $males;  ?>
                </span>
                <span class="count" style="margin-left: 158px;">
                    <i class="fa fa-female" aria-hidden="true"></i> Female Doners  <?php echo $females;  ?>
                </span>
            </p>
        </div>
    </div>
    

    


    <!-- Pie chart : JS code-->
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['A+',  <?php  echo $A_positive_count ; ?>],
                ['A-',  <?php  echo $A_negative_count ; ?>],
                ['B+',  <?php  echo $B_positive_count ; ?>],
                ['B-',  <?php  echo $B_negative_count ; ?>],
                ['O+',  <?php  echo $O_positive_count ; ?>],
                ['O-',  <?php  echo $O_negative_count ; ?>],
                ['AB+', <?php  echo $AB_positive_count; ?>],
                ['AB-', <?php  echo $AB_negative_count; ?>],
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Total Members with Blood Group', 'width':650, 'height':445, 'backgroundColor':'pink', 'fontSize':20};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>


    <!-- Footer -->    
    <?php   include "../common/footer.php"  ?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>