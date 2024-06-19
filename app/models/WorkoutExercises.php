<?php

class WorkoutExercises extends Model
{


    protected $table = 'workoutexercises';
    public $errors = [];

    protected $allowedColumns = [
        'workout_id',
        'exercise_id',
        'day_of_week',
    ];


}