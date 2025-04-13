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
