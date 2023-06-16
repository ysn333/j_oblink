<?php

include "../includes/config.php";
session_start();
if(isset($_POST['submit'])) {
    $id = $_GET['id'];
    $CompanyName = $_POST['CompanyName'];
    $ContactPerson = $_POST['ContactPerson'];
    $Email = $_POST['Email'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Address = $_POST['Address'];

    $sql = "UPDATE employeur SET CompanyName = :CompanyName, ContactPerson = :ContactPerson, Email = :Email ,PhoneNumber = :PhoneNumber , Address = :Address WHERE EmployeurID = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':CompanyName', $CompanyName);
    $stmt->bindParam(':ContactPerson', $ContactPerson);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':PhoneNumber', $PhoneNumber);
    $stmt->bindParam(':Address', $Address);


    $stmt->bindParam(':id', $id);

    $stmt->execute();
    header("Location: ../index.php");
    exit();
}

?>