<?php
session_start();

if (!isset($_SESSION['zWuppkg'])) {
    header("Location: ../login.php");
}
if (empty($_SESSION['zWuppkg'])) {
    header("Location: ../login.php");
}




require("../config/commandes.php");
$Produits = afficher();
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

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Administration</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../Admin">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold" href="supprimer.php">Suppression</a>
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


<body>

 


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <!--Formulaire-->

                <form method="post">
                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="staticEmail3" class="form-label">Identifiant du produit</label>
                            <input type="number" class="form-control" name="idproduit" required>
                        </div>

                        <button type="submit" name="valider" class="btn btn-warning">Supprimer le nouveau produit</button>
                </form>

            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($Produits as $produit) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= $produit->image ?>" style="width: 24%">
                            <h2><?= $produit->id ?></h2>

                            <div class="card-body">


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</body>

</html>

<?php


if (isset($_POST['valider'])) {

    if (isset($_POST['idproduit'])) {

        if (!empty($_POST['idproduit']) and is_numeric($_POST['idproduit'])) {

            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));


            echo ' <style> p { text-align:center;color:red}</style>
<p>Le produit a été supprimer avec succès!</p>';

            try {

                supprimer($idproduit);
            } catch (Exception $e) {

                $e->getMessage();
            }
        }
    }
}
?>