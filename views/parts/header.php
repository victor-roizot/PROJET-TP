<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP</title>
    <link rel="shortcut icon" href="../../assets/img/lambda half life.jpg">
    <link rel="stylesheet" href="../../assets/css/style.min.css">
</head>

<body>
    <nav>
        <ul>

            <li><a href="/">Accueil</a></li>
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a href="/inscription">inscription</a></li>
                <li><a href="/connexion">Connexion</a></li>
            <?php } else { ?>
                <li><a href="/mon-compte"><?= $_SESSION['user']['lastname'] // .' '. $_SESSION['user']['firstname'] ?></a></li>
                <?php if ($_SESSION['user']['id_usersroles'] == 255) { ?>
                    <li><a href="/dashboard">Admin</a></li>
                <?php } ?>
                <li><a href="/deconnexion">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <main>