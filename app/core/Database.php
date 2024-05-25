<?php
class Database
{

    /**
     * @return PDO
     */
    private function connect()
    {
        $string = "mysql:hostname=localhost;dbname=it";
        $con =  new PDO($string,USER,PASSWORD);
        return $con;
    }

    /**
     * @param string $query
     * @param array $data
     * @return bool|array
     */
    public function query(string $query,array $data = []): bool|array
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

    /**
     * @param string $query
     * @param array $data
     * @return false|mixed
     */
    public function get_row(string $query,array $data = [])
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
