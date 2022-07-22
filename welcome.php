<?php

session_start();
require_once "config.php";

// $_SESSION["username"] = '';
// $_SESSION["id"] = '';
// $_SESSION["loggedin"] = '';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login-form.php");
}
else{
    $sql = "SELECT id,verified FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $_SESSION['username'];
    
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
            mysqli_stmt_bind_result($stmt,$id,$verified);
            if(mysqli_stmt_fetch($stmt)){
                if($verified){
                    $userrname =$_SESSION["username"];
                    // echo '<h1>'.$_SESSION["username"].'.
                    // <br/><br/>
                    // <a href="/login-register/logout.php">Logout</a></h1>';
                }
                else{
                    echo 'Please verify your account';
                }
            }
        }
    }
    $sql = "SELECT orderId FROM orders ";
    $stmt = mysqli_prepare($conn, $sql);
    // mysqli_stmt_bind_param($stmt, "s", $param_username);
    // $param_username = $_SESSION['username'];
    
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        $orderID = mysqli_stmt_num_rows($stmt);
    }
}

// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//     $id = $_POST['customer'];
//     $password = $_POST['password'];
//     $name = 'Name'.$_POST['name'];
//     $email= $_POST['email'];
//     $currency= $_POST['currency'];
//     echo "<script>alert($currency)</script>";
// }

?>

<!DOCTYPE html>
<html lang="en">
	<link rel='icon' href='logo/plogo.png'/>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <link rel="stylesheet" href="build/css/demo.css"><script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Puzzle Out</title>
</head>

