<!-- L'utilisateur pourra voir une cabane en particulier et la réserver -->
<section>
    <h1>cabanes</h1>
    <div>
        <!-- Affichage de l'image' -->
        <img src="assets/img/items/<?= $itemDetails->image ?>" alt="Image de la cabane">

        <!-- Affichage du nom de la cabane -->
        <h1><?= $itemDetails->hut ?></h1>

        <!-- Affichage de la catégorie -->
        <p>
            <b>Catégorie :</b> <?= $itemDetails->categorie ?><br>
        </p>

        <!-- Affichage de la description -->
        <p>
            <?= strip_tags($itemDetails->description) ?>
        </p>


<?php 

if(isset($_SESSION['user']) && $_SESSION['user']['id_usersRoles'] == 255){ ?>

<a class=lien href="/modifier-item-<?= $item->id ?>">modifier ma cabane</a>
<?php } ?> 
    </div>
</section>