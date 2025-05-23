import Pusher from "pusher-js";

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    // Suppression des paramètres locaux qui causent l'erreur
    // wsHost: window.location.hostname,
    // wsPort: 6001,
    disableStats: true,
    enableLogging: true, // Gardons le débogage activé
});

// Déboguer les connexions Pusher au niveau global
if (window.Pusher && window.Echo) {
    window.Echo.connector.pusher.connection.bind("connected", () => {
        console.log("Pusher Connected");
    });

    window.Echo.connector.pusher.connection.bind("disconnected", () => {
        console.log("Pusher Disconnected");
    });

    window.Echo.connector.pusher.connection.bind("error", (err) => {
        console.error("Pusher Error:", err);
    });
}
