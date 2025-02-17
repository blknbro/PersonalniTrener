<?php


class Training extends Model
{


    protected $table = 'workouts';
    public $errors = [];

    protected $allowedColumns = [
        'title',
        'description',
        'duration_value',
        'duration_unit',
        'id',
        'category_id',
        'privacy',
        'workout_image'
    ];

    public function findAllWithJoins()
    {

        $query = "SELECT w.workout_id,title,description,u.name,surname,email,duration_value,duration_unit,c.name AS category_name FROM $this->table w INNER JOIN users u ON w.id = u.id INNER JOIN category c ON c.category_id = w.category_id";
        return $this->query($query);
    }

    public function findAllPublicWithJoins($privacy): bool|array
    {

        $query = "SELECT w.workout_id,title,description,u.name,surname,email,duration_value,duration_unit,c.name AS category_name FROM $this->table w INNER JOIN users u ON w.id = u.id INNER JOIN category c ON c.category_id = w.category_id WHERE w.privacy = :privacy";
        return $this->query($query,['privacy' => $privacy]);
    }

    public function findAllPublicSearchWithJoins($privacy,$searchQuery,$category): bool|array
    {

        $query = "SELECT w.workout_id,w.workout_image,title,description,u.name,surname,email,duration_value,duration_unit,c.name AS category_name FROM $this->table w INNER JOIN users u ON w.id = u.id INNER JOIN category c ON c.category_id = w.category_id WHERE (w.privacy = :privacy) AND (w.title LIKE :query OR w.description LIKE :query) AND (:category = '' OR c.name = :category)";
        return $this->query($query,['privacy' => $privacy, 'query' => "%". $searchQuery ."%", 'category' => $category]);
    }

    public function findAllPrivateWithJoins($id)
    {

        $query = "SELECT w.workout_id,title,description,u.name,surname,email,duration_value,duration_unit,c.name AS category_name FROM $this->table w INNER JOIN users u ON w.id = u.id INNER JOIN category c ON c.category_id = w.category_id WHERE w.id = :id";
        return $this->query($query,['id' => $id]);
    }

    public function findWhereIdWithJoinsDetailed(int $id)
    {

        $query = "SELECT w.title,w.description,e.title AS e_title,e.description AS exercise_desc,w.duration_value,w.duration_unit,e.duration AS exercise_duration,e.video_url AS video_link,e.image_url,we.day_of_week FROM `workoutexercises` we INNER JOIN workouts w ON we.workout_id = w.workout_id INNER JOIN exerecise e ON e.exercise_id = we.exercise_id WHERE w.workout_id = :id; ";
        return $this->query($query,['id' => $id]);
    }



}