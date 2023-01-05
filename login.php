<?php
session_start();
include("config/commandes.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>lOGIN - Monoshop</title>
</head>
<body>
    <br>
    <br>
    <br>
<div class="container-fluid">
    <div class="row">
<div class="col-md-3"></div>
    <div class="col-md-6">

    <form method="post">
       <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" name="email" style="width: 80%"/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="motdepasse">Mot de passe</label>
  <input type="password" class="form-control" name="motdepasse" style="width: 80%" />

</div>



<input type="submit" class="btn btn-danger" name="envoyer" value="Se connecter">
</form>
</div>
  <div class="col-md-3"></div>
    <!--Formulaire -->
</div>
    
    </div>
</div>

    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

<?php 

if(isset($_post['envoyer'])){
 if(!empty($_POST['email']) AND !empty($_POST['motdepasse'])){
    $email= htmlspecialchars($_POST['email']);
    $motdepasse= htmlspecialchars($_POST['motdepasse']);


   $admin = getAdmin($email,$motdepasse);

   if($admin) {

    $_SESSION["zWuppkg"] = $admin;

    header("Location: admin/");


   }else{
    echo "Problème de connexion !";
   }
 }

}

?>

