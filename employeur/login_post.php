<?php
session_start();
include 'includes/config.php';



if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = stripslashes(strtolower($_POST["email"])) ;
    $password = $_POST["password"];

    // Check if email exists
    $stmt = $pdo->prepare("SELECT * FROM employeur WHERE Email=:Email");
    $stmt->bindParam(':Email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) { 
        if ($result['password'] == $password) {

            $_SESSION['EmployeurID'] = $result['EmployeurID'];
            $_SESSION['CompanyName'] = $result['CompanyName'];
            $_SESSION['ContactPerson'] = $result['ContactPerson'];
            $_SESSION['Email'] = $result['Email'];




            header('location: index.php');
            exit();
        } else {
            $password_errer = 'Incorrect password!';
            include 'login.php';
        }
    } else { 
        $email_errer = 'Email not found!';
        include 'login.php';
    }
}


?>
