<?php
session_start();
include 'includes/config.php';



if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = stripslashes(strtolower($_POST["email"])) ;
    $password = md5($_POST["password"]);

    // Check if email exists
    $stmt = $pdo->prepare("SELECT * FROM candidate WHERE Email=:Email");
    $stmt->bindParam(':Email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) { 
        if ($result['password'] == $password) {

            $_SESSION['CandidateID'] = $result['CandidateID'];
            $_SESSION['full_name'] = $result['full_name'];
            $_SESSION['Email'] = $result['Email'];
            $_SESSION['PhoneNumber'] = $result['PhoneNumber'];
            $_SESSION['city'] = $result['city'];
            $_SESSION['img'] = $result['img'];
            $_SESSION['reset_token'] = $result['reset_token'];




            $CandidateID = $_SESSION['CandidateID'];
            $full_name = $_SESSION['full_name'] ;
            $Email = $_SESSION['Email'] ;
            $PhoneNumber = $_SESSION['PhoneNumber'];
            $city = $_SESSION['city'];
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
