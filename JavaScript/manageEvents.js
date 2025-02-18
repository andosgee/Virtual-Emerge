document.getElementById('add-student-button').addEventListener('click', function() {
    const studentContainer = document.getElementById('student-container');
    const studentCount = document.querySelectorAll('.student-details').length; // Count existing student forms

    const newStudent = document.createElement('div');
    newStudent.classList.add('student-details');
    newStudent.innerHTML = `
        <h3>Student ${studentCount + 1} Details</h3>
        <div class="form-group">
            <label for="first-name-${studentCount}">First Name:</label>
            <input type="text" name="first-name[]" id="first-name-${studentCount}" required>
        </div>
        <div class="form-group">
            <label for="last-name-${studentCount}">Last Name:</label>
            <input type="text" name="last-name[]" id="last-name-${studentCount}" required>
        </div>
        <div class="form-group">
            <label for="pathway-${studentCount}">Pathway:</label>
            <input type="text" name="pathway[]" id="pathway-${studentCount}" required>
        </div>
        <div class="form-group">
            <label for="project-name-${studentCount}">Project Name:</label>
            <input type="text" name="project-name[]" id="project-name-${studentCount}" required>
        </div>
        <div class="form-group">
            <label for="headshot-${studentCount}">Headshot:</label>
            <input type="file" name="headshot[]" id="headshot-${studentCount}" accept="image/*">
        </div>
        <div class="form-group">
            <label for="image-preview-${studentCount}">Image Preview:</label>
            <img src="#" alt="Image Preview" style="display: none; max-width: 100px; max-height: 100px;">
        </div>
        <div class="form-group">
            <label for="short-paper-${studentCount}">Short Paper (PDF):</label>
            <input type="file" name="short-paper[]" id="short-paper-${studentCount}" accept="application/pdf">
        </div>
        <div class="form-group">
            <label for="poster-${studentCount}">Poster (PDF):</label>
            <input type="file" name="poster[]" id="poster-${studentCount}" accept="application/pdf">
        </div>
    `;
    studentContainer.appendChild(newStudent);
    updateRemoveButtonVisibility();
});

document.addEventListener('change', function(event) {
    if (event.target.name === 'headshot[]') {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = event.target.closest('.student-details').querySelector('img');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
});

document.getElementById('remove-student-button').addEventListener('click', function() {
    const studentDetails = document.querySelectorAll('.student-details');
    if (studentDetails.length > 0) {
        studentDetails[studentDetails.length - 1].remove();
        updateRemoveButtonVisibility();
    }
});

const updateRemoveButtonVisibility = () => {
    const studentDetails = document.querySelectorAll('.student-details');
    const removeButton = document.getElementById('remove-student-button');
    removeButton.style.display = studentDetails.length > 0 ? 'inline-block' : 'none';
};

// Initial visibility check on page load
updateRemoveButtonVisibility();
