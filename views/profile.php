<?php
// var_dump($_SESSION);
// exit;
use app\core\Application;

?>
<div class="profile-wrapper">
    <div class="full-width-block flex-row">
        <div class="profile-img-cnt">
            <img src="/assets/img/avatar1.png" alt="Profile Picture" />
        </div>
        <div class="profile-info-cnt">
            <h3><?php  echo Application::$app->user->getDisplayName(); ?></h3>
            <div class="counter-cnt">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    446
                </span>
                &nbsp;
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
                        <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                    </svg>
                    123
                </span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="flex-row mobile-view">
        <div class="col mob-view-col">
            <div class="border-block">
                <h5>User details</h5>
                <span class="btn edit-btn">Edit Profile</span>

                <br>
                <h6>Email address</h6>
                <span><?php  echo Application::$app->user->getDisplayEmail(); ?></span>

                <br>
                <h6>Country</h6>
                <span><?php  echo Application::$app->user->getDisplayCountry(); ?></span>

                <br>
                <h6>City/Town</h6>
                <span><?php  echo Application::$app->user->getDisplayCity(); ?></span>

                <br>
                <h6>Interests</h6>
                <span><?php  echo Application::$app->user->getDisplayInterests(); ?></span>
            </div>

            <div class="border-block">
                <h5>Badges</h5>
                <h6>Badges from all courses</h6>
                <ul class="badges-block-wrapper">
                    <!-- Badge block -->
                    <li class="badge-img-block">
                        <img src="/assets/img/avatar1.png" alt="">
                        <div class="badge-name">First Badge</div>
                    </li>

                    <!-- Badge block -->
                    <li class="badge-img-block">
                        <img src="/assets/img/avatar1.png" alt="">
                        <div class="badge-name">First Badge</div>
                    </li>

                </ul>

            </div>
        </div>

        <div class="col">
            <div class="border-block">
                <h5>Course details</h5>
                <ul>
                    <li><a href="">First test Course</a></li>
                    <li><a href="">Second test Course</a></li>
                    <li><a href="">Third test Course</a></li>
                    <li><a href="">Forth test Course</a></li>
                </ul>
            </div>

            <div class="border-block">
                <h5>Miscellaneous</h5>
                <ul>
                    <li><a href="">My topics</a></li>
                    <li><a href="">My comments</a></li>
                </ul>
            </div>

            <div class="border-block">
                <h5>Login Activity</h5>
           
                <h6>First access to site</h6>
                <span>Wednesday, 1 September 2014, 1:48 PM (7 years 257 days)</span>
                <span><?php  echo Application::$app->user->getDisplayCreatedDate(); ?></span>

                <h6>Last access to site</h6>
                <span>Monday, 14 May 2018, 5:12 PM (now)</span>
            </div>
        </div>

    </div>
</div>

