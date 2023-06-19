

<?php

include 'includes/config.php';
session_start();


    $id = $_GET['JobID'];

    $sql = "DELETE FROM offres WHERE JobID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: Offres_D_emploi.php");
    exit();

?>