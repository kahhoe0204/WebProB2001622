<?php
    include base.php;

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'myweb2');


    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $regisName = $_POST['regisName'];
    $regisEmail = $_POST['regisEmail'];
    $regiscontact = $_POST['regiscontact'];
    $energySource = $_POST['energySource'];
    $dietraryPre = $_POST['dietraryPre'];
    $commutingMeth = $_POST['commutingMeth'];
    $password = password_hash(randomPassword());


    $stmt =$conn->prepare("insert into user (name, email, contact, energySource, dietraryPre, commutingMeth, password) values (?, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param("sssssss",$regisName, $regisEmail, $regiscontact, $energySource, $dietraryPre, $commutingMeth, $password);
    $stmt -> execute();
    echo("Registration Successful");
    $stmt -> close();
    $conn -> close();
    header("Location: index.html");



    

   
   
?>
