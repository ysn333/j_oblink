<?php

    include 'includes/config.php';

    session_start();

    if (!isset($_SESSION["EmployeurID"])) {
        header("location: login.php");
    }

    $query = "SELECT i.InscriptionID, i.JobID, i.CVID, i.CandidateID, i.ApplicationDate, i.Status, o.JobTitle, o.city, o.type_post, o.date_publee
                FROM inscription i
                INNER JOIN offres o ON i.JobID = o.JobID
                WHERE o.EmployeurID = 1";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <!-- Add this in the <head> section of your HTML -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <link rel ="icon"  href = "https://www.creativefabrica.com/wp-content/uploads/2020/11/02/Abstract-Logo-Design-Vector-Logo-Graphics-6436279-1-312x208.jpg"  type = "image/x-icon">

    <title>Joblink</title>
</head>
<body>

<?php include 'includes/nav.php';?>

<main>
    <aside>
        <form action="" method="get">
            <div class="input-group">
                <h6>Dashbord employeur</h6>
                <label for="country_aside" class="hide"></label>
                <a href="index.php" class="Dashbord"><i class="fas fa-plus-circle" style="color: white"></i> Post an offer</a>
                <a href="Offres_D_emploi.php"><i class="fas fa-briefcase"></i> Offres D'emploi</a>
                <a href="Candidatures.php"  class="active"><i class="fas fa-file-alt"></i> Candidatures</a>

            </div>
        </form>
    </aside>
    <section>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <button id="hamburgerMenu" class="hamburger-menu">&#9776;</button><br><br>
                <div class="main">
                    <div class="aboutus col-lg-9 mx-auto">
                        <div class="aboutus col-lg-12">
                            <!-- Include jQuery library -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                            <!-- Search form -->
                            <form id="searchForm" method="GET">
                                <div class="row mb-4">
                                    <div class="col-lg-10">
                                        <select class="custom-select" name="searchJobTitle">
                                            <option value="">All Job Titles</option>
                                            <?php
                                            // Fetch all unique job titles from the database
                                            $query = "SELECT DISTINCT JobTitle FROM offres WHERE EmployeurID = :employeurID";
                                            $stm = $pdo->prepare($query);
                                            $stm->execute([':employeurID' => $_SESSION['EmployeurID']]);

                                            while ($ro = $stm->fetch(PDO::FETCH_ASSOC)) {
                                                $jobTitle = $ro['JobTitle'];
                                                $selected = (isset($_GET['searchJobTitle']) && $_GET['searchJobTitle'] == $jobTitle) ? 'selected' : '';
                                                echo '<option value="' . $jobTitle . '" ' . $selected . '>' . $jobTitle . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="custom-select" name="searchStatus">
                                            <option value="">All Status</option>
                                            <option value="En attente" <?php if (isset($_GET['searchStatus']) && $_GET['searchStatus'] == 'En attente') echo 'selected'; ?>>En attente</option>
                                            <option value="Interview" <?php if (isset($_GET['searchStatus']) && $_GET['searchStatus'] == 'Interview') echo 'selected'; ?>>Interview</option>
                                            <option value="Reject" <?php if (isset($_GET['searchStatus']) && $_GET['searchStatus'] == 'Reject') echo 'selected'; ?>>Reject</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                include 'includes/config.php';

                // Start the session if it hasn't been started already
                if (!isset($_SESSION)) {
                    session_start();
                }

                // Set default values for search parameters
                $searchJobTitle = '';
                $searchStatus = '';

                // Check if search parameters are provided
                if (isset($_GET['searchJobTitle'])) {
                    $searchJobTitle = $_GET['searchJobTitle'];
                }

                if (isset($_GET['searchStatus'])) {
                    $searchStatus = $_GET['searchStatus'];
                }

                // Modify the SQL query to include the search parameters
                $query = "SELECT i.InscriptionID, i.JobID, i.CVID, i.CandidateID, i.ApplicationDate, i.Status, o.JobTitle, o.city, o.type_post, o.date_publee, c.full_name, c.email, cv.Filename, cv.cover_letter
                FROM inscription i
                INNER JOIN offres o ON i.JobID = o.JobID
                INNER JOIN candidate c ON i.CandidateID = c.CandidateID
                INNER JOIN cv ON i.CVID = cv.CVID
                WHERE o.EmployeurID = :employeurID";

                // Check if search parameters are provided and modify the query accordingly
                if (!empty($searchJobTitle)) {
                    $query .= " AND o.JobTitle = :jobTitle";
                }

                if (!empty($searchStatus)) {
                    $query .= " AND i.Status = :status";
                }

                $stmt = $pdo->prepare($query);

                // Bind values to the parameters
                $stmt->bindValue(':employeurID', $_SESSION['EmployeurID']);

                if (!empty($searchJobTitle)) {
                    $stmt->bindValue(':jobTitle', $searchJobTitle);
                }

                if (!empty($searchStatus)) {
                    $stmt->bindValue(':status', $searchStatus);
                }

                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (empty($results)) {
                    echo '
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="aboutus col-lg-9 mx-auto">
                                <h1>No candidates found.</h1>
                            </div>
                        </div>
                    </div>';
                } else {
                    foreach ($results as $row) {
                        $inscriptionID = $row['InscriptionID'];
                        $JobTitle = $row['JobTitle'];
                        $jobID = $row['JobID'];
                        $cvid = $row['CVID'];
                        $candidateID = $row['CandidateID'];
                        $applicationDate = $row['ApplicationDate'];
                        $status = $row['Status'];
                        $jobTitle = $row['JobTitle'];
                        $city = $row['city'];
                        $typePost = $row['type_post'];
                        $datePublee = $row['date_publee'];
                        $fullName = $row['full_name'];
                        $email = $row['email'];
                        $filename = $row['Filename'];
                        $coverLetter = $row['cover_letter'];

                        // Generate the HTML for each job offer
                        echo '
    <div class="aboutus col-lg-9 mx-auto">
        <div class="img">
            <div class="form-outline-profil col-lg-12 mt-2">
                <div class="info">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="p domain_job">' . $fullName . '</p>
                            <p class="p">' . $email . '</p>
                            <p class="p">Candidateur Post: ' . $JobTitle . '</p>';

                        if (isset($status) && $status == "En attente") {
                            echo '
        <div class="alert alert-primary" role="alert">
            <p class="p">Etat: ' . $status . '</p>
        </div>';
                        } elseif (isset($status) && $status == 'Interview') {
                            echo '
        <div class="alert alert-success" role="alert">
            <p class="p">Etat: ' . $status . '</p>
        </div>';
                        } elseif (isset($status) && $status == 'Reject') {
                            echo '
        <div class="alert alert-danger" role="alert">
            <p class="p">Etat: ' . $status . '</p>
        </div>';
                        }

                        echo '
    <h1 id="h1_' . $inscriptionID . '" class="domain_job" style="display: none; margin-top: 8px">CV :</h1>
    <button class="downloadBtn" id="downloadBtn" onclick="downloadPDF(\'../uploads/' . $filename . '\')"  style="display: none;">Download CV <i class="fas fa-download"></i></button>

    <div id="pdf-container_' . $inscriptionID . '" style="display: none; height: 324px!important;">
        <embed src="../uploads/' . $filename . '" width="100%" height="100%" id="filename_' . $inscriptionID . '" style="display: none;">
    </div>
    <h1 id="h2_' . $inscriptionID . '" class="domain_job" style="display: none; margin-top: 8px">Cover Letter: </h1>
    <p class="p coverLetter" id="coverLetter_' . $inscriptionID . '" style="display: none;">' . nl2br($coverLetter) . '</p>
    <button class="showMoreBtn" onclick="showMore(\'filename_' . $inscriptionID . '\', \'pdf-container_' . $inscriptionID . '\', \'h1_' . $inscriptionID . '\', \'h2_' . $inscriptionID . '\', \'coverLetter_' . $inscriptionID . '\')">Show More</button>

</div>
<div class="col-lg-4 text-right">
    <div class="button-container">
        <a class="a Interview" href="includes/Interview.php?inscriptionID=' . $inscriptionID . '">Interview</a>
        <a class="a" href="includes/Reject.php?inscriptionID=' . $inscriptionID . '">Reject</a>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>';

                    }
                }
                ?>



    </div>
    </div>
    </div>

</section>




    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function downloadPDF(fileURL) {
        var link = document.createElement('a');
        link.href = fileURL;
        link.target = '_blank';
        link.download = fileURL.substring(fileURL.lastIndexOf('/') + 1);
        link.click();
    }

    $(document).ready(function() {
        $('#searchForm select[name="searchJobTitle"]').on('change', function() {
            $('#searchForm').submit();
        });
    });
    $(document).ready(function() {
        $('#searchForm select[name="searchStatus"]').on('change', function() {
            $('#searchForm').submit();
        });
    });
</script>
<style>



    .button-container {
        display: flex;
    }
    .a {
        background-color: #6271dd;
        color: white;
    }

    #pdf-container {
        height: 324px!important;
    }

    .pdf-container embed {
        width: 60%;
        height: 100%!important;
        border: none; /* remove the default border around the PDF viewer */
    }
    .showMoreBtn {
        margin-top: 16px;
        background-color: #6271dd;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        color: white;
        margin-bottom: -55px;
        padding-bottom: -22px;
    }

    select {
        border: 1px solid #6271dd;
        padding: 7px;
    }
    .Dashbord {
        background-color: #6271DD;
        border-radius: 6px!important;
        color: white!important;
    }


    @media (max-width: 768px) {
        .postler {
            display: none;
        }
    }
    .form-outline-profil {
        display: flex;
        justify-content: space-between;;
        align-items: center;
        background-color: #ececec!important;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .domain_job {
        color: #6271DD!important;
        font-size: 20px;
        font-weight: 900;
    }
    .btn {
        background-color: #6271DD!important;
    }

    label {
        color: #858795;
    }

    .form-outline {
        background-color: #ececec;
        padding: 1.5rem;
        border-radius: 10px;
    }
    .form-outl {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: #ececec;
        padding: 1.5rem;
        border-radius: 10px;
    }

    h3 {
        color: #717385;
        font-size: xx-large;
    }

    .form-outline-profil {
        display: flex;
        justify-content: space-between;;
        align-items: center;
        background-color: #ececec59;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .fa-arrow-right-to-bracket  {
        font-size: 1.5rem;
        font-weight: 900;
        color: #6271DD;

    }
    .fa-ellipsis-vertical {
        font-size: 1.5rem;
        font-weight: 900;
        color: #6271DD;
    }
    .p{
        margin-bottom: -1px;
        width: 310px

    ;
    }

    .button-container {
        display: flex;
        margin-left: 9rem;
        margin-top: 1rem;
    }

    .alert-primary {
        color: #6271dd;
        background-color: #cfe2ff;
        border-color: #b6d4fe;
        /* margin-bottom: -3rem; */
        padding-right: -12REM;
        PADDING: 3PX;
        font-weight: 700;
    }
    .alert-danger {
        /* margin-bottom: -3rem; */
        padding-right: -12REM;
        PADDING: 3PX;
        font-weight: 700;
    }

    .alert-success {
        padding-right: -12REM;
        PADDING: 3PX;
        font-weight: 700;
    }
    .domain_job {
        font-size: 18px;
        color: black;
    }

    .a:hover {
        font-weight: 700!important;
        color:#f1aeb5 !important;
    }


    .upload{
        width: 140px;
        position: relative;
        margin: auto;
        text-align: center;
    }

    .upload .rightRound{
        position: absolute;
        bottom: -4px;
        right: 20px;
        background: #6271DD;
        width: 25px;
        height: 31px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }
    .upload .leftRound{
        position: absolute;
        bottom: -6px;
        left: 18px;
        background: red;
        width: 25px;
        height: 31px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }
    .upload .fa{
        color: white;
    }
    .upload input{
        position: absolute;
        transform: scale(2);
        opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
        cursor: pointer;
    }

    #upload{
        margin-right: 1.1rem;
    }

    .pdf-page {
        display: none;
    }

    .pdf-page.active {
        display: inline-block;
    }

    .pagination {
        margin-top: 10px;
    }

    .fa-regular {
        color: #F6F6F6;
    }
    main form {
        padding: 0rem 0rem!important;
        gap: 1.5rem;
    }

    #information {
        padding: 3rem 3rem!important;
    }

    #upload {
        background-color: #6271DD;
    }

    img {
        width: 159px;
        height: 104px;
    }

    .active {
        background-color: #f0f0f0;
        color: #000;
        border-radius: 6px!important;
        /* Add any other styling properties you want */
    }
    .Interview:hover {
        color: #a3cfbb !important;
    }
    .Interview {
        border-right: ridge;
    }

    img {
        width: 159px;
        height: 39px;
    }
