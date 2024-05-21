<?php

class Model extends Database
{

    protected $table = 'animals';

    public function findAll()
    {

        $query = "SELECT * FROM $this->table";
        return $this->query($query);

    }
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
        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (".implode("," , $keys).") VALUES (:". implode(",:" , $keys).")";

        $this->query($query,$data);

        return false;

    }

    public function update($id, $data, $id_column = 'id')
    {
        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

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