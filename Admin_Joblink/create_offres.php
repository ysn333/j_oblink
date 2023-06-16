<?php
include 'includes/config.php';
session_start();
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
                <h6>Dashbord Admin</h6>
                <label for="country_aside" class="hide"></label>
                <a href="index.php"><i class="fas fa-briefcase"></i> Home</a>
                <a href="Offres_D_emploi.php"><i class="fas fa-briefcase"></i> Offres D'emploi</a>
                <a href="Candidatures.php"  class="active"><i class="fas fa-file-alt"></i> Candidatures</a>

                <!-- <a href="../message.php">Message</a> -->
            </div>
        </form>
    </aside>
<section>

    <div class="main">

        <div class="aboutus col-lg-11 mx-auto mt-5">
            <div class="img">
                <div class="form-outline col-lg-12">
                    <?php if (isset($msg)): ?>
                        <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                            <?php echo $msg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form id="jobForm" action="Create_offer.php"  enctype="multipart/form-data" method="post" >
                        <!-- First Section -->
                        <div id="section1">
                            <div class="col-md-12 mt-3">
                                <label>Job Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="job_title" placeholder="Enter Job Title" required>
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <label>Where do you want to promote this ad <span class="text-danger">*</span></label>
                                <select class="custom-select" id="locationSelect" name="city" required>
                                    <option selected disabled>Select a location</option>
                                    <!-- Add more options here -->
                                </select>
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Type of post</label>
                                <select class="custom-select" id="locationSelect" name="type_post">
                                    <option selected disabled>Select a Type of post</option>
                                    <option value="CDD">CDD</option>
                                    <option value="CDI">CDI</option>
                                    <!-- Add more options here -->
                                </select>
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Salary</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="min_salary" placeholder="Minimum Salary">
                                        <div class="invalid"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="max_salary" placeholder="Maximum Salary">
                                        <div class="invalid"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                        </div>

                        <!-- Second Section -->
                        <div id="section2" style="display: none;">
                            <div class="col-md-12 mt-3">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea id="message" rows="2" class="block p-2.5 w-full max-w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="job_description" placeholder="Write your Cover letter here..." required></textarea>
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Durée du contrat</label>
                                <input class="form-control" type="text" name="duree_contrat">
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Qualifications <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="qualifications" placeholder="Enter Qualifications" required>
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Experience Required</label>
                                <input class="form-control" type="text" name="experience_required" placeholder="Enter Experience">
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="img">Image:</label>
                                <input type="file" class="form-control" id="img" name="img">
                                <div class="invalid"></div>
                            </div>
                            <div class="col-md-12 mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary prev">Previous</button>
                                <button type="submit" class="btn btn-primary search">Confirmer <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



                </div>
            </div>
        </div>
    </div>

</section>
    </div>
</main>


<style>
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
    .btn {
        background-color: #6271DD!important;
    }

    .alert-success {
        padding-right: -12REM;
        PADDING: 3PX;
        font-weight: 500;
        font-size: medium;
    }

    label {
        color: #858795;
    }

    .form-outline {
        background-color: #ececec75;
        padding: 1.5rem;
        border-radius: 10px;
    }
    .form-outl {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: #ececec75;
        padding: 1.5rem;
        border-radius: 10px;
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
        color: #ff3c3c !important;
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
    .btn-danger {
        background-color: #dc3545!important;
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
    h3 {
        color: #6271DD;
        font-size: xx-large;
        font-weight: 200;
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




