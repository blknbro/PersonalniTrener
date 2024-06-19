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

            // Adds initial exercise group
            addExerciseGroup(exercisesOptionsHTML);

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
            event.target.parentElement.parentElement.remove();
        }
    });
});


