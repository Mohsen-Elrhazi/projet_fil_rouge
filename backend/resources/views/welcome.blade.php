<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="/api/placeholder/400/320" alt="Illustration d'inscription" />
            <div class="image-overlay">
                <h2>Rejoignez-nous</h2>
                <p>Créez un compte pour accéder à tous nos services exclusifs</p>
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

            <h1>Créer un compte</h1>

            <form>
                <div class="input-group">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
                </div>
                <div class="input-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="exemple@mail.com" required>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Créez un mot de passe" required>
                </div>
                <button type="submit">S'inscrire</button>
                <div class="form-links">
                    Vous avez déjà un compte? <a href="login.html">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>