<?php

class Model extends Database
{

    protected $table = 'animals';
    public function where($data)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $this->table where ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key ;
        }

        $result = $this->query($query,$data);
        return $result;
    }
    public function insert($data)
    {
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (".implode("," , $keys).") VALUES (:". implode(",:" , $keys).")";

        $this->query($query,$data);

        return false;

    }

    public function update($id, $data, $id_column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", " ;
        }


        $query = trim($query,", ");
        $query .= " WHERE $id_column = :$id_column";

        $data[$id_column] = $id;
        $this->query($query,$data);
        return false;
    }

    public function delete($id, $id_column = 'id')
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->query($query,["id"=>$id]);

        return false;
    }
}