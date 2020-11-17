<?php
if (isset($_SESSION['started'])) {
    $valid_period = 0.2; //in minutes
    if ((mktime() - $_SESSION['started'] - 60 * $valid_period) > 0) {
        //Logout, destroy session, etc.
        session_destroy();
        header("Location: ../../index.php");
    } else {
        $_SESSION['started'] = mktime();
    }
} 
//this part belogs to login php
//else {
//     $_SESSION['started'] = mktime();
// }
