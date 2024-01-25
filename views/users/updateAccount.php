<h1>Modifier mon compte</h1>

<?php if (isset($success)) { ?>
    <p><?= $success ?></p>
<?php } ?>

<!-- UPDATE ADDRESS -->
<?php if (isset($errors['updateAddress'])) { ?>
    <p><?= $errors['updateAddress'] ?></p>
<?php } ?>
<div>
    <form action="/modifier-mon-compte" method="post">
        <h2>Modifier mon adresse</h2>
        <label for="address">Mon adresse</label>
        <input type="text" name="address" id="address" placeholder="5 rue de la republique" value="<?= $userAccount->address ?>">
        <?php if (isset($errors['address'])) { ?>
            <p><?= $errors['address'] ?></p>
        <?php } ?>

        <label for="zipCode">Mon code postal</label>
        <input type="text" name="zipCode" id="zipCode" placeholder="75000" value="<?= $userAccount->zipCode ?>">
        <?php if (isset($errors['zipCode'])) { ?>
            <p><?= $errors['zipCode'] ?></p>
        <?php } ?>

        <label for="city">Ma ville</label>
        <input type="text" name="city" id="city" placeholder="PARIS" value="<?= $userAccount->city ?>">
        <?php if (isset($errors['city'])) { ?>
            <p><?= $errors['city'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updateAddress">
    </form>
</div>

<!-- UPDATE PHONENUMBER -->
<!-- UPDATE EMAIL -->

<!-- UPDATE PASSWORD -->
<?php if (isset($errors['updatePassword'])) { ?>
    <p><?= $errors['updatePassword'] ?></p>
<?php } ?>

<div class="formContainer">
    
    <form action="/modifier-mon-compte" method="POST">
        <h2>Modifier mon mot de passe</h2>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Azerty123!">
        <?php if (isset($errors['password'])) { ?>
            <p><?= $errors['password'] ?></p>
        <?php } ?>

        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Azerty123!">
        <?php if (isset($errors['password_confirm'])) { ?>
            <p><?= $errors['password_confirm'] ?></p>
        <?php } ?>
        <input type="submit" value="Modifier" name="updatePassword">

    </form>
</div>
