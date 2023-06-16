

<?php

include '../includes/config.php';
session_start();

if(isset($_POST['submit'])) {
    $id = $_GET['id'];

    // Delete apprenant's information from the database
    $sql = "DELETE FROM employeur WHERE EmployeurID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Delete apprenant's image file from the server
    
    header("Location: ../index.php");
    exit();
}
?>