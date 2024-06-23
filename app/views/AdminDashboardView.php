<?php
require_once 'head.php';
require_once 'navbar.php' ?>


    <div class="container d-flex flex-column justify-content-start min-vh-100 mt-5 text-dark">
        <h1 class="my-5 text-center">Admin Dasboard</h1>

        <div class="mb-4 text-center">
            <button class="btn btn-primary me-2" onclick="showSection('categories')">Categories</button>
            <button class="btn btn-primary me-2" onclick="showSection('exercises')">Exercises</button>
            <button class="btn btn-primary" onclick="showSection('users')">Users</button>
        </div>

        <!--Tables-->

        <!--Categories table-->

        <div id="categories" class="hidden">
            <h2 class="text-dark mb-3">Workout Categories</h2>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add New
                Category
            </button>
            <div class="table-responsive">
                <table id="categoryTable" class="table table-striped table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>


        <!--Exercises table-->

        <div id="exercises" class="hidden">
            <h2 class="text-dark mb-3">Exercises</h2>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addExerciseModal">Add New
                Exercise
            </button>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Exercise Name</th>
                        <th>Duration (minutes)</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="exerciseTableBody">
                    </tbody>
                </table>
            </div>
        </div>


        <!--Users table-->

        <div id="users" class="hidden">
            <h2 class="text-dark mb-3">Registered Users</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Name Surname</th>
                        <th>Email</th>
                        <th>Account type</th>
                        <th>Permission granted</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="text-center">
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] . " " . $user['surname'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['type'] ?></td>
                            <td><?= $user['permission'] ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                    <?php if ($user['type'] === 'trainer' && $user['permission'] === 'none'): ?>
                                        <button class="btn btn-secondary btn-sm" type="submit" name="approve"
                                                value="yes">
                                            Approve
                                        </button>
                                    <?php elseif ($user['type'] === 'trainer' && $user['permission'] === 'blocked'): ?>
                                        <button class="btn btn-secondary btn-sm" type="submit" name="approve"
                                                value="yes">
                                            Re-approve
                                        </button>
                                    <?php endif; ?>
                                    <?php if ($user['permission'] === 'none' || $user['permission'] === 'approved'): ?>
                                        <button class="btn btn-secondary btn-sm" type="submit" name="block" value="yes">
                                            Block
                                        </button>
                                    <?php elseif ($user['permission'] === 'blocked'): ?>
                                        <button class="btn btn-success btn-sm" type="submit" name="none" value="yes">
                                            Unblock
                                        </button>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--Modals-->

    <!-- Add Category Modal -->
    <div class="modal fade" data-bs-theme="dark" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="addCategoryForm">
                        <div class="mb-2 text-light form-floating">
                            <input type="text" name="categoryName" id="categoryName" class="form-control"
                                   placeholder="categoryName"
                                   style="outline: none">
                            <label for="categoryName" class="form-label text-light">New Category Name</label>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" id="saveCategoryButton">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Exercise Modal -->

    <div class="modal fade" data-bs-theme="dark" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExerciseLabel">Add New Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addExerciseForm" action="" method="post">
                        <div class="mb-2 text-light form-floating">
                            <input type="text" name="exerciseTitle" id="exerciseTitle" class="form-control"
                                   placeholder="categoryName"
                                   style="outline: none">
                            <label for="exerciseTitle" class="form-label text-light">New Exercise title</label>
                        </div>
                        <div class="mb-2 text-light form-floating">
                            <input type="text" name="exerciseDesc" id="exerciseDesc" class="form-control"
                                   placeholder="categoryName"
                                   style="outline: none">
                            <label for="exerciseDesc" class="form-label text-light">New Exercise description</label>
                        </div>
                        <div class="mb-2 text-light form-floating">
                            <input type="number" name="exerciseDuration" id="exerciseDuration" class="form-control"
                                   placeholder="categoryName"
                                   style="outline: none">
                            <label for="exerciseDuration" class="form-label text-light">New Exercise duration</label>
                        </div>
                        <div class="mb-2 text-light form-floating">
                            <input type="text" name="photo_url" id="photo_url" class="form-control"
                                   placeholder="categoryName"
                                   style="outline: none">
                            <label for="photo_url" class="form-label text-light">New Exercise photo link</label>
                        </div>
                        <div class="mb-2 text-light form-floating">
                            <input type="text" name="video_url" id="video_url" class="form-control"
                                   placeholder="categoryName"
                                   style="outline: none">
                            <label for="video_url" class="form-label text-light">New Exercise video tutorial
                                link</label>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" name="addExercise" id="saveExerciseButton" class="btn btn-primary">
                                Save
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const ROOT_URL = '<?= ROOT ?>'
    </script>
    <script src="<?= ROOT ?>/assets/scripts/admin.js"></script>


<?php require_once 'footer.php';
