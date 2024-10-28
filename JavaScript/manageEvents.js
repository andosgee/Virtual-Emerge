document.getElementById('add-student-button').addEventListener('click', function() {
    const studentDetails = document.querySelector('.details');
    const newStudent = document.createElement('div');
    newStudent.classList.add('student-details');
    newStudent.innerHTML = `
        <h2>Students Details</h2>
        <div class="form-group">
            <label for="first-name">First Name:</label>
            <input type="text" name="first-name" required>
        </div>
        <div class="form-group">
            <label for="last-name">Last Name:</label>
            <input type="text" name="last-name" required>
        </div>
        <div class="form-group">
            <label for="headshot">Headshot:</label>
            <input type="file" name="headshot" accept="image/*">
        </div>
        <div class="form-group">
            <label for="image-preview">Image Preview:</label>
            <img src="#" alt="Image Preview" style="display: none; max-width: 100px; max-height: 100px;">
        </div>
        <div class="form-group">
            <label for="short-paper">Short Paper (PDF):</label>
            <input type="file" name="short-paper" accept="application/pdf">
        </div>
        <div class="form-group">
            <label for="poster">Poster (PDF):</label>
            <input type="file" name="poster" accept="application/pdf">
        </div>
    `;
    studentDetails.insertBefore(newStudent, document.getElementById('add-student-button').parentNode);
});

document.addEventListener('change', function(event) {
    if (event.target.name === 'headshot') {
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
    if (studentDetails.length > 1) {
        studentDetails[studentDetails.length - 1].remove();
    }
});
const updateRemoveButtonVisibility = () => {
    const studentDetails = document.querySelectorAll('.student-details');
    if (studentDetails.length > 1) {
        document.getElementById('remove-student-button').style.display = 'block';
    } else {
        document.getElementById('remove-student-button').style.display = 'none';
    }
};

// Initial check on page load
updateRemoveButtonVisibility();

// Update visibility whenever a student is added or removed
document.getElementById('add-student-button').addEventListener('click', updateRemoveButtonVisibility);
document.getElementById('remove-student-button').addEventListener('click', updateRemoveButtonVisibility);
