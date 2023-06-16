<?php
include 'config.php';


$inscriptionID = $_GET['inscriptionID'];
echo $inscriptionID ;
if (isset($_GET['inscriptionID'])) {
    $inscriptionID = $_GET['inscriptionID'];


    $query = "UPDATE inscription SET Status = 'Interview' WHERE InscriptionID = :inscriptionID";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':inscriptionID' => $inscriptionID]);


    header("Location: ../Candidatures.php");
    exit;
}

?>