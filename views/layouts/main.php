<?php 
    use app\core\Application;

    //Debug user Session:
    // echo '<pre>';
    // var_dump(Application::$app->user);
    // echo '</pre>';
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <!-- End of menu-drawer -->
        </div>
        <!-- End of burger-cnt -->

        <div class="flx-wrapper">
            <!-- Holds the main div that every layout is inside -->
            <div class="main">
                {{content}}
            </div> 
            <!-- End Main -->

        </div>
        <!-- End flx-cnt -->

    </div> 
    <!-- End global-wrapper -->



<!-- 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <?php if(Application::isGuest()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Welcome <?php echo Application::$app->user->getDisplayName() ?>
                        (Logout)
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav> -->

    <!-- <div class="container" style="background: black;">
        <?php if(Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success">
            <?php echo  Application::$app->session->getFlash('success'); ?>
        </div>
        <?php endif; ?>
        {{content}}
    </div>
         -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
    </body>
</html>
