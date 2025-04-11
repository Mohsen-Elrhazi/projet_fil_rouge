@extends("auth.layout")
@section("title", "Connexion")
@section("form")
<!-- Formulaire de connexion -->
<div class="container login-container">
    <div class="image-container">
        <img src="/api/placeholder/400/320" alt="Illustration de connexion" />
        <div class="image-overlay">
            <h2>Bienvenue</h2>
            <p>Connectez-vous pour accéder à votre espace personnel</p>
        </div>
    </div>
    <div class="form-container">
        <div class="logo-container">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 2L1 21h22L12 2zm0 4.52L19.37 18H4.63L12 6.52z" />
                </svg>
                BRAND
            </div>
        </div>

        <h1>Connexion</h1>

        <form>
            <div class="input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="exemple@mail.com" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-bottom">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <div class="forgot-password">
                    <a href="reset-password.html">Mot de passe oublié?</a>
                </div>
            </div>
            <button type="submit">Se connecter</button>
            <div class="form-links">
                Pas encore de compte? <a href="{{ route("register") }}">S'inscrire</a>
            </div>
        </form>
    </div>
</div>
@endsection