<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Méta-informations -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page -->
    <title>Social Home - Inscription</title>
    <!-- Feuilles de style -->
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
    <!-- Nouveau fichier CSS pour la page d'inscription -->
    <link rel="stylesheet" href="{{ asset('css/formulaire_User.css') }}">
    <link rel="stylesheet" href="{{ asset('css/poppup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cheickbox.css') }}">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Icône de la page -->
    <link rel="icon" type="image/png" href="/Logo/8900808870_4aa536ff-86f5-4f1e-9429-0e0ace5a8068.png">
    <style>
        .disabled {
            background-color: gray;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <audio id="lecteur-audio" src="{{ asset('sound/relaxed-vlog-night-street-131746.mp3') }}" type="audio/mp3"
        loop></audio>

    <audio id="hover-poppup">
        <source src="{{ asset('poppup/multi-pop-4-188169.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <!-- En-tête de la page -->
    <header>

    </header>
    <!-- Contenu principal de la page -->
    <main class="main">
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close-popup" onclick="closePopup()">&times;</span>
                <p>Bienvenue dans la famille !</p>
            </div>
        </div>

        <!-- Carte d'inscription -->
        <div class="main-card-login">
            <div class="login-card">

                <!-- Logo -->
                <div class="login-card-header-image" id="logo-section">
                    <a href="{{ asset('acceuil') }}"><img
                            src="{{ asset('Logo/8900808870_4aa536ff-86f5-4f1e-9429-0e0ace5a8068.png') }}" alt="Logo"
                            height="70" width="180"></a>
                </div>
                <!-- Formulaire d'inscription -->
                <form class="login-card-form" action="{{ route('register-user') }}" method="POST"
                    id="registration-form" enctype="multipart/form-data">

                    @if (Session::has('success'))
                        <script>
                            showPopup();
                        </script>
                    @endif

                    @if (Session::has('success'))
                        <div class="botton-text alert alert-success"> {{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                        <div class="botton-text alert alert-danger"> {{ Session::get('error') }}</div>
                    @endif
                    @csrf

                    <!-- Champ pour le nom d'utilisateur -->
                    <div class="user">
                        <div class="sms">
                            <span class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="text" placeholder="Nom d'utilisateur" name="username"
                                value="{{ old('username') }}">

                        </div>
                        <!-- Champ pour le nom -->
                        <div class="sms">
                            <input type="text" placeholder="Nom" name="lastname" value="{{ old('lastname') }}">
                            <span class="text-danger">
                                @error('lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <!-- Champ pour le prenom -->
                        <div class="sms">
                            <span class="text-danger">
                                @error('firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="text" placeholder="Prénom" name="firstname" value="{{ old('firstname') }}">

                        </div>
                    </div>
                    <!-- Champ pour le numéro de téléphone -->
                    <input type="text" placeholder="Numéro de téléphone" name="phone" value="{{ old('phone') }}">
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                    <!-- Champ pour la photo de profile -->
                    <div class="cadre">
                        <p class="par">Ajouter une photo de profile</p>
                    </div>
                    <input type="file" id="imageUpload" name="imageUpload" accept="image/*"
                        onchange="previewImage(event)" class="photo" value="{/*{old('imageUpload')}}"-->
                    <span class="text-danger texte">
                        @error('imageUpload')
                            {{ $message }}
                        @enderror
                    </span>
                    <div id="imagePreview" class="imgs"></div>
                    <!-- Champ pour le genre -->
                    <div class="user">
                        <select name="gender">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                        <!-- Champ pour le pays -->
                        <!-- Champ pour la ville -->
                        <div class="sms">
                            <span class="text-danger">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="text" class="city" placeholder="Ville ou commune ou quartier" name="city" value="{{ old('city') }}">
                        </div>
                        <!-- Champ pour le code postal -->
                        <!--input type="text" placeholder="Code postal (Optionel)" name="postalcode"
                            value="{/*{ old('postalcode') }}"-->
                    </div>
                    <!-- Champ pour l'email -->
                    <input type="email" placeholder="Adresse email" name="email" value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <!-- Champ pour le mot de passe -->
                    <input type="password" placeholder="Mot de passe" name="password"
                        value="{{ old('password') }}">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                    <!-- Champ de confirmation du mot de passe -->
                    <label class="container">
                        <input type="checkbox" name="privacy_acceptance" id="privacy_acceptance">
                        <p>Acceptez-vous les paramètres de confidentialité ?</p>
                        <div class="checkmark"></div>
                    </label>
                    <!-- Bouton d'inscription -->
                    <button type="submit" class="login-card-form-button login-form-button disabled box"
                        id="register-button">Inscription</button>
                    <div class="login-or">
                        <hr class="login-or-first-separation">
                        <span>OU</span>
                        <hr class="login-or-last-separation">
                    </div>
                    <div class="login-with-facebook" id="facebook-login">
                        <p>
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            Se connecter avec Facebook
                        </p>
                    </div>
                    <!-- Pied de page de la carte d'inscription -->
                    <footer>
                        <!-- Lien vers la page de connexion -->
                        <div class="signup-card-footer">
                            <p>Vous avez déjà un compte ? <a href="{{ asset('login') }}" id="login-link"
                                    class="login-link">Connectez-vous</a></p>
                        </div>
                        <!-- Section de téléchargement de l'application -->
                        <div class="download-app">
                            <p>Téléchargez l'application.</p>
                        </div>
                        <!-- Boutons de téléchargement de l'application -->
                        <div class="download-app-buttons">
                            <img src="https://i.ibb.co/0MVzVqf/download-appstore.png" alt="Download on the App Store"
                                height="40" width="130">
                            <img src="https://i.ibb.co/hdsFFGB/download-playstore.png" alt="Get it on Google Play"
                                height="40" width="130">
                        </div>
                    </footer>
                </form>
            </div>
        </div>
    </main>


    <script src="{{ asset('/js/check.js') }}"></script>
    <script src="{{ asset('/js/photo.js') }}"></script>
    <script src="{{ asset('js/music.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
