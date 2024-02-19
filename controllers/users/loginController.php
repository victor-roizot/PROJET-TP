<?php
// Requires
require_once '../../models/usersModel.php';
require_once '../../utils/messages.php';
require_once '../../utils/regex.php';
require_once '../../utils/functions.php';

// Démarrage de la session
session_start();

// Vérification si la personne est connectée. Si oui, je la redirige vers la page mon-compte

if (isset($_SESSION['user'])) {
    header('Location: /mon-compte');
    exit;
}

// Si le formulaire a été envoyé en POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new Users();
    //Je vérifie que les champs ne sont pas vides
    if (!empty($_POST['email'])) {
        //Je vérifie que l'email est valide
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Et je le stocke dans une variable
            $user->email = $_POST['email'];

            if (!$user->checkIfExistsByEmail()) {
                $errors['email'] = $errors['password'] = USERS_LOGIN_ERROR;
            } else {
                $user->password = $user->getPassword();
            }
        } else {
            // Sinon, je remplis mon tableau d'erreurs
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = USERS_PASSWORD_ERROR_EMPTY;
    }

    // Si je n'ai aucune erreur
    if (empty($errors)) {
        // Vérification que l'email et le mot de passe correspondent à ceux stockés dans le tableau. S'il y a une erreur, je ne précise pas si c'est l'email ou le mot de passe qui est incorrect.
        if (!password_verify($password, $user->password)) {
            $errors['emailLogin'] = $errors['password'] = USERS_LOGIN_ERROR;
        } else {
            // Si ma case "Se souvenir de moi" est cochée, je crée un cookie qui contient l'email et le mot de passe de l'utilisateur. Le cookie sera valable 60 secondes et accessible depuis tout le site.
            if (isset($_POST['remember'])) {
                setcookie('email', $user->email, time() + 60, '/');
                setcookie('password', $password, time() + 60, '/');
            }

            /**
             * Dans tous les cas, si les informations sont correctes, je crée une session qui contient les informations de l'utilisateur.
             * Ca me permettra de savoir si l'utilisateur est connecté ou non en vérifiant si la session existe ou non.
             * Je peux aussi stocker l'id de l'utilisateur dans la session pour pouvoir faire des requêtes SQL avec.
             * Ou vérifier s'il a le bon rôle pour accéder à certaines pages.
             */
            $_SESSION['user'] = $user->getInfosByEmail();
            $_SESSION['user']['email'] = $_POST['email'];
            header('Location: /mon-compte');
            exit;
        }
    }
}

//Les 3 require des vues ou parties de vue sont inséparables et toujours à la fin parce que c'est l'affichage du résultat final des actions du contrôleur

require_once '../../views/parts/header.php';
require_once '../../views/users/login.php';
require_once '../../views/parts/footer.php';
