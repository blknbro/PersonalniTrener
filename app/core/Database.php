<?php
class Database
{
    private function connect()
    {
        $string = "mysql:hostname=localhost;dbname=it";
        $con =  new PDO($string,USER,PASSWORD);
        return $con;
    }

    public function query($query, $data = [])
    {
        $connection = $this->connect();

        $stmnt = $connection->prepare($query);

        $check = $stmnt->execute($data);
        if($check)
        {
            $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result))
            {
                return $result;
            }
        }
        return false;
    }
    public function get_row($query, $data = [])
    {
        $connection = $this->connect();

        $stmnt = $connection->prepare($query);

        $check = $stmnt->execute($data);
        if($check)
        {
            $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result))
            {
                return $result[0];
            }
        }
        return false;
    }
}
