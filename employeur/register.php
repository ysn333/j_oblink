<?php
include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
        <link rel ="icon"  href = "https://www.creativefabrica.com/wp-content/uploads/2020/11/02/Abstract-Logo-Design-Vector-Logo-Graphics-6436279-1-312x208.jpg"  type = "image/x-icon">
    <script src="https://kit.fontawesome.com/6011b958cb.js" crossorigin="anonymous"></script>

    <title>register</title>
</head>
<body>
  <div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Register Today</h3>
                    <p>Fill in the data below.</p>

                    <form class="requires-validation" action="register_post.php" method="POST">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="CompanyName" placeholder="Company Name" required>
                            <?php if (!empty($errors["CompanyName"])) { echo '<div class="invalid">' . $errors["CompanyName"] . '</div>'; } ?>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="ContactPerson" placeholder="Contact Person" required>
                            <?php if (!empty($errors["ContactPerson"])) { echo '<div class="invalid">' . $errors["ContactPerson"] . '</div>'; } ?>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="email" name="Email" placeholder="Email Address" required>
                            <?php if (!empty($errors["Email"])) { echo '<div class="invalid">' . $errors["Email"] . '</div>'; } ?>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="PhoneNumber" placeholder="Phone Number" required>
                            <?php if (!empty($errors["PhoneNumber"])) { echo '<div class="invalid">' . $errors["PhoneNumber"] . '</div>'; } ?>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="Address" placeholder="Address" required>
                            <?php if (!empty($errors["Address"])) { echo '<div class="invalid">' . $errors["Address"] . '</div>'; } ?>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <?php if (!empty($errors["password"])) { echo '<div class="invalid">' . $errors["password"] . '</div>'; } ?>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                            <?php if (!empty($errors["confirm_password"])) { echo '<div class="invalid">' . $errors["confirm_password"] . '</div>'; } ?>
                        </div>
                        <div class="form-button mt-3">
                            <button id="submit" type="submit" name="submit" class="btn btn-primary">Register</button>
                            <a href="login.php"><i class="fa-solid fa-arrow-left-long" style="color: #ffffff;"></i> log in</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
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
</body>
</html>