<body>
    <div class="quizze">

        <a class="person">  hi <?php echo $userrname?>,</a>
        <div class="search-bar">
            <input type="text" placeholder="search" name="Q">
            <button class="searchlogo"> <img  class="search-logo" src="assets/images/search-icon.png" alt=""></button>
            </input>
            <img src="assets/images/bell.png" class="bell">
            <img src="assets/images/profile.png" class="profile">
    </div>  
    </div>

    <div class="main">
        <h2>Sidebar</h2>
    </div>
    <div class="sidenav">
        <div class="logohead">
            <h2 class="heading">uzzelout</h2>
            <img class="plogo" src="logo/plogo.png" alt="">
        </div>
        <a href="#" class="dashboard">DASHBOARD</a>
        <div class="chield">
            <a href="overview.php" class="overview">Overview</a>
            <a href="assignments.php" class="assignment">Assignment</a>
            <a href="#" class="writer">Writers</a>
            <a href="#" class="chart">Chart/queries</a>
            <a href="#" class="payment">payment</a>
            <a href="#" class="other">OTHER</a>
            <a href="#" class="Setting">Settings</a>
            <a href="logout.php" class="logout"> LOG OUT</a>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="icrementer-all">
                <div class="counter-box">
                    <span class="minuscontbtn common">-</span>
                    <span class="numonclick">1</span>
                    <span class="pluscontbtn common">+</span>

                </div>
                <div class="num2-words">
                    <span class="numonclick2">250</span>
                    <span class="words-in-click">words</span>
                </div>
                <!-- <script type="text/javascript">
                    $(document).on('click','.common',function(){
                        $no = $('.numonclick').text();
                        $('.no-of-pages').val($no);
                        // console.log($no);
                        alert($no);
                        // document.getElementById("noOfPages").value = $no;
                    });
                </script> -->
            </div>
            <input type="hidden" name="pageCount" class="no-of-pages" value="1"/>

            <div class="back-arrow">
                <a href="#"> <img class="back-arrow" src="assets/images/backArrow2.png" alt=""> </a>
            </div>
            <div class="add">
                <h3>Add an assignment</h3>
            </div>
            <hr class="line">
            <div class="order"> Order Id</div>
            <input class="rectengle" value="<?php echo ($orderID+1) ?>" disabled></input>

            <div class="client">Client Name</div>
            <div class="email">Email</div>
            <input class="rect2" name="clientName"></input>
            <div class="noofpagess">No of Pages/Words</div>
            <input class="rect3" type="email" name="clientEmail"></input>

            <div class="whatsapp">Whatsapp No</div>

            <input type="hidden" name ="countryCode" class="country-code"/>
            <div id="flag">
                <input id="phone" name="clientNumber" type="number" class="jq-mob-flag">
            </div>

            <script src="build/js/intlTelInput.js"></script>
            <script>
                var input = document.querySelector("#phone");
                window.intlTelInput(input,{
                    utilsScript: "build/js/utils.js",
                });
            </script>
            <div id="Div1">
                <input type="text" id="date_picker1" placeholder="Deadline" class="jq-date-picker" name="deadlineDate"/>
                <input type="text" id="date_picker2" placeholder="Enter Date" class="jq-date-picker2" name="dueDate">
            </div>
            <div class="assign">Assignment Date</div>
            <div class="assign2">Assignment Due Date</div>

            <select name="deadlineTime" id="deadline-time">
                <!-- <option data="2" value="12" Selected>2:00PM</option> -->
                <option data="2" value="14" > 2:00PM</option>
                <option  data=" 4" value="16">4:00 PM</option>
                <option  data="6" value="18">6:00 PM</option>
                <option  data="8" value="20">8:00 PM</option>
                <option  data="10"value="22">10:00 PM</option>
                <option  data="12" value="12">12:00 PM</option>
                <option  data="2" value="2">2:00 AM</option>
                <option  data="4" value="4">4:00 AM</option>
                <option  data="6"value="6">6:00 AM</option>
                <option  data="8" value="8">8:00 AM</option>
                <option  data="10" value="10">10:00 AM</option>
                <option  data="12"value="12">12:00 AM</option>
            </select>

            <div class="price">Price</div>
            <input type="text" class="input-Currency-data" name="price">
            <select name="priceCurrency" id="countries-inr">
                <option data-currency=" INR" value="INR" Selected>INR</option>
                <!-- <option  data-currency=" rupee" value="INR">Rupee</option> -->INR, EUR, GBP, CAD, NZD, AUD, USD
                <option  data-currency=" doller" value="USD">Dollar</option>
                <option  data-currency=" euro" value="EUR">Euro</option>
                <option  data-currency="GBP" value="GBP">Euro</option>
                <option  data-currency=" CAD" value="CAD">Euro</option>
                <option  data-currency=" NZD" value="NZD">Euro</option>
                <option  data-currency=" AUD" value="AUD">Euro</option>
                <option  data-currency=" other"value="OTHER">Other</option>
            </select>

            <div class="pay"> Payment Status</div>
            <select class="form-adv" name="paymentStatus">
                <option value="Advance">Advance</option>
                <option value="Dues"> Dues</option>
            </select>

            <div class="advance">If,Advance</div>
            <input class="rect6" name="advance"></input>
            <select name="advanceCurrency" id="countries-inr2">
                <option data-currency=" INR" value="INR" Selected>INR</option>
                <!-- <option  data-currency=" rupee" value="INR">Rupee</option> -->
                <option  data-currency=" doller" value="USD">Dollar</option>
                <option  data-currency=" euro" value="EUR">Euro</option>
                <option  data-currency=" other"value="OTHER">Other</option>
            </select>

            <div class="sub">Category(Subject)</div>
            <select class="form-sub" name="subject">
                <option value="Data Structure">Data Structure</option>
                <option value="Programmer">Programmer</option>
                <option value="Essay">Essay</option>
                <option value="Report">Report</option>
                <option value="Dissertation">Dissertation</option>
                <option value="Thesis">Thesis</option>
                <option value="Technical">Technical</option>
                <option value="Posters">Posters</option>
                <option value="Presentation">Presentation</option>
                <option value="Portfolio">Portfolio</option>
            </select>
            <div class="provide">Client provided description</div>
            <div class="md-form">
                <textarea id="form7" class="md-textarea" rows="3" name="desc">  </textarea>
            </div>
            <button type="submit" class="btn-success" name="upload">Save & Go</button>
            <button class="btn-light" onclick="this.form.reset();">Discard</button>

            

            <div class="fileupload">
                <!-- <button onclick="myFunction()" class="btn-attachlogo">Attachment </button> -->
                <div class="img-aatach-logo"> 
                    <input type="file" name="file" />
                    <!-- <img src="assets/images/attach.png" alt="" class="attachlogo">  -->
                </div>
                <!-- <script>
                    function myFunction() {
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "file");
                        document.body.appendChild(x);
                    }
                </script> -->
            </div>
        </div>
    </form>
