<?php
require_once 'head.php';
require_once 'navbar.php' ?>

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
                    <input type="text" name="title" class="form-control" required id="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fs-4">Description:</label>
                    <textarea name="description" id="description" class="form-control" required
                              style="min-height: 200px; resize: none;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="fs-4">Category:</label>
                    <select class="form-select text-dark" name="category">
                        <?php foreach ($categories as $category): ?>
                            <option class="text-dark" value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="fs-4">Duration:</label>
                    <div class="d-flex flex-row mb-3 gap-2">
                        <input class="form-control" id='duration_value' name="duration_value" required value="1" min="1"
                               max="50" type="number">
                        <select class="form-select text-dark" name="duration_unit" id="unit">
                            <option class="text-dark" selected value="none">Choose unit</option>
                            <option class="text-dark" value="week(s)">week(s)</option>
                            <option class="text-dark" value="day(s)">day(s)</option>
                            <option class="text-dark" value="month(s)">month(s)</option>
                        </select>
                    </div>
                </div>
                <div id="exercisesContainer">
                    <label for="exercise1" class="fs-4">Exercises:</label>
                    <div class="mb-3 exerciseGroup">
                        <div class="d-flex flex-row mb-3 gap-2">
                            <select class="form-select text-dark" name="exercises[]" required>
                                <?php foreach ($exercises as $exercise): ?>
                                    <option class="text-dark"
                                            value="<?= $exercise['title'] ?>"><?= $exercise['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-select text-dark" name="days_of_week[]" required>
                                <option class="text-dark" selected value="Monday">Monday</option>
                                <option class="text-dark" value="Tuesday">Tuesday</option>
                                <option class="text-dark" value="Wednesday">Wednesday</option>
                                <option class="text-dark" value="Thursday">Thursday</option>
                                <option class="text-dark" value="Friday">Friday</option>
                                <option class="text-dark" value="Saturday">Saturday</option>
                                <option class="text-dark" value="Sunday">Sunday</option>
                            </select>
                            <button type="button" class="btn btn-danger remove-exercise">Remove</button>
                        </div>
                    </div>
                </div>
                <button type="button" id="addExerciseBtn" class="btn btn-secondary mb-3">Add Another Exercise</button>


                <input type="hidden" name="privacy" value="<?php
                if ($_SESSION['type'] === 'trainer')
                    echo 'public';
                elseif ($_SESSION['type'] === 'user')
                    echo 'private';
                else
                    echo '';
                ?>">
                <div class="d-grid">
                    <button type="submit" class="btn btn-light">Make</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const ROOT_URL = '<?= ROOT ?>'
</script>
<script src="<?=ROOT?>/assets/scripts/makeWork.js">
</script>


<?php require_once 'footer.php'; ?>
