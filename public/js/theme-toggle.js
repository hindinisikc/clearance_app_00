// filepath: c:\Users\OJT\SoftDev\clearance_requests\public\js\theme-toggle.js

document.addEventListener("DOMContentLoaded", function () {
    const themeToggleBtn = document.getElementById("theme-toggle-btn");
    const themeIcon = document.getElementById("theme-icon");
    const body = document.body;

    // Check for saved theme in localStorage
    const savedTheme = localStorage.getItem("theme") || "dark";
    body.setAttribute("data-theme", savedTheme);
    themeIcon.className = savedTheme === "dark" ? "bi bi-moon-fill" : "bi bi-sun-fill";

    // Toggle theme on button click
    themeToggleBtn.addEventListener("click", function () {
        const currentTheme = body.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        body.setAttribute("data-theme", newTheme);
        themeIcon.className = newTheme === "dark" ? "bi bi-moon-fill" : "bi bi-sun-fill";

        // Save theme to localStorage
        localStorage.setItem("theme", newTheme);
    });
});
