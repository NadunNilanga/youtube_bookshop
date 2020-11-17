<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../Models/User/User.php');


// $banks =  User::selectAll();
// foreach ($banks as $user) {
//     echo $user['name'] . '<br>';
// }
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// session_destroy();
if (isset($_SESSION['started'])) {
    if ((mktime() - $_SESSION['started'] - 60 * 0.5) > 0) {
        //Logout, destroy session, etc.
        echo 'exped';
    } else {
        $_SESSION['started'] = mktime();
    }
} else {
    $_SESSION['started'] = mktime();
}
