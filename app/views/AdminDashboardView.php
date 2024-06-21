<?php
require_once 'head.php';
require_once 'navbar.php' ?>


    <div class="container d-flex flex-column justify-content-start min-vh-100 mt-5 text-dark">
        <h1 class="my-5 text-center">Admin Dasboard</h1>

        <div class="mb-4 text-center">
            <button class="btn btn-primary" onclick="showSection('categories')">Categories</button>
            <button class="btn btn-primary" onclick="showSection('exercises')">Exercises</button>
            <button class="btn btn-primary" onclick="showSection('users')">Users</button>
        </div>

        <div id="categories" class="hidden">
            <h2>Workout Categories</h2>
            <button class="btn btn-primary mb-3" onclick="openAddCategoryModal()">Add New Category</button>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['category_id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td class="">
                            <button class="btn btn-warning btn-sm"
                                    onclick="openEditCategoryModal(<?= $category['category_id'] ?>, <?= $category['name'] ?>)">
                                Edit
                            </button>
                            <form method="post" class="remove">
                                <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
                                <button class="btn btn-danger btn-sm" type="submit" name="remove" value="true"">Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div id="exercises" class="hidden">
            <h2>Exercises</h2>
            <button class="btn btn-primary mb-3" onclick="addExercise()">Add New Exercise</button>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Exercise Name</th>
                    <th>Duration (minutes)</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($exercises as $exercise): ?>
                    <tr>
                        <td><?= $exercise['exercise_id'] ?></td>
                        <td><?= $exercise['title'] ?></td>
                        <td><?= $exercise['duration'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div id="users" class="hidden">
            <h2>Registered Users</h2>
            <table class="table table-striped">
                <thead>
                <tr>
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
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] . " " . $user['surname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['type'] ?></td>
                        <td><?= $user['permission']?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="userId" value="<?=$user['id']?>">
                                <?php if ($user['type'] === 'trainer' && $user['permission'] === 'none'): ?>
                                    <button class="btn btn-secondary btn-sm" type="submit" name="approve" value="yes">Approve</button>
                                <?php elseif ($user['type'] === 'trainer' && $user['permission'] === 'blocked'): ?>
                                    <button class="btn btn-secondary btn-sm" type="submit" name="approve" value="yes">Re-approve</button>
                                <?php endif; ?>
                                <?php if ($user['permission'] === 'none' || $user['permission'] === 'approved'): ?>
                                    <button class="btn btn-secondary btn-sm" type="submit" name="block" value="yes">Block</button>
                                <?php elseif ($user['permission'] === 'blocked'): ?>
                                    <button class="btn btn-success btn-sm" type="submit" name="none" value="yes">Unblock</button>
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

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
                    <form id="addCategoryForm">
                        <div class="mb-3">
                            <label for="newCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="newCategoryName">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewCategory()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName">
                        </div>
                        <input type="hidden" id="categoryId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveCategory()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExerciseLabel">Add New Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addExerciseForm">
                        <div class="mb-3">
                            <label for="newExerciseName" class="form-label">Exercise Name</label>
                            <input type="text" class="form-control" id="newExerciseName">
                        </div>
                        <div class="mb-3">
                            <label for="newExerciseCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="newExerciseCategory">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewExercise()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Exercise Modal -->
    <div class="modal fade" id="editExerciseModal" tabindex="-1" aria-labelledby="editExerciseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExerciseLabel">Edit Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editExerciseForm">
                        <div class="mb-3">
                            <label for="exerciseName" class="form-label">Exercise Name</label>
                            <input type="text" class="form-control" id="exerciseName">
                        </div>
                        <div class="mb-3">
                            <label for="exerciseCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="exerciseCategory">
                        </div>
                        <input type="hidden" id="exerciseId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveExercise()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/scripts/admin.js">

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once 'footer.php';
