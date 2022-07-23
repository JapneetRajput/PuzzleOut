<?php 


session_start();
require_once "config.php";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
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
                }
                else{
                    echo 'Please verify your account';
                }
            }
        }
    }
}

// $sql = "SELECT * FROM `orders`";
// $result = mysqli_query($conn, $sql);

// // Find the number of records returned
// $num = mysqli_num_rows($result);
// echo $num;
// echo " records found in the DataBase<br>";
// // Display the rows returned by the sql query
// if($num> 0){
//     // We can fetch in a better way using the while loop
//     while($row = mysqli_fetch_assoc($result)){
//         // echo var_dump($row);
//         echo $row['sno'] .  ". Hello ". $row['name'] ." Welcome to ". $row['dest'];
//         echo "<br>";
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
	<link rel='icon' href='logo/plogo.png'/>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assignment.css">
    <!-- <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="build/css/intlTelInput.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="build/css/demo.css"> -->
    <title>Puzzle Out</title>
</head>

<body>
    <div class="quizze">

        <a class="person"> hi <?php echo $userrname ?></a>
        <form action="" class="search-bar">
            <input type="text" placeholder="search" name="Q">
            <button class="searchlogo"> <img class="search-logo" src="assets/images/search-icon.png" alt=""></button>
            </input>
            <img src="assets/images/bell.png" class="bell">
            <img src="assets/images/profile.png" class="profile">
    </div>

    <div class="main">
        <h2>Sidebar</h2>
    </div>
    <div class="sidenav">
        <div class="logohead">
            <h2 class="heading">uzzelout</h2>
            <img class="plogo" src="assets/images/plogo.png" alt="">
        </div>
        <a href="#" class="dashboard">DASHBOARD</a>
        <div class="chield">
            <a href="overview.php" class="overview">Overview</a>
            <a href="assignments.php" class="assignment">Assignment</a>
            <a href="writer.php" class="writer">Writers</a>
            <a href="#" class="chart">Chart/queries</a>
            <a href="#" class="payment">payment</a>
            <a href="#" class="other">OTHER</a>
            <a href="#" class="Setting">Settings</a>
            <a href="logout.php" class="logout"> LOG OUT</a>
        </div>
    </div>

    <div class="right-side">
        <strong>FILTERS</strong><br>
        <div class="assign-attachment">
            <div class="gap">
                <select name="" id="" class="assign-status">
                    <option value="" class="assign-display" disabled selected>Status</option>
                    <option value="">Completed</option>

                </select>
                <select name="" id="" class="assign-status same-css">
                    <option value="" class="assign-display" disabled selected>Due Date</option>
                    <option value="">Completed</option>

                </select>
                <select name="" id="" class="assign-status same-css">
                    <option value="" class="assign-display" disabled selected>Payment status</option>
                    <option value="">Completed</option>

                </select>
                <select name="" id="" class="assign-status same-css">
                    <option value="" class="assign-display" disabled selected>Writer</option>
                    <option value="">Completed</option>

                </select>
            </div>
            <div class="add-attachment"><a href="addAssignment1.php" style="text-decoration:none">
                <span class="add-assign"><span class="plus">+</span> Add Assignment</span></a>
            </div>
        </div>
        <!-- select box code here -->
        <div class="choose-options">Choose Fields</div>
        <div class="selected-items">
            <div class="multiselect ">
                <label>
                    <input type="checkbox" class="single-checkbox first_option" name="check" id="order" value="order_id"
                        checked />
                    Order id</label>
                <label class="field-choose">
                    <input type="checkbox" class="single-checkbox" name="check" id="name" value="Name" checked />
                    Name</label>

                <label class="field-choose">
                    <input type="checkbox" class="single-checkbox" name="check" id="e-mail" value="Email" checked />
                    Email</label>

                <label class="field-choose">
                    <input type="checkbox" class="single-checkbox" name="check" id="whatsapp" value="whatsapp number"
                        checked /> Whatsapp</label>

                <label class="field-choose">
                    <input type="checkbox" class="single-checkbox" name="check" id="due" value="Due-date" checked />Due
                    Date</label>

                <label class="field-choose">
                    <input type="checkbox" class="single-checkbox" name="check" id="writer" value="writer Assigned"
                        checked /> Writer Assigned</label>

                <label class="field-choose">
                    <input type="checkbox" class="single-checkbox" name="check" id="assignment"
                        value="Assignment status" checked /> Assignment status</label>

                <label class="field-second-row">
                    <input type="checkbox" class="single-checkbox" name="check" id="price" value="Price" />Price</label>

                <label class="field-second">
                    <input type="checkbox" class="single-checkbox" name="check" id="payment" value="Payment Status" />
                    Payment status</label>

                <label class="field-second">
                    <input type="checkbox" class="single-checkbox" name="check" id="category" value="Category" />
                    Category</label>

                <label class="field-second">
                    <input type="checkbox" class="single-checkbox" name="check" id="description" value="Description" />
                    Description</label>

                <label class="field-second">
                    <input type="checkbox" class="single-checkbox" name="check" id="attachment" value="Attachment" />
                    Attachment</label>

                <label class="field-second">
                    <input type="checkbox" class="single-checkbox" name="check" id="word" value="Word count" />
                    Word count</label>
            </div>
        </div>
        <!-- select box code end here -->

    </div><br><br>
    <!-- table row code start here -->
    <div class="table-start">
        <table class="table assign-table">
            <thead class="table-head">
            <tr class="header-name">
                <th class="header ordersid">Order id</th>
                <th class="heading-assign names">Client Name</th>
                <th class="header  emails">Email</th>
                <th class="heading-assign whatsapps">Whatsapp Number</th>
                <th class="header duedates">Due Date</th>
                <th class="heading-assign writers">Writer Assigned</th>
                <th class="heading-assign assignments">Assignment Status</th>
                <th class="heading-assign hide-data prices price-css">Price (INR)</th>
                <th class="heading-assign hide-data payments">Payment Status</th>
                <th class="heading-assign hide-data category">category (Subject)</th>
                <th class="heading-assign hide-data descriptions">Description (Client provided)</th>
                <th class="header hide-data attachments">Attachments</th>
                <th class="heading-assign hide-data words">Word count</th>
            </tr>
       </thead>
           <tbody>
                    <?php 
                        $sql = "SELECT * FROM `orders`";
                        $result = mysqli_query($conn, $sql);

                        $num = mysqli_num_rows($result);
                        if($num> 0){

                            while($row = mysqli_fetch_assoc($result)){ ?>    
                                <tr class="table-data-here">   
                                    <td class="table-data ordersid"><?php echo $row['orderId'] ?></td>
                                    <td class="table-data names"><?php echo $row['clientName'] ?></td>
                                    <td class="table-data emails"><?php echo $row['clientEmail'] ?></td>
                                    <td class="table-data whatsapps"><?php echo $row['clientNumber'] ?></td>
                                    <td class="table-data duedates"><?php echo $row['dueDate'] ?></td>
                                    <td class="table-data writers">Writer Name</td>
                                    <td class="table-data assignments"><select name="" id="" class="assign-row">
                                            <option value="">In Progress</option>
                                        </select></td>
                                    <td class="table-data hide-data prices"><?php echo $row['price'] ?></td>
                                    <td class="table-data hide-data payments"><select name="" id="" class="assign-row">
                                            <option value="">Payment status</option>
                                        </select></td>
                                    <td class="table-data hide-data category "><?php echo $row['subject'] ?></td>
                                    <td class="table-data hide-data descriptions"><?php echo $row['description'] ?></td>
                                    <td class="table-data hide-data attachments"><a href="http://localhost/login-register/upload/<?php echo $row['file_name'] ?>" target='_blank'><?php echo $row['file_name'] ?></a></td>
                                    <td class="table-data hide-data words"><?php echo $row['pageCount']*250 ?></td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                    <?php ?>
                <!-- <tr class="table-data-here">
                    <td class="table-data ordersid"><div>123</div></td>
                    <td class="table-data names">Akash Gupta</td>
                    <td class="table-data emails">ranjankumar@gmail.com</td>
                    <td class="table-data whatsapps">hii</td>
                    <td class="table-data duedates">06/07/2020</td>
                    <td class="table-data writers">hii</td>
                    <td class="table-data assignments"><select name="" id="" class="assign-row">
                            <option value="">In Progress</option>
                        </select></td>
                    <td class="table-data hide-data prices">hii</td>
                    <td class="table-data hide-data payments"><select name="" id="" class="assign-row">
                            <option value="">Payment status</option>
                        </select></td>
                    <td class="table-data hide-data category ">hii</td>
                    <td class="table-data hide-data descriptions">hii</td>
                    <td class="table-data hide-data attachments">hii</td>
                    <td class="table-data hide-data words">hii</td>
                </tr> -->
            </tbody>
        </table>

    </div>
     <!-- table row code end here -->
    </div>


</body>
<script>
    $("input[type=checkbox][name=check]").click(function () {

        var bol = $("input[type=checkbox][name=check]:checked").length >= 8;
        $("input[type=checkbox][name=check]").not(":checked").attr("disabled", bol);
        $(document).on('change', '#price', function () {
            console.log('hii');
            $('.prices').css('display', 'table-cell');
            $('.prices').css('position', 'initial');
            $('.price-css').css('font-weight', '700');
            $('.price-css').css('white-space', 'nowwrap');
            $('#price').prop('id', 'price-id');
            $('#price').removeAttr('id', 'price');

        });
        $(document).on('change', '#price-id', function () {
            $('.prices').css('display', 'none');
            $('.price-css').css('font-weight', '700');
            $('.price-css').css('white-space', 'nowwrap');
            $('#price-id').prop('id', 'price');
            $('#price-id').removeAttr('id', 'price-id');
        });
        $(document).on('change', '#payment', function () {
            $('.payments').css('display', 'table-cell');
            $('.payments').css('position', 'initial');
            $('.payments').css('font-weight', '700');
            $('.payments').css('color', 'black');
            //$('.price-css').css('font-weight','700');
            $('#payment').prop('id', 'payment-id');
            $('#payment').removeAttr('id', 'payment');

        });
        $(document).on('change', '#payment-id', function () {
            $('.payments').css('display', 'none');
            $('#payment-id').prop('id', 'payment');
            $('#payment-id').removeAttr('id', 'payment');
        });
        $(document).on('change', '#category', function () {
            $('.category').css('display', 'table-cell');
            $('.category').css('position', 'initial');
            $('#category').prop('id', 'category-id');
            $('#category').removeAttr('id', 'category');

        });
        $(document).on('change', '#category-id', function () {
            $('.category').css('display', 'none');
            $('#category-id').prop('id', 'category');
            $('#category-id').removeAttr('id', 'category');
        });
        $(document).on('change', '#description', function () {
            $('.descriptions').css('display', 'table-cell');
            $('.descriptions').css('position', 'initial');
            $('#description').prop('id', 'description-id');
            $('#description').removeAttr('id', 'description');

        });
        $(document).on('change', '#description-id', function () {
            $('.descriptions').css('display', 'none');
            $('#description-id').prop('id', 'description');
            $('#description-id').removeAttr('id', 'description-id');
        });
        $(document).on('change', '#attachment', function () {
            $('.attachments').css('display', 'table-cell');
            $('.attachments').css('position', 'initial');
            $('#attachment').prop('id', 'attachment-id');
            $('#attachment').removeAttr('id', 'attachment');

        });
        $(document).on('change', '#attachment-id', function () {
            $('.attachments').css('display', 'none');
            $('#attachment-id').prop('id', 'attachment');
            $('#attachment-id').removeAttr('id', 'attachment-id');
        });
        $(document).on('change', '#word', function () {
            $('.words').css('display', 'table-cell');
            $('.words').css('position', 'initial');
            $('#word').prop('id', 'word-id');
            $('#word').removeAttr('id', 'word');

        });
        $(document).on('change', '#word-id', function () {
            $('.words').css('display', 'none');
            $('#word-id').prop('id', 'word');
            $('#word-id').removeAttr('id', 'word-id');
        });
        $(document).on('change', '#order', function () {
            $('.ordersid').css('display', 'none');
            $('#order').prop('id', 'order-id');
            $('#order').removeAttr('id', 'order');
        });
        $(document).on('change', '#order-id', function () {
            $('.ordersid').css('display', 'table-cell');
            $('.ordersid').css('position', 'initial');
            $('#order-id').prop('id', 'order');
            $('#order-id').removeAttr('id', 'order-id');

        });
        $(document).on('change', '#name', function () {
            $('.names').css('display', 'none');
            $('#name').prop('id', 'name-id');
            $('#name').removeAttr('id', 'name');
        });
        $(document).on('change', '#name-id', function () {
            $('.names').css('display', 'table-cell');
            $('.names').css('position', 'initial');
            $('#name-id').prop('id', 'name');
            $('#name-id').removeAttr('id', 'name-id');

        });
        $(document).on('change', '#e-mail', function () {
            $('.emails').css('display', 'none');
            $('#e-mail').prop('id', 'email-id');
            $('#email').removeAttr('id', 'email');
        });
        $(document).on('change', '#email-id', function () {
            $('.emails').css('display', 'table-cell');
            $('.emails').css('position', 'initial');
            $('#email-id').prop('id', 'e-mail');
            $('#email-id').removeAttr('id', 'email-id');

        });
        $(document).on('change', '#whatsapp', function () {
            $('.whatsapps').css('display', 'none');
            $('#whatsapp').prop('id', 'whatsapp-id');
            $('#whatsapp').removeAttr('id', 'whatsapp');
        });
        $(document).on('change', '#whatsapp-id', function () {
            $('.whatsapps').css('display', 'table-cell');
            $('.whatsapps').css('position', 'initial');
            $('#whatsapp-id').prop('id', 'whatsapp');
            $('#whatsapp-id').removeAttr('id', 'whatsapp-id');

        });
        $(document).on('change', '#due', function () {
            $('.duedates').css('display', 'none');
            $('#due').prop('id', 'due-id');
            $('#due').removeAttr('id', 'due');
        });
        $(document).on('change', '#due-id', function () {
            $('.duedates').css('display', 'table-cell');
            $('.duedates').css('position', 'initial');
            $('#due-id').prop('id', 'due');
            $('#due-id').removeAttr('id', 'due-id');

        });
        $(document).on('change', '#writer', function () {
            $('.writers').css('display', 'none');
            $('#writer').prop('id', 'writer-id');
            $('#writer').removeAttr('id', 'writer');
        });
        $(document).on('change', '#writer-id', function () {
            $('.writers').css('display', 'table-cell');
            $('.writers').css('position', 'initial');
            $('#writer-id').prop('id', 'writer');
            $('#writer-id').removeAttr('id', 'writer-id');

        });
        $(document).on('change', '#assignment', function () {
            $('.assignments').css('display', 'none');
            $('#assignment').prop('id', 'assignment-id');
            $('#assignment').removeAttr('id', 'assignment');
        });
        $(document).on('change', '#assignment-id', function () {
            $('.assignments').css('display', 'table-cell');
            //$('.assignments').css('position', 'initial');
            $('#assignment-id').prop('id', 'assignment');
            $('#assignment-id').removeAttr('id', 'assignment-id');

        });
    });
</script>
<script>
    $('body').on('click', '.choose-options', function () {
        $('.selected-items').css('display', 'block');
        $('.choose-options').attr('class', 'close-options');
        $('.choose-options').removeClass('class', 'close-option');

    });
    $('body').on('click', '.close-options', function () {
        $('.selected-items').css('display', 'none');
        $('.close-options').attr('class', 'choose-options');
        $('.close-options').removeClass('class', 'close-options');

    });
</script>
<script src="jquery/jquery.js" type="text/javascript"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="my.js" type="text/javascript"></script>


</html>