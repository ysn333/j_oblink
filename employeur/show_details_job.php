<?php
include 'includes/config.php';

session_start();

if (!isset($_SESSION["EmployeurID"])) {
    header("location: login.php");
}

$JobID = $_GET['JobID'];


// Get the user's information from the database.
$sql = "SELECT * FROM offres WHERE JobID  = $JobID  ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);


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
                <a href="Offres_D'emploi.php" class="active"><i class="fas fa-briefcase"></i> Offres D'emploi</a>
                <a href="Candidatures.php"><i class="fas fa-file-alt"></i> Candidatures</a>

                <!-- <a href="../message.php">Message</a> -->
            </div>
        </form>
    </aside>
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">

                <div class="col-md-12">
                    <button id="hamburgerMenu" class="hamburger-menu">&#9776;</button><br><br>
                    <div class="main">

                        <div class="main">

                            <div class="aboutus col-lg-9 mx-auto mt-5">
                                <div class="img">
                                    <div class="form-outline col-lg-12">


                                                    <div class="row  mt-5 mb-5">
                                                        <div class="aboutus col-lg-11">
                                                            <div class="img">
                                                                <a href="Offres_D'emploi.php" ><i class="fa-solid fa-arrow-left-long" style="color: #6c757d ;"></i> Offres D'emploi</a>
                                                            <div class="details">
                                                                <div>

                                                                    <h3><span class="green"> <?php echo $result['JobTitle']; ?> <br></span>

                                                                    <p>  <?php echo $result['Qualifications']; ?></p>

                                                                </div>
                                                                <div  class="mt-5">
                                                                    <h6><span class="green">City :  <?php echo $result['city']; ?></h6>
                                                                    <h6><span class="green">Type_post :  <?php echo $result['type_post']; ?></h6>
                                                                    <h6><span class="green">Durée du contrat :   <?php echo $result['duree_contrat']; ?></h6>
                                                                </div>

                                                                <div class="mt-2">
                                                                    <p>  <?php echo $result['JobDescription']; ?></p>
                                                                    <br>
                                                                    <h3><span class="green">Requirements:</span> </h3>
                                                                    <p>  <?php echo $result['ExperienceRequired']; ?></p>
                                                                </div>
                                                                <h3><span class="green">Salary :</span> </h3>
                                                                <p>  <?php echo $result['Salary']; ?></p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


    </section>

    </div>
</main>


<style>

    .details {
        margin-top: 2rem;
        margin-left: 3rem;
    }
    span {
        font-weight: 400;
    }
    p{
        font-weight: 300;
        font-size: large;
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
    .btn {
        background-color: #6271DD!important;
    }

    .alert-success {
        padding-right: -12REM;
        PADDING: 3PX;
        font-weight: 500;
        font-size: medium;
    }

    .btn{
        background-color: #6271DD!important
    }
    a:hover {
        font-weight: 400;
    }
    a , h6 , p {
        color: #6c757d!important;
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





