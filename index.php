<?php
    include 'includes/config.php';
    session_start();

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
    <!-- Include Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-ggCZxT0Q3pT1pAaPeQ0+5zFHS2CMvKQRVZaMbR4yXDyJlvDZ+76XpJXr7k5E4q6U" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
  <script src="https://kit.fontawesome.com/6011b958cb.js" crossorigin="anonymous"></script>
    <link rel ="icon"  href = "https://www.creativefabrica.com/wp-content/uploads/2020/11/02/Abstract-Logo-Design-Vector-Logo-Graphics-6436279-1-312x208.jpg"  type = "image/x-icon">

</head>
<body>
    <?php include 'includes/nav.php';?>
    <?php include  'includes/class.php';?>
      <main>
        <!-- Intro -->
        <div class="intro">
          <div class="container">
            <div class="intro-text">
              <h1>Looking for a job?<br><BR><span class="green">we will help you</span></h1>
              <div class="check-out">
                <div class="follow">
                  <span>Fallow Us</span>
                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#003a9b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h16.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h5.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h8.8418c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-8v-14h3.82031l1.40039,-7h-5.2207v-2c0,-0.55749 0.05305,-0.60107 0.24023,-0.72266c0.18718,-0.12159 0.76559,-0.27734 1.75977,-0.27734h3v-5.63086l-0.57031,-0.27149c0,0 -2.29704,-1.09766 -5.42969,-1.09766c-2.25,0 -4.09841,0.89645 -5.28125,2.375c-1.18284,1.47855 -1.71875,3.45833 -1.71875,5.625v2h-3v7h3v14h-16c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM32,15c2.07906,0 3.38736,0.45846 4,0.70117v2.29883h-1c-1.15082,0 -2.07304,0.0952 -2.84961,0.59961c-0.77656,0.50441 -1.15039,1.46188 -1.15039,2.40039v4h4.7793l-0.59961,3h-4.17969v16h-4v-16h-3v-3h3v-4c0,-1.83333 0.46409,-3.35355 1.28125,-4.375c0.81716,-1.02145 1.96875,-1.625 3.71875,-1.625z"></path></g></g></svg></a>
                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#003a9b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.16752,0 -13,5.83248 -13,13v18c0,7.16752 5.83248,13 13,13h18c7.16752,0 13,-5.83248 13,-13v-18c0,-7.16752 -5.83248,-13 -13,-13zM16,5h18c6.08648,0 11,4.91352 11,11v18c0,6.08648 -4.91352,11 -11,11h-18c-6.08648,0 -11,-4.91352 -11,-11v-18c0,-6.08648 4.91352,-11 11,-11zM37,11c-1.10457,0 -2,0.89543 -2,2c0,1.10457 0.89543,2 2,2c1.10457,0 2,-0.89543 2,-2c0,-1.10457 -0.89543,-2 -2,-2zM25,14c-6.06329,0 -11,4.93671 -11,11c0,6.06329 4.93671,11 11,11c6.06329,0 11,-4.93671 11,-11c0,-6.06329 -4.93671,-11 -11,-11zM25,16c4.98241,0 9,4.01759 9,9c0,4.98241 -4.01759,9 -9,9c-4.98241,0 -9,-4.01759 -9,-9c0,-4.98241 4.01759,-9 9,-9z"></path></g></g></svg></a>
                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#003a9b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h32c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-32c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM14,11.01172c-1.09522,0 -2.08078,0.32736 -2.81055,0.94141c-0.72977,0.61405 -1.17773,1.53139 -1.17773,2.51367c0,1.86718 1.61957,3.32281 3.67969,3.4668c0.0013,0.00065 0.0026,0.0013 0.00391,0.00195c0.09817,0.03346 0.20099,0.05126 0.30469,0.05273c2.27301,0 3.98828,-1.5922 3.98828,-3.52148c-0.00018,-0.01759 -0.00083,-0.03518 -0.00195,-0.05274c-0.10175,-1.90023 -1.79589,-3.40234 -3.98633,-3.40234zM14,12.98828c1.39223,0 1.94197,0.62176 2.00195,1.50391c-0.01215,0.85625 -0.54186,1.51953 -2.00195,1.51953c-1.38541,0 -2.01172,-0.70949 -2.01172,-1.54492c0,-0.41771 0.15242,-0.7325 0.47266,-1.00195c0.32023,-0.26945 0.83428,-0.47656 1.53906,-0.47656zM11,19c-0.55226,0.00006 -0.99994,0.44774 -1,1v19c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-5.86523v-13.13477c-0.00006,-0.55226 -0.44774,-0.99994 -1,-1zM20,19c-0.55226,0.00006 -0.99994,0.44774 -1,1v19c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-10c0,-0.82967 0.22639,-1.65497 0.625,-2.19531c0.39861,-0.54035 0.90147,-0.86463 1.85742,-0.84766c0.98574,0.01695 1.50758,0.35464 1.90234,0.88477c0.39477,0.53013 0.61523,1.32487 0.61523,2.1582v10c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-10.73828c0,-2.96154 -0.87721,-5.30739 -2.38086,-6.89453c-1.50365,-1.58714 -3.59497,-2.36719 -5.80664,-2.36719c-2.10202,0 -3.70165,0.70489 -4.8125,1.42383v-0.42383c-0.00006,-0.55226 -0.44774,-0.99994 -1,-1zM12,21h4v12.13477v4.86523h-4zM21,21h4v1.56055c0.00013,0.43 0.27511,0.81179 0.68291,0.94817c0.40781,0.13638 0.85714,-0.00319 1.11591,-0.34661c0,0 1.57037,-2.16211 5.01367,-2.16211c1.75333,0 3.25687,0.58258 4.35547,1.74219c1.0986,1.15961 1.83203,2.94607 1.83203,5.51953v9.73828h-4v-9c0,-1.16667 -0.27953,-2.37289 -1.00977,-3.35352c-0.73023,-0.98062 -1.9584,-1.66341 -3.47266,-1.68945c-1.52204,-0.02703 -2.77006,0.66996 -3.50195,1.66211c-0.73189,0.99215 -1.01562,2.21053 -1.01562,3.38086v9h-4z"></path></g></g></svg></a>
                </div>
              </div>
            </div>
            <div class="intro-img">
            </div>
          </div>
        </div>

          <div class="container">
              <main id="caroudebar">
                  <form method="post" action="#caroudebar" onsubmit="return validateForm()">
                      <div class="update-news">
                          <style>
                              .input-group .form-control {
                                  border-radius: 0;
                                  border-left: none;
                              }

                              .input-group i {
                                  float: right;
                                  margin-left: 4px;
                              }

                          </style>
                          <div class="row">
                              <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="JobTitle" placeholder="Type in your job search">
                                      <i class="fas fa-search"></i>
                                  </div>
                              </div>

                              <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                  <select class="custom-select" id="locationSelect" name="city">
                                      <option selected>Select a location</option>
                                      <!-- Add more options here -->
                                  </select>
                              </div>
                              <div class="col-sm-12 col-md-2 col-lg-2 mb-3">
                                  <div class="input-group">
                                      <button type="submit" class="btn btn-primary search">Recherche</button>
                                  </div>
                              </div>

                          </div>
                          <div class="row">

                          <div class="salaryRangeSelect col-sm-12 col-md-3 col-lg-3 mb-3">
                              <select class="custom-select" id="salaryRangeSelect" name="salaryRange">
                                  <option selected>Select a salary range</option>
                                  <option value="0-50000">$0-$50,000</option>
                                  <option value="50000-70000">$50,000-$70,000</option>
                                  <option value="70000-90000">$70,000-$90,000</option>
                                  <option value="90000-120000">$90,000-$120,000</option>
                                  <!-- Add more options here -->
                              </select>
                          </div>
                          <div class=" salaryRangeSelect col-sm-12 col-md-3 col-lg-3 mb-3">
                              <select class="custom-select" id="CompanyName" name="CompanyName">
                                  <option selected>Select a Company</option>
                                  <!-- Add more options here -->
                                  <?php
                                  // Retrieve distinct company names from the database
                                  $companyNames = $pdo->query("SELECT DISTINCT CompanyName FROM employeur")->fetchAll(PDO::FETCH_COLUMN);

                                  // Generate the options for the dropdown list
                                  foreach ($companyNames as $name) {
                                      echo "<option value='$name'>$name</option>";
                                  }
                                  ?>
                              </select>
                          </div>
                              <div class=" salaryRangeSelect col-sm-12 col-md-3 col-lg-3 mb-3">
                                  <select class="custom-select" id="typePost" name="typePost">
                                      <option selected>Select a Type of Post</option>
                                      <option value="CDI">CDI</option>
                                      <option value="CDD">CDD</option>
                                      <!-- Add more options here -->
                                  </select>
                              </div>
                              <div class=" salaryRangeSelect col-sm-12 col-md-3 col-lg-3 mb-3">
                                  <select class="custom-select" id="duree_contrat" name="duree_contrat">
                                      <option selected>Select a duree contrat</option>
                                      <?php
                                      $duree_contrat = $pdo->query("SELECT DISTINCT duree_contrat FROM offres")->fetchAll(PDO::FETCH_COLUMN);

                                      foreach ($duree_contrat as $dure) {
                                          echo "<option value='$dure'>$dure</option>";
                                      }
                                      ?>
                                  </select>
                              </div>

                      </div>
                  </form>
              </main>

              <!-- Rest of the code -->
              <script>
                  function validateForm() {
                      var jobTitle = document.forms[0]["JobTitle"].value;
                      var errorJobTitle = document.getElementById("errorJobTitle");

                      // Check if job title is empty
                      if (jobTitle == "") {
                          errorJobTitle.innerHTML = "Please enter a job title";
                          return false;
                      } else {
                          errorJobTitle.innerHTML = "";
                          return true;
                      }
                  }
              </script>


              <div class="container" style="margin-bottom: 2rem; margin-top: 5em;">
                  <main>
                      <div class="row" >
                          <?php
                          // Get the search criteria
                          $JobTitle = isset($_POST['JobTitle']) ? $_POST['JobTitle'] : '';
                          $city = isset($_POST['city']) ? $_POST['city'] : '';
                          $salaryRange = isset($_POST['salaryRange']) ? $_POST['salaryRange'] : '';
                          $companyName = isset($_POST['CompanyName']) ? $_POST['CompanyName'] : '';
                          $jobType = isset($_POST['typePost']) ? $_POST['typePost'] : '';
                          $dureeContrat = isset($_POST['duree_contrat']) ? $_POST['duree_contrat'] : '';


                          $sql = "SELECT * FROM offres INNER JOIN employeur e ON offres.EmployeurID = e.EmployeurID";

                          // Append search criteria to the SQL query if provided
                          if (!empty($JobTitle)) {
                              $sql .= " AND offres.JobTitle LIKE '%$JobTitle%'";
                          }
                          if (!empty($city) && $city != "Select a location") {
                              $sql .= " AND offres.city LIKE '%$city%'";
                          }
                          if (!empty($jobType) && $jobType != "Select a Type of Post") {
                              $sql .= " AND offres.type_post = '$jobType'";
                          }
                          if (!empty($companyName) && $companyName != "Select a Company") {
                              $sql .= " AND e.CompanyName = '$companyName'";
                          }


                          // ...

                          if (!empty($dureeContrat) && $dureeContrat != "Select a duree contrat") {
                              $sql .= " AND offres.duree_contrat = '$dureeContrat'";
                          }

                          // Add condition to filter by salary range
                          if (!empty($_POST['salaryRange']) && $_POST['salaryRange'] != "Select a salary range") {
                              $salaryRange = $_POST['salaryRange'];

                              // Extract minimum and maximum salary values
                              $salaryMin = intval(str_replace(',', '$', explode('-', $salaryRange)[0]));
                              $salaryMax = intval(str_replace(',', '$', explode('-', $salaryRange)[1]));


                              $formattedMinSalary = '$' . number_format($salaryMin);
                              $formattedMaxSalary = '$' . number_format($salaryMax);
                              $sql .= " AND offres.Salary BETWEEN '$formattedMinSalary' AND '$formattedMaxSalary'";
                          }

                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          $results = $stmt->fetchAll();

                          if (count($results) > 0) {
                              foreach ($results as $row) {
                                  $jobTitle = $row['JobTitle'];
                                  $companyName =$row['CompanyName'];
                                  $jobDescription = $row['JobDescription'];
                                  $location = $row['city'];
                                  $img = $row['img'];
                                  $JobID = $row['JobID'];


                                  $post = date('F j, Y', strtotime($row['date_publee']));
                                  $currentDate = new DateTime();
                                  $pubDate = new DateTime($row['date_publee']);
                                  $interval= $currentDate->diff($pubDate);
                                  $postDate = $interval->format('%a');

                                  $jobOffer = new JobOffer($jobTitle, $companyName, $jobDescription, $location, $postDate, $img, $JobID);
                                  $jobOffer->displayCard();
                              }
                          } else {
                                    echo '<center>';
                                    echo '<div class="no-offers-found  aboutus col-lg-8 mx-auto">';
                                        echo '<img src="data:image/jpeg;base64,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" alt="No job offers found">';
                                      echo '<p>La recherche Emplois '  ;

                                      if ($_POST['JobTitle'] != "") {
                                          echo ' '.$_POST['JobTitle'].' ne donne aucun résultat..</p>';
                                      } else {
                                          echo '</p>';
                                      }

                                      if ($_POST['city'] != "Select a location") {
                                          echo ' '.$_POST['city'].' ne donne aucun résultat..</p>';
                                      } else {
                                          echo '</p>';
                                      }

                                      if ($_POST['salaryRange'] != "Select a salary range") {
                                          echo ''.$_POST['salaryRange'].' ne donne aucun résultat..</p>';
                                      } else {
                                          echo '</p>';
                                      }

                                    echo '</div>';
                                    echo '</center>';

                                }
                          ?>
                      </div>
                  </main>
              </div>



          <!--Search by category-->
        <div class="container">



         <!--job offers-->
