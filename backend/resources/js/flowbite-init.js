// Initialisation des composants Flowbite
import { initFlowbite } from "flowbite";

// Initialiser Flowbite au chargement du document
document.addEventListener("DOMContentLoaded", () => {
    initFlowbite();

    // Ré-initialiser les composants après les mises à jour AJAX si nécessaire
    document.addEventListener("flowbite:init", () => {
        initFlowbite();
    });
});

// Exportation pour utilisation dans app.js
export default initFlowbite;
