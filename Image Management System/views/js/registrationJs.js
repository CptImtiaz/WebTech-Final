function isRegistrationValid(pForm) {
    const userEmail = pForm.email.value;
    const userPass = pForm.password.value;
    const rpass = pForm.rpass.value;
    const fname = pForm.fname.value;
    const cnum = pForm.cnum.value;
    const rGender = pForm.gender.value;

    let e1 = document.getElementById("rerr1");
    let e2 = document.getElementById("rerr2");
    let e3 = document.getElementById("rerr3");
    let e4 = document.getElementById("rerr4");
    let e5 = document.getElementById("rerr5");
    let e6 = document.getElementById("rerr6");
    let e7 = document.getElementById("rerr7");

    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";
    e6.innerHTML = "";
    e7.innerHTML = "";

    let flag = true;

    // Check for empty fields
    if (fname === "") {
        e1.innerHTML = "Please provide full name";
        flag = false;
    }
    if (cnum === "") {
        e2.innerHTML = "Please provide contact number";
        flag = false;
    }
    if (rGender === "") {
        e4.innerHTML = "Please provide gender";
        flag = false;
    }
    if (userEmail === "") {
        e3.innerHTML = "Please provide email";
        flag = false;
    }
    if (userPass === "") {
        e5.innerHTML = "Please provide password";
        flag = false;
    }
    if (rpass === "") {
        e6.innerHTML = "Please confirm password";
        flag = false;
    }
    if (userPass !== rpass) {
        e7.innerHTML = "Passwords do not match!";
        flag = false;
    }

    // If form is valid so far, proceed with email validation using AJAX
    if (flag) {
        // Create an AJAX request to validate the email
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../controllers/validate-email.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Assuming the server responds with "valid" or "invalid"
                if (xhr.responseText === "invalid") {
                    e3.innerHTML = "This email is already registered";
                    flag = false;
                }
                // You can proceed if the email is valid
                if (flag) {
                    // Optionally submit the form here if you are handling submission via JS
                    pForm.submit();
                }
            }
        };

        // Send the email to the server for validation
        xhr.send("email=" + encodeURIComponent(userEmail));

        // Prevent form submission until AJAX request completes
        return false;
    }

    return flag;
}
