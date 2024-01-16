<section>
    <h1>Inscription</h1>
    <?php if (isset($success)) { ?>
        <p><?= $success ?></p>
    <?php } ?>
    <form action="/inscription" method="post">

        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" id="lastname" placeholder="Dupont">
        <?php if (isset($errors['lastname'])) { ?>
            <p><?= $errors['lastname'] ?></p>
        <?php } ?>

        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname" placeholder="Jean">
        <?php if (isset($errors['firstname'])) { ?>
            <p><?= $errors['firstname'] ?></p>
        <?php } ?>

        <label for="address">Adresse :</label>
        <input type="text" name="address" id="address" placeholder="5 rue de la republique">
        <?php if (isset($errors['address'])) { ?>
            <p><?= $errors['address'] ?></p>
        <?php } ?>

        <label for="zipCode">Code postal :</label>
        <input type="text" name="zipCode" id="zipCode" placeholder="75000">
        <?php if (isset($errors['zipCode'])) { ?>
            <p><?= $errors['zipCode'] ?></p>
        <?php } ?>

        <label for="city">Ville :</label>
        <input type="text" name="city" id="city" placeholder="PARIS">
        <?php if (isset($errors['city'])) { ?>
            <p><?= $errors['city'] ?></p>
        <?php } ?>

        <label for="phoneNumber">Numéro de téléphone :</label>
        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="06 00 00 00 00">
        <?php if (isset($errors['phoneNumber'])) { ?>
            <p><?= $errors['phoneNumber'] ?></p>
        <?php } ?>

        <label for="email">Adresse mail :</label>
        <input type="email" name="email" id="email" placeholder="jean.dupont@gmail.com">
        <?php if (isset($errors['email'])) { ?>
            <p><?= $errors['email'] ?></p>
        <?php } ?>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Azerty123!">
        <?php if (isset($errors['password'])) { ?>
            <p><?= $errors['password'] ?></p>
        <?php } ?>

        <label for="password_confirm">Confirmation du mot de passe :</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Azerty123!">
        <?php if (isset($errors['password_confirm'])) { ?>
            <p><?= $errors['password_confirm'] ?></p>
        <?php } ?>

        <input type="submit" value="S'inscrire">
    </form>
</section>