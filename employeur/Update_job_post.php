<?php
include 'includes/config.php';

session_start();

if (!isset($_SESSION["EmployeurID"])) {
    header("location: login.php");
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $jobID = $_POST['job_id'];

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

    // Prepare the SQL statement for updating the job offer
    $sql = "UPDATE offres SET JobTitle = :jobTitle, city = :city, type_post = :typePost, Salary = :salary, JobDescription = :jobDescription, duree_contrat = :contractDuration, Qualifications = :qualifications, ExperienceRequired = :experienceRequired WHERE JobID = :jobID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':jobTitle', $jobTitle);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':typePost', $typePost);
    $stmt->bindParam(':salary', $salary);
    $stmt->bindParam(':jobDescription', $jobDescription);
    $stmt->bindParam(':contractDuration', $contractDuration);
    $stmt->bindParam(':qualifications', $qualifications);
    $stmt->bindParam(':experienceRequired', $experienceRequired);
    $stmt->bindParam(':jobID', $jobID);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        // Update successful
        $msg = "Job offer updated successfully!";
        $alertClass = "alert-success";
    } else {
        // Update failed
        $msg = "Failed to update job offer.";
        $alertClass = "alert-danger";
    }

    // Redirect back to the form with the message and alert class as query parameters
    header("Location: update_job.php?JobID=$jobID&msg=$msg&alert=$alertClass");
    exit();
}
?>
