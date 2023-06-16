<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION["Email"])) {
    header("location: login.php");
}

$ID = $_SESSION['CandidateID'];
$full_name = $_SESSION['full_name'] ;
$Email = $_SESSION['Email'] ;
$PhoneNumber = $_SESSION['PhoneNumber'];
$city = $_SESSION['city'];

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Code for handling GET request
    // ...
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Code for handling POST request

    // Check if the file is uploaded successfully
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        // Retrieve the necessary values
        $CandidateID = $ID;
        $JobID = $_POST['JobID'];

        // Check if the candidate has already submitted an inscription for the job
        $sql = "SELECT * FROM inscription WHERE JobID = :JobID AND CandidateID = :CandidateID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':JobID', $JobID, PDO::PARAM_INT);
        $stmt->bindParam(':CandidateID', $CandidateID, PDO::PARAM_INT);
        $stmt->execute();
        $existingInscription = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingInscription) {
            // Candidate has already submitted an inscription for the job
            $msg = '<div class="alert alert-danger" role="alert">
                        You have already submitted an inscription for this job.
                    </div>';
        } else {
            // Check if the cover letter is empty
            if (!empty($_POST['cover_letter'])) {
                $filename = basename($_FILES['cv']['name']);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $uniqueFilename = uniqid() . '.' . $extension;

                $uploadDir = 'uploads/';
                $uploadPath = $uploadDir . $uniqueFilename;

                if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadPath)) {
                    $coverLetter = $_POST['cover_letter'];

                    // Insert data into the 'cv' table
                    $sql = "INSERT INTO cv (CandidateID, Filename, cover_letter) VALUES (:CandidateID, :Filename, :cover_letter)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':CandidateID', $CandidateID, PDO::PARAM_INT);
                    $stmt->bindParam(':Filename', $uniqueFilename, PDO::PARAM_STR);
                    $stmt->bindParam(':cover_letter', $coverLetter, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        // Get the last inserted CVID
                        $lastCVID = $pdo->lastInsertId();

                        // Insert data into the 'inscription' table
                        $applicationDate = date('Y-m-d');

                        $sql = "INSERT INTO inscription (InscriptionID, JobID, CVID, CandidateID, ApplicationDate) VALUES (NULL, :JobID, :CVID, :CandidateID, :ApplicationDate)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':JobID', $JobID, PDO::PARAM_INT);
                        $stmt->bindParam(':CVID', $lastCVID, PDO::PARAM_INT);
                        $stmt->bindParam(':CandidateID', $CandidateID, PDO::PARAM_INT);
                        $stmt->bindParam(':ApplicationDate', $applicationDate, PDO::PARAM_STR);

                        if ($stmt->execute()) {
                            // Success message
                            $msg = '<div class="alert alert-success" role="alert">
                                        Application submitted successfully!
                                    </div>';
                        } else {
                            $msg =  '<div class="alert alert-danger" role="alert">
                                        Error submitting application
                                    </div>';
                        }
                    } else {
                        // Error message
                        $msg = '<div class="alert alert-danger" role="alert">
                                    Error uploading file
                                </div>';
                    }
                } else {
                    // Error message
                    $msg =  '<div class="alert alert-warning" role="alert">
                                Please choose a file to upload
                            </div>';
                }
            } else {
                // Error message
                $msg = '<div class="alert alert-warning" role="alert">
                            Please provide a cover letter
                        </div>';
            }
        }
    }

    // Display the $msg variable or handle further actions
    echo $msg;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Name of company</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/6011b958cb.js" crossorigin="anonymous"></script>
    <link rel ="icon"  href = "https://www.creativefabrica.com/wp-content/uploads/2020/11/02/Abstract-Logo-Design-Vector-Logo-Graphics-6436279-1-312x208.jpg"  type = "image/x-icon">
</head>
<body>

<?php include 'includes/nav.php';?>

<?php
$JobID = $_GET['JobID'];
?>

