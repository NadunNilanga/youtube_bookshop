<?php
class Database
{
    public static $host = 'localhost';
    public static $databaseName = 'cadhouse';
    public static $userName = 'root';
    public static $password = '';

    private static function connect()
    {
        $pdo = new PDO("mysql:host=" . self::$host . "; dbname=" . self::$databaseName . "; charset=utf8", self::$userName, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function select($query)
    {
        $statement = self::connect()->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        // echo json_encode($results);
        return $results;
    }

    public static function insert($tbl, $data)
    {
        $qury = 'INSERT INTO ' . $tbl . ' (';

        $numItems = count($data);
        $i = 0;
        foreach ($data as $col => $x_value) {
            if (++$i === $numItems) {
                $qury .= $col;
            } else {

                $qury .= $col . ',';
            }
        }

        $qury .= ')VALUES (';
        $i = 0;
        foreach ($data as $col => $x_value) {
            if (++$i === $numItems) {
                $qury .= ':' . $col;
            } else {

                $qury .= ':' . $col . ',';
            }
        }

        $qury .= ');';
        $operationResult =  self::connect()->prepare($qury)->execute($data);
        if ($operationResult) {
            $msg = 'Saved Successfully ! ';
            echo json_encode(array("msgType" => 1, "msg‍" => $msg));
        } else {
            $msg = 'Something Went wrong ! ';
            echo json_encode(array("msgType" => 0, "msg" => $msg));
        }
    }
}
