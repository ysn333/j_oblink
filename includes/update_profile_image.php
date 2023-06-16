<?php

include "config.php";
session_start();

if(isset($_POST['update'])){
    $CandidateID = $_SESSION['CandidateID'];
    $directory = "../uploads/profiles/";
    $pic_name = basename($_FILES["primary"]["name"]);
    $path = $directory.$pic_name;
    move_uploaded_file($_FILES["primary"]["tmp_name"], $path);

    $sqlSat = $pdo->prepare("UPDATE candidate SET `img` = '$pic_name' WHERE CandidateID   = '$CandidateID'");
    $sqlSat->execute();
    header('location:../profil_candidate.php');

    exit();

}
?>
