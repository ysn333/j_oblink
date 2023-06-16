

<?php if (!isset($_SESSION['Email'])){?>
<nav class="navbar navbar-expand-xl fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img claass="w-100" src="img/Gray%20Professional%20Minimalist%20CV%20Resume%20(1).jpg" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="right navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="register.php" data-toggle="modal" data-target="#userModal"><span>Connexion</span></a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["reset_token"]) != 'hgh') {
                        echo  '<a class="nav-link" href="employeur/register.php" data-toggle="modal" data-target="#userModal">Entreprises / <span class="span-Publier">Publier une annonce</span></a>';
                    }else {
                        echo  '<a class="nav-link" href="Admin_Joblink" data-toggle="modal" data-target="#userModal"><span class="span-Publier">Dashbord Admin</span></a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <style>
        .navbar li .nav-link {
            display: inline-block;
            color: #4b4b4b;
            padding: 15px 17px!important;
            margin-right: -5px!important;
        }
    </style>

<?php }else{ ?>

    <nav class="navbar navbar-expand-xl fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img claass="w-100" src="img/Gray%20Professional%20Minimalist%20CV%20Resume%20(1).jpg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="right navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link icon_1" href="profil_candidate.php">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <a href="includes/notification.php">
                            <?php
                                $selectNotificationsQuery = "SELECT COUNT(*) as `NotificationCount` FROM `Notifications`";
                                $stmt = $pdo->query($selectNotificationsQuery);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $notificationCount = $result['NotificationCount'];



                                $hasNotifications = $notificationCount > 0;
                                $notificationIconClass = $hasNotifications ? "fa-sharp fa-solid fa-bell has-notifications" : "";
                                $notificationIcon = $hasNotifications ? '' : '<i class="fa-sharp fa-solid fa-bell"></i>';

                                if ($notificationCount > 0) {
                                    echo '<span class="span ' . $notificationIconClass . '">' . $notificationIcon . '</span>';
                                    echo '<span class=" notification-count">' . $notificationCount . '</span>';
                                }else {
                                    echo '<span class=" span' . $notificationIconClass . '">' . $notificationIcon . '</span>';
                                }

                            ?>


                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="employeur/register.php" data-toggle="modal" data-target="#userModal">Entreprises / <span class="span-Publier">Publier une annonce</span></a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

<style>
    span {
        color: #4b4b4b;
    }
    .notification-icon {
        display: inline-block;
        width: 30px;
        height: 30px;
        background-color: #f8f8f8;
        border-radius: 15px;
        text-align: center;
        line-height: 30px;
        font-size: 18px;
        color: #333;
        margin-right: 10px;
    }

    .notification-count {
        display: inline-block;
        background-color: #ff6868;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        padding: 0px 10px 20PX 3PX;
        border-radius: 10px;
        margin-left: -2px;
        position: absolute;
        margin-top: 10px;
        height: 9PX;
        WIDTH: 11PX;
    }
    span {
        color: #6271DD;
    }
    .span {
        color: #4b4b4b;
    }
    .navbar li .nav-link:hover, .navbar li .active {
        font-weight: 400!important;
    }
</style>
<?php }?>