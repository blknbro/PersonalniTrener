<?php
require_once 'head.php';
require_once 'navbar.php' ?>

<div class="container text-center min-vh-100 mx-auto p-5 bg-dark rounded-2 w-100" style="margin-top: 64px;">
        <div class="d-flex flex-column flex-md-row">
            <div class="d-flex flex-column gap-4 flex-grow-1">
                <h2 class="fs-1">Make your own workout plan</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label fs-4">Workout title:</label>
                        <input type="text" name="title" class="form-control" id="title" value="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fs-4">Description:</label>
                        <textarea name="description" id="description" class="form-control" style="min-height: 200px; resize: none;"></textarea>
                    </div>
                    <div class="mb-3">
                        <p class="fs-4">Duration:</p>
                        <div class="d-flex flex-row mb-3 gap-2">
                            <select class="form-select" name="duration_value" >
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <select class="form-select" name="duration_unit" >
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>


                    <div class="d-grid">
                        <button type="submit" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
            <div class="ms-md-5">
                <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class="img-fluid img-thumbnail" alt="JENNA" style="max-height: 600px;">
            </div>
        </div>
</div>


<?php require_once 'footer.php'; ?>
