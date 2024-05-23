<?php


class Animal extends Model
{

    protected $table = 'animals';

    protected $allowedColumns =[
        'name',
        'type',
        'race',
        'photo'
    ];

}