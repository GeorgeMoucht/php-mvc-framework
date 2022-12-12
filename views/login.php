<div class="form-wrapper login-form">
    <div class="form-logo-cnt">
        <?php
            // echo '<pre>';
            // var_dump($_SERVER);
            // exit;
            // echo '</pre>';
        ?>
        <img src="/assets/img/example-logo.png">
    </div>
    <div class="flx-wrapper">
        <div class="login-block block">
            <div class="third-party-login-cnt">
                <h2>NAME OF THE SITE</h2>
                <div class="underline"></div>

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
                Cookies must be enabled in your browser
                <h3>Log in using your account on:</h3>

                <button class="google-login">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                    </svg>
                    Login with Google                
                </button>
            </div>

            <div class="login-form-cnt">
                <h4>Already have an account?</h4>
                <?php $form = \app\core\form\Form::begin('', 'post'); ?>
                    <?php echo $form->field($model , 'email') ?>
                    <?php  echo $form->field($model , 'password')->passwordField() ?>

                    <button type="submit" class="btn-submit">Submit</button>
                    <a href="">Forgotten your username or password?<a>
                <?php  \app\core\form\Form::end(); ?>
            </div>
        </div>

        <div class="block">
            <h2>Is this your first time here?</h2>
            <h3>How do I log in?</h3>

            <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>
            <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>    <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>    <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>    <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>    <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>    <p>
                NEW - Login using Google 
                Now you can use your college email to login into MOVE. You'll simply need to click on the button above that says 'Login with Google'. If you were already logged into your email, you'll be logged directly into MOVE. Otherwise, you'll just need to enter your college email address and your student password.
            </p>
        </div>
    </div>
</div>