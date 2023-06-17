<?php
include 'includes/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($jobTitle) ) {
        // All required fields are filled
        if (isset($_FILES['img']) && $_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE) {
            // Image file is uploaded
            $filename = $_FILES['img']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $basename = bin2hex(random_bytes(8));
            $newFilename = "$basename.$extension";
        
            $uploadDir = '../uploads/profiles/';
            $uploadPath = $uploadDir . $newFilename;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadPath);
        
            $img = $newFilename;
        } else {
            $img = 'default.png';
        }
        
        
    if (empty($jobTitle) && empty($city) && empty($jobDescription) && empty($qualifications)) {
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
        $sql = "INSERT INTO offres (JobTitle, city, type_post, Salary, EmployeurID, JobDescription, duree_contrat, Qualifications, ExperienceRequired, IMG) VALUES (:jobTitle, :city, :typePost, :salary, :EmployeurID, :jobDescription, :contractDuration, :qualifications, :experienceRequired, :img)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':jobTitle', $jobTitle);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':typePost', $typePost);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':EmployeurID', $_SESSION["EmployeurID"]);
        $stmt->bindParam(':jobDescription', $jobDescription);
        $stmt->bindParam(':contractDuration', $contractDuration);
        $stmt->bindParam(':qualifications', $qualifications);
        $stmt->bindParam(':experienceRequired', $experienceRequired);
        $stmt->bindParam(':img', $img);
        $stmt->execute();

    }

    if ($stmt->rowCount() > 0) {

        $msg =  "Job offer created successfully!";
        $alertClass = "alert-success";
        include 'index.php';

    } else {

        $msg =  "Failed to create job offer.";
        $alertClass = "alert-danger";
        include 'index.php';


    }

}
}