</body>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    // $orderId = $_POST['orderId'];
    $pageCount= $_POST['pageCount'];
    $clientName = $_POST['clientName'];
    $clientEmail= $_POST['clientEmail'];
    $countryCode= $_POST['countryCode'];
    $clientNumber= $_POST['clientNumber'];
    $assignmentDate= $_POST['deadlineDate'];
    $dueDate= $_POST['dueDate'];
    $assignmentTime= $_POST['deadlineTime'];
    $priceCurrency= $_POST['priceCurrency'];
    $price= $_POST['price'];
    $advance= $_POST['advance'];
    $paymentStatus= $_POST['paymentStatus'];
    $advanceCurrency= $_POST['advanceCurrency'];
    $subject= $_POST['subject'];
    $description= $_POST['desc'];
    $regex = "/\+/";
    $output = preg_split ($regex, $countryCode);
    // echo "<script>alert('Order id: $id Name: $clientName Email: $clientEmail Code: $countryCode DeadlineDate: $deadlineDate DeadlineTime: $deadlineTime DueDate: $dueDate Status: $paymentStatus Subject: $subject Desc: $desc')</script>";
    if(empty($CountryCode)){
        $CountryCode = '1';
    } else{
        $CountryCode = $output[1];
    }
    // echo "<script>alert('$description')</script>";
    // echo "<script>alert('$ClientNumber $pageCount')</script>";
    if(empty($clientName)){
        echo "<script>alert('Client name is mandatory!')</script>";
    }
    else if(empty($clientEmail)){
        echo "<script>alert('Client email is mandatory!')</script>";
    }
    else if(empty($countryCode)){
        echo "<script>alert('Country code is mandatory!')</script>";
    }
    else if(empty($clientNumber)){
        echo "<script>alert('Client number is mandatory!')</script>";
    }
    else if(empty($assignmentTime)){
        echo "<script>alert('Assignment time is mandatory!')</script>";
    }
    else if(empty($assignmentDate)){
        echo "<script>alert('Assignment date is mandatory!')</script>";
    }
    else if(empty($dueDate)){
        echo "<script>alert('Due date is mandatory!')</script>";
    }
    else if(empty($price)){
        echo "<script>alert('Price is mandatory!')</script>";
    }
    else if(empty($priceCurrency)){
        echo "<script>alert('Price currency is mandatory!')</script>";
    }
    else if(empty($paymentStatus)){
        echo "<script>alert('Payment status is mandatory!')</script>";
    }
    else if(empty($advance)){
        echo "<script>alert('Advance amount is mandatory!')</script>";
    }
    else if(empty($advanceCurrency)){
        echo "<script>alert('Advance currency is mandatory!')</script>";
    }
    else if(empty($subject)){
        echo "<script>alert('Category(subject) is mandatory!')</script>";
    }
    else if(empty($description)){
        echo "<script>alert('Description is mandatory!')</script>";
    }
    else{
        $ClientNumber = '+'.$CountryCode.' '.$clientNumber;
        $AssignmentDate= substr($assignmentDate,6,4).'-'.substr($assignmentDate,3,2).'-'.substr($assignmentDate,0,2);
        $DueDate= substr($dueDate,6,4).'-'.substr($dueDate,3,2).'-'.substr($dueDate,0,2);
        $Price = $priceCurrency.' '.$price;
        $Advance= $advanceCurrency.' '.$advance;
        if(isset($_POST['upload']))
        {   
            $file = rand(1000,100000)."-".$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder="upload/";
        
            $new_size = $file_size/1024;  
        
            $new_file_name = strtolower($file);
        
            $final_file=str_replace(' ','-',$new_file_name);
        
            if(move_uploaded_file($file_loc,$folder.$final_file)){
                $sql="INSERT INTO files(file_name,file_type,file_size) VALUES('$final_file','$file_type','$new_size')";
                mysqli_query($conn,$sql);
                $sql = "INSERT INTO orders (clientName,clientEmail,clientNumber,assignmentTime,assignmentDate,dueDate,price,paymentStatus,advance,subject,description,file_name,pageCount) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sql);
                if ($stmt){
                    mysqli_stmt_bind_param($stmt, "sssssssssssss", $clientName,$clientEmail,$clientNumber,$assignmentTime,$AssignmentDate,$DueDate,$price,$paymentStatus,$advance,$subject,$description,$final_file,$pageCount);
        
        
                    if (mysqli_stmt_execute($stmt)){
            
                        echo "<script>alert('Uploaded successfully!')</script>";
                    }
                    else{
                        echo "Something went wrong... cannot redirect!";
                    }
                }
                mysqli_stmt_close($stmt);
                echo "File sucessfully upload";
            }
            else{
                echo "<script>alert('Attachment is mandatory!')</script>";   
            }
        }
    }
}

?>
<script >
   $('.iti__flag-container').click(function(){
    let country = $(".iti__selected-flag").attr("title");
    // let reg = /+/;
    // let result = country.search(reg);
    // country.substring
    // console.log(result);
    $('.country-code').val(country);
   });
    $(document).on('click','.common',function(){
      $no = $('.numonclick').text();
      $('.no-of-pages').val($no);
    // console.log("Hi");
   });
</script>
<script src="my.js" type="text/javascript"></script>
<script src="jquery/jquery.js" type="text/javascript"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="jq.js" type="text/javascript"></script>

</html>