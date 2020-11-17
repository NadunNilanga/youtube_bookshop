<?php
require_once('../../Models/UserToken/UserToekn.php');
if (isset($_SESSION['started'])) {
    $valid_period = 60; //in minutes
    if ((mktime() - $_SESSION['started'] - 60 * $valid_period) > 0) {
        //Logout, destroy session, etc.
        $expireData = array(
            "logout_at" => date("Y-m-d H:i:s"),
            "in_use" => "0"
        );
        $where = array(
            "token" =>  $_SESSION['active_user']['token']
        );
        UserToken::update("user_tokens", $expireData, $where);
        session_destroy();
        header("Location: ../../index.php");
    } else {
        $_SESSION['started'] = mktime();
    }
}
