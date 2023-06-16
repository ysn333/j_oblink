<?php
include 'includes/config.php';

if (isset($_POST["submit"])) {
    $full_name = stripslashes(strtolower($_POST["full_name"]));
    $email = stripslashes(strtolower($_POST["email"]));
    $phone_number = stripslashes($_POST["Phone_Number"]);
    $city = stripslashes($_POST["City"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $err_s = 0;
    $md5_pass = md5($password);

    // Validate full name
    if (empty($full_name)) {
        $full_name_errer = 'Full name field is required!';
        $err_s = 1;
    } elseif (strlen($full_name) < 6) {
        $full_name_errer = 'Your full name needs to have a minimum of 6 letters!';
        $err_s = 1;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
        $full_name_errer = 'Only letters and white space allowed in full name field!';
        $err_s = 1;
    }

    // Validate email
    if (empty($email)) {
        $email_errer = 'Email field is required!';
        $err_s = 1;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_errer = 'Invalid email format!';
        $err_s = 1;
    } else {
        // Check if email already exists in database
        $stmt = $pdo->prepare("SELECT * FROM candidate WHERE Email=:Email");
        $stmt->bindParam(':Email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $email_errer = 'Email already exists!';
            $err_s = 1;
            include 'register.php';
        }
    }

    // Validate phone number
    if (empty($phone_number)) {
        $phone_number_errer = 'Phone number field is required!';
        $err_s = 1;
    } elseif (!preg_match("/^(?:\+212|0)([6-7]\d{8})$/", $phone_number)) {
        $phone_number_errer = 'Only numbers allowed in phone number field!';
        $err_s = 1;
    }

    // Validate city
    if (empty($city)) {
        $city_errer = 'City field is required!';
        $err_s = 1;
    } elseif (strlen($city) < 3) {
        $city_errer = 'Your city name needs to have a minimum of 3 letters!';
        $err_s = 1;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $city_errer = 'Only letters and white space allowed in city field!';
        $err_s = 1;
    }

    // Validate password
    if (empty($password)) {
        $password_errer = 'Password field is required!';
        $err_s = 1;
    } elseif (strlen($password) < 5) {
        $password_errer = 'Your password needs to have a minimum of 5 characters!';
        $err_s = 1;
    } elseif ($password !== $confirm_password) {
        $confirm_password_errer = 'Passwords do not match!';
        $err_s = 1;
    }

    if ($err_s == 0) {
        // Prepare statement
        $stmt = $pdo->prepare("INSERT INTO candidate (full_name, Email, PhoneNumber, city, password) 
        VALUES (:full_name, :Email, :PhoneNumber, :city, :password)");
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':Email', $email);
        $stmt->bindParam(':PhoneNumber', $phone_number);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':password', $md5_pass);

        // Execute the statement
        $stmt->execute();
        header('location:login.php');
    } else {
        include 'register.php';
    }
}
?>
