<?php
require_once 'head.php';
require_once 'navbar.php' ?>
    <div class="container d-flex flex-column justify-content-start min-vh-100 mt-5" style="padding-top: 64px">

            <h1 class="text-center text-dark">Your Workout plans</h1>
        <div class="container d-flex gap-4 flex-wrap mt-5 justify-content-start ">
            <?php if (!empty($workouts)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th></th>
                        <th></th>
                        <th>Title</th>
                        <th>Workout category</th>
                        <th>Duration</th>
                        <th>Description</th>
                        <th>Owner</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($workouts

                    as $workout): ?>

                    <tr class="text-center">
                        <td><a href="<?= ROOT ?>/trainings/workout?id=<?= $workout['workout_id'] ?>"
                               class="btn btn-info btn-sm text-light">Visit</a></td>
                        <td><a href="<?= ROOT ?>/trainings/edit?id=<?= $workout['workout_id'] ?>"
                               class="btn btn-success btn-sm text-light">Edit</a></td>
                        <td><?= $workout['title'] ?></td>
                        <td><?= $workout['category_name'] ?></td>
                        <td><?= $workout['duration_value'] . " " . $workout['duration_unit'] ?></td>
                        <td><?= $workout['description'] ?></td>
                        <td>You</td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="workout_id" value="<?= $workout['workout_id'] ?>">
                                <button class="btn btn-danger btn-sm" type="submit" name="remove" value="true">Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php else: ?>
                <p style="font-size: 46px; color: black; margin-top: 80px; text-align: center">Seems like u haven't made any workout plan.</p>
            <?php endif; ?>
        </div>
    </div>

<?php require_once 'footer.php';
