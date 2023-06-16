<?php
include 'includes/config.php';
session_start();

$EmployeurID = '2222';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle the uploaded image file
    if (isset($_FILES['img'])) {
        // Get the uploaded file name
        $filename = $_FILES['img']['name'];

        // Generate a unique file name to prevent overwriting existing files
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8));
        $newFilename = "$basename.$extension";

        // Move the uploaded file to a new location
        $uploadDir = '../uploads/profiles/';
        $uploadPath = $uploadDir . $newFilename;
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadPath);

        // Set the IMG column value to the new file name
        $img = $newFilename;
    } else {
        // No image was uploaded or an error occurred
        $img = 'default.png';
    }

    $jobTitle = isset($_POST['job_title']) ? $_POST['job_title'] : null;
    $city = isset($_POST['city']) ? $_POST['city'] : null;
    $typePost = isset($_POST['type_post']) ? $_POST['type_post'] : null;
    $minSalary = isset($_POST['min_salary']) ? $_POST['min_salary'] : null;
    $maxSalary = isset($_POST['max_salary']) ? $_POST['max_salary'] : null;
    $jobDescription = isset($_POST['job_description']) ? $_POST['job_description'] : null;
    $contractDuration = isset($_POST['duree_contrat']) ? $_POST['duree_contrat'] : null;
    $qualifications = isset($_POST['qualifications']) ? $_POST['qualifications'] : null;
    $experienceRequired = isset($_POST['experience_required']) ? $_POST['experience_required'] : null;
    $salary = "$minSalary-$maxSalary";
    // Prepare the SQL statement
    $sql = "INSERT INTO offres (JobTitle, city, type_post, Salary, EmployeurID, JobDescription, duree_contrat, Qualifications, ExperienceRequired, IMG) VALUES (:jobTitle, :city, :typePost, :salary, :EmployeurID, :jobDescription, :contractDuration, :qualifications, :experienceRequired, :img)";
    // Prepare and execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':jobTitle', $jobTitle);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':typePost', $typePost);
    $stmt->bindParam(':salary', $salary);
    $stmt->bindParam(':EmployeurID',$EmployeurID );
    $stmt->bindParam(':jobDescription', $jobDescription);
    $stmt->bindParam(':contractDuration', $contractDuration);
    $stmt->bindParam(':qualifications', $qualifications);
    $stmt->bindParam(':experienceRequired', $experienceRequired);
    $stmt->bindParam(':img', $img);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        // Insertion successful
        // Insertion successful
        $msg =  "Job offer created successfully!";
        $alertClass = "alert-success";
        include 'create_offres.php';
    } else {
        $msg =  "Failed to create job offer.";
        $alertClass = "alert-danger";
        include 'create_offres.php';


    }
}
