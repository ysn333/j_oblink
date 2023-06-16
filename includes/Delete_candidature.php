<?php
session_start();
include 'config.php';

if (isset($_GET['inscriptionID'])) {
    $inscriptionID = $_GET['inscriptionID'];
    $CandidateID = $_SESSION['CandidateID'];
    // Prepare the SQL statement to delete the job application
    $deleteStmt = $pdo->prepare("DELETE i FROM inscription i
                                                 INNER JOIN offres o ON i.JobID = o.JobID
                                                 INNER JOIN employeur e ON o.EmployeurID = e.EmployeurID
                                                 WHERE i.InscriptionID = :inscriptionID 
                                                 AND i.CandidateID = :candidateID");

    // Bind the parameters
    $deleteStmt->bindParam(':inscriptionID', $inscriptionID);
    $deleteStmt->bindParam(':candidateID', $CandidateID);

    // Execute the delete query
    $deleteStmt->execute();

    // Check if the delete was successful
    if ($deleteStmt->rowCount() > 0) {
        $msg = '<div class="alert alert-success mt-4" role="alert">La candidature a été retirée avec succès.</div>';

    } else {
        $msg =  '<div class="alert alert-danger mt-4" role="alert">Une erreur s\'est produite lors du retrait de la candidature.</div>';

    }
    header("location: ../profil_candidate.php?msg=".urlencode($msg));

}

