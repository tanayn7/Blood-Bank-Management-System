<?php

$insert = false;
if(isset($_POST['submitbtn']))   //if name is there then only connection will formed
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dbms_project";

    $connection = mysqli_connect($server, $username, $password, $database);  

    if(!$connection){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }


    $Name = $_POST['name'];
    $DOB = $_POST['dob'];
    $Age = $_POST['age'];
    $Address = $_POST['address'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $Zipcode = $_POST['zip'];
    $Gender = $_POST['gender'];
    $Bloodgroup = $_POST['bloodgroup'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];


    
    $sql = " INSERT INTO `blood_donars` ( `Name`, `DOB`, `Age`, `Gender`, `Blood_Group`, `Phone_Number`, `Email_Address`, `City`, `State`, `Zip`, `Address`, `Registration_Date`) VALUES ( '$Name', '$DOB', '$Age', '$Gender', '$Bloodgroup', '$Phone', '$Email', '$City', '$State', '$Zipcode', '$Address', CURRENT_TIMESTAMP());  ";


    if($connection->query($sql) == true){
        $insert = true;
?>      
        <script>
            window.alert("Data Inserted Successfully.")
        </script>        
<?php
    }
    else{
        echo "ERROR : $sql <br> $connection->error";
?>
        <script>
            window.alert("Data Not Inserted Successfully.")
        </script>
<?php
    }

    $connection->close();
}

?>