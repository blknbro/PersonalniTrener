<?php


require_once 'head.php';

require_once 'navbar.php'; ?>

    <div class="container-fluid container-md d-flex min-vh-100 justify-content-center align-items-center">
        <form action="" method="post" class="w-100 p-5 bg-dark rounded-4 shadow-lg" style="max-width: 624px">
            <?php if (!empty($err)): ?>
                <div class="alert alert-danger">
                    <?=
                    implode("<br>", $err)

                    ?>
                </div>
            <?php endif; ?>
            <h1 class="mb-4 text-center">Change Exercise details</h1>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="exerciseTitle" id="exerciseTitle" class="form-control" placeholder="eTitle"
                       value="<?=$exercise['title']?>">
                <label for="exerciseTitle" class="form-label text-dark">Exercise Title</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="exerciseDesc" id="exerciseDesc" class="form-control" placeholder="eDesc"
                       value="<?=$exercise['description']?>">
                <label for="exerciseDesc" class="form-label text-dark">Exercise Description</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="number" name="categoryDuration" id="categoryDuration" class="form-control" placeholder="duration"
                       value="<?=$exercise['duration']?>" min="1" max="52">
                <label for="categoryDuration" class="form-label text-dark">Exercise Duration</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="pictureLink" id="pictureLink" class="form-control" placeholder="cName"
                       value="<?=$exercise['image_url']?>">
                <label for="pictureLink" class="form-label text-dark">Picture link</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="videoLink" id="videoLink" class="form-control" placeholder="cName"
                       value="<?=$exercise['video_url']?>">
                <label for="videoLink" class="form-label text-dark">Video link (optional)</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-light">Make changes</button>
            </div>
        </form>
    </div>


<?php require_once 'footer.php';
