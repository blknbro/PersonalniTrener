document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const filterButtons = document.getElementById('filterButtons');
    const workoutContainer = document.getElementById('workoutContainer');
    const resetFiltersButton = document.getElementById('resetFilters');

    let selectedCategory = '';

    const fetchWorkouts = async (query = '', category = '') => {
        try {
            const response = await fetch(`${ROOT_URL}/api/publicWorkouts?query=${query}&category=${category}`);
            const workouts = await response.json();
            renderWorkouts(workouts);
        } catch (error) {
            console.error('Error fetching workouts:', error);
        }
    };

    //Renders workout cards
    const renderWorkouts = (workouts) => {
        workoutContainer.innerHTML = '';
        workouts.forEach(workout => {
            const workoutCard = `
                <div class="card train train-hover shadow" style="width: 18rem; text-decoration: none;">
                    <a href="${ROOT_URL}/trainings/workout?id=${workout.workout_id}">
                        <img
                            src="https://images.unsplash.com/photo-1470468969717-61d5d54fd036?q=80&w=1944&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top train-img" alt="text">
                        <div class="card-body">
                            <h2 class="text-center text-dark">${workout.title}</h2>
                            <p class="text-dark">${workout.description.split('.')[0]}.</p>
                            <div class="d-flex flex-wrap gap-1 ">
                                <p class="badge rounded-pill text-bg-warning fs-6">${workout.category_name}</p>
                            </div>
                            <div class="d-flex gap-1 justify-content-end align-items-center my-auto">
                                <i class="bi bi-alarm-fill text-dark"></i>
                                <div class="d-flex gap-2">
                                    <span class="text-dark fw-bold">Duration</span>
                                    <span class="text-dark">${workout.duration_value} ${workout.duration_unit}</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-end">
                                <span class="text-dark">Made by</span>
                                <a href="${ROOT_URL}/home/profile?id=${workout.email}" class="link-secondary">${workout.name} ${workout.surname}</a>
                            </div>
                        </div>
                    </a>
                </div>
            `;
            workoutContainer.insertAdjacentHTML('beforeend', workoutCard);// Inserts card into container
        });
    };

    // Fetches all workouts based on search input changes
    searchInput.addEventListener('input', () => {
        const query = searchInput.value;
        fetchWorkouts(query);
    });


    // Fetches workouts based on selected filter
    filterButtons.addEventListener('click', (event) => {
        if (event.target.classList.contains('filter')) {
            selectedCategory = event.target.dataset.category;
            fetchWorkouts(searchInput.value, selectedCategory);
        }
    });


    // Resets filter buttons
    resetFiltersButton.addEventListener('click', () => {
        selectedCategory = '';
        fetchWorkouts(searchInput.value);
    });

    // Fetches all workouts on initial load
    fetchWorkouts();
});