<?php include 'Admin_Joblink/includes/num.php';?>

          <!--Top Notch Service-->
          <div class="service text-center">
            <h1>Top Notch <span class="green">Service</span></h1>
            <div class="service-items">
              <div class="item">
                <img src="img/icon/icons8-cv-64.png" alt="">
                <span class="counter"><?php echo $offres;?></span>
                <span>Job offers</span>
              </div>
              <div class="item">
                <img src="img/icon/icons8-teacher-60.png" alt="">
                <span class="counter"><?php echo $teacher_count;?></span>
                <span>company</span>
              </div>
              <div class="item">
                <img src="img/icon/icons8-list-64.png" alt="">
                <span class="counter"><?php echo $success_count;?></span>
                <span>Candidature success</span>
              </div>
              <div class="item">
                <img src="img/icon/icons8-list-50.png" alt="">
                <span class="counter"><?php echo $total_count;?></span>
                <span>Candidature</span>
              </div>
            </div>
          </div>

          <div class="find-jobs text-center">
            <h1><span class="green">Find jobs</span> around<br>the Maroc</h1>
          </div>
        </div>
    </main>
      <!-- Footer -->
    <?php include 'includes/footer.php';?>
    <div class="fb2022-copy">solicode 2022 copyright</div>
    <script src="js/nav-bg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <style>
        
          .intro {
              background-image: url(img/map.svg)!important;
              background-color: #ffff!important;
              background-repeat: no-repeat!important;
              background-position: center!important;
              position: relative!important;
              padding: 120px 0px 50px!important;
          }
          .nav-bg {
              background-image: url(../img/hader-bg.png);
              background-color: #fff;
              background-repeat: no-repeat;
              background-position: center 0;
              border-bottom:1px solid #fff ;
          }

          .card-img-top {
            border-top-right-radius: 16px;
            border-top-left-radius: 16px;
          }
          .icon_1 {
              margin-left: 10px;
          }
          .navbar li .nav-link {
              display: inline-block;
              color: #4b4b4b;
              padding: 15px 30px;
              margin-right: -5px!important;
          }

          .update-news {
              padding: 40px;
              background-color: #ffffff;
              border-radius: 40px;
              color: white;
              margin-top: -8rem!important;
          }

          .btn{
              background-color: #6271DD!important
          }

          .card-title {
              font-size: 20px;
              font-weight: bold;
              margin-bottom: 5px;
              color: #6271DD!important;
          }

          .card-subtitle {
              font-size: 18px;
              font-weight: 300;
              margin-bottom: 5px;
              /* color: #6271DD!important; */
          }
          .mx-auto {
              margin-right: auto!important;
              margin-left: 6rem!important;
          }
          @media (max-width: 992px) {
              .intro-img {
                  display: none;
              }


              .update-news {
                  padding: 40px;
                  background-color: #ffffff;
                  border-radius: 40px;
                  color: white;
                  margin-top: -4rem!important;
              }
              .salaryRangeSelect {
                    display: none;
              }

              .search {
                  width: 100%;
              }
              .input-group {
                  MARGIN-BOTTOM: -37PX;
              }

              .update-news {
                  padding: 18px;
                  background-color: #ffffff;
                  border-radius: 40px;
                  color: white;
                  margin-top: -4rem!important;
              }

          }

          .mx-auto {
              margin-right: auto!important;
              margin-left: 13rem!important;
          }
      </style>

      <!-- User Modal -->

    <script>
        // Fetch the cities from the API
        fetch('ma.json')
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
    </script>
      <!-- Include Bootstrap JS from CDN -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Vn3Xj1r5nVfKpZ1ngzBaBn9gKtRvWj0YksE8wYrr1i4Y5Pn8Kk8n1rHzlILNn5lT" crossorigin="anonymous"></script>

</body>
</html>