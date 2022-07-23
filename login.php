<?php
session_start();

// $_SESSION["username"] = '';
// $_SESSION["id"] = '';
// $_SESSION["loggedin"] = '';
if(isset($_SESSION['username']))
{
    header("location: assignments.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if(empty($err))
    {
        $sql = "SELECT id, username, password,verified FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;
        
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$verifiedStatus);
                if(mysqli_stmt_fetch($stmt))
                {
                    if($verifiedStatus){
                        if(password_verify($password, $hashed_password))
                        {
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
    
                            header("location: overview.php");
                        }
                    }
                    else{
                        echo "Something went wrong!";
                    }
                }
            }
        }
    }    
}
?>

<!doctype html>
<html lang="en">
	<link rel='icon' href='logo/plogo.png'/>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins&display=swap">
    <link rel="stylesheet" href="assets/styles/bussinessdevstyle.css">
    <title>Puzzle Out</title>
</head>

<body>
    <div class="">
        <div class="row main-cont">
            <div class="col-xxl-6 col-xl-6 xol-lg-6 col-md-6 col-sm-12 col-12" id="left-cont">

                <div class="back-arrow"><a href="index.php"> <img src="assets/images/backArrow2.png" alt=""></a> </div>
                <div class="d-flex justify-content-center"><img class="plogo" src="assets/images/logo2.png" alt="">
                </div>
                <div class="d-flex justify-content-around">
                    <form method="post">
                        <div class="form-group">
                            <label for="Recipient's username" class="user-name">Username</label>
                            <div id="login-input">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Username" name="username"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="d-flex flex-row-reverse">
                                        <div class="input-group-append bi-person"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Recipient's username" class="user-name">Password</label>
                            <div id="login-input">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Password" name="password"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">

                                    <div class="d-flex flex-row-reverse">
                                        <div class="input-group-append bi-lock"></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="col-forget-pwd"> <a class="forget-password" href="#">Forget password
                                            ?</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="login-btn"> <a href="#"> <button type="submit"
                                    class="btn btn-success btn-lg btn-block">log In</button> </a></div>
                        <div class="footer">
                            <p>Need help?</p> <br>
                            <a href="">
                                <p class="admin"> Contact admin </p>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 xol-lg-6 col-md-6 col-sm-12 col-12 pr-0">
                <section class="sidenav">
                    <h1 class="head"> Welcome back..!!</h1>
                    <p class="para"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reiciendis enim amet
                        molestias architecto!. </p>
                    <div class="image-sec"><img src="assets/images/office11.jpg" class="office-img" alt=""></div>
                </section>

            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>