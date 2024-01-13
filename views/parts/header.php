<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP</title>
    <link rel="shortcut icon" href="../../assets/img/lambda half life.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--<link rel="stylesheet" href="../../assets/css/style.min.css">-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <nav>
        <div>
            <a href="#"><img id="logo" src="../../assets/img/lambda half life.jpg" alt="Logo"></a>
            <h1 id="name"> Blackwook</h1>
        </div>
        <ul>
            <li><a href="/">Accueil</a></li>
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a href="/inscription">inscription</a></li>
                <li><a href="/connexion">Connexion</a></li>
            <?php } else { ?>
                <li><a href="/mon-compte"><?= $_SESSION['user']['lastname']
                                            ?></a></li>
                <?php if ($_SESSION['user']['id_usersroles'] == 255) { ?>
                    <li><a href="/dashboard">Admin</a></li>
                <?php } ?>
                <li><a href="/deconnexion">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <main>