<?php

require 'bdd.php';

function getUserParId($connexion, $idUser)
{
    $query = "SELECT idUser, nom, prenom, total FROM User WHERE idUser = ?";

    $nom = $prenom = $total = $mail = null;

    try {
        // Préparation de la requête
        $stmt = $connexion->prepare($query);

        if (!$stmt) {
            throw new Exception("Erreur lors de la préparation de la requête : " . $connexion->error);
        }

        // Liaison du paramètre avec la variable $idEtudiant
        $stmt->bind_param("i", $idUser);

        // Exécution de la requête
        if (!$stmt->execute()) {
            throw new Exception("Erreur lors de l'exécution de la requête : " . $stmt->error);
        }

        // Liaison des colonnes du résultat avec des variables
        $stmt->bind_result($idUser, $nom, $prenom, $total);

        // Récupération des données
        $stmt->fetch();

        // Création d'un tableau associatif avec les résultats
        $user = array(
            "idUser" => $idUser,
            "nom" => $nom,
            "prenom" => $prenom,
            "total" => $total
        );

        // Fermeture du statement
        $stmt->close();

        // Retourne les informations du User
        return $user;
    } catch (Exception $e) {
        // Gestion de l'exception
        echo "Une erreur est survenue : " . $e->getMessage();
        return null;
    }
}
// Retourne un tableau php contenant les informations User

?>
