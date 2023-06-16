<?php

include "config.php";
session_start();
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];
        $full_name = $_POST['full_name'];
        $Email = $_POST['Email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $city = $_POST['city'];




            // Update apprenant's information in the database without changing the image file
            $sql = "UPDATE candidate SET full_name = :full_name, Email = :Email, PhoneNumber = :PhoneNumber ,city = :city WHERE CandidateID = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':PhoneNumber', $PhoneNumber);
            $stmt->bindParam(':city', $city);
  
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            header("Location: ../index.php");
            exit();
        }

?>