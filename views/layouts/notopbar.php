<?php 
    use app\core\Application;

    // Debug user Session:
    // echo '<pre>';
    // var_dump(Application::$app->user);
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
