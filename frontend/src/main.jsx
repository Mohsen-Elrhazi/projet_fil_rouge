import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import { BrowserRouter } from "react-router-dom";

import "./index.css";
import AppRoutes from "./Router/AppRoutes.jsx";
// import Navbar from "./composants/Navbar.jsx";

createRoot(document.getElementById("root")).render(
  <StrictMode>
    <BrowserRouter>
      {/* <Navbar /> */}
      <AppRoutes />
    </BrowserRouter>
  </StrictMode>
);
