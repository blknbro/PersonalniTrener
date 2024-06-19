<?php


class Category extends Model
{


    protected $table = 'category';
    public $errors = [];

    protected $allowedColumns = [
        'name',
    ];




}