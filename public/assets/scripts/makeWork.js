
document.getElementById('workoutForm').addEventListener('submit', function(event) {
    const title = document.getElementById('title').value.trim();
    const description = document.getElementById('description').value.trim();
    const durationValue = document.getElementById('duration_value').value;
    const durationUnit = document.getElementById('unit').value;
    let errorMessage = '';

    if (!title) {
        errorMessage += 'Title is required.<br>';
    }

    if (!description) {
        errorMessage += 'Description is required.<br>';
    }

    if (!durationValue || isNaN(durationValue) || durationValue < 1 || durationValue > 50) {
        errorMessage += 'Duration value must be a number between 1 and 50.<br>';
    }

    if (durationUnit === 'none') {
        errorMessage += 'Duration unit must be selected.<br>';
    }

    if (errorMessage) {
        event.preventDefault();
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';
        alertDiv.innerHTML = errorMessage;

        const form = document.getElementById('workoutForm');
        const existingAlert = form.querySelector('.alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        form.insertBefore(alertDiv, form.firstChild);
    }
});




document.addEventListener('DOMContentLoaded', function() {
    const exercisesContainer = document.getElementById('exercisesContainer');
    const addExerciseBtn = document.getElementById('addExerciseBtn');

    // Fetches exercises from API
    fetch(`${ROOT_URL}/api/exercises`)
        .then(response => response.json())
        .then(data => {
            const exercisesOptionsHTML = data.exercises.map(exercise =>
                `<option class="text-dark" value="${exercise.title}">${exercise.title}</option>`
            ).join('');


            // Adds exercise group on button click
            addExerciseBtn.addEventListener('click', function () {
                addExerciseGroup(exercisesOptionsHTML);
            });
        })
        .catch(error => console.error('Error fetching exercises:', error));

    function addExerciseGroup(exercisesOptionsHTML) {
        const newExerciseGroup = document.createElement('div');
        newExerciseGroup.classList.add('mb-3', 'exercise-group');
        newExerciseGroup.innerHTML = `
            <div class="d-flex flex-row mb-3 gap-2">
                <select class="form-select text-dark" name="exercises[]" required>
                    ${exercisesOptionsHTML}
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
        `;
        exercisesContainer.appendChild(newExerciseGroup);
    }

    exercisesContainer.addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('remove-exercise')) {
            event.target.closest('.exercise-group').remove();
        }
    });
});

