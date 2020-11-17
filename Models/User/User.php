<?php
require_once('../../system/Autoload.php');
class User extends Model
{
    public static function selectAll()
    {
        $banks = self::select('SELECT * FROM bank');
        return $banks;
    }
}
