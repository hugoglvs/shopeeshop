<?php
$title = "S'inscrire";
require_once "includes/head.php";
require_once "includes/navbar.php";


// Initialise les variables si elles sont bien déclarées dans le $_GET
$nom = isset($_GET["n"]) ? htmlspecialchars($_GET["n"]) : "";
$prenom = isset($_GET["p"]) ? htmlspecialchars($_GET["p"]) : "";
$adresse = isset($_GET["adr"]) ? htmlspecialchars($_GET["adr"]) : "";
$numero = isset($_GET["num"]) ? htmlspecialchars($_GET["num"]) : "";
$email = isset($_GET["mail"]) ? htmlspecialchars($_GET["mail"]) : "";
?>

    <main id="register">
        <span id="message"></span>

        <form id="registrationForm" method="post" action="enregistrement.php" autocomplete="off">
            
            <label for="n">Nom</label>
            <span id=nomError></span>
            <input type="text" id="n" name="n">

            <label for="p">Prenom</label>
            <span id=prenomError></span>
            <input type="text" id="p" name="p">

            <label for="adr">Adresse</label>
            <span id=adresseError></span>
            <input type="text" id="adr" name="adr">

            <label for="num">Numero de telephone</label>
            <span id=numeroError></span>
            <input type="text" id="num" name="num">

            <label for="mail">Adresse email</label>
            <span id=emailError></span>
            <input type="text" id="mail" name="mail">

            <label for="m1">Mot de passe</label>
            <span id=passwordError></span>
            <input type="password" id="m1" name ="m1" value="">

            <label for="m2">Confirmer votre mot de passe</label>
            <input type="password"  id="m2" name="m2" value="">
            <input type="submit" value="Envoyer">
        </form>
    </main>
<?php include_once 'includes/footer.php' ?>
<script>

    $(document).ready(function () {

        $("#message").hide();
        $("input[ id='n']").on("input", validateNom);
        $("input[ id='p']").on("input", validatePrenom);
        $("input[ id='adr']").on("input", validateAdresse);
        $("input[ id='num']").on("input", validateNumero);
        $("input[ id='mail']").on("input", validateEmail);
        $("input[ id='m1']").on("input", validatePassword);
        $("input[ id='m2']").on("input", validatePassword);
        $("input[type='submit']").prop("disabled", true);
        $("input").on("change", updateSubmitButton);

        $("form").submit(function (event) {
            event.preventDefault(); // Empêche le formulaire de se soumettre normalement

            // Vérifie à nouveau la validation avant d'envoyer la requête AJAX
            if (!(isValid.nom && isValid.prenom && isValid.adresse && isValid.numero && isValid.email && isValid.password)) {
                $("#message").text("Veuillez remplir correctement tous les champs.").removeClass("success").addClass("error").show();
            }

            // Envoie une requête AJAX pour créer le compte
            $.ajax({
                type: "POST",
                url: "enregistrement.php",
                data: $("#registrationForm").serialize(),
                success: function (response) {
                    console.log("reponse:", response);
                    if (response === "1") {
                        $("#message").text("Compte créé avec succès! Redirection vers l'accueil...").removeClass("error").addClass("success").show();
                        
                        // Redirige l'utilisateur vers l'accueil après 1 seconde
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 1000);
                    } else {
                        // Affiche un message d'erreur spécifique
                        // $("#message").text("Une erreur s'est produite lors de la création du compte.").removeClass("success").addClass("error").show();
                        $("message").text(response).show();
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
        var nom = $("input[id='n']");
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
            var prenom = $("input[id='p']");
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
            var adresse = $("input[id='adr']");
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
            var numero = $("input[id='num']");
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
            var email = $("input[id='mail']");
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
            var password = $("input[id='m1']").val();
            var confirmPassword = $("input[id='m2']").val();
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
            console.log(isValid);
            $("input[type='submit']").prop("disabled", !(isValid.nom && isValid.prenom && isValid.adresse && isValid.numero && isValid.email && isValid.password));
            console.log($("input[type='submit']").prop("disabled"));
        }

</script>

</body>
</html>
