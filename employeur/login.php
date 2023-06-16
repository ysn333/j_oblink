<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6011b958cb.js" crossorigin="anonymous"></script>
    <link rel ="icon"  href = "https://www.creativefabrica.com/wp-content/uploads/2020/11/02/Abstract-Logo-Design-Vector-Logo-Graphics-6436279-1-312x208.jpg"  type = "image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>
    
  <div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>login</h3>
                    <form class="requires-validation" action="login_post.php" method="POST">
                        <div class="col-md-12">
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                            <div class="invalid"><?php if (isset($email_errer)) {echo $email_errer ;}
                            
                            ?>
                        
                        </div>
                        </div>



                       <div class="col-md-12">
                          <input class="form-control" type="password" name="password" placeholder="Password" required>
                          <div class="invalid"><?php if (isset($password_errer)) {echo $password_errer ;}?></div>
                       </div>
                        <a href="forgot_password.php">forgot Password</a>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">login</button>
                        </div> <br>

                        <a href="register.php"><i class="fa-solid fa-arrow-left-long" style="color: #ffffff;"></i> register New</a>
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
</style>
</body>
</html>





