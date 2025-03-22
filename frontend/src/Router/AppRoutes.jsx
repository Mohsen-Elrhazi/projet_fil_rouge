import { Routes, Route } from "react-router-dom";
import Accueil from "../pages/Accueil";
import Account from "../pages/Account";
import CurrentAccount from "../pages/CurrentAccount";
import SavingAccount from "../pages/SavingAccount";
import Navbar from "../components/Navbar";
import Loginform from "../pages/auth/Login";
import Registerform from "../pages/auth/Register";
import ForgotPasswordForm from "../pages/auth/ForgotPassword";
// import LoginForm from "../pages/Accueil";

const AppRoutes = () => {
  return (
    // <BrowserRouter>
    <>
      <Navbar />
      <Routes>
        <Route path="/" element={<Accueil />} />
        <Route path="/account" element={<Account />} />
        <Route path="/current-account" element={<CurrentAccount />} />
        <Route path="/saving-account" element={<SavingAccount />} />
        <Route path="/register" element={<Registerform />} />
        <Route path="/login" element={<Loginform />} />
        <Route path="/forgotPassword" element={<ForgotPasswordForm />} />
      </Routes>
    </>
    // </BrowserRouter>
  );
};

export default AppRoutes;
