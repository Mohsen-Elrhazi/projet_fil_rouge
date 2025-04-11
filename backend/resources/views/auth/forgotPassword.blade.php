@extends("auth.layout")
@section("title", "Connexion")
@section("form")
<!-- Formulaire de reset password -->
<div class="container reset-container">
    <div class="image-container">
        <img src="/api/placeholder/400/320" alt="Illustration de réinitialisation" />
        <div class="image-overlay">
            <h2>Récupération</h2>
            <p>Nous vous aiderons à récupérer l'accès à votre compte</p>
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

        <h1>Réinitialiser le mot de passe</h1>
        <p class="form-description">
            Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </p>

        <form>
            <div class="input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="exemple@mail.com" required>
            </div>
            <button type="submit">Envoyer le lien de réinitialisation</button>
            <div class="form-links">
                <a href="login.html">Retour à la connexion</a>
            </div>
        </form>
    </div>
</div>
@endsection