<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../Models/Login/Login.php');

if ($_POST['request'] == 'login') {
    $data =    $_POST['data'];
    if (Login::userLogin($data)) {
        echo json_encode(array("msgType" => 1, "msg" => 'Login ok'));
    } else {
        echo json_encode(array("msgType" => 0, "msg" => 'Login Fail ! Incorrect Username Or Password'));
    }
}
