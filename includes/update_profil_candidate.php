<?php
// Include the database connection file
require_once 'config.php';

// Define variables and initialize with empty values
$full_name = $email = $phone_number = $city = "";
$full_name_err = $email_err = $phone_number_err = $city_err = "";
$err_s = 0;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the candidate's ID from the hidden input field
    $candidateID = $_POST['id'];

    // Validate full name
    if (empty(trim($_POST["full_name"]))) {
        $full_name_err = "Full name field is required!";
        $err_s = 1;
    } elseif (strlen(trim($_POST["full_name"])) < 6) {
        $full_name_err = "Your full name needs to have a minimum of 6 letters!";
        $err_s = 1;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", trim($_POST["full_name"]))) {
        $full_name_err = "Only letters and white space allowed in full name field!";
        $err_s = 1;
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    // Validate email
    if (empty(trim($_POST["Email"]))) {
        $email_err = "Email field is required!";
        $err_s = 1;
    } elseif (!filter_var(trim($_POST["Email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format!";
        $err_s = 1;
    } else {
        // Check if email already exists in database
        $stmt = $pdo->prepare("SELECT * FROM candidate WHERE Email=:Email AND CandidateID != :CandidateID");
        $stmt->execute(array(':Email' => trim($_POST["Email"]), ':CandidateID' => $candidateID));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $email_err = "Email already exists!";
            $err_s = 1;
        } else {
            $email = trim($_POST["Email"]);
        }
    }

    // Validate phone number
    if (empty(trim($_POST["phone_number"]))) {
        $phone_number_err = "Phone number field is required!";
        $err_s = 1;
    } elseif (!preg_match("/^(?:\+212|0)([6-7]\d{8})$/", trim($_POST["phone_number"]))) {
        $phone_number_err = "Invalid phone number format!";
        $err_s = 1;
    } else {
        $phone_number = trim($_POST["phone_number"]);
    }

    // Validate city
    if (empty(trim($_POST["city"]))) {
        $city_err = "City field is required!";
        $err_s = 1;
    } elseif (strlen(trim($_POST["city"])) < 3) {
        $city_err = "Your city name needs to have a minimum of 3 letters!";
        $err_s = 1;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", trim($_POST["city"]))) {
        $city_err = "Only letters and white space allowed in city field!";
        $err_s = 1;
    } else {
        $city = trim($_POST["city"]);
    }

    // Update the candidate's information in the database if there are no errors
    if ($err_s == 0) {
        $stmt = $pdo->prepare("UPDATE candidate SET full_name=:full_name, Email=:Email, PhoneNumber=:PhoneNumber, city=:city WHERE CandidateID=:CandidateID");
        $stmt->execute(array(':full_name' => $full_name, ':Email' => $email, ':PhoneNumber' => $phone_number, ':city' => $city, ':CandidateID' => $candidateID));
        header("location: update_profil.php");
    }else {
        include 'update_profil.php';

    }
}
