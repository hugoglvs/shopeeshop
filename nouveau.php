<?php
$title = "S'inscrire";
require_once "includes/head.php";
require_once "includes/navbar.php";

// Initialise les variables si elles sont bien déclarées dans le $_GET
$nom = isset($_GET["n"]) ? $_GET["n"] : "";
$prenom = isset($_GET["p"]) ? $_GET["p"] : "";
$adresse = isset($_GET["adr"]) ? $_GET["adr"] : "";
$numero = isset($_GET["num"]) ? $_GET["num"] : "";
$email = isset($_GET["mail"]) ? $_GET["mail"] : "";

?>

    <main id="register">
        <span id="message"></span>

        <form method="post" action="enregistrement.php" autocomplete="off">
            
            <label for="n">Nom</label>
            <span id=nomError></span>
            <input type="text"name="n" value="<?= htmlspecialchars($nom) ?>">

            <label for="p">Prenom</label>
            <span id=prenomError></span>
            <input type="text"name="p" value="<?= htmlspecialchars($prenom) ?>">

            <label for="adr">Adresse</label>
            <span id=adresseError></span>
            <input type="text"name="adr" value="<?= htmlspecialchars($adresse) ?>">

            <label for="num">Numero de telephone</label>
            <span id=numeroError></span>
            <input type="text"name="num" value="<?= htmlspecialchars($numero) ?>">

            <label for="mail">Adresse email</label>
            <span id=emailError></span>
            <input type="text"name="mail">

            <label for="m1">Mot de passe</label>
            <span id=passwordError></span>
            <input type="password"name="m1" value="">

            <label for="m2">Confirmer votre mot de passe</label>
            <input type="password" name="m2" value="">
            <input type="submit" value="Envoyer">
        </form>
    </main>
<?php include_once 'includes/footer.php' ?>
<script>

    $(document).ready(function () {

        $("#message").hide();
        $("input[name='n']").on("input", validateNom);
        $("input[name='p']").on("input", validatePrenom);
        $("input[name='adr']").on("input", validateAdresse);
        $("input[name='num']").on("input", validateNumero);
        $("input[name='mail']").on("input", validateEmail);
        $("input[name='m1']").on("input", validatePassword);
        $("input[name='m2']").on("input", validatePassword);
        $("input[type='submit']").prop("disabled", true);
        $("input").on("change", updateSubmitButton);

        $("form").submit(function (event) {
            event.preventDefault(); // Empêche le formulaire de se soumettre normalement

            // Vérifie à nouveau la validation avant d'envoyer la requête AJAX
            if (!(isValid.nom && isValid.prenom && isValid.adresse && isValid.numero && isValid.email && isValid.password)) {
                // Affiche un message d'erreur global si la validation échoue
                $("#message").text("Veuillez remplir correctement tous les champs.").removeClass("success").addClass("error").show();
                return;
            }

            // Envoie une requête AJAX pour créer le compte
            $.ajax({
                type: "POST",
                url: "enregistrement.php", // Tu devrais créer cette page pour gérer la création du compte
                data: {nom: $("input[name='n']").val(), 
                       prenom: $("input[name='p']").val(), 
                       adresse: $("input[name='adr']").val(), 
                       numero: $("input[name='num']").val(), 
                       mail: $("input[name='mail']").val(), 
                       mdp: $("input[name='m1']").val()
                    },
                success: function (response) {
                    console.log(response);
                    if (response === "1") {
                        // Affiche un message de succès
                        $("#message").text("Compte créé avec succès! Redirection vers l'accueil...").removeClass("error").addClass("success").show();
                        
                        // Redirige l'utilisateur vers l'accueil après 1 seconde
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 1000);
                    } else {
                        // Affiche un message d'erreur spécifique
                        $("#message").text("Une erreur s'est produite lors de la création du compte.").removeClass("success").addClass("error").show();
                    }
                },
            });
        });
    });

    var isValid = {
            nom: false,
            prenom: false,
            adresse: false,
            numero: false,
            email: false,
            password: false
        };

    function validateNom() {
        var nom = $("input[name='n']");
        if (nom.val() === "") {
            nom.css("background-color", "white");
            $("#nomError").text("Le nom est obligatoire.").show();
            isValid.nom = false;
        } else {
            $("#nomError").hide();
            nom.css("background-color", "lightgreen");
            isValid.nom = true;
        }
        }

        function validatePrenom() {
            var prenom = $("input[name='p']");
            if (prenom.val() === "") {
                prenom.css("background-color", "white");
                $("#prenomError").text("Le prenom est obligatoire.").show();
                isValid.prenom = false;
            } else {
                $("#prenomError").hide();
                prenom.css("background-color", "lightgreen")
                isValid.prenom = true;
            }
        }

        function validateAdresse() {
            var adresse = $("input[name='adr']");
            if (adresse.val() === "") {
                adresse.css("background-color", "white");
                $("#adresseError").text("L'adresse est obligatoire.").show();
                isValid.adresse = false;
            } else {
                $("#adresseError").hide();
                adresse.css("background-color", "lightgreen")
                isValid.adresse = true;
            }
        }

        function validateNumero() {
            var numero = $("input[name='num']");
            // Faudrait penser à faire un cours un jour sur les regex c'est pas mal
            var numeroRegex = /^[0-9]{10}$/;
            if (!numeroRegex.test(numero.val())) {
                numero.css("background-color", "white");
                $("#numeroError").text("Numéro invalide.").show();
                isValid.numero = false;
            } else {
                $("#numeroError").hide();
                numero.css("background-color", "lightgreen")
                isValid.numero = true;
            }
        }

        function validateEmail() {
            var email = $("input[name='mail']");
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.val())) {
                email.css("background-color", "white")
                $("#emailError").text("Format d'email invalide.").show();
                isValid.email = false;
            } else if (emailAlreadyExist(email.val())) {
                isValid.email = false;
            } else {
                $("#emailError").hide();
                email.css("background-color", "lightgreen")
                isValid.email = true;
            }
        }

        function emailAlreadyExist(email) {
            var result = false;
            $.ajax({
                url: "checkEmail.php",
                type: "POST",
                async: true,
                data: {mail: email},
                success: function (response) {
                    result =  (response == "1")
                }
            });
            return result;
        }
        

        function validatePassword() {
            var password = $("input[name='m1']").val();
            var confirmPassword = $("input[name='m2']").val();
            var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordRegex.test(password)) {
                $("#passwordError").text("Le mot de passe doit contenir au moins 1 lettre, 1 chiffre et 1 caractère spécial.").show();
                isValid.password = false;
            } else if (password !== confirmPassword) {
                $("#passwordError").text("Les mots de passe ne correspondent pas.").show();
                isValid.password = false;
            } else {
                $("#passwordError").hide();
                isValid.password = true;
            }
        }

        // Fonction pour activer/désactiver le bouton d'envoi en fonction de la validation
        function updateSubmitButton() {
            $("input[type='submit']").prop("disabled", !(isValid.nom && isValid.prenom && isValid.adresse && isValid.numero && isValid.email && isValid.password));
        }

</script>

</body>
</html>
