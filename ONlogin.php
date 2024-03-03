<?php
    include base.php;

    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    $sql = "SELECT * FROM usertb WHERE email = '$loginEmail'";
    $result = $conn->query($sql);
    if(result ->num_rows>0){
        $row = $result->fetch_assoc();
        if(password_verify($loginPassword, $row['password'])){
            alert("Login Successful");
            header("Location: index.html");
        }
        else{
            alert("Invalid Password");
        }
    }
    else{
        alert("Invalid Email");
    }


?>