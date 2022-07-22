<!-- <?php
    session_start();
    require_once "config.php";
    $query = "SELECT paymentStatus, count(*) as number FROM orders GROUP BY paymentStatus";
    $result = mysqli_query($conn, $query);
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
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
?> -->

<!doctype html>
<html lang="en">
<link rel='icon' href='logo/plogo.png' />

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="writerDetails.css">
    <title>Puzzle Out</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    </style>
</head>

<body>
    <div class="website-start">
        <div class="useless"></div>
        <!-- navbar mobile code -->
        <div class="navbar-mobile-view-responsive">
            <nav class="navbar navbar-dark fixed-top navbar-for-mobile-view-only">
                <div class="container">

                    <button class="navbar-toggler navbar-toggle-use" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <a class="navbar-brand"><img src="logo/plogo.png" alt="" class="website-logo">uzzelout</a>
                    <i class="bi bi-bell-fill"></i>
                    <div class="collapse navbar-collapse" id="navbarNav"></div>
                </div>
            </nav>

            <div class="navbar-size">
                <div class="container">
                    <div class="text-center mt-4"><img
                            src="assets/images/user.png" alt=""
                            class="profile-image-user profile-image-mobile"></div>
                    <div class="text-center mt-1 font-weight-bold user-name">Jap</div>
                    <div class="navbar-content-mobile mt-4">DASHBOARD</div>
                    <div class="mt-3">
                        <div class="inside-dashboard-content">
                            <a href="overview.php" class="dashboard-content-name">Overview</a>
                        </div>
                        <div class="inside-dashboard-content">
                            <a href="welcome.php" class="dashboard-content-name">Assignment</a>
                        </div>
                        <div class="inside-dashboard-content">
                            <a href="writers.php" class="dashboard-content-name">Writers</a>
                        </div>
                        <div class="inside-dashboard-content">
                            <a href="#" class="dashboard-content-name">Chart/queries</a>
                        </div>
                        <div class="inside-dashboard-content">
                            <a href="#" class="dashboard-content-name">Payment</a>
                        </div>
                    </div>
                    <div class="navbar-content-mobile mt-4">OTHER</div>
                    <div class="mt-3">
                        <div class="inside-dashboard-content">
                            <a href="" class="dashboard-content-name">Setting</a>
                        </div>
                        <div class="inside-dashboard-content">
                            <a href="logout.php" class="dashboard-content-name">LOG OUT</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- navbar mobile code end here -->
        <div class="navbar-top">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="navbar-brand user-name" href="#">Hi Jap</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- left sidebar -->
                    <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                        <div class="leftsidebar-logo">
                            <img src="logo/plogo.png" alt="company-logo" class="company-logo">
                            <div class="company-name">uzzelout</div>
                        </div>
                        <div class="leftsidebar-second-section">
                            <div class="leftsidebar-title">DASHBOARD</div>
                            <div class="navbar-left-side-content">
                                <div class="contents-here"><a href="overview.php" class="content-link">Overview</a>
                                </div>
                                <div class="contents-here"><a href="assignments.php"
                                        class="content-link">Assignments</a></div>
                                <div class="contents-here"><a href="writers.php" class="content-link">writers</a></div>
                                <div class="contents-here"><a href="#" class="content-link">Chats/Queries</a></div>
                                <div class="contents-here"><a href="#" class="content-link">Payments</a></div>
                            </div>
                        </div>
                        <div class="leftsidebar-second-section">
                            <div class="leftsidebar-title">OTHERS</div>
                            <div class="navbar-left-side-content">
                                <div class="contents-here"><a href="#" class="content-link">Settings</a></div>
                                <div class="contents-here"><a href="logout.php" class="content-link">LOG OUT</a></div>
                            </div>
                        </div>

                    </ul>
                    <!-- end left sidebar -->
                    <div class="form-inline ml-auto mt-2 mt-md-0">
                        <input class="form-control mr-sm-2 search-field" type="text" placeholder="Search..."
                            aria-label="Search">
                        <div class="search-icon"><i class="bi bi-search"></i></div>
                        <div class="notification-bell-navbar"><i class="bi bi-bell-fill"></i></div>
                        <div class="navbar-user-profiles"><img
                                src="assets/images/user.png"
                                class="user-profile" alt=""></div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-header">
            <div id="writerName">Japneet Rajput</div>
            <img src="assets/images/user.png" class="user-profile" alt=""/>
            <div class="boxx">
                <p class="skill">SKILLS</p>
                <div class="SkillBox" style="margin:auto">
                    <div class="Skills">
                        <p>Economics</p>
                    </div>
                    <div class="Skills">
                        <p>Proofreading</p>
                    </div>
                    <div class="Skills">
                        <p>Tutoring</p>
                    </div>
                    <div class="Skills">
                        <p>Data structures</p>
                    </div>
                </div>
                <p id="availabilityHeader">AVAILABILITY</p>
                <div class="AvailabilityBox">
                    <div class="left-arrow"><</div>
                    <div class="Availablity" id="availability1">
                        <p class="first">Friday</p>
                        <p class="footerr">July 16, 2021</p>
                    </div>
                    <div class="Availablity" id="availability2">
                        <p class="first">Friday</p>
                        <p class="footerr">July 16, 2021</p>
                    </div>
                    <div class="Availablity" id="availability3">
                        <p class="first">Friday</p>
                        <p class="footerr">July 16, 2021</p>
                    </div>
                    <div class="Availablity" id="availability4">
                        <p class="first">Friday</p>
                        <p class="footerr">July 16, 2021</p>
                    </div>
                    <div class="Availablity" id="availability5">
                        <p class="first">Friday</p>
                        <p class="footerr">July 16, 2021</p>
                    </div>
                    <div class="Availablity" id="availability6">
                        <p class="first">Friday</p>
                        <p class="footerr">July 16, 2021</p>
                    </div>
                    <div class="right-arrow">></div>
                </div>
                <p id="activityHeader">ACTIVITY</p>
                <div class="activityBox">
                    <div class="activity">
                        <p id="activityLine1">Assigned for today</p>
                        <p id="activityLine2">June 13, 2022</p>
                        <div id="activityLine3"></div>
                        <p id="activityLine4">Order ID</p><p>123456</p>
                    </div>
                    <div class="word">
                        <p id="wordLine1">Word Count</p>
                        <select>
                            <option value="">Daily</option>
                            <option value="">Weekly</option>
                            <option value="">Monthly</option>
                        </select>
                        <div id="wordLine2"></div>
                        <p id="wordLine3">40,000 approx.</p>
                    </div>
                </div>
                <p id="assignmentHeader">COMPLETED ASSIGNMENTS</p>
                <div class="assignment">
                    <div class="assignmentBox">
                        <p id="assignmentLine1">Order ID</p>
                        <p id="assignmentLine2">Client Name</p>
                        <p id="assignmentLine3">Date of Submission</p>
                        <p id="assignmentLine4">Category (Subject)</p>
                    </div>
                    <div class="assignmentDetailsBox">
                        <!-- <div class="ss">
                            <div id="assignmentDetailsLine1"><p>Order ID</p><p style="visibility: hidden;">.</p></div>
                            <div id="assignmentDetailsLine2"><p>Client Name</p><p style="visibility: hidden;">.</p></div>
                            <div id="assignmentDetailsLine3"><p>16/06/2022</p><p>4:00 PM</p></div>
                            <div id="assignmentDetailsLine4"><p>Category (Subject)</p><p style="visibility: hidden;">.</p></div>
                            <div style="border-top: 1px solid #ACACAC; margin:0px 36px 10px 36px"></div>
                        </div>
                        <div class="ss">
                            <div id="assignmentDetailsLine1"><p>Order ID</p></div>
                            <div id="assignmentDetailsLine2"><p>Client Name</p></div>
                            <div id="assignmentDetailsLine3"><p>16/06/2022</p><p>4:00 PM</p></div>
                            <div id="assignmentDetailsLine4"><p>Category (Subject)</p></div>
                            <div style="border-top: 1px solid #ACACAC; margin:0px 36px 10px 36px"></div>
                        </div>
                        <div class="ss">
                            <div id="assignmentDetailsLine1">Order ID</div>
                            <div id="assignmentDetailsLine2">Client Name</div>
                            <div id="assignmentDetailsLine3"><p>16/06/2022</p><p style="margin:0 65px ;">4:00 PM</p></div>
                            <div id="assignmentDetailsLine4">Category (Subject)</div>
                            <div style="border-top: 1px solid #ACACAC; margin:0px 36px 10px 36px"></div>
                        </div> -->
                        <div class="ss">
                            <div id="assignmentDetailsLine1">12345<br></div>
                            <div id="assignmentDetailsLine2">Japneet Rajput<br/></div>
                            <div id="assignmentDetailsLine3"><p>16/06/2022</p><br/><p style="color:#FC0F0F;">4:00 PM</p></div>
                            <div id="assignmentDetailsLine4">Data structures<br/></div>
                            <div style="display:block;border-top: 1px solid #ACACAC; margin:10px 36px 10px 36px"></div>
                        </div>
                    </div>
                </div>
                <p id="reviewHeader">Client Reviews</p>
                <div class="review">
                    <div class="reviewBox">
                        <p id="reviewLine1">Order ID</p>
                        <p id="reviewLine2">Client Name</p>
                        <p id="reviewLine3">Reviews</p>
                    </div>
                    <div class="reviewDetailsBox">
                        <div class="rr">
                            <p id="reviewDetailsLine1">123456</p><!-- Order ID -->
                            <p id="reviewDetailsLine2">Japneet Rajput</p><!-- Client Name -->
                            <p id="reviewDetailsLine3">The work was on time and was perfectly done.</p><!-- The work was on time and was perfectly done. -->
                            <div style="display:block;border-top: 1px solid #ACACAC; margin:0px 70px 10px 70px"></div>
                        </div>
                        <!-- <div>
                            <p id="reviewLine1">123456</p>
                            <p id="reviewLine2">Japneet Rajput</p>
                            <p id="reviewLine3">The work was on time and was perfectly done.</p>
                            <div style="border-top: 1px solid #ACACAC; margin:0px 70px 10px 70px"></div>
                        </div>
                        <div>
                            <p id="reviewLine1">123456</p>
                            <p id="reviewLine2">Japneet Rajput</p>
                            <p id="reviewLine3">The work was on time and was perfectly done.</p>
                            <div style="border-top: 1px solid #ACACAC; margin:0px 70px 10px 70px"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('body').on('click', '.contents-here', function() {
        console.log('hii');
    })
    $(document).on('click', '.navbar-toggle-use', function() {
        $('.navbar-size').css('transition', '.9s')
        $('.navbar-size').css('transform', 'translateX(0)');
        // $('.navbar-size').css('display', 'block');
        $('.navbar-toggle-use').addClass('new-navbar');
        $('.navbar-toggle-use').removeClass('navbar-toggle-use');

    });
    $(document).on('click', '.new-navbar', function() {
        $('.navbar-size').css('transition', '.9s')
        $('.navbar-size').css('transform', 'translateX(-100%)');
        $('.new-navbar').addClass('navbar-toggle-use');
        $('.new-navbar').removeClass('new-navbar');
    });
    if ($('.useless').css('display') == 'none') {
        var sidebar = $('.chart-section').first();
        var main_body = $('.cards-section');

        var sidebar_content = sidebar.html();
        sidebar.insertBefore(main_body);
    }
    </script>


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