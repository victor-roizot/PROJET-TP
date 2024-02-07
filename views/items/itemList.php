<h1>Blog</h1>
<div class="articlesContainer">
    <?php foreach ($articlesList as $a) { ?>
        <div class="article">
            <div class="articleImage" style="background-image: url('assets/img/articles/<?= $a->image ?>')"></div>
            <div class="articleBottom">
                <h2><?= $a->title ?></h2>
                <p>
                    <b>Ecrit par :</b> <?= $a->username ?><br>
                    <b>Catégorie :</b> <?= $a->category ?><br>
                    <b>Publié :</b> <?= $a->publicationDateFr ?><br>
                    <b>Mis à jour :</b> <?= $a->updateDateFr ?>
                </p>
                <p>
                    <?= strip_tags($a->content) ?>...
                </p>
                <a href="/article-<?= $a->id ?>" class="cta">Lire la suite</a>
            </div>
        </div>
    <?php } ?>
</div>