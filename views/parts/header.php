<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackwood</title>
    <link rel="shortcut icon" href="../../assets/img/_e7ee94ed-7b05-44d4-8dbe-fafed355417b.jpg">
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
            <a href="/accueil"><img id="logo" src="../../assets/img/_e7ee94ed-7b05-44d4-8dbe-fafed355417b.jpg" alt="Logo"></a>
            <h1 id="name"> Blackwook</h1>
        </div>
        <ul>
            <li><a href="/accueil" class=lien>Accueil</a></li>
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a href="/inscription" class=lien>inscription</a></li>
                <li><a href="/connexion" class=lien>Connexion</a></li>
            <?php } else { ?>
                <li><a href="/mon-compte" class="lien"><?= $_SESSION['user']['lastname'] ?></a></li>
                <?php if ($_SESSION['user']['id_usersRoles'] == 255) { ?>
                    <li><a href="/dashboard" class=lien>Admin</a></li>
                <?php } ?>
                <li><a href="/deconnexion" class=lien>Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <main class="container">