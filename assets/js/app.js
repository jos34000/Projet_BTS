function toggleDarkMode() {
    const body = document.body;
    const modeToggle = document.getElementById("mode-toggle");
    const modeIndicator = document.getElementById("mode-indicator");

    if (body.classList.contains("dark-mode")) {
        body.classList.remove("dark-mode");
        modeToggle.classList.remove("dark-mode");
        modeIndicator.textContent = "Mode clair";
    } else {
        body.classList.add("dark-mode");
        modeToggle.classList.add("dark-mode");
        modeIndicator.textContent = "Mode sombre";
    }
}
