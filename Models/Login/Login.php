<?php
require_once('../../system/Autoload.php');

class Login extends Model
{
    public static function userLogin($userData)
    {
        $query = "SELECT users.user_id,users.user_name,users.`password`,users.created_at,users.`status` FROM users WHERE user_name = :user_name AND password= :password";

        $statement = self::connect()->prepare($query);
        $statement->execute($userData);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0) {
            return UserToken::setNewUserToken($results[0]);          //  echo json_encode($results);
        } else {
            return false;
        }
    }
}
