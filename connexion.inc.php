<?php
define("hostname","localhost"); 
define("database","db_examen");
define("username","root"); 
define("password","");

$dsn = 'mysql:dbname='.database.';host='.hostname.';charset=utf8';    

$bdd = new PDO($dsn, username, password);
// pour afficher les erreurs
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// pour récupérer le résultat des requêtes SELECT sous forme de tableaux associatifs 
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 

// On prépare l'enregistrement
if(isset($_POST['enregistrer'])){
    // On récupère les données
    $nom = $_POST['s_nom'];
    $prenom = $_POST['s_prenom'];
    $datenais = $_POST['s_datenais'];
    $ville = $_POST['s_ville'];
    $sexe = $_POST['s_sexe'];
    $codeFil = $_POST['s_filiere'];
    
    // On vérifie si les valeurs requisent sont toutes renseignés
    if(empty($nom) || empty($prenom) || empty($codeFil)){
        echo "Nom, Prenom et Filiere sont obigatoires";
    }else{
        // On prépare la requête
        $requete = "INSERT INTO candidat VALUES (0,'$nom','$prenom','$datenais','$ville','$sexe','$codeFil');";
        if($bdd->query($requete) == true){
            echo "Enregistrement éffectuer avec succès";
        }else{
            echo "Echec d'enregistrement";
        }
        
    }

}