</style>

<script>
    // Fetch the cities from the API
    fetch('../ma.json')
        .then(response => response.json())
        .then(cities => {
            // Select the location select element
            const locationSelect = document.getElementById('locationSelect');

            // Loop through the cities and create an option element for each city
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.city; // Set the value of the option to the city name
                option.text = city.city; // Set the text of the option to the city name
                locationSelect.appendChild(option); // Append the option to the select element
            });
        })
        .catch(error => console.error(error));


    // JavaScript code to toggle the visibility of the sidebar
    document.getElementById("hamburgerMenu").addEventListener("click", function() {
        var aside = document.querySelector("main > aside");
        aside.classList.toggle("hidden");
    });


    function showMore(filenameElementID, pdfcontainerElementID, h1ElementID, h2ElementID, coverLetterElementID) {
        var filenameElement = document.getElementById(filenameElementID);
        var pdfcontainerElement = document.getElementById(pdfcontainerElementID);
        var h1Element = document.getElementById(h1ElementID);
        var h2Element = document.getElementById(h2ElementID);
        var coverLetterElement = document.getElementById(coverLetterElementID);
        var showMoreBtn = document.querySelector('.showMoreBtn');
        var downloadBtnElement = document.getElementById('downloadBtn');



        if (filenameElement.style.display === "none") {
            filenameElement.style.display = "block";
            coverLetterElement.style.display = "block";
            pdfcontainerElement.style.display = "block";
            h2Element.style.display = "block";
            h1Element.style.display = "block";
            downloadBtnElement.style.display = "block";
            showMoreBtn.innerHTML = "Show Less";
        } else {
            filenameElement.style.display = "none";
            coverLetterElement.style.display = "none";
            pdfcontainerElement.style.display = "none";
            h2Element.style.display = "none";
            downloadBtnElement.style.display = "none";

            h1Element.style.display = "none";
            showMoreBtn.innerHTML = "Show More";
        }
    }
