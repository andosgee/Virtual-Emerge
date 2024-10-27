document.addEventListener("DOMContentLoaded", function() {
    // Sample data
    const sampleData = {
        firstName: "John",
        lastName: "Doe",
        email: "john.doe@example.com",
        organization: "Ara Institute of Canterbury"
    };

    // Populate the form fields with sample data
    document.getElementById("first-name").value = sampleData.firstName;
    document.getElementById("last-name").value = sampleData.lastName;
    document.getElementById("email").value = sampleData.email;
    document.getElementById("organization").value = sampleData.organization;
});