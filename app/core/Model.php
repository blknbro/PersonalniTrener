<?php

class Model extends Database
{
    function test()
    {
        $query = "SELECT * FROM adoptions";
        $result = $this->query($query);
        print_r($result);
    }
}