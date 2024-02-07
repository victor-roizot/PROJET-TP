<div class="singleArticle">
    <h1><?= $articleDetails->title ?></h1>
    <p>
        <b>Ecrit par :</b> <?= $articleDetails->username ?><br>
        <b>Catégorie :</b> <?= $articleDetails->category ?><br>
        <b>Publié :</b> <?= $articleDetails->publicationDateFr ?><br>
        <b>Mis à jour :</b> <?= $articleDetails->updateDateFr ?>
    </p>
    <img src="assets/img/articles/<?= $articleDetails->image ?>" alt="Image d'illustration">
    <p>
        <?= $articleDetails->content ?>
    </p>
</div>