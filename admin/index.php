<?php

session_start();

if (!isset($_SESSION['zWuppkg'])) {
  header("Location: ../login.php");
}
if (empty($_SESSION['zWuppkg'])) {
  header("Location: ../login.php");
}


require("../config/commandes.php");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/style.css">
  <title>Document</title>
</head>

<body>

<!--Barre de navigation -->

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Administration</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active fw-bold" aria-current="page" href="../Admin">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="afficher.php">Produits</a>
        </li>
      </ul>
      <div style="display:flex; justify-content: flex-end;">
        <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
      </div>
    </div>
  </div>
</nav>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <!--Formulaire-->

        <form method="post">
          <div class="mb-3">
            <label for="staticEmail" class="form-label">titre de l'image</label>
            <input type="name" class="form-control" name="image" required>
          </div>
          <div class="mb-3">
            <label for="staticEmail2" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" name="nom" required>
          </div>
          <div class="mb-3">
            <label for="staticEmail3" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" required>
          </div>

          <div class="mb-3">
            <label for="staticEmail4" class="form-label">Description</label>
            <textarea class="form-control" name="desc" required></textarea>
          </div>
          <button type="submit" name="valider" class="btn btn-success">Ajouter un nouveau produit</button>
        </form>

      </div>
    </div>
  </div>
</body>

</html>

<?php


if (isset($_POST['valider'])) {

  //V??rifie la valeur de la variable 

  if (isset($_POST['image']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['desc'])) {
    //V??rifie si le champ est vide 
    if (!empty($_POST['image']) and !empty($_POST['nom']) and !empty($_POST['prix']) and !empty($_POST['desc'])) {

      //convertion en html 

      $image = htmlspecialchars(strip_tags($_POST['image']));
      $nom = htmlspecialchars(strip_tags($_POST['nom']));
      $prix = htmlspecialchars(strip_tags($_POST['prix']));
      $desc = htmlspecialchars(strip_tags($_POST['desc']));

      echo ' <style> p { text-align:center;color:red}</style>
<p>Le produit a ??t?? ajouter avec succ??s!</p>';

      try {

        ajouter($image, $nom, $prix, $desc);
      } catch (Exception $e) {

        $e->getMessage();
      }
    }
  }
}
?>