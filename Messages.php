<?php
    switch ($_GET["alert"]) {
        case 'no-email':
            echo '<div class="alert alert-info mx-auto w-50" role="alert">
            <h4 class="alert-heading">Geen Email ingevuld!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            </div>';
        break;
        case 'email-exist':
            echo '<div class="alert alert-danger mx-auto w-50" role="alert">
            <h4 class="alert-heading">Op dit Email is al een account!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            </div>';
        break;
        case 'db-fail':
            echo '<div class="alert alert-danger mx-auto w-50" role="alert">
            <h4 class="alert-heading">Er is iets fout gegaan bij het aanmaken van uw account</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            </div>';
        break;
        case 'reg-suc':
            echo '<div class="alert alert-success mx-auto w-50" role="alert">
            <h4 class="alert-heading">Er is iets fout gegaan bij het aanmaken van uw account</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            </div>';
        break;
        // default:
        //     header("Location: ./index.php?c=home")
        // break;
    }
    header("Refresh: 3; url=./index.php?c=home");