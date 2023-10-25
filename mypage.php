<!DOCTYPE html>
<html>
<head>
    <title>Page d'Informations</title>


    <style>
        body {
            background-color: #3498db; 
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: #f39c12; 
            border-radius: 8px;
            padding: 20px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #3498db; 
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; 
        }
    </style>
</head>
<body>
    <?php
   session_start();
   if(isset($_SESSION["user"]) && $_SESSION["user"]!= null){

   }
   else{
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $identifiant = $_POST["identifiant"];
         $motDePasse = $_POST["motDePasse"];

         try {
               $bdd = new PDO("mysql:host=localhost;dbname=Toto", "root", "root");

               $requete = "SELECT * FROM User WHERE user = :identifiant";
               $stmt = $bdd->prepare($requete);
               $stmt->bindParam(':identifiant', $identifiant);
               $stmt->execute();
               $utilisateur = $stmt->fetch();
               if ($utilisateur && password_verify($motDePasse, $utilisateur['password'])) {
                  $_SESSION["user"] = array("id"=>$utilisateur['id'],"nom"=>$utilisateur['user']);
               } else {
                  echo "<p>Identifiant ou mot de passe incorrect.</p>";
                  $_SESSION["user"] = null;
                  header("Location: index.php");

                  
               }
         } catch (PDOException $e) {
            $_SESSION["user"] = null;

               die("Erreur de connexion à la base de données : " . $e->getMessage());
         }
      } else {
         $_SESSION["user"] = null;
         header("Location: index.php");
         exit();
      }

   }

   if(isset($_SESSION["user"]) and $_SESSION["user"]!= null){//Connexion OK

      print_r($_SESSION["user"]);
      $bdd = new PDO("mysql:host=localhost;dbname=Toto", "root", "root");

      if(isset($_POST["token"]) and isset($_POST["champ1"]) and isset($_POST["champ2"])){

         if($_POST["token"] == $_SESSION["token"]){
         if($_POST["champ2"]>0){
            $requete = "UPDATE user SET actions = actions + ".$_POST["champ2"]." WHERE user = :identifiant";
            $stmt = $bdd->prepare($requete);
            $stmt->bindParam(':identifiant', $_POST["champ1"]);
            $stmt->execute();

            $requete = "UPDATE user SET actions = actions - ".$_POST["champ2"]." WHERE user = :identifiant";
            $stmt = $bdd->prepare($requete);
            $stmt->bindParam(':identifiant', $_SESSION["user"]["nom"]);
            $stmt->execute();
      }
      else{

      }
   }
   }
      $aaa = rand(0, 1000);
      $_SESSION["token"] = $aaa;
      $requete = "SELECT * FROM User WHERE id = :id";
      $stmt = $bdd->prepare($requete);
      $stmt->bindParam(':id', $_SESSION["user"]["id"]);
      $stmt->execute();
      $somme = $stmt->fetch()["actions"];

      echo "<h1>Bienvenue ".$_SESSION["user"]["nom"]."</h1>";
      echo "<p>Vous avez  ".$somme." actions</p>";

?>
      <div class="container">
         <div class="form">
            <h2>Envoie</h2>
            <form action="mypage.php" method="post">
               <label for="champ1">Destinataire : </label>
               <input type="text" id="champ1" name="champ1" required><br><br>
               <label for="champ2">Valeur : </label>
               <input type="text" id="champ2" name="champ2" required><br><br>
               <input type="hidden" id="token" name="token" value=<?php echo $aaa; ?> ><br><br>

               <input type="submit" value="Soumettre">
            </form>
         </div>

   </div>

<?php
   }
?>

    
</body>
</html>