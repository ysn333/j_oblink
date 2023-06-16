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
    <link rel="stylesheet" href="css/login.css">
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
                            <input class="form-control" type="text" name="full_name" placeholder="Full Name" required>
                            <div class="invalid"><?php if (isset($full_name_errer)) {echo $full_name_errer;} ?></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                            <div class="invalid"><?php if (isset($email_errer)) {echo $email_errer;} ?></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="Phone_Number" placeholder="Phone Number" required>
                            <div class="invalid"><?php if (isset($phone_number_errer)) {echo $phone_number_errer;} ?></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="City" placeholder="City" required>
                            <div class="invalid"><?php if (isset($city_errer)) {echo $city_errer;} ?></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="invalid"><?php if (isset($password_errer)) {echo $password_errer;} ?></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                            <div class="invalid"><?php if (isset($confirm_password_errer)) {echo $confirm_password_errer;} ?></div>
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" name="submit" class="btn btn-primary">Register</button>
                            <a href="login.php"><i class="fa-solid fa-arrow-left-long" style="color: #6271DD;"></i> Log in</a>
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