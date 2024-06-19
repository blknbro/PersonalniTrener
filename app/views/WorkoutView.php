<?php
require_once 'head.php';
require_once 'navbar.php';

?>


    <div class='container text-center mx-auto min-vh-100 p-5 rounded-2 w-100' style=' margin-top: 64px;'
         data-bs-theme="dark">

        <div class='container d-flex flex-column'>

            <h1 class="fs-1 text-dark"><?= $workout[0]['title'] ?></h1>
            <p class="fs-3 text-dark"><?= $workout[0]['description'] ?></p>
            <p class="fs-5 text-dark">
                Duration: <?= $workout[0]['duration_value'] . " " . $workout[0]['duration_unit'] ?></p>
            <h2 class="fs-3 text-dark">Schedule</h2>
            <table class="table table-striped-columns text-center">
                <thead>
                <tr>
                    <th scope="col" >Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                    <th scope="col">Saturday</th>
                    <th scope="col">Sunday</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

                $exercisesByDay = array_fill_keys($daysOfWeek, array());

                foreach ($workout as $plan) {
                    $exercisesByDay[$plan['day_of_week']][] = $plan['e_title'];
                }

                $maxExercises = max(array_map('count', $exercisesByDay));

                for ($i = 0; $i < $maxExercises; $i++) {
                    echo '<tr>';
                    foreach ($daysOfWeek as $day) {
                        if (isset($exercisesByDay[$day][$i])) {
                            echo '<td>' . $exercisesByDay[$day][$i] . '</td>';
                        } else {
                            echo '<td></td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>

            <button class="btn btn-dark" id="showHide">Show more</button>
            <h2 class="text-dark fs-2 mt-5" id="exTitle" style="display: none">This workout consists of</h2>
            <div class="container gap-4 flex-wrap mt-5 justify-content-center " id="exercise"
                 style="display: none">
                <?php
                $exT = [];
                foreach ($workout as $exercise):
                    if (!in_array($exercise['e_title'], $exT)):
                        array_push($exT, $exercise['e_title']);
                        ?>
                        <div class="card train" style="width: 18rem;">
                            <?php if ($exercise['image_url']): ?>
                                <img src="<?= $exercise['image_url'] ?>" style="min-height: 390px; max-height: 390px"
                                     alt="<?= $exercise['e_title'] ?>">
                            <?php endif; ?>
                            <div class="card-body text-center m-auto">
                                <h1 class="fs-1 mt-auto "><?= $exercise['e_title'] ?></h1>
                                <p class="fs-0 mt-auto "><?= $exercise['exercise_desc'] ?></p>
                                <p class="fs-0">Duration is <?= $exercise['exercise_duration'] ?> minute(s)</p>
                                <?php if ($exercise['video_link']): ?>
                                    Want to learn <a href="<?= $exercise['video_link'] ?>"
                                                     target="_blank"
                                                     class="link link-primary"><?= $exercise['e_title'] ?></a>?
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>


    </div>

    <script src="<?= ROOT ?>/assets/scripts/workout.js"></script>


<?php
require_once 'footer.php';