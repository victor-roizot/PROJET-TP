<?php
// Requires vues
require_once '../../models/itemsModel.php';
require_once '../../models/categoriesModel.php';
require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}

/**
 * Ici je contrôle que l'utilisateur a le bon rôle pour accéder à la page car seul les administrateurs peuvent y accéder.
 * J'utilise la variable $_SESSION['user']['role'] qui a été créée lors de la connexion.
 * S'il n'a pas accès à cette page, je renvoie l'utilisateur vers sa page de profil.
 */
if ($_SESSION['user']['id_usersRoles'] != 255) {
    header('Location: /list-cabane');
    exit;
}

// Vérification si la exite sinon renvoie vers la liste des cabane
$item = new Items();

// Récupère la classe categories
$categories = new categories();

// Récupère la classe utilisateur
$user = new Users;

// récupère le id de l'utilisateur par session
$user->id = $_SESSION['user']['id'];

// récupère le id  par le URL
$item->id = $_GET['id'];



// vérifie s'il existe sinon renvoie vers les cabanes
if ($item->checkIfExists() == 0) {
    header('Location: /list-cabanes');
    exit;
}

// Récupère les informations du item par son id
$itemDetails = $item->getById();

// Récupère les informations de l'utilisateur par son id
$userAccount = $user->getById();

// Récupère la  liste de toute les catégories 
$categoriesList = $categories->getList();

// Vérification du formulaire en post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // UPDATE ITEM
    if (isset($_POST['updateItem'])) {

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
                if ($item->updateItem()) {
                    unlink('../../assets/img/items/' . $itemDetails->image);
                    $success = ITEM_UPDATE_SUCCESS;
                } else {

                    // Sinon je supprime l'image avec des messages d'erreur
                    unlink('../../assets/img/items/' . $item->image);
                    $errors['updateItem'] = ITEM_UPDATE_ERROR;
                }
            } else {
                $errors['updateItem'] = ITEM_UPDATE_ERROR;
            }
        }
    }
}
var_dump($errors);

/**
 * Je supprime l'item
 * Je redirige l'administrateur vers la page des listes items header('Location: /connexion')
 * Je termine le script avec exit
 */
if (isset($_POST['delete'])) {
    if ($item->delete()) {
        unlink('../../assets/img/items/' . $itemDetails->image);
        header('Location: /list-cabane');
        exit;
    }
}
var_dump($_POST);
// Recharge les informations du item par son id
$itemDetails = $item->getById();

// Requires vues
require_once '../../views/parts/header.php';
require_once '../../views/items/updateItem.php';
require_once '../../views/parts/footer.php';
