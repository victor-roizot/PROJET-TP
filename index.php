<?php
// Démarrage de la session
session_start();
// Requires des vues
require_once 'views/parts/header.php';
?>
<!-- La page d'accueil-->
<section>
    <h1>Blackwoob</h1>
    <p>Site de réservation</p>
    <p>
        Dans ce projet, nous allons faire la démonstration d'une réservation pas à pas avec du PDO.
    </p>
</section>
<?php require_once 'views/parts/footer.php'; ?>