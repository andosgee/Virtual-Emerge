document.addEventListener('DOMContentLoaded', () => {
    const createUserButton = document.querySelector('.create-user-button');
    const editUserButtons = document.querySelectorAll('.edit-user-button');
    const deleteUserButtons = document.querySelectorAll('.delete-user-button');
    const userForm = document.querySelector('.user-form form');
    const resetPasswordButton = document.querySelector('.reset-password-button');
    const cancelButton = document.querySelector('.cancel-button');

    createUserButton.addEventListener('click', () => {
        userForm.reset();
        userForm.querySelector('.save-button').textContent = 'Create';
        userForm.querySelector('.reset-password-button').style.display = 'none';
        userForm.style.display = 'block';
    });

    editUserButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const userItem = event.target.closest('li');
            const userName = userItem.querySelector('span').textContent;
            // Populate form with user data (this is just an example, you would fetch real data)
            userForm.querySelector('#first-name').value = 'John';
            userForm.querySelector('#last-name').value = 'Doe';
            userForm.querySelector('#email').value = 'john.doe@example.com';
            userForm.querySelector('#organization').value = 'Example Org';
            userForm.querySelector('.save-button').textContent = 'Save';
            userForm.querySelector('.reset-password-button').style.display = 'inline-block';
            userForm.style.display = 'block';
        });
    });

    deleteUserButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            if (confirm('Are you sure you want to delete this user?')) {
                const userItem = event.target.closest('li');
                userItem.remove();
            }
        });
    });

    resetPasswordButton.addEventListener('click', () => {
        alert('Password reset functionality not implemented.');
    });

    cancelButton.addEventListener('click', () => {
        userForm.style.display = 'none';
    });

    userForm.addEventListener('submit', (event) => {
        event.preventDefault();
        // Handle form submission (create or save user)
        alert('User saved/created.');
        userForm.style.display = 'none';
    });
});