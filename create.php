<?php

require 'bdd.php';

function connect($usernamedb, $passworddb, $dbnamedb)
{
    $connexion = new mysqli("localhost", $usernamedb, $passworddb, $dbnamedb);
    if ($connexion->connect_error) {
        die("Connection Failed!" . $connexion->connect_error);
    }
    return $connexion;
}

function disconnect($connexion)
{
    mysqli_close($connexion);
}

// Créer un étudiant à partir de ses informations
function creerUser($connexion, $prenom, $nom, $tauxHoraire)
{
    try {
        // Début de la transaction
        $connexion->begin_transaction();

        // Préparer la requête pour l'insertion dans la table User
        $stmt = $connexion->prepare("INSERT INTO User (prenom, nom, tauxHoraire) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $prenom, $nom, $tauxHoraire);

        if ($stmt->execute() === false) {
            throw new Exception("Erreur lors de l'insertion dans la table User : " . $connexion->error);
        }

        // Terminer la transaction
        $connexion->commit();

        echo "Opérations effectuées avec succès !";

    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $connexion->rollback();
        echo "Erreur : " . $e->getMessage();
    }
}




function creerTicket($connexion, $idUser, $libelleMail, $numTicket, $dateTicket, $tempsDebut, $tempsFin, $tempsIntervention, $statut, $categorie)
{
    try {
        // Début de la transaction
        $connexion->begin_transaction();

        // Générer la définition et le libelleMainNumTicket en concaténant les valeurs spécifiées
        $definition = $numTicket . "-L" . $idUser . "-" . $libelleMail;
        $libelleMainNumTicket = $definition . "-L" . $libelleMail . "-" . $numTicket;

        // Déterminer le coefficient en fonction de la catégorie
        $coeff = 1; // Valeur par défaut
        if ($categorie === "Nuit_Std") {
            $coeff = 1;
        } elseif ($categorie === "Nuit_Double") {
            $coeff = 1.1;
        } elseif ($categorie === "Jour_Std") {
            $coeff = 0;
        } elseif ($categorie === "Jour_Double") {
            $coeff = 1;
        }

        // Préparer la requête pour l'insertion dans la table Ticket
        $stmt = $connexion->prepare("INSERT INTO Ticket (libelleMainNumTicket, definition, idUser, libelleMail, numTicket, dateTicket, tempsDebut, tempsFin, tempsIntervention, statut, categorie, coeff) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisissiisssd", $libelleMainNumTicket, $definition, $idUser, $libelleMail, $numTicket, $dateTicket, $tempsDebut, $tempsFin, $tempsIntervention, $statut, $categorie, $coeff);

        if ($stmt->execute() === false) {
            throw new Exception("Erreur lors de l'insertion dans la table Ticket : " . $connexion->error);
        }

        // Terminer la transaction
        $connexion->commit();

        echo "Opérations effectuées avec succès !";

    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $connexion->rollback();
        echo "Erreur : " . $e->getMessage();
    }
}

?>