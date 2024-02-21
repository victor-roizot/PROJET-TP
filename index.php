<?php
// Démarrage de la session
session_start();
// Requires des vues
require_once 'views/parts/header.php';
?>
<!-- La page d'accueil-->
<section>
    <h1>Cabin Escapes</h1>
    <h3>Site de réservation</h3>
    <div class="viewAccueil">

        <p>Bienvenue sur notre site de réservation de cabanes insolite, nichées au cœur de la forêt, où l'aventure et la sérénité se conjuguent harmonieusement.</p>

        <p>Dans l'univers de Caban Escapes, l’accent est mis sur la convivialité, elles sont le reflet de notre engagement envers le local, et le circuit court.</p>

        <p>Nos cabanes, sont faite par nos soins, chaque recoin respire l'authenticité, avec des matériaux soigneusement sélectionnés dans notre région, façonnés par des artisans passionnés.</p>

        <p>Chez nous, l'essence de la nature est au cœur de chaque expérience. Nous vous proposons bien plus qu'un simple séjour : une immersion magique dans les secrets de la forêt, où chaque brin d'herbe semble murmurer une histoire et chaque rayon de soleil réchauffe votre âme.
            L'écho des feuilles bruissant et le parfum des pins vous accueilleront dans un havre de paix.
        </p>

        <p>Loin de l'agitation citadine, notre havre forestier vous invite à ralentir, à vous ressourcer et à vous reconnecter avec l'essentiel. Ici, le temps s'étire doucement, vous laissant savourer chaque instant, chaque souffle d'air frais et chaque échange chaleureux..</p>

        <p>Que vous soyez en quête d'aventure, de détente ou de découvertes, notre site de réservation est votre passeport vers une expérience inoubliable, où la nature reprend ses droits et où les liens se tissent autour de valeurs authentiques.</p>

        <p>Bienvenue dans notre forêt enchantée, où le voyage commence dès le premier souffle de vent.</p>

        <div class="mapContainer">
        <h3>Nous trouver</h3>
            <p>Adresse : Cabin Escapes</p>
            <p>60200 Compiègne</p>
            <iframe id="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2557.3638651602727!2d2.819170315744731!3d49.41926357934906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67b7eb9b0347d%3A0x2d3004f1290c2a39!2sFor%C3%AAt%20de%20Compi%C3%A8gne!5e0!3m2!1sfr!2sfr!4v1645500881764!5m2!1sfr!2sfr" allowfullscreen></iframe>
        </div>
</section>
<?php require_once 'views/parts/footer.php'; ?>