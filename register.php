<?php


require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err =$name_err=$email_err= "";

use PHPMailer\PHPMailer\PHPMailer;

function sendmail($toEmail,$body,$vkey){
    $name = "Arjun";  
    // $to = "japneetrajput2804@gmail.com";  
    $subject = "Verification Code";
    // $body = "Sup";
    $from = "arjunrajput.rajput78@gmail.com";  
    $password = "rdkmyqaxgsuthgzh"; 

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer();

    $mail->isSMTP();
    // $mail->SMTPDebug = 3;                          
    $mail->Host = "smtp.gmail.com"; 
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->Port = 587;  
    $mail->SMTPSecure = "tls";  
    $mail->smtpConnect([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ]);

    $mail->isHTML(true);
    $mail->setFrom($from, $name);
    $mail->addAddress($toEmail);
    $mail->Subject = ("$subject");
    $mail->Body = $body;
    if ($mail->send()) {
        echo "Email is sent!";
    } else {
        echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Name check
    if(empty(trim($_POST['name']))){
        $name_err="Enter a name";
    }
    else{
        $name = trim($_POST['name']);
    }

    // Email check
    if(empty(trim($_POST["email"]))){
        $email_err = "Email cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_username = trim($_POST['email']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This email is already in use"; 
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
    }

    // Username check
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST['username']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
    }

    // Password check
    if(empty(trim($_POST['password']))){
        $password_err = "Password cannot be blank";
    }
    elseif(strlen(trim($_POST['password'])) < 5){
        $password_err = "Password cannot be less than 5 characters";
    }
    else{
        $password = trim($_POST['password']);
    }

    // Confirm password check
    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
        $confirm_password_err = "Passwords should match";
    }

    if(empty($name_err) &&empty($email_err) &&empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users (username,password,name,email,vkey,verified) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt){
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password,$param_name,$param_email,$param_vkey,$param_verified);

            $param_verified=0;
            $param_name = $name;
            $param_email = $email;
            $param_username = $username;
            $param_vkey = md5(time().$username);
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)){
                $body= "<a href='http://localhost/login-register/verify.php?vkey=$param_vkey'>Verify Account</a>";
                sendmail($param_email,$body,$param_vkey);
                header("location: login.php");
            }
            else{
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
  
?>

<!Doctype html>
<html lang="en">
	<link rel='icon' href='logo/plogo.png'/>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Puzzle Out</title>
  </head>
  <body>

<h1>Register</h1>
<form action="" method="post">
  <label for="inputName">Name</label>
  <input type="text" name="name" id="inputName" placeholder="Name"/><br/><br/>
  <label for="inputEmail">Email</label>
  <input type="text" name="email" id="inputEmail" placeholder="Email"/><br/><br/>
  <label for="inputUsername">Username</label>
  <input type="text" name="username" id="inputUsername" placeholder="Username"/><br/><br/>
  <label for="inputPassword">Password</label>
  <input type="password" name ="password" id="inputPassword" placeholder="Password"/><br/><br/>
  <label for="inputPassword">Confirm Password</label>
  <input type="password" name ="confirm_password" id="inputPassword" placeholder="Confirm Password"><br/><br/>
  <button type="submit" name="sendmail">Register</button>
</form>

  </body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="">
        <a href="bussinessdevloperlogin.html">
            <button class="back-arrow"> <img class="back-arrow-img" src="assets/images/back-arrow2.png" alt=""/></button>
        </a>
    </div>
    <img class="plogo" src="assets/images/plogo-green.png" alt="">
    <h2 class="head-logo">uzzleout</h2>

    <form action="" method="post">
  <label for="inputName">Name</label>
  <input type="text" name="name" id="inputName" placeholder="Name"/><br/><br/>
  <label for="inputEmail">Email</label>
  <input type="text" name="email" id="inputEmail" placeholder="Email"/><br/><br/>
  <label for="inputUsername">Username</label>
  <input type="text" name="username" id="inputUsername" placeholder="Username"/><br/><br/>
  <label for="inputPassword">Password</label>
  <input type="password" name ="password" id="inputPassword" placeholder="Password"/><br/><br/>
  <label for="inputPassword">Confirm Password</label>
  <input type="password" name ="confirm_password" id="inputPassword" placeholder="Confirm Password"><br/><br/>
    </form>

    <a class="needhelp" href="">Need help ?</a>
    <p class="admin"> <b>
        Contact admin </b></p>

    <div class="sidenav">
        <div>
            <h1 class="head"> Welcome back..!!</h1>
            <p class="para"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reiciendis enim amet molestias architecto!. </p>
            <img src="assets/images/office.jpg" class="office-img" alt=""/>
        </div>
    </div>

</body>

</html> -->