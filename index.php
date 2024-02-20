<?php
// Démarrage de la session
session_start();
// Requires des vues
require_once 'views/parts/header.php';
?>
<!-- La page d'accueil-->
<section>
    <h1>Cabin Escapes</h1>
    <p>Site de réservation</p>
    <div class="viewAccueil">
        <h3>Nous Contacter</h3>
        <p>Adresse : Pied butte des Beaux-Monts,</p>
        <p> 60200 Compiègne</p>
        <!-- Inclure ici votre carte Google Maps avec un marqueur personnalisé pour l'adresse -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2537.7204177548765!2d2.816260215797511!3d49.402891179351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e838b4821f9a4f%3A0x2a00e7af3f5c2fb2!2sPied%20Butte%20des%20Beaux-Monts!5e0!3m2!1sen!2sfr!4v1673495879909!5m2!1sen!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>
<?php require_once 'views/parts/footer.php'; ?>