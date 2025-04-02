<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container full-height">
        <div class="form-container shadow">
            <h2 class="text-center">Espace de connexion</h2>
             
            <!-- Vérifie si la clé 'error_msg' existe dans la session -->
            @if (Session::get('error_msg'))
                <!-- Affiche la valeur de la clé 'error_msg' -->
                <div class="msg_login">{{ Session::get('error_msg') }}</div>
            @endif

            <form method="post" action="{{ route('handleLogin') }}">

                @csrf
                @method('post')

                <!-- Email -->
                <div class="mb-3 text-danger">
                    <input name="email"
                        value="{{ old('email') }}"
                        type="email" class="form-control"
                        id="email"
                        placeholder="Entrez votre adresse email"
                    >
                    <div class="msg_input">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>

                <!-- Password -->
                </div>
                <div class="mb-3">
                    <input name="password"
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Entrez votre mot de passe"
                    >
                    <div class="msg_input">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <!-- Checkbox pour se souvenir de l'utilisateur -->
                <div class="form-check mb-3">
                    <input type="checkbox"
                    class="form-check-input"
                    id="rememberMe"
                    >
                    <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                </div>

                <!-- Message d'erreur -->
                <div class="error-message" id="error-message" style="display: none;">
                    Erreur : Veuillez vérifier vos informations d'identification.
                </div>

                <button type="submit" class="btn btn-primary btn-block">Connexion</button>

                <!-- Phrase pour la récupération du mot de passe -->
                <div class="password-recovery">
                    <p class="text-muted">
                        Vous avez oublié votre mot de passe ?
                        <a href="#">Cliquez ici pour le récupérer.</a>
                    </p>
                </div>

                <!-- Politique de confidentialité -->
                <div class="text-center">
                    <small class="text-muted">
                        En vous connectant, vous acceptez notre
                        <a href="#">politique de confidentialité</a>.
                    </small>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
