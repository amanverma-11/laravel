document.addEventListener("DOMContentLoaded", function () {
    const dropdownBtn = document.querySelector("#drop-down-btn");
    const dropdownMenu = document.querySelector("#drop-down-menu");

    dropdownBtn.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent button click from triggering document click event
        dropdownMenu.classList.toggle("hidden");
    });

    // Close dropdown when clicking outside of it
    document.addEventListener("click", function (event) {
        if (!dropdownBtn.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
