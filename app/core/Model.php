<?php

class Model extends Database
{

    protected $table = 'users';

    public function findAll()
    {

        $query = "SELECT * FROM $this->table";
        return $this->query($query);

    }

    /**
     * @param $data
     * @return bool|array
     */
    public function where($data): bool|array
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key ;
        }

        $result = $this->query($query,$data);
        return $result;
    }

    /**
     * @param $data
     * @return false
     */
    public function insert($data): false
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

    /**
     * @param $id
     * @param $data
     * @param $id_column
     * @return false
     */
    public function update($id, $data, $id_column = 'id'): false
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
        $query .= " WHERE $id_column = :id_value";

        $data['id_value'] = $id;
        $this->query($query,$data);
        return false;
    }

    /**
     * @param $id
     * @param $id_column
     * @return false
     */
    public function delete($id, $id_column = 'id'): false
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->query($query,["id"=>$id]);

        return false;
    }
}