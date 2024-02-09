<!-- L'utilisateur modifiera ou  supprimera son compte  par ce formulaire -->
<section>
    <h1>Modifier ma cabane</h1>

    <?php if (isset($success)) { ?>
        <p><?= $success ?></p>
    <?php } ?>


    <!-- UPDATE ITEM -->
    <?php if (isset($errors['updateItem'])) { ?>
        <p><?= $errors['updateItem'] ?></p>
    <?php } ?>
    <div>
        <form action="/modifier-item" method="post" enctype="multipart/form-data">

            <label for="image">Image de la cabane</label>
            <input type="file" name="image" id="image" value="<?= $itemDetails->image ?>">
            <?php if (isset($errors['image'])) { ?>
                <p><?= $errors['image'] ?></p>
            <?php } ?>

            <label for="hut">Nom de la cabane</label>
            <input type="text" name="hut" id="hut" value="<?= $itemDetails->hut ?>">
            <?php if (isset($errors['hut'])) { ?>
                <p><?= $errors['hut'] ?></p>
            <?php } ?>


            <label for="categories">Catégorie de la cabane</label>


            <select name="categories" id="categories">
                <option selected disabled>Choisissez une catégorie</option>
                <?php foreach ($categoriesList as $c) { ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                <?php } ?>
            
            <?php if (isset($errors['categories'])) { ?>
                <p><?= $errors['categories'] ?></p>
            <?php } ?>

            <label for="description">Description de la cabane</label>
            <textarea name="description" id="description">value="<?= $itemDetails->description ?>"</textarea>
            <?php if (isset($errors['description'])) { ?>
                <p><?= $errors['description'] ?></p>
            <?php } ?>

            <input type="submit" value="Modifier" name="updateItem">
        </form>
    </div>
</section>