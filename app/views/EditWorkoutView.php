<?php

require_once 'head.php';
require_once 'navbar.php';

?>

    <div class="container text-center min-vh-100 mx-auto p-5 bg-dark rounded-2 w-100" style="margin-top: 64px;">
        <div class="d-flex flex-column flex-md-row">
            <div class="d-flex flex-column gap-4 flex-grow-1">
                <h2 class="fs-1">Make your own workout plan</h2>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?=
                        implode("<br>", $errors)

                        ?>
                    </div>
                <?php elseif (!empty($succ)): ?>
                    <div class="alert alert-success">
                        Success!
                    </div>
                <?php endif; ?>
                <form action="" method="post" id="workoutForm">
                    <div class="mb-3">
                        <label for="title" class="form-label fs-4">Workout title:</label>
                        <input type="text" name="title" class="form-control" required id="title"
                               value="<?= htmlspecialchars($workout[0]['title']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fs-4">Description:</label>
                        <textarea name="description" id="description" class="form-control" required
                                  style="min-height: 200px; resize: none;"><?= htmlspecialchars($workout[0]['description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="fs-4">Category:</label>
                        <select class="form-select text-dark" name="category">
                            <?php foreach ($categories as $category): ?>
                                <option class="text-dark"
                                        value="<?= $category['name'] ?>" <?php if ($workout[0]['category_id'] === $category['category_id']) echo 'selected' ?>><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="fs-4">Duration:</label>
                        <div class="d-flex flex-row mb-3 gap-2">
                            <input class="form-control" id='duration_value' name="duration_value" required
                                   value="<?= $workout[0]['duration_value'] ?>" min="1"
                                   max="50" type="number">
                            <select class="form-select text-dark" name="duration_unit" id="unit">
                                <option class="text-dark" value="none">Choose unit</option>
                                <?php $units = ['day(s)', 'week(s)', 'month(s)'];
                                foreach ($units as $unit):?>
                                    <option class="text-dark"
                                            value="<?= $unit ?>" <?php if ($workout[0]['duration_unit'] === $unit) echo 'selected' ?>><?= $unit ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div id="exercisesContainer">
                        <label for="exercise1" class="fs-4">Exercises:</label>
                        <?php foreach ($workoutExercises as $workoutExercise): ?>
                            <div class="mb-3 exercise-group">
                                <div class="d-flex flex-row mb-3 gap-2">
                                    <select class="form-select text-dark" name="exercises[]" required>
                                        <?php foreach ($exercises as $exercise): ?>
                                            <option class="text-dark"
                                                    value="<?= $exercise['title'] ?>" <?php if ($workoutExercise['exercise_id'] === $exercise['exercise_id']) echo 'selected' ?>><?= $exercise['title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select class="form-select text-dark" name="days_of_week[]" required>
                                        <?php $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                        foreach ($days as $day):?>
                                            <option class="text-dark"
                                                    value="<?= $day ?>" <?php if ($workoutExercise['day_of_week'] === $day) echo 'selected' ?>><?= $day ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="button" class="btn btn-danger remove-exercise">Remove</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" id="addExerciseBtn" class="btn btn-secondary mb-3">Add Another Exercise
                    </button>


                    <input type="hidden" name="privacy" value="<?= $workout[0]['privacy'] ?>">
                    <input type="hidden" name="workout_id" value="<?= $workout[0]['workout_id'] ?> ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-light">Make</button>
                    </div>
                </form>
            </div>
            <div class="ms-md-5">
                <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class="img-fluid img-thumbnail" alt="JENNA"
                     style="max-height: 600px;">
            </div>
        </div>
    </div>

    <script>
        const ROOT_URL = '<?= ROOT ?>'
    </script>
    <script src="<?= ROOT ?>/assets/scripts/makeWork.js">
    </script>


<?php require_once 'footer.php';
