const passwordField = document.getElementById("password");
const eye = document.querySelector(".fa-eye");
const eyeoff = document.querySelector(".fa-eye-slash");

eye.style.display = "block";
eyeoff.style.display = "none";

eye.addEventListener("click", () => {
    eye.style.display = "none";
    eyeoff.style.display = "block";
    passwordField.type = "text";
});

eyeoff.addEventListener("click", () => {
    eyeoff.style.display = "none";
    eye.style.display = "block";
    passwordField.type = "password";
});

// messages sessions
const messages = document.querySelectorAll("#session-messages > div");
messages.forEach((message) => {
    const progressBar = message.querySelector(".progress-bar");
    let width = 100;
    const interval = setInterval(() => {
        width -= 1;
        progressBar.style.width = width + "%";
        if (width <= 0) {
            clearInterval(interval);
            message.style.transition = "opacity 0.5s";
            message.style.opacity = "0";
            setTimeout(() => message.remove(), 500);
        }
    }, 50);
});
