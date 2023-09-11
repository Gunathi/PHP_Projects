<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneno = $_POST['phoneNumb'];

    $conn = new mysqli('localhost','root','','formdb');
    if ($conn->connect_error) {
        die('connection failed!'. $conn->connect_error);
    }else{
        $stmt = $conn->prepare('INSERT INTO student(fullname, email, password, phonenumber)
        values(?,?,?,?)');
        $stmt->bind_param('sssi', $name, $email, $password, $phoneno);
        
            if($stmt->execute()) {
                echo "Form submitted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        $stmt->close();
        $conn->close();
    }
}
?>
