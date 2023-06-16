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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
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
    $JobID = $_GET['id'];
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
                <div class="aboutus col-lg-8">
                    <div class="img">
                        <div>
                            <a href="index.php" ><i class="fa-solid fa-arrow-left-long" style="color: #6c757d ;"></i> Other job offeres</a>
                            <h3><span class="green"> <?php echo $result['JobTitle']; ?> <br>
                                    <?php
                                        $EmployeurID = $result['EmployeurID'];
                                        $sql = "SELECT * FROM employeur WHERE EmployeurID = :EmployeurID";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->bindParam(':EmployeurID', $EmployeurID, PDO::PARAM_INT);
                                        $stmt->execute();
                                        $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
                                    ?>
                            (<?php echo $result2['CompanyName'] ;?>)</span></h3>
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
                    <form action="Apply_job.php" method="GET">
                        <input name="JobID" value="<?php echo $result['JobID']; ?>"  style="display: none ;  background-color: #6271DD!important">
                        <center CLASS="mt-5 mb-5"><input  class="btn btn-primary active" type="submit" value="APPLY FOR THIS JOB"></center>
                    </form>
                </div>
                    <div class="sidebar col-lg-4 postler">
                        <div class="input-group">
                            <div class="form-outline col-lg-4">
                                <form action="Apply_job.php" method="GET">
                                    <input name="JobID" value="<?php echo $result['JobID']; ?>"  style="display: none ;  background-color: #6271DD!important">
                                    <input  class="btn btn-primary active" type="submit" value="APPLY FOR THIS JOB"   style="  background-color: #6271DD!important">

                                </form>
                            </div>
                        </div>
                    </div>
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

    .btn{
        background-color: #6271DD!important
    }
    a:hover {
        font-weight: 400;
    }
    a {
        color: #6c757d!important;
    }
</style>
<div class="fb2022-copy">soliocde 2022 copyright</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>