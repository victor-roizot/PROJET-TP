<!-- L'utilisateur pourra voir la liste les cabanes à louer -->
<section>
    <h1> Les cabanes</h1>

    <!-- Boucle des éléments de la liste des items -->
    <div class="articlesContainer">
    <?php foreach ($itemsList as $i) { ?>
            <div class="articles">
                <!-- Affichage de l'image' -->
                <img class="articleImages" src="assets/img/items/<?= $i->image ?>" alt="Image de la cabane">
                <div>
                    <!-- Affichage du nom de la cabane -->
                    <h2><?= $i->hut ?></h2>

                    <!-- Affichage de la catégorie -->
                    <p>
                        <b>Catégorie :</b> <?= $i->categorie ?><br>
                    </p>

                    <!-- Affichage de la description -->
                    <p class="viewDescription">
                        <?= strip_tags($i->description) ?>...
                    </p>

                    <!-- Lien vers la page détaillée de la cabane -->
                    <a class=lienForm href="/cabane-<?= $i->id ?>">Lire la suite</a>
                </div>
            </div>
            <?php } ?>
        </div>
</section>