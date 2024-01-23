<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackwook</title>
    <link rel="shortcut icon" href="../../assets/img/lambda half life.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <script src="https://cdn.tiny.cloud/1/802nxm0o8zeejebmjzdtlfkaz62n2sdyg3af8osc5o65c7sm/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>
</head>

<body>
    <nav>
        <div>
            <a href="/accueil"><img id="logo" src="../../assets/img/lambda half life.jpg" alt="Logo"></a>
            <h1 id="name"> Blackwook</h1>
        </div>
        <ul>
            <li><a class="lien" href="/accueil">Accueil</a></li>
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a class="lien" href="/inscription">inscription</a></li>
                <li><a class="lien" href="/connexion">Connexion</a></li>
            <?php } else { ?>
                <li><a class="lien" href="/mon-compte"><?= $_SESSION['user']['lastname']
                                                        ?></a></li>
                <?php if ($_SESSION['user']['id_usersRoles'] == 255) { ?>
                    <li><a class="lien" href="/dashboard">Admin</a></li>
                <?php } ?>
                <li><a class="lien" href="/deconnexion">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <main class="container">