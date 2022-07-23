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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="addAssignment1.css">
    <title>Puzzle Out</title>
</head>

<body>
    <div class="website-start">
        <div class="useless"></div>
        <!-- navbar mobile code -->
        <div class="navbar-mobile-view-responsive">
            <nav class="navbar navbar-dark fixed-top navbar-for-mobile-view-only">
                <div class="container mobile-display-view">

                    <button class="navbar-toggler  navbar-toggle-use" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
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
                            <img src="https://i.pinimg.com/236x/07/15/6b/07156b4680962b650af1c6927c7019d5.jpg"
                                alt="Profile pic" class="user-mobile-image">
                            <p class="user-name-mobile-all mt-3">Hi Marshal Mathers</p>
                            <div class="text-center">
                                <input type="text" class="mobile-search-area mobile-search-area-place "
                                    placeholder="search..">
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
                        <p class="text-center mb-4"><a href="writer.php" class="mobile-linked-page">Exports</a></p>
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
                <a class="navbar-brand user-name" href="#">Hi Marshal Mathers,</a>
                <button class="navbar-toggler mobile-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                                <div class="contents-here overviewpage"><a href="overview.php" class="content-link ">Overview</a>
                                </div>
                                <div class="contents-here"><a href="assignments.php" class="content-link">Assignments</a></div>
                                <div class="contents-here"><a href="writer.php" class="content-link">writers</a></div>
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
                        <input class="form-control mr-sm-2 search-field" type="text" placeholder="Search..."
                            aria-label="Search">
                        <div class="search-icon"><i class="bi bi-search"></i></div>
                        <div class="notification-bell-navbar"><i class="bi bi-bell-fill"></i></div>
                        <div class="navbar-user-profiles"><img
                                src="https://i.pinimg.com/236x/07/15/6b/07156b4680962b650af1c6927c7019d5.jpg"
                                class="user-profile" alt=""></div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="">
            <main class="content-wrapper">
                <!-- right side -->
                <div class="pt-4">
                    <div class="container">
                        <div class="assign-head-section">
                            <a href="overview.php"><i class="bi bi-arrow-left assign-left-arrow"></i></a>
                            <div>
                                <p class="text-center mb-0 assign-head-center">Add an Assignment</p>
                                <p class="text-center mb-0 assign-head-center">1/2</p>
                            </div>
                            <div style="visibility:hidden;">j</div>
                        </div>
                        <hr>
                        <div class="assign-parent-for-all">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12">
                                    <label class="assign-page-title">Order ID</label>
                                    <input type="text" class="form-control" name="" id="" value="" disabled>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12 assign-category">
                                    <label class="assign-page-title">Category(Subject)</label>
                                    <select name="" id="" class="form-control assign-timing common-css-assignment-page">
                                        <option value="">PHP</option>
                                        <option value="">React js</option>
                                        <option value="">Vue js</option>
                                        <option value="">Angular</option>
                                        <option value="">Node</option>
                                    </select>
                                </div>

                            </div>
                            <!-- second-row word count -->
                            <div class="row mt-3">
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12 word-count-assignment-section">
                                    <label class="assign-page-title">Word Count/No of pages</label>
                                    <div class="word-count">
                                        <input type="button" class="assign-word-count minus-button common" value="-">
                                        <span type="text" class="assign-word-count-input form-control text-center numonclick"
                                            value="" disabled>1</span>
                                        <input type="button" class="assign-word-count plus-button common" value="+">
                                        <span class="rupees-display numonclick2">250</span>
                                        <span class="rupees-display ml-0">words</span>
                                    </div>
                                </div>
                                <input type="hidden" name="pageCount" class="no-of-pages" value="1"/>   
                                <div class="col-xxl-3 col-xl-4 col-md-5 col-sm-12 col-12 assign-category">
                                    <label class="assign-page-title">Assignment due date</label>
                                    <div class="d-flex">
                                        <input type="text" name="" id="date_picker1" placeholder="Deadline"
                                        class="form-control assign-subject-choose jq-date-picker">
                                        <select name="" id="" class="form-control w-50 assign-timing common-css-assignment-page">
                                            <option value="" hidden>Timing</option>
                                            <option value="12:00PM">12:00PM</option>
                                            <option value="1:00PM">1:00PM</option>
                                            <option value="2:00PM">2:00PM</option>
                                            <option value="3:00PM">3:00PM</option>
                                            <option value="4:00PM">4:00PM</option>
                                            <option value="5:00PM">5:00PM</option>
                                            <option value="6:00PM">6:00PM</option>
                                            <option value="7:00PM">7:00PM</option>
                                            <option value="8:00PM">8:00PM</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- end second-row -->
                            <!-- third section -->
                            <div class="row mt-3">
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12">
                                    <label class="assign-page-title">Price</label>
                                    <div class="assign-price">
                                        <select name="" id="" class="form-control assign-price-select common-css-assignment-page">
                                            <option value="" hidden>₹</option>
                                            <option value="INR" >INR</option>
                                            <option value="Euro" >Euro</option>
                                        </select><input type="number" class="form-control assign-price-fill " name=""
                                            id="" value="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12 assign-third-row assign-payment">
                                    <label class="assign-page-title">Payment Status</label>
                                    <select name="" id="" class="form-control assign-timing common-css-assignment-page">
                                        <option value="">Advance</option>
                                        <option value="">Due</option>
                                    </select>
                                </div>
                                <div
                                    class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12 assign-third-row assign-advance assign-third-last">
                                    <label class="assign-page-title">IF, Advance</label>
                                    <input type="number" class="form-control assignfirst-advance" name="" id="" value="">
                                </div>


                            </div>
                            <!-- end third section -->
                            <!-- fourth section -->
                            <div class="row mt-3">
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12">
                                    <label class="assign-page-title">Client provided description</label>
                                    <textarea name="" id="" cols="30" rows="3" class="form-control assign-provide-description"></textarea>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-md-5 col-sm-12 col-12 assign-category">
                                    <div class="attachment-done">
                                        <i class="fa fa-paperclip fa-lg"></i><span class="attachment-name">&nbsp;&nbsp;Add Attachment</span>
                                        <input type="file" name="" id="" class="hide">
                                    </div>
                                </div>

                            </div>
                            <!--end fourth section  -->

                            <div class="text-center mt-4">
                                <button class="btn btn assign-next">Discard</button>
                                <a href=""><button class="btn btn-success assign-next">Next</button></a>
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
        $(".attachment-done").click(function () {
            $("input[type='file']").trigger('click');
        });

        $('input[type="file"]').on('change', function () {
            var val = $(this).val();
            $(this).siblings('span').text(val);
        })
        $(document).on('click','.common',function(){
        $no = $('.numonclick').text();
        $('.no-of-pages').val($no);
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
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
    <script src="assignmentJq.js" type="text/javascript"></script>
</body>

</html>