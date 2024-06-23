function showSection(section) {
    document.getElementById('categories').classList.add('hidden');
    document.getElementById('exercises').classList.add('hidden');
    document.getElementById('users').classList.add('hidden');

    document.getElementById(section).classList.remove('hidden');
}

function fetchCategories() {
    fetch(`${ROOT_URL}/api/categories`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            const tableBody = document.querySelector('#categoryTable tbody');
            tableBody.innerHTML = '';

            data.category.forEach(category => {
                const row = `
                    <tr>
                        <td>${category.category_id}</td>
                        <td>${category.name}</td>
                        <td>
                            <a href="${ROOT_URL}/edit/category?id=${category.category_id}" class="btn btn-warning btn-sm edit-category">
                                Edit
                            </a>
                            <form method="post" class="remove">
                                <input type="hidden" name="category_id" value="${category.category_id}">
                                <button class="btn btn-danger btn-sm" type="submit" name="removeCategory" value="true">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => {
            console.error('Error fetching categories:', error);
        });
}

fetchCategories();


function fetchExercises() {
    fetch(`${ROOT_URL}/api/exercises`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            const exerciseTableBody = document.getElementById('exerciseTableBody');
            exerciseTableBody.innerHTML = '';

            data.exercises.forEach(exercise => {
                const row = `
                    <tr>
                        <td>${exercise.exercise_id}</td>
                        <td>${exercise.title}</td>
                        <td>${exercise.duration}</td>
                        <td>
                            <a href="${ROOT_URL}/edit/exercise?id=${exercise.exercise_id}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form method="post" class="remove">
                                <input type="hidden" name="exercise_id" value="${exercise.exercise_id}">
                                <button class="btn btn-danger btn-sm" type="submit" name="removeExercise" value="true">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
                exerciseTableBody.innerHTML += row;
            });
        })
        .catch(error => {
            console.error('Error fetching exercises:', error);
        });
}

fetchExercises();





document.getElementById('saveCategoryButton').addEventListener('click', function () {
    const form = document.getElementById('addCategoryForm');
    const formData = new FormData(form);
    const title = formData.get('categoryName');

    if (!title) {
        alert('Category name cannot be empty.');
        return;
    }

    fetch(`${ROOT_URL}/api/addCategory`, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                form.reset();
                const modalElement = document.getElementById('addCategoryModal');
                const modal = bootstrap.Modal.getInstance(modalElement);
                if (modal) {
                    modal.hide();
                    const modalBackdrop = document.querySelector('.modal-backdrop');
                    if (modalBackdrop) {
                        modalBackdrop.remove();
                    }
                } else {

                    const modalInstance = new bootstrap.Modal(modalElement);
                    modalInstance.hide();
                    const modalBackdrop = document.querySelector('.modal-backdrop');
                    if (modalBackdrop) {
                        modalBackdrop.remove();
                    }
                }
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
});

document.getElementById('saveExerciseButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    const form = document.getElementById('addExerciseForm');
    const formData = new FormData(form);


    const exerciseTitle = formData.get('exerciseTitle');
    const exerciseDesc = formData.get('exerciseDesc');
    const duration = formData.get('exerciseDuration');
    const exercisePic = formData.get('photo_url');

    if (!exerciseTitle) {
        alert('Exercise title cannot be empty.');
        return;
    }

    if (!exerciseDesc) {
        alert('Exercise description cannot be empty.');
        return;
    }

    if (!duration || isNaN(duration)) {
        alert('Exercise duration must be a number.');
        return;
    }

    if (!exercisePic) {
        alert('Exercise picture link cannot be empty.');
        return;
    }

    fetch(`${ROOT_URL}/api/addExercise`, {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                form.reset();
                const modalElement = document.getElementById('addExerciseModal');
                const modal = bootstrap.Modal.getInstance(modalElement);
                if (modal) {
                    modal.hide();
                    const modalBackdrop = document.querySelector('.modal-backdrop');
                    if (modalBackdrop) {
                        modalBackdrop.remove();
                    }
                } else {
                    const modalInstance = new bootstrap.Modal(modalElement);
                    modalInstance.hide();
                    const modalBackdrop = document.querySelector('.modal-backdrop');
                    if (modalBackdrop) {
                        modalBackdrop.remove();
                    }
                }
                location.reload();
            } else {
                alert('Failed to add exercise. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error adding exercise:', error);
            alert('An error occurred. Please try again.');
        });
});


