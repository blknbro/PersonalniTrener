<?php

class Model extends Database
{

    protected $table = 'animals';
    public function where($data, $data_not)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $this->table where id = :id &&";
        $this->query($query,['id'=>23]);
    }

    public function first($data)
    {

    }

    public function insert($data)
    {
        
    }

    public function update($id, $data, $id_column = 'id')
    {

    }

    public function delete($id, $id_column = 'id')
    {

    }
}