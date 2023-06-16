

<?php

include "config.php";
session_start();

if(isset($_POST['submit'])) {
    $id = $_GET['id'];

    // Delete apprenant's information from the database
    $sql = "DELETE FROM candidate WHERE CandidateID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../index.php");
    exit();
}
?>