<?php
require "../includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
  <form>
    <input name="password" type="text">
  </form>
  <script>

    $(document).ready(function () {
      $("input[name='password']").on("input", checkPassword);
      if (0) {
        console.log("Works");
      } else {
        console.log("Doesn't work");
      }
    })

    function checkPassword() {
      var password = $("input[name='password']").val();
      var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      if (!passwordRegex.test(password)) {
          console.log("Le mot de passe doit contenir au moins 1 lettre, 1 chiffre et 1 caractère spécial.").show();
      } else {
          console.log("Mot de passe valide");
      }
    }

    </script>
</body>
</html>