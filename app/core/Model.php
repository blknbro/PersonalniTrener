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
     * @param array $data
     * @return bool|array
     */
    public function where(array $data): bool|array
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key;
        }

        return $this->query($query, $data);
    }

    /**
     * @param $data
     * @return false
     */
    public function insert(array $data): false
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        $this->query($query, $data);

        return false;

    }

    /**
     * @param $id
     * @param array $data
     * @param string $id_column
     * @return false
     */
    public function update($id, array $data, string $id_column = 'id'): false
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }


        $query = trim($query, ", ");
        $query .= " WHERE $id_column = :id_value";

        $data['id_value'] = $id;
        $this->query($query, $data);
        return false;
    }

    /**
     * @param $id
     * @param string $id_column
     * @return false
     */
    public function delete($id, string $id_column = 'id'): false
    {
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
        $this->query($query, [$id_column => $id]);

        return false;
    }
}