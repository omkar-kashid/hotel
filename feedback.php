<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mailid = $_POST['mailid'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];

    // database connection

    $conn = new mysqli('localhost','root','','hotel');
    if($conn->connect_error){
        die('connection failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into feedback(firstname, lastname, mailid, country, subject)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$firstname, $lastname, $mailid, $country, $subject);
        $stmt->execute();
        echo "registration successfully..!";
        $stmt->close();
        $conn->close();
    }
?>