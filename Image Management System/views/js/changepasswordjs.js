document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const currentPasswordInput = document.getElementById("cpass");
    const newPasswordInput = document.getElementById("npass");
    const retypePasswordInput = document.getElementById("rpass");

    form.addEventListener("submit", function(event) {
        let valid = true;

        // Clear previous error messages
        clearErrors();

        // Validate current password
        if (currentPasswordInput.value.trim() === "") {
            displayError(currentPasswordInput, "Current password cannot be empty.");
            valid = false;
        }

        // Validate new password
        if (newPasswordInput.value.trim() === "") {
            displayError(newPasswordInput, "New password cannot be empty.");
            valid = false;
        } else if (!isStrongPassword(newPasswordInput.value)) {
            displayError(newPasswordInput, "Password must be at least 8 characters long, and include at least one number and one special character.");
            valid = false;
        }

        // Validate retyped password
        if (newPasswordInput.value !== retypePasswordInput.value) {
            displayError(retypePasswordInput, "Passwords do not match.");
            valid = false;
        }

        // Prevent form submission if not valid
        if (!valid) {
            event.preventDefault();
        }
    });

    function isStrongPassword(password) {
        // Password strength: Minimum 8 characters, at least one letter, one number, and one special character
        const re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return re.test(password);
    }

    function displayError(input, message) {
        const error = document.createElement("p");
        error.classList.add("error");
        error.textContent = message;
        input.parentElement.appendChild(error);
    }

    function clearErrors() {
        const errors = document.querySelectorAll(".error");
        errors.forEach(error => error.remove());
    }
});
