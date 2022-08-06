
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Form </title>
    <link rel="stylesheet" href="update-style.css">
</head>
<body>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <div class="container">
        <h1 class="well" style="text-align: center;">Registration Form</h1>
        <div class="col-lg-12 well">
            <div class="row">
                    <form action="" method="POST">
                        <div class="col-sm-12">


                        <?php

                            $server = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "dbms_project";

                            $connection = mysqli_connect($server, $username, $password, $database);  

                            if(!$connection){
                                die("Connection to this database failed due to " . mysqli_connect_error());
                            }

                            $Id = $_GET['id'];
                            $sql = " SELECT * FROM blood_donars Where ID=$Id ";
                            //echo $sql;
                            
                            $myquery = mysqli_query($connection, $sql);
                            $result = mysqli_fetch_assoc($myquery);

                            if(isset($_POST['submitbtn'])) 
                            {
                                $Name = mysqli_real_escape_string($connection, $_POST['name']);
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


                                $updatequery = " UPDATE `blood_donars` SET `Name`='$Name',`DOB`='$DOB',`Age`='$Age',`Gender`='$Gender',`Blood_Group`='$Bloodgroup',`Phone_Number`='$Phone',`Email_Address`='$Email',`City`='$City',`State`='$State',`Zip`='$Zipcode',`Address`='$Address' WHERE  ID=$Id";


                                if($connection->query($updatequery) == true){
                                    header('location:display-new.php');
                                }
                                else{
                                    echo "ERROR : $updatequery <br> $connection->error";
                                }

                                $connection->close();
                                
                            }

                            ?>


                            
                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="name" placeholder="Enter Name Here.." class="form-control" value="<?php echo $result['Name']; ?>">
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label> DOB </label>
                                    <input type="date" name="dob" placeholder="Enter Birth Date Here.." class="form-control" value="<?php echo $result['DOB']; ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label> Age </label>
                                    <input type="number" name="age" placeholder="Enter Age Here.." class="form-control"  value="<?php echo $result['Age']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea placeholder="Enter Address Here.." name="address" rows="2" class="form-control"  value="<?php echo $result['Address']; ?>">  <?php echo $result['Address']; ?> </textarea>
                            </div>	
                            
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter City Name Here.." class="form-control" value="<?php echo $result['City']; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>State</label>
                                    <input type="text" name="state" placeholder="Enter State Name Here.." class="form-control" value="<?php echo $result['State']; ?>" required>
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Zip</label>
                                    <input type="text" name="zip" placeholder="Enter Zip Code Here.." class="form-control" value="<?php echo $result['Zip']; ?>">
                                </div>		
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Gender</label>
                                    <input type="text" name="gender" placeholder="Enter Gender Here.." class="form-control" value="<?php echo $result['Gender']; ?>" required>
                                </div>		
                                <div class="col-sm-6 form-group">
                                    <label>Blood Group</label>
                                    <input type="text" name="bloodgroup" placeholder="Enter Blood Group Here.." class="form-control" value="<?php echo $result['Blood_Group']; ?>" required>
                                </div>	
                            </div>						
                            
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" placeholder="Enter Phone Number Here.." class="form-control" value="<?php echo $result['Phone_Number']; ?>" required>
                            </div>		
                            
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="Enter Email Address Here.." class="form-control" value="<?php echo $result['Email_Address']; ?>" required>
                            </div>	
                            
                            <button id="subbtn" type="submit" name="submitbtn" class="btn btn-lg btn-info" value="Update"> Update </button>		

                        </div>
                    </form> 

            </div>
        </div>
    </div>
</body>
</html>