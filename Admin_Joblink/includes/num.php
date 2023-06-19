<?php
    // Retrieve data from the database



    $success_count = $pdo->query("SELECT COUNT(*) FROM inscription WHERE Status = 'Interview'")->fetchColumn();
    $total_count = $pdo->query("SELECT COUNT(*) FROM inscription")->fetchColumn();
    $teacher_count = $pdo->query("SELECT COUNT(*) FROM employeur")->fetchColumn();
    $new_student_count = $pdo->query("SELECT COUNT(*) FROM candidate")->fetchColumn();
    $offres = $pdo->query("SELECT COUNT(*) FROM offres")->fetchColumn();

?>