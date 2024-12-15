<!doctype html>
<html lang="en">

<?php 
    include "INCLUDE/config.php";
    ob_start();
    session_start();

    if(isset($_POST['submitlogin']))
    {
        $useremail = $_POST['email'];
        $userpass = $_POST['password'];
        $sql_login = mysqli_query($connection, "select * from useradmin
            where userEMAIL = '$useremail' and userPASS = '$userpass'");
            if(mysqli_num_rows($sql_login) > 0)
            {
                $row_admin = mysqli_fetch_array($sql_login);
                $_SESSION['kodeuser'] = $row_admin['userKODE'];
                $_SESSION['useremail'] = $row_admin['userEMAIL'];
                header("location:dashboardadmin.php");

            }
    
    }
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/stylelogin.css" rel="stylesheet">

    <title>Form</title>
  </head>
  <body>
    <form method="POST">
    <section class="_form_05">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_form-05-box">
              <div class="row">
                <div class="col-sm-5 _lk_nb">
                  <div class="form-05-box-a">
                    <div class="_form_05_logo">
                      <h2>smart</h2>
                      <p>Login using social media to get quick access</p>
                    </div>
                    <div class="_form_05_socialmedia">
                      <ol>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>Sign With Facebook</li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a>Sign With Twitter</li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a>Sign With Google</li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div class="col-sm-7 _nb-pl">
                  <div class="_mn_df">
                    <div class="main-head">
                      <h2>Login to your account</h2>
                    </div>

                    <div class="form-group">
                      <input type="email" name="email" class="form-control" type="text" placeholder="Enter Email" required="" aria-required="true">
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control" type="text" placeholder="Enter Password" required="" aria-required="true">
                    </div>

                    <div class="checkbox form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                          Remember me
                        </label>
                      </div>
                      <a href="#">Forgot Password</a>
                    </div>

                    <div class="form-group">
                      <input class="_btn_04" type="submit" name="submitlogin" value="Login">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </form>
  </body>
</html>