</script>
<script>
    // Path to your PDF file
    const pdfPath = "../uploads/your_file.pdf";

    let currentPage = 1;
    let totalPages = 0;

    // Load and render the PDF
    pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
        totalPages = pdf.numPages;

        for (let pageNumber = 1; pageNumber <= totalPages; pageNumber++) {
            pdf.getPage(pageNumber).then(page => {
                const canvas = document.createElement("canvas");
                const context = canvas.getContext("2d");

                const viewport = page.getViewport({ scale: 1.5 });
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };

                page.render(renderContext).promise.then(() => {
                    const imgData = canvas.toDataURL("image/png");
                    const imgElement = document.createElement("img");
                    imgElement.src = imgData;
                    imgElement.className = "pdf-page";
                    document.getElementById("pdf-container").appendChild(imgElement);

                    if (pageNumber === currentPage) {
                        imgElement.classList.add("active");
                    }
                });
            });
        }
    });

    // Pagination event listeners
    document.getElementById("prev-page").addEventListener("click", () => {
        if (currentPage > 1) {
            document.querySelector(".pdf-page.active").classList.remove("active");
            currentPage--;
            document.getElementById("current-page").textContent = currentPage;
            document.querySelector(`.pdf-page:nth-child(${currentPage})`).classList.add("active");
        }
    });

    document.getElementById("next-page").addEventListener("click", () => {
        if (currentPage < totalPages) {
            document.querySelector(".pdf-page.active").classList.remove("active");
            currentPage++;
            document.getElementById("current-page").textContent = currentPage;
            document.querySelector(`.pdf-page:nth-child(${currentPage})`).classList.add("active");
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const section1 = document.getElementById("section1");
        const section2 = document.getElementById("section2");
        const nextBtn = document.querySelector(".next");
        const prevBtn = document.querySelector(".prev");

        nextBtn.addEventListener("click", function() {
            section1.style.display = "none";
            section2.style.display = "block";
        });

        prevBtn.addEventListener("click", function() {
            section2.style.display = "none";
            section1.style.display = "block";
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

<script src="javascript/script.js"></script>
<script src="javascript/dropdrown.js"></script>
<!-- Add this before the closing </body> tag of your HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add this before the closing </body> tag of your HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popperjs@1.16.0/dist/umd/popper.min.js"></script>
</body>
</html>

<!--<div class="dropdown">
                 <i id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" class="fa-solid fa-ellipsis-vertical" style="color: #6271dd;"></i>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <li><a class="dropdown-item" href="update_job.php?JobID=' . $row["JobID"] . '">Update Job</a></li>
                     <li><a class="dropdown-item" href="show_details_job.php?JobID=' . $row["JobID"] . '">See Listing Details</a></li>
                 </ul>-->