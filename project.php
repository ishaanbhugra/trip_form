<?php
$insert=false;
if(isset($_POST['name'])){

    //SET CONNECTION VARIABLES
    $server="localhost";
    $username="root";
    $password="";


    //CREATE  DATABASE CONNECTION
    $con=mysqli_connect($server,$username,$password);


    //CHECK FOR CONNECTION SUCCESS
    if(!$con){
        die("CONNECTION TO THIS DATABASE FAILED DUE TO".mysqli_connect_error());
    }
    echo("SUCCESSFULLY CONNECTED TO THE DATABASE <br>");


    //COLLECT POST VARIABLES
    $name= $_POST['name'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $description= $_POST['description'];

    $sql="INSERT INTO `usa_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$description', current_timestamp());";

    echo $sql;
    

    //EXECUTE THE QUERY
    if($con->query($sql) == true){
        echo "SUCCESSFULLY INSERTED";
        $insert=true;   //FLAG FOR SUCCESSFUL INSERTION
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }


    //CLOSE THE DATABASE CONNECTION
    $con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="project.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="ADGITM">
    <div class="container">
        <h3>Welcome to ADGITM Trip to USA form</h3>
        <p>Enter your details and submit the form to confirm</p>

        <?php
        if($insert==true){
        echo "<p class='submitmsg'>THANKS FOR SUBMITTING THE FORM. WE THANK YOU FOR JOINING US FOR THE USA TRIP.</p>";
        }
        ?>

        <form action="project.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">

            <textarea name="description" id="description" cols="30" rows="10"placeholder="Enter any other description"></textarea>

            <button class="btn">SUBMIT</button>
            <button class="btn" style="margin: 10px;">RESET</button>
        </form>
    </div>

    <script src="project.js"></script>

    
</body>
</html>