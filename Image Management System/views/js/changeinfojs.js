document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const fullNameInput = document.getElementById("fname");
    const contactNumberInput = document.getElementById("cnum");
    const genderMaleInput = document.getElementById("rmale");
    const genderFemaleInput = document.getElementById("rfemale");

    form.addEventListener("submit", function(event) {
        let valid = true;

        // Clear previous error messages
        clearErrors();

        // Validate full name
        if (fullNameInput.value.trim() === "") {
            displayError("rerr1", "Full name cannot be empty.");
            valid = false;
        }

        // Validate contact number
        if (!validateContactNumber(contactNumberInput.value)) {
            displayError("rerr2", "Please enter a valid contact number (only digits, minimum 10 digits).");
            valid = false;
        }

        // Validate gender selection
        if (!genderMaleInput.checked && !genderFemaleInput.checked) {
            displayError("rerr4", "Please select your gender.");
            valid = false;
        }

        // Prevent form submission if not valid
        if (!valid) {
            event.preventDefault();
        }
    });

    function validateContactNumber(contact) {
        // Ensure the contact number contains only digits and is at least 10 digits long
        const re = /^[0-9]{10,}$/;
        return re.test(contact);
    }

    function displayError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        errorElement.textContent = message;
        errorElement.classList.add("error");
    }

    function clearErrors() {
        document.querySelectorAll(".error").forEach(error => {
            error.textContent = "";
        });
    }
});
