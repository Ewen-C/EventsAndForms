<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fourmulaire envoyé</title>
    <link rel="stylesheet" type="text/css" href="testEvenements.css">
  </head>

  <body>
    <section>

      <?php

      // Table simple nommée tabletest dans la BDD test
      // Champs 'nom' et 'prenom' utilisés

      // Connexion
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }

      // Ajout dans la BDD
      $requete = 'INSERT INTO `tabletest`(`nom`, `prenom`) VALUES ("' . $_POST['nom'] . '","' . $_POST['prenom'] . '")';

      echo("<script> console.log('Requête PHP : $requete '); </script>"); // Le contenu du console.log doit être entre guillemets simples
      

      $bdd->exec($requete);
      echo ("<h1> Ajout terminé ! </h1>");


      // Affichage des informations de la BDD
      $reponse = $bdd->query('SELECT * FROM `tabletest`');

      if (!empty($_POST['nom']) && !empty($_POST['prenom'])) {
        echo ("<p> Merci, " . $_POST['nom'] . " " . $_POST['prenom'] . ". </p>");
      } else {
        echo ("<p> Veuillez remplir les champs. </p>");
      }

      echo ("<h2>Informations de la BDD : </h2>");

      while ($donnees = $reponse->fetch()) {
        echo('<p> ');
        echo('<strong> Nom </strong> : ' . $donnees['nom'] . '<br/>');
        echo('<strong> Prenom </strong> : ' . $donnees['prenom'] . '<br/>');
        echo(' </p>');
      }

      $reponse->closeCursor(); // Termine le traitement de la requête 
      ?>

    </section>

    <footer>
      <p> <a href="testEvenements.html"> Retour </a> </p>
    </footer>

  </body>
</html>