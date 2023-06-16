<?php
    include 'config.php';
    session_start();

    $CandidateID = $_SESSION['CandidateID'];
    $full_name = $_SESSION['full_name'] ;
    $Email = $_SESSION['Email'] ;
    $PhoneNumber = $_SESSION['PhoneNumber'];
    $city = $_SESSION['city'];


    $id_user = $CandidateID;


    // Get the user's information from the database.
    $sql = "SELECT * FROM candidate WHERE CandidateID = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id',$id_user);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



// Create the HTML form.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Update Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://kit.fontawesome.com/6011b958cb.js" crossorigin="anonymous"></script>
    <link rel ="icon"  href = "https://www.creativefabrica.com/wp-content/uploads/2020/11/02/Abstract-Logo-Design-Vector-Logo-Graphics-6436279-1-312x208.jpg"  type = "image/x-icon">

</head>
<body>

<?php include "navbar_includes.php";  ?>
<main>
<div class="main">
    <div class="container">

        <div class="row  mt-5 mb-5">
                <div class="aboutus col-lg-8  mx-auto">
                    <h3>Update Profile</h3><br><br>
                    <form action="update_profil_candidate.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $user['CandidateID']; ?>" />

                        <div class="form-group mb-4">
                            <label for="first_name">Full Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control <?php if(isset($full_name_err)) { echo 'is-invalid'; } ?>" id="first_name" name="full_name" value="<?php echo $user['full_name']; ?>" />
                                <?php if(isset($full_name_err)) { ?>
                                    <div class="invalid-feedback"><?php echo $full_name_err; ?></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="last_name">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control <?php if(isset($email_err)) { echo 'is-invalid'; } ?>" id="last_name" name="Email" value="<?php echo $user['Email']; ?>" />
                                <?php if(isset($email_err)) { ?>
                                    <div class="invalid-feedback"><?php echo $email_err; ?></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control  <?php if(isset($city_err)) { echo 'is-invalid'; } ?>" id="phone_number" name="phone_number" value="<?php echo $user['PhoneNumber']; ?>" />
                            <?php if(isset($phone_number_err)) { ?>
                                <div class="invalid-feedback"><?php echo $phone_number_err; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group mb-4">
                            <label for="address">City</label>
                            <div class="input-group">
                                <input type="text" class="form-control <?php if(isset($city_err)) { echo 'is-invalid'; } ?>" id="address" name="city" value="<?php echo $user['city']; ?>" />
                                <?php if(isset($city_err)) { ?>
                                    <div class="invalid-feedback"><?php echo $city_err; ?></div>
                                <?php } ?>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mt-4">Update</button>
                    </form>

                </div>

        </div>
    </div>
</div>
</main>
<!-- Footer -->
<footer>
    <div class="container text-center text-md-start">
        <div class="footer-wrap">
            <div class="about">
                <img src="../img/Gray%20Professional%20Minimalist%20CV%20Resume%20(1).jpg" alt="">
                <p class="text-muted py-4">
                    Start working with Firmbee which can provide you with all the tools needed to run an effcieint business remotely.
                </p>
                <div class="social-media">
                    <a href="" class="me-2 text-reset">                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#003a9b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h32c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-32c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM14,11.01172c-1.09522,0 -2.08078,0.32736 -2.81055,0.94141c-0.72977,0.61405 -1.17773,1.53139 -1.17773,2.51367c0,1.86718 1.61957,3.32281 3.67969,3.4668c0.0013,0.00065 0.0026,0.0013 0.00391,0.00195c0.09817,0.03346 0.20099,0.05126 0.30469,0.05273c2.27301,0 3.98828,-1.5922 3.98828,-3.52148c-0.00018,-0.01759 -0.00083,-0.03518 -0.00195,-0.05274c-0.10175,-1.90023 -1.79589,-3.40234 -3.98633,-3.40234zM14,12.98828c1.39223,0 1.94197,0.62176 2.00195,1.50391c-0.01215,0.85625 -0.54186,1.51953 -2.00195,1.51953c-1.38541,0 -2.01172,-0.70949 -2.01172,-1.54492c0,-0.41771 0.15242,-0.7325 0.47266,-1.00195c0.32023,-0.26945 0.83428,-0.47656 1.53906,-0.47656zM11,19c-0.55226,0.00006 -0.99994,0.44774 -1,1v19c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-5.86523v-13.13477c-0.00006,-0.55226 -0.44774,-0.99994 -1,-1zM20,19c-0.55226,0.00006 -0.99994,0.44774 -1,1v19c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-10c0,-0.82967 0.22639,-1.65497 0.625,-2.19531c0.39861,-0.54035 0.90147,-0.86463 1.85742,-0.84766c0.98574,0.01695 1.50758,0.35464 1.90234,0.88477c0.39477,0.53013 0.61523,1.32487 0.61523,2.1582v10c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-10.73828c0,-2.96154 -0.87721,-5.30739 -2.38086,-6.89453c-1.50365,-1.58714 -3.59497,-2.36719 -5.80664,-2.36719c-2.10202,0 -3.70165,0.70489 -4.8125,1.42383v-0.42383c-0.00006,-0.55226 -0.44774,-0.99994 -1,-1zM12,21h4v12.13477v4.86523h-4zM21,21h4v1.56055c0.00013,0.43 0.27511,0.81179 0.68291,0.94817c0.40781,0.13638 0.85714,-0.00319 1.11591,-0.34661c0,0 1.57037,-2.16211 5.01367,-2.16211c1.75333,0 3.25687,0.58258 4.35547,1.74219c1.0986,1.15961 1.83203,2.94607 1.83203,5.51953v9.73828h-4v-9c0,-1.16667 -0.27953,-2.37289 -1.00977,-3.35352c-0.73023,-0.98062 -1.9584,-1.66341 -3.47266,-1.68945c-1.52204,-0.02703 -2.77006,0.66996 -3.50195,1.66211c-0.73189,0.99215 -1.01562,2.21053 -1.01562,3.38086v9h-4z"></path></g></g></svg></a>
                    </a>
                    <a href="" class="me-2 text-reset">                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#003a9b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.16752,0 -13,5.83248 -13,13v18c0,7.16752 5.83248,13 13,13h18c7.16752,0 13,-5.83248 13,-13v-18c0,-7.16752 -5.83248,-13 -13,-13zM16,5h18c6.08648,0 11,4.91352 11,11v18c0,6.08648 -4.91352,11 -11,11h-18c-6.08648,0 -11,-4.91352 -11,-11v-18c0,-6.08648 4.91352,-11 11,-11zM37,11c-1.10457,0 -2,0.89543 -2,2c0,1.10457 0.89543,2 2,2c1.10457,0 2,-0.89543 2,-2c0,-1.10457 -0.89543,-2 -2,-2zM25,14c-6.06329,0 -11,4.93671 -11,11c0,6.06329 4.93671,11 11,11c6.06329,0 11,-4.93671 11,-11c0,-6.06329 -4.93671,-11 -11,-11zM25,16c4.98241,0 9,4.01759 9,9c0,4.98241 -4.01759,9 -9,9c-4.98241,0 -9,-4.01759 -9,-9c0,-4.98241 4.01759,-9 9,-9z"></path></g></g></svg></a>
                    </a>
                    <a href="" class="me-2 text-reset">                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#003a9b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h16.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h5.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h8.8418c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-8v-14h3.82031l1.40039,-7h-5.2207v-2c0,-0.55749 0.05305,-0.60107 0.24023,-0.72266c0.18718,-0.12159 0.76559,-0.27734 1.75977,-0.27734h3v-5.63086l-0.57031,-0.27149c0,0 -2.29704,-1.09766 -5.42969,-1.09766c-2.25,0 -4.09841,0.89645 -5.28125,2.375c-1.18284,1.47855 -1.71875,3.45833 -1.71875,5.625v2h-3v7h3v14h-16c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM32,15c2.07906,0 3.38736,0.45846 4,0.70117v2.29883h-1c-1.15082,0 -2.07304,0.0952 -2.84961,0.59961c-0.77656,0.50441 -1.15039,1.46188 -1.15039,2.40039v4h4.7793l-0.59961,3h-4.17969v16h-4v-16h-3v-3h3v-4c0,-1.83333 0.46409,-3.35355 1.28125,-4.375c0.81716,-1.02145 1.96875,-1.625 3.71875,-1.625z"></path></g></g></svg></a>
                    </a>
                </div>
            </div>
            <div class="company">
                <h6 class="fw-bold">Company</h6>
                <p><a href="">About us</a></p>
                <p><a href="">Services</a></p>
                <p><a href="">Team</a></p>
                <p><a href="">Pricing</a></p>
                <p><a href="">Project</a></p>
                <p><a href="">Careers</a></p>
                <p><a href="">Blog</a></p>
                <p><a href="">Login</a></p>
            </div>
            <div class="useful-links">
                <h6 class="fw-bold">Useful links</h6>
                <p><a href="">Terms of </a></p>
                <p><a href="">Services</a></p>
                <p><a href="">Privacy Policy</a></p>
                <p><a href="">Documentation</a></p>
                <p><a href="">Changelog</a></p>
                <p><a href="">Components</a></p>
            </div>
            <div class="newsletter">
                <h6 class="fw-bold">Newsletter</h6>
                <p class="text-muted">Sign up and receive the latest tips
                    via email.</p>
                <form id="subscribe" action="">
                    <label for="email">Youre e-mail:</label>
                    <input type="email" placeholder="e-mail:" name="email" required>
                    <button type="submit" class="main-btn">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2022 YOUR-DOMAIN | Created by <a href="https://firmbee.com/solutions/project-management/" title="Firmbee - Free Project Management System" target="_blank">Firmbee.com</a></p>
            <!--
            This template is licenced under Attribution 3.0 (CC BY 3.0 PL),
            You are free to: Share and Adapt. You must give appropriate credit, you may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
            -->
        </div>
    </div>
</footer>
<style>
    @media (max-width: 768px) {
        .postler {
            display: none;
        }
    }
    .btn {
        background-color: #6271DD!important;
    }
    .aboutus .img img {
        width: 12%;
        border-radius: 50%;
    }
    .form-outline {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: beige;
        padding: 1.5rem;
        border-radius: 10px;
    }
    h3 {
        color: #6271DD;
    }
    .form-outline-profil {
        display: flex;
        justify-content: space-between;;
        align-items: center;
        background-color: beige;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .fa-arrow-right-to-bracket {
        font-size: 1.5rem;
        font-weight: 900;
        color: #6271DD;

    }

    .invalid{
        color: #ff606e;
    }
    .mt-3 {
        margin-top: 1rem!important;
        DISPLAY: flex;
        JUSTIFY-CONTENT: space-between;
    }

    .invalid {
        color: #ff606e;
        MARGIN-BOTTOM: -0.4rem;
    }
</style>
<div class="fb2022-copy">soliocde 2022 copyright</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
