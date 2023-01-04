
<!--Intéraction avec la base de donnée PHP Admin -->

<?PHP

// CREATE //

function ajouter($image,$nom,$prix,$desc)
{
// si la connexion avec le fichier connexion.php est faite alors : 

if(require("connexion.php"))
{
    //Effectuer la requête : Inseré dans la table produits les valueur de chaque colonne 

$req = $access->prepare("INSERT INTO produits (image,nom,prix,description) VALUES('$image','$nom','$prix','$desc')");

$req->execute(array($image,$nom,$prix,$desc));


$req->closeCursor();

}
}



//READ //

function afficher()
{

    if(require("connexion.php"))
    {

        $req = $access->prepare("SELECT * FROM produits ORDER  BY id DESC");

        $req->execute();
        
        $data=$req->fetchall(PDO::FETCH_OBJ);

return $data;

$req->closeCursor();

    }
}




//DELETE //

function supprimer($id)
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("DELETE FROM produits WHERE id =?");
        $req->execute(array($id));
    }

}

?>