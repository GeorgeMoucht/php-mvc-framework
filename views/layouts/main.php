<?php 
    use app\core\Application;

    // Debug user Session:
    // echo '<pre>';
    // var_dump(Application::$app->user<img src="/assets/img/avatar1.png" alt="Profile Picture">);
    // echo '</pre>';
    // exit;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Link main css -->
    <link rel="stylesheet" href="/assets/stylesheets/app.css">
</head>

  <body>

    <div class="background"></div>
    <!-- Contain all the layouts -->
    <div class="global-wrapper">
        <!-- burger-cnt -->
        <div class="burger-cnt">
            <a class="toggle-menu" href="#">
                <i></i>
                <i></i>
                <i></i>
            </a>
            <!-- menu-drawer -->
            <div class="menu-drawer">
                <ul>
                    <a href="#"><li>Home</li></a>
                    <a href="#"><li>About</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
            <!-- End of menu-drawer -->
        </div>
        <!-- End of burger-cnt -->

        <div class="flx-wrapper">
            <!-- Holds the main div that every layout is inside -->
            <div class="main">
            
                <!-- TopBar Navigation -->
                <div class="top-navbar-wrapper">
                    <!-- Menu list -->
                    <div class="top-nav-list-cnt">
                        <ul class="top-nav-list">
                            <a href="">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                                    </svg>
                                    Home
                                </li>
                            </a>
                            <a href="">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                    </svg>
                                    Courses
                                </li>
                            </a>
                            <a href="">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
                                    </svg>
                                    Forum
                                </li>
                            </a>
                            <a href="">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </svg>    
                                    Contact
                                </li>
                            </a>
                        </ul>
                        <?php if(Application::isGuest()): ?>
                            <ul class="top-nav-list top-nav-profile-list">
                                <a href="/login">
                                    <li>Login</li>
                                </a>
                                <a href="/register">
                                    <li>Register</li>
                                </a>
                            </ul>
                        <?php else: ?> 
                            <ul class="top-nav-list top-nav-profile-list">
                                <a href="/logout">
                                    <li>Log out</li>
                                </a>
                                <span class="prof-img-cnt">
                                    <img src="/assets/img/avatar1.png" alt="Profile Picture"></a>
                                </span>
                            </ul>
                        <?php endif; ?>
                        
                        <!-- Courses Dropdown -->
                        <!-- <ul class="courses-dropdown">
                            <li>All Courses</li>
                            <li>Enrolled Courses</li>
                        </ul> -->
                    </div>
                    <!-- End of menu list -->
                    
                    <!-- Profile Dropdown -->
                    <!-- <div class="top-nav-dropdown">

                    </div> -->
                    <!-- End of profile dropdown -->
                </div>

                <!-- TopBar Navigation -->
                
                <?php if(Application::$app->session->getFlash('success')): ?>
                    <div class="alert alert-success">
                        <?php echo  Application::$app->session->getFlash('success'); ?>
                    </div>
                <?php endif; ?>
                {{content}}
            </div> 
            <!-- End Main -->

        </div>
        <!-- End flx-cnt -->

    </div> 
    <!-- End global-wrapper -->


    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
    </body>
</html>
