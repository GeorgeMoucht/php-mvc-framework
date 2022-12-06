

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