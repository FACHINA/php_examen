<?php 
    include('connexion.inc.php');

    // On prépare la recherche
    $candidats = [];
    if(isset($_GET['r_filiere'])){
        $codeFil = $_GET['r_filiere'];
        if (empty($codeFil)) {
            echo "La filière SVP !";
        }else{
            // On prépare la requête
            $requete = "SELECT * FROM candidat WHERE codeFil = '$codeFil'";
            // On exécute la requête
            $reponse = $bdd->query($requete);
            // On récupère les données
            $candidats = $reponse->fetchAll();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rcherches de candidats</title>
</head>
<body>
    <br>
    <b>Recherchez les candidats d'une filière</b>
    <form action="recherche.php" method="get">
        <!-- Filière -->
        <label>Dans la filière</label>
        <select type="text" name="r_filiere">
            <option selected value="">Selectionner une filiere</option>
            <option value="AGE">AGE</option>
            <option value="AGRO">AGRO</option>
            <option value="RIT"> RIT</option>
            <option value="SIL">SIL</option>
        </select>
        <br>
        <!-- Action -->
        <label>Envoyer</label>
        <button type="submit">OK</button>
    </form>
    <h3>Liste des candidats</h3>
    <table border="1">
        <thead>
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>SEXE</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach($candidats as $candidat) { ?>
                <tr>
                    <td> <?php echo $candidat['nom'] ?> </td>
                    <td> <?php echo $candidat['prenom'] ?> </td>
                    <td> <?php echo $candidat['sexe'] ?> </td>
                </tr>
            <?php } ?>

            <?php if( $candidats == []) { ?>
                <tr>
                    <td colspan="3">Vide</td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</body>
</html>