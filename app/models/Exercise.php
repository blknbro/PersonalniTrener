<?php


class Exercise extends Model
{


    protected $table = 'exerecise';
    public $errors = [];

    protected $allowedColumns = [
        'duration',
        'description',
        'image_url',
        'video_url',
        'title'
    ];




}