<?php

    $sql = "SELECT * FROM offres WHERE JobID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $JobID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main>
    <div class="main">
        <div class="container">
            <div class="row  mt-5 mb-5">
                <a href="index.php" ><i class="fa-solid fa-arrow-left-long" style="color: #6c757d ;"></i> Other job offeres</a>

                <h3> Postulation a l’offre d’emploi<br> <br><br>
                    <form  method="post"  enctype="multipart/form-data">
                        <?php echo $msg ; ?>
                        <div class="aboutus col-lg-8">
                            <input name="JobID" value="<?php echo $result['JobID']; ?>"  style="display: none">
                            <div class="img">
                                <div class="mt-2">
                                    <div class="row">
                                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white green">Cv</label>
                                        <div class="file-input">
                                            <input type="file" name="cv" id="cv" class="inputfile" onchange="validateFileExtension()"/>
                                            <label for="cv" id="cv-label"><i class="fas fa-upload"></i> Choose a file</label>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">pdf, doc or docx  (MAX. 800x400px).</p>

                                        </div>
                                        </suite>
                                    </div>
                                    </div>
                                    <div class="row mt-5">
                                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white green">Cover letter</label>
                                        <textarea id="message" rows="4" class="block p-2.5 w-full max-w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cover_letter" placeholder="Write your Cover letter here..."></textarea>
                                    </div>
                                </div>
                                <center class="mt-5 mb-5">
                                    <input  class="btn btn-primary active" type="submit" value="APPLY FOR THIS JOB">
                                </center>

                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</main>
<!-- Footer -->
<?php include 'includes/footer.php';?>
<style>
    @media (max-width: 768px) {
        .postler {
            display: none;
        }
    }
    .file-input {
        position: relative;
        display: inline-block;
        margin-top: 1rem;
    }

    .inputfile {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    label[for="cv"] {
        background-color: #6271DD;
        color: #fff;
        font-weight: bold;
        padding: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    a:hover {
        font-weight: 400;
    }
    a {
        color: #6c757d!important;
    }
    .file-input {
        position: relative;
        display: inline-block;
        margin-top: 1rem;
    }

    .inputfile {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    label[for="cv"] {
        background-color: #6271DD!important;
        color: #fff;
        font-weight: bold;
        padding: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    label[for="cv"]:hover {
        background-color: #6271DD!important;
    }

    input[type="file"]:focus + label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }

    .alert-success {
        color: #0f5132;
        font-size: 1rem;
        font-weight: 100;
        background-color: #d1e7dd;
        border-color: #badbcc;
    }.file-input {
         position: relative;
         display: inline-block;
         margin-top: 10px;
     }

    .inputfile {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
        z-index: 1;
    }

    .inputfile + label {
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        background-color: #007bff;
        display: inline-block;
        padding: 12px 20px;
        border-radius: 4px;
        transition: background-color 0.3s ease-in-out;
        cursor: pointer;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
        background-color: #0069d9;
    }

    .file-name {
        display: inline-block;
        margin-left: 10px;
        paddingdans le bouton ;
    }

    .alert {
        font-size: 1rem;
        font-weight: 100;
    }

    .btn{
        background-color: #6271DD!important
    }
    .green {
        color: #6271DD;
        font-size: revert!important;
    }

    @media (max-width: 992px) {
        textarea {

        }
    }
    #message {
        display: block;
        width: 100%;
        max-width: 100%;
        padding: 10px;
        font-size: 16px;
        line-height: 1.5;
        color: #333;
        background-color: #fff;
        border: 2px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    #message:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>

<script>
    function validateFileExtension() {
        var fileInput = document.getElementById('cv');
        var fileName = fileInput.value;
        var allowedExtensions = ['.pdf', '.doc', '.docx'];

        // Extract the file extension
        var extension = fileName.substring(fileName.lastIndexOf('.'));

        // Check if the extension is allowed
        if (allowedExtensions.indexOf(extension.toLowerCase()) === -1) {
            // Invalid file extension
            alert('Invalid file extension. Please select a PDF, DOC, or DOCX file.');
            fileInput.value = ''; // Reset the file input
            return;
        }

        // File extension is valid, update the filename display
        updateFileName();
    }
    function updateFileName() {
        var input = document.getElementById('cv');
        var label = document.getElementById('cv-label');
        var fileName = input.files[0].name;
        label.innerHTML = '<i class="fas fa-upload"></i> ' + fileName;
        label.classList.add('file-name');
    }
</script>
<div class="fb2022-copy">solicode 2022 copyright</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>


