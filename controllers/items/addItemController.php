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
if(empty($_SESSION['user'])) {
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

    // a continuer
    
    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $article->title = clean($_POST['title']);
        } else {
            $errors['title'] = ARTICLE_TITLE_ERROR_INVALID;
        }
    } else {
        $errors['title'] = ARTICLE_TITLE_ERROR_EMPTY;
    }

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $article->content = trim($_POST['content']);
        } else {
            $errors['content'] = ARTICLE_CONTENT_ERROR_INVALID;
        }
    } else {
        $errors['content'] = ARTICLE_CONTENT_ERROR_EMPTY;
    }

    if (!empty($_FILES['image'])) {
        $imageMessage = checkImage($_FILES['image']);

        if ($imageMessage != '') {
            $errors['image'] = $imageMessage;
        } else {
            $article->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            while(file_exists('../../assets/img/articles/' . $article->image)) {
                $article->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            }
        }
    }

    if (!empty($_POST['categories'])) {
        $articleCategories->id = $_POST['categories'];
        if ($articleCategories->checkIfExistsById() == 1) {
            $article->id_articlesCategories = clean($_POST['categories']);
        } else {
            $errors['categories'] = ARTICLE_CATEGORIES_ERROR_INVALID;
        }
    } else {
        $errors['categories'] = ARTICLE_CATEGORIES_ERROR_EMPTY;
    }

    if(empty($errors)) {
        $article->id_users = $_SESSION['user']['id'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/articles/' . $article->image)) {
            if($article->create()){
                $success = ARTICLE_ADD_SUCCESS;
            } else {
                unlink('../../assets/img/articles/' . $article->image);
                $errors['add'] = ARTICLE_ADD_ERROR;
            }
        } else {
            $errors['add'] = ARTICLE_ADD_ERROR;
        }

    }
}

// Requires vues
require_once '../../views/parts/header.php';
require_once '../../views/items/addItem.php';
require_once '../../views/parts/footer.php';
