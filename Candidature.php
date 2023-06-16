<?php


include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $JobID = $_GET['JobID'];

    $sql = "SELECT * FROM offres WHERE JobID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $JobID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {

        $CandidateID = 1;

        $filename = basename($_FILES['cv']['name']);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $uniqueFilename = uniqid() . '.' . $extension;

        $uploadDir = 'uploads/';
        $uploadPath = $uploadDir . $uniqueFilename;

        if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadPath)) {

            $coverLetter = $_POST['cover_letter'];

            $sql = "INSERT INTO cv ( CandidateID, Filename, cover_letter) VALUES ( :CandidateID, :Filename, :cover_letter)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':CandidateID', $CandidateID, PDO::PARAM_INT);
            $stmt->bindParam(':Filename', $uniqueFilename, PDO::PARAM_STR);
            $stmt->bindParam(':cover_letter', $coverLetter, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Success message
                echo "Application submitted successfully!";
            } else {
                // Error message
                echo "Error submitting application";
            }

        } else {
            // Error message
            echo "Error uploading file";
        }

    } else {
        // Error message
        echo "Please choose a file to upload";
    }

}

?>