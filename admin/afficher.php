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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  rel="stylesheet" />
    <title>Tous les produits</title>
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
                    <a class="nav-link" href="supprimer.php">Suppression</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="afficher.php">Produits</a>
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


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Images</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Editer</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Produits as $Produit): ?>
                        <tr>
                            <th scope="row"><?= $Produit->id?></th>

                            <td> <img src="<?= $Produit->image?>" style="width: 18%;"></td>
                            <td><?= $Produit->nom?></td>
                            <td style="font-weight:bold;color:green;"><?=$Produit->prix?>€</td>
                            <td><?= substr($Produit->description, 0, 100); ?></td>
                            <td>
                                <a href="editer.php?pdt=<?= $Produit->id ?>"><i class="fa fa-pencil" style="font-size:30px;"></i></a>
                            </td>
                        </tr>
                         <?php endforeach ?> 
                    </tbody>
                </table>


            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



            </div>

        </div>
    </div>
</body>

</html>