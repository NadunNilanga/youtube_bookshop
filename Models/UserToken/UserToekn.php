<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../system/Autoload.php');
date_default_timezone_set('Asia/Colombo');
class UserToken extends Model
{
    public static function setNewUserToken($user)
    {
        $_SESSION['active_user'] = $user;
        $user_id = $user['user_id'];
        $newUserToken =  $user_id . "_" . date("Ymd_His");
        $finalResult = true;
        $_SESSION['active_user']['token'] =   $newUserToken;
        $tokenData = array(
            "token" =>  $newUserToken,
            "user_id" => $user_id
        );
        $query = "SELECT user_tokens.id FROM user_tokens WHERE user_tokens.user_id=:user_id AND user_tokens.in_use='1'";
        $searchData = array(
            "user_id" => $user_id
        );
        $statement = self::connect()->prepare($query);
        $statement->execute($searchData);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            $expireData = array(
                "logout_at" => date("Y-m-d H:i:s"),
                "in_use" => "0"
            );
            $where = array(
                "id" => $results[0]['id']
            );
            if (self::update("user_tokens", $expireData, $where)) {
                $finalResult =  self::insert("user_tokens", $tokenData);
            }
        } else {
            $finalResult =  self::insert("user_tokens", $tokenData);
        }
        if ($finalResult) {
            $query = "SELECT user_privilages.user_privilage_id,user_privilages.user_id,user_privilages.privilage_id,user_privilages.created_at FROM user_privilages WHERE user_privilages.user_id=:user_id";
            $searchData = array(
                "user_id" => $user_id
            );
            $statement = self::connect()->prepare($query);
            $statement->execute($searchData);
            $privilages = $statement->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['active_user_privilages'] = $privilages;
            $_SESSION['started'] = mktime(); //start  time to count session validation time
        }
        return  $finalResult;
    }
}


// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
