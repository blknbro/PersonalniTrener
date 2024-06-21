function showSection(section) {
    document.getElementById('categories').classList.add('hidden');
    document.getElementById('exercises').classList.add('hidden');
    document.getElementById('users').classList.add('hidden');

    document.getElementById(section).classList.remove('hidden');
}

