<?php
include 'includes/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $companyName = $_POST["CompanyName"];
    $contactPerson = $_POST["ContactPerson"];
    $email = $_POST["Email"];
    $phoneNumber = $_POST["PhoneNumber"];
    $address = $_POST["Address"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    echo  $password ;

    // Perform form validation
    $errors = array();

    // Add your validation logic here
    // Example validation: Check if required fields are empty
    if (empty($companyName)) {
        $errors["CompanyName"] = "Company Name is required";
    }
    if (empty($contactPerson)) {
        $errors["ContactPerson"] = "Contact Person is required";
    }
    if (empty($email)) {
        $errors["Email"] = "Email Address is required";
    }
    if (empty($phoneNumber)) {
        $errors["PhoneNumber"] = "Phone Number is required";
    }
    if (empty($address)) {
        $errors["Address"] = "Address is required";
    }
    if (empty($password)) {
        $errors["password"] = "Password is required";
    }
    if (empty($confirmPassword)) {
        $errors["confirm_password"] = "Confirm Password is required";
    } elseif ($password !== $confirmPassword) {
        $errors["confirm_password"] = "Passwords do not match";
    }

    // If there are no validation errors, proceed with further actions
    if (empty($errors)) {

        // Create a new PDO connection
        // Set PDO error mode to exception

        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO employeur (CompanyName, ContactPerson, Email, PhoneNumber, Address, password) VALUES (:companyName, :contactPerson, :email, :phoneNumber, :address, :password)");

        // Bind parameters and execute the statement
        $stmt->bindParam(":companyName", $companyName);
        $stmt->bindParam(":contactPerson", $contactPerson);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phoneNumber", $phoneNumber);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        // Close the database connection

        // Redirect to a success page or perform other actions
        header("Location: login.php");

    } else {
        include 'register.php';
}
}
?>
