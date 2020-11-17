<?php
class Database
{
    public static $host = 'localhost';
    public static $databaseName = 'book_store';
    public static $userName = 'root';
    public static $password = '';

    public static function connect()
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
            return true;
        } else {
            return false;
        }
    }

    public static function update($tbl, $data, $where)
    {
        $qury = 'UPDATE  ' . $tbl . ' set ';

        $numItems = count($data);
        $i = 0;
        foreach ($data as $col => $x_value) {
            if (++$i === $numItems) {
                $qury .= $col . '=:' . $col;
            } else {

                $qury .= $col . '=:' . $col . ',';
            }
        }

        $qury .= ' where ';
        $numItems = count($where);
        $i = 0;
        foreach ($where as $col => $x_value) {
            if (++$i === $numItems) {
                $qury .= $col . '=:' . $col;
            } else {

                $qury .= $col . '=:' . $col . 'and';
            }
        }

        $qury .= ';';

        $data = array_merge($data, $where); //make one array
        $operationResult =  self::connect()->prepare($qury)->execute($data);
        if ($operationResult) {
            return true;
        } else {
            return false;
        }
    }



    public static function delete($tbl, $where)
    {
        $qury = 'delete from  ' . $tbl;

        $numItems = count($where);

        $qury .= ' where ';
        $i = 0;
        foreach ($where as $col => $x_value) {
            if (++$i === $numItems) {
                $qury .= $col . '=:' . $col;
            } else {

                $qury .= $col . '=:' . $col . 'and';
            }
        }

        $qury .= ';';
        $operationResult =  self::connect()->prepare($qury)->execute($where);
        if ($operationResult) {
            return true;
        } else {
            return false;
        }
    }
}//end class