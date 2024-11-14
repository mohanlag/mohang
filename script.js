function validateForm() {
    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const subject = document.getElementById("subject").value;
    const message = document.getElementById("message").value;

    // Basic validation
    if (name === "" || email === "" || subject === "" || message === "") {
        alert("All fields are required. Please fill in all the details.");
        return false; // Prevent form submission
    }

    // Email format validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false; // Prevent form submission
    }

    // Confirmation message
    alert("Thank you, " + name + "! Your message has been submitted successfully.");
    return true; // Allow form submission
}

function submit_form(){
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevents the default form submission
    
        const formData = new FormData(this);
    
        fetch("submit_form.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Form submitted successfully:", data);
        })
        .catch(error => {
            console.error("Error submitting form:", error);
        });
    });
}
