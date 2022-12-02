<?php 
    use app\core\Application;

    //Debug user Session:
    // echo '<pre>';
    // var_dump(Application::$app->user);
    // echo '</pre>';
?>


  <body>

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
    </nav>

    <div class="container">
        <?php if(Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success">
            <?php echo  Application::$app->session->getFlash('success'); ?>
        </div>
        <?php endif; ?>
        {{content}}
    </div>
        
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
