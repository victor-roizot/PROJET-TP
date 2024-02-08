<?php
// Requires vues
require_once '../../models/itemsModel.php';
require_once '../../models/categoriesModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté sinon renvoie vers la connexion
if (empty($_SESSION['user'])) {
    header('Location: /connexion');
    exit();
}

// Récupère la classe Items (cabanes)
$item = new Items();

// Récupère la classe categories
$categories = new categories();

// Récupère la  liste de toute les catégories 
$categoriesList = $categories->getList();

// Vérification du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Je vérifie que les champs ne sont pas vides
    if (!empty($_POST['hut'])) {

        //Je vérifie que hut est valide
        if (preg_match($regex['hut'], $_POST['hut'])) {

            // Et je le stocke dans une variable
            $item->hut = clean($_POST['hut']);
        } else {

            // Sinon, je remplis mon tableau d'erreurs
            $errors['hut'] = ITEM_TITLE_ERROR_INVALID;
        }
    } else {
        $errors['hut'] = ITEM_TITLE_ERROR_EMPTY;
    }


    //Je vérifie pour tous les autres champs de la même manière.
    if (!empty($_FILES['image'])) {
        $imageMessage = checkImage($_FILES['image']);

        if ($imageMessage != '') {
            $errors['image'] = $imageMessage;
        } else {
            $item->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            // Je fais une boucle pour vérifier que  le fichier existe pas
            while (file_exists('../../assets/img/items/' . $item->image)) {

                // Sinon il reçoit un id unique
                $item->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            }
        }
    }


    if (!empty($_POST['description'])) {
        if (!preg_match($regex['description'], $_POST['description'])) {
            $item->description = clean($_POST['description']);
        } else {
            $errors['description'] = ITEM_DESCRIPTION_ERROR_INVALID;
        }
    } else {
        $errors['description'] = ITEM_DESCRIPTION_ERROR_EMPTY;
    }


    if (!empty($_POST['categories'])) {
        $categories->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) {
            $item->id_categories = clean($_POST['categories']);
        } else {
            $errors['categories'] = CATEGORIES_ERROR_INVALID;
        }
    } else {
        $errors['categories'] = CATEGORIES_ERROR_EMPTY;
    }

    // Si je n'ai aucune erreur
    if (empty($errors)) {

        // Si l'image s'enregistre
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/items/' . $item->image)) {

            // Je crée la cabane et un message de succès.
            if ($item->create()) {
                $success = ITEM_ADD_SUCCESS;
            } else {

                // Sinon je supprime l'image avec des messages d'erreur
                unlink('../../assets/img/items/' . $item->image);
                $errors['itemAdd'] = ITEM_ADD_ERROR;
            }
        } else {
            $errors['itemAdd'] = ITEM_ADD_ERROR;
        }
    }
}

// Requires vues
require_once '../../views/parts/header.php';
require_once '../../views/items/addItem.php';
require_once '../../views/parts/footer.php';
