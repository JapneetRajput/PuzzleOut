<?php
    session_start();
    require_once "config.php";
    $query = "SELECT paymentStatus, count(*) as number FROM orders GROUP BY paymentStatus";
    $result = mysqli_query($conn, $query);
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
       
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
?>
<!doctype html>
<html lang="en">
	<link rel='icon' href='logo/plogo.png'/>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="style11.css">
  <title>Puzzle Out</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);  
  function drawChart()  
  {  
      var data = google.visualization.arrayToDataTable([  
        ['paymentStatus', 'Number'],  
        <?php  
          while($row = mysqli_fetch_array($result)){  
            echo "['".$row["paymentStatus"]."', ".$row["number"]."],";  
          }  
        ?>  
      ]);  
      var options = {   
        title:"Total assignments",
      //   is3D:true,  
        pieHole: 0.3 , 
        slices: {
        0: { color: '#4AC064' },
        1: { color: '#07721F' },
        2: { color: '#CDF4DA' }
        }
      };  
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
      chart.draw(data, options);  
  }  
  </script>  
</head>

<body>


  <div class="website-start">
    <div class="useless"></div>
    <!-- navbar mobile code -->
    <div class="navbar-mobile-view-responsive">
      <nav class="navbar navbar-dark fixed-top navbar-for-mobile-view-only">
        <div class="container mobile-display-view">

          <button class="navbar-toggler  navbar-toggle-use" type="button" data-toggle="collapse"
            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <a class="navbar-brand"><img src="logo/plogo1.png" alt="" class="website-logo"></a>
          <i class="bi bi-bell-fill"></i>
          <div class="collapse navbar-collapse" id="navbarNav"></div>
        </div>
      </nav>

      <div class="navbar-size">
        <div class="mobile-user-details">
          <div class=" navbar-mobile-first-section">
            <div class="contain-mobile-user-image">
              <img src="https://i.pinimg.com/236x/07/15/6b/07156b4680962b650af1c6927c7019d5.jpg" alt="Profile pic"
                class="user-mobile-image">
              <p class="user-name-mobile-all mt-3">Hi <?php echo $userrname?></p>
              <div class="text-center">
                <input type="text" class="mobile-search-area mobile-search-area-place " placeholder="search..">
                <i class="bi bi-search mobile-search-icon"></i>
              </div>
            </div>
          </div>
          <div class="mobile-second-section mt-3">
            DASHBOARD
          </div>
          <div class="text-center mt-3">
            <p class="text-center mb-4"><a href="overview.php" class="mobile-linked-page">Overview</a></p>
            <p class="text-center mb-4"><a href="assignments.php" class="mobile-linked-page">Assignments</a></p>
            <p class="text-center mb-4"><a href="writer.php" class="mobile-linked-page">Experts</a></p>
            <p class="text-center mb-4"><a href="" class="mobile-linked-page">Chats/ Queries</a></p>
            <p class="text-center mb-4"><a href="" class="mobile-linked-page">Payment</a></p>
            <p class="text-center mb-4"><a href="" class="mobile-linked-page">Clients</a></p>
          </div>
          <div class="mobile-second-section mt-3">
            OTHER
          </div>
          <div class="text-center mt-3">
            <p class="text-center mb-4"><a href="" class="mobile-linked-page">Settings</a></p>
            <p class="text-center mb-4"><a href="logout.php" class="mobile-linked-page">LOG OUT</a></p>
          </div>
        </div>
      </div>

    </div>
    <!-- navbar mobile code end here -->
    <div class="navbar-top">
      <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand user-name" href="#">Hi <?php echo $userrname?>,</a>
        <button class="navbar-toggler mobile-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- left sidebar -->
          <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
            <div class="leftsidebar-logo">
              <img src="logo/plogo1.png" alt="company-logo" class="company-logo">

            </div>
            <div class="leftsidebar-second-section">
              <div class="leftsidebar-title">DASHBOARD</div>
              <div class="navbar-left-side-content">
                <div class="contents-here overviewpage"><a href="overview.php" class="content-link ">Overview</a></div>
                <div class="contents-here"><a href="assignments.php" class="content-link">Assignments</a></div>
                <div class="contents-here"><a href="writer.php" class="content-link">Writers</a></div>
                <div class="contents-here"><a href="" class="content-link">Chats/Queries</a></div>
                <div class="contents-here"><a href="" class="content-link">Payments</a></div>
              </div>
            </div>
            <div class="leftsidebar-second-section">
              <div class="leftsidebar-title">OTHERS</div>
              <div class="navbar-left-side-content">
                <div class="contents-here"><a class="content-link">Settings</a></div>
                <div class="contents-here"><a href="logout.php" class="content-link">LOG OUT</a></div>
              </div>
            </div>

          </ul>
          <!-- end left sidebar -->
          <div class="form-inline ml-auto mt-2 mt-md-0">
            <input class="form-control mr-sm-2 search-field" type="text" placeholder="Search..." aria-label="Search">
            <div class="search-icon"><i class="bi bi-search"></i></div>
            <div class="notification-bell-navbar"><i class="bi bi-bell-fill"></i></div>
            <div class="navbar-user-profiles"><img
                src="https://i.pinimg.com/236x/07/15/6b/07156b4680962b650af1c6927c7019d5.jpg" class="user-profile"
                alt=""></div>
          </div>
        </div>
      </nav>
    </div>
    <div class="">
      <main class="content-wrapper">
        <!-- right side -->
        <div class="pt-4">
          <div class="container append-here">
            <!-- Laptop-notication-list -->
            <!-- End Laptop-notication-list -->
            <!-- first row code here -->
            <div class="row">
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  overview-attachment-section">
                <div class="overview-attachment"><i class="bi bi-plus"></i><a href="welcome.php" style="text-decoration:none;color:white;">Add Assignment</a> </div>
              </div>

            </div>
            <!-- first row code here -->
            <div class="row header-position-set">
              <div class="col-xxl-7 col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12 cards-section">
                <div class="container">
                  <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 overview-cards-exist">
                      <div class="overview-cards">
                        <div class="all-cards">
                          <a href="assignments.php" class="card-linked">Assignment Sheet</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 overview-cards-exist payment">
                      <div class="overview-cards">
                        <div class="all-cards cards-position-different">
                          <a href="" class="card-linked">Payments</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 overview-cards-exist expert">
                      <div class="overview-cards">
                        <div class="all-cards cards-position-different">
                          <a href="writer.php" class="card-linked">Experts</a>
                        </div>
                      </div>
                    </div>
                    <div
                      class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 overview-cards-exist second-row client">
                      <div class="overview-cards">
                        <div class="all-cards cards-position-different">
                          <a href="" class="card-linked">Clients</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 overview-cards-exist second-row">
                      <div class="overview-cards">
                        <div class="all-cards card-unique ">
                          <a href="" class="card-linked">Online Orders</a>
                        </div>
                      </div>
                    </div>
                    <div
                      class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 overview-cards-exist second-row status-update">
                      <div class="overview-cards">
                        <div class="all-cards card-unique">
                          <a href="" class="card-linked">Status Update</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-12 col-sm-12 col-12  text-center chart-section"> -->
              <div id="piechart"></div> 
              <!-- </div> -->
              <div class="container mt-3">
                <hr>
                <span class="overview-update">RESOURCES</span>
              </div>
              <div class="container">
                <div class="row mt-3 resoure-card">
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 resource-data">
                    <div class="overview-cards resource-section-card">
                      <div class="all-cards-resource">
                        <a href="" class="card-linked">Subjects Covered</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 resource-data">
                    <a href="clientReviews.php" style="text-decoration:none;color:white" class="card-linked"><div class="overview-cards resource-section-card ">
                      <div class="all-cards-resource client-review">
                        Client Reviews
                      </div>
                    </div></a>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 resource-data">
                    <div class="overview-cards resource-section-card">
                      <div class="all-cards-resource client-review client client-follow">
                        <a href="" class="card-linked">Client Follow Up Sheet</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 resource-data">
                    <a href="order.php" style="text-decoration:none;color:white" class="card-linked"><div class="overview-cards resource-section-card ">
                      <div class="all-cards-resource client-review">
                        Orders to be delivered
                      </div>
                    </div></a>
                  </div>

                </div>
                <br>

              </div>
            </div>
          </div>
        </div>
        <!--end right side -->
      </main>
    </div>


  </div>
  <script>
    $(document).ready(function () {
      $(".append-here").load("overviewpagedetails.html");
    });
    $('body').on('click', '.contents-here', function () {
      console.log('hii');
    });
    $(document).on('click', '.navbar-toggle-use', function () {
      $('.navbar-size').css('transition', '.9s')
      $('.navbar-size').css('transform', 'translateX(-146px)');
      // $('.navbar-size').css('display', 'block');
      $('.content-wrapper').addClass('new-navbar');
      $('.content-wrapper').removeClass('navbar-toggle-use');

    });
    $(document).on('click', '.new-navbar', function () {
      $('.navbar-size').css('transition', '.9s')
      $('.navbar-size').css('transform', 'translateX(-100%)');
      $('.new-navbar').removeClass('new-navbar');
    });
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