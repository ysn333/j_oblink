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

        <?php include 'includes/num.php'; ?>

        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users"></i> Candidatures</h5>
                            <p class="card-text"><?php echo  $new_student_count ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-graduation-cap"></i>Successful Candidatures</h5>
                            <p class="card-text"><?php echo  $success_count ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-chalkboard-teacher"></i>Employuer</h5>
                            <p class="card-text"><?php echo  $teacher_count ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-2">
                    <a href="create_offres.php" class="Dashbord"><i class="fas fa-plus-circle" style="color: white"></i> Post an offeres</a><br><br>
                </div>

                <div class="col-md-12">
                    <h2 class="mb-4">Liste des Candidatures</h2>
                    <form action="index.php" method="GET" class="search-form">
                        <div class="form-group">
                            <label for="search">Rechercher par Full name :</label>
                            <input type="text" name="search" id="search" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary BTNN">Rechercher</button>
                    </form>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>full_name</th>
                            <th>Email</th>
                            <th>PhoneNumber</th>
                            <th>city</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $rows_per_page = 4;

                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                        $limit = $rows_per_page;
                        $offset = ($current_page - 1) * $rows_per_page;



                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        if (!empty($search)) {
                            $sql = "SELECT COUNT(*) AS count FROM candidate WHERE full_name LIKE :search ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                        } else {
                            $sql = "SELECT COUNT(*) AS count FROM candidate";
                            $stmt = $pdo->prepare($sql);
                        }
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total_rows = $result['count'];

                        $total_pages = ceil($total_rows / $rows_per_page);

                        if (!empty($search)) {
                            $sql = "SELECT * FROM candidate WHERE full_name LIKE :search LIMIT :limit OFFSET :offset";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                        } else {
                            $sql = "SELECT * FROM candidate LIMIT :limit OFFSET :offset";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                        }
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($result) > 0) {
                            // Output data of each row
                            foreach($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["CandidateID"] . "</td>";
                                echo "<td>" . $row["full_name"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "<td>" . $row["PhoneNumber"] . "</td>";
                                echo "<td>" . $row["city"] . "</td>";
                                echo "<td><a href='includes\update_apprenant.php?id=" . $row["CandidateID"] . "' class='btn btn-primary btn-sm mr-2'>Modifier</a><a href='includes/delete_Candidatures.php?id=" . $row["CandidateID"] . "' class='btn btn-danger btn-sm'>Supprimer</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucun Candidatures trouvé.</td></tr>";
                        }

                        ?>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php if ($current_page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>">Précédent</a></li>
                            <?php endif; ?>

                            <?php
                            // Limit the number of visible links to 7
                            $visible_links = 7;
                            $start = max(1, $current_page - floor($visible_links / 2));
                            $end = min($total_pages, $start + $visible_links - 1);
                            $start = max(1, $end - $visible_links + 1);

                            for ($i = $start; $i <= $end; $i++):
                                ?>
                                <li class="page-item <?php echo $current_page == $i ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>"><?php echo $i; ?></a></li>
                            <?php endfor; ?>

                            <?php if ($current_page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>">Suivant</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


        <div class="container mt-5 mt-5 ">
            <div class="row mt-5">
                <div class="col-md-12  ">
                    <h2 class="mb-4 formateur">Liste des employeur</h2>
                    <form action="index.php" method="GET" class="search-form">
                        <div class="form-group">
                            <label for="search">Rechercher par Full name :</label>
                            <input type="text" name="search" id="search" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary BTNN">Rechercher</button>
                    </form>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>CompanyName</th>
                            <th>ContactPerson</th>
                            <th>Email</th>
                            <th>PhoneNumber</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $rows_per_page = 4;

                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                        $limit = $rows_per_page;
                        $offset = ($current_page - 1) * $rows_per_page;



                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        if (!empty($search)) {
                            $sql = "SELECT COUNT(*) AS count FROM employeur WHERE CompanyName LIKE :search";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                        } else {
                            $sql = "SELECT COUNT(*) AS count FROM employeur";
                            $stmt = $pdo->prepare($sql);
                        }
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total_rows = $result['count'];

                        $total_pages = ceil($total_rows / $rows_per_page);

                        if (!empty($search)) {
                            $sql = "SELECT * FROM employeur WHERE CompanyName LIKE :search LIMIT :limit OFFSET :offset";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                        } else {
                            $sql = "SELECT * FROM employeur LIMIT :limit OFFSET :offset";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                        }
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($result) > 0) {
                            // Output data of each row
                            foreach($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["EmployeurID"] . "</td>";
                                echo "<td>" . $row["CompanyName"] . "</td>";
                                echo "<td>" . $row["ContactPerson"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "<td>" . $row["PhoneNumber"] . "</td>";
                                echo "<td>" . $row["Address"] . "</td>";
                                echo "<td><a href='employeur/update_employeur.php?id=" . $row["EmployeurID"] . "' class='btn btn-primary btn-sm mr-2'>Modifier</a><a href='employeur/delete_employeur.php?id=" . $row["EmployeurID"] . "' class='btn btn-danger btn-sm'>Supprimer</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucun employeur trouvé.</td></tr>";
                        }

                        $pdo = null;
                        ?>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php if ($current_page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>">Précédent</a></li>
                            <?php endif; ?>

                            <?php
                            // Limit the number of visible links to 7
                            $visible_links = 7;
                            $start = max(1, $current_page - floor($visible_links / 2));
                            $end = min($total_pages, $start + $visible_links - 1);
                            $start = max(1, $end - $visible_links + 1);

                            for ($i = $start; $i <= $end; $i++):
                                ?>
                                <li class="page-item <?php echo $current_page == $i ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>"><?php echo $i; ?></a></li>
                            <?php endfor; ?>

                            <?php if ($current_page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>">Suivant</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popperjs@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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




