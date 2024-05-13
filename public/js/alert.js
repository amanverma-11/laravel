// Get the alert element
var alertElement = document.getElementById("successAlert");

// Function to hide the alert after 5 seconds
function hideAlert() {
    alertElement.style.display = "none";
}

// Set a timeout to hide the alert after 5 seconds
setTimeout(hideAlert, 3000);
