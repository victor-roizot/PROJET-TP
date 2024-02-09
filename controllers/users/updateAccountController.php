<?php
// Requires
require_once '../../models/usersModel.php';
require_once '../../utils/messages.php';
require_once '../../utils/regex.php';
require_once '../../utils/functions.php';

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté sinon renvoie vers la connexion
if (!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}
// Affichage du profil des utilisateurs
$user = new Users;
$user->id = $_SESSION['user']['id'];
// Récupère les informations de l'utilisateur par son id
$userAccount = $user->getById();

// Vérification du formulaire en post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // UPDATE ADDRESS (Address + Zipcode + City)
    if (isset($_POST['updateAddress'])) {
        //Je vérifie que les champs ne sont pas vides
        if (!empty($_POST['address'])) {
            //Je vérifie que address est valide
            if (preg_match($regex['address'], $_POST['address'])) {
                // Et je le stocke dans une variable
                $user->address = clean($_POST['address']);
                if
                //Je vérifie que adress existe et correspond a l'utilisateur
                ($user->checkIfExistsByUserAddress() == 1 && $user->address != $_SESSION['user']['address']) {
                    $errors['address'] = USERS_ADDRESS_ERROR_EXISTS;
                }
            } else {
                // Sinon, je remplis mon tableau d'erreurs
                $errors['address'] = USERS_ADDRESS_ERROR_INVALID;
            }
        } else {
            $errors['address'] = USERS_ADDRESS_ERROR_EMPTY;
        }

        //Je vérifie pour tous les autres champs de la même manière.
        if (!empty($_POST['zipCode'])) {
            if (preg_match($regex['zipCode'], $_POST['zipCode'])) {
                $user->zipCode = strip_tags($_POST['zipCode']);
            } else {
                $errors['zipCode'] = USERS_ZIPCODE_ERROR_INVALID;
            }
        } else {
            $errors['zipCode'] = USERS_ZIPCODE_ERROR_EMPTY;
        }

        if (!empty($_POST['city'])) {
            if (preg_match($regex['city'], $_POST['city'])) {
                $user->city = clean($_POST['city']);
            } else {
                $errors['city'] = USERS_CITY_ERROR_INVALID;
            }
        } else {
            $errors['city'] = USERS_CITY_ERROR_EMPTY;
        }
        // Si je n'ai aucune erreur
        if (empty($errors)) {
            // Je modifie l'utilisateur et un message de succès.
            if ($user->updateAddress()) {
                $_SESSION['user']['address'] = $user->address;
                $_SESSION['user']['zipCode'] = $user->zipCode;
                $_SESSION['user']['city'] = $user->city;
                $success = USERS_UPDATE_SUCCESS;
            } else {
                $errors['update'] = USERS_UPDATE_ERROR;
            }
        }
    }


    // UPDATE PHONENUMBER
    // Je répète  les mêmes étapes pour chaque champs
    if (isset($_POST['phoneNumber'])) {

        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($regex['phoneNumber'], $_POST['phoneNumber'])) {
                $user->phoneNumber = clean($_POST['phoneNumber']);
                if ($user->checkIfExistsByPhoneNumber() == 1 && $user->phoneNumber != $_SESSION['user']['phoneNumber']) {
                    $errors['phoneNumber'] = USERS_PHONENUMBER_ERROR_EXISTS;
                }
            } else {
                $errors['phoneNumber'] = USERS_PHONENUMBER_ERROR_INVALID;
            }
        } else {
            $errors['phoneNumber'] = USERS_PHONENUMBER_ERROR_EMPTY;
        }

        if (empty($errors)) {
            if ($user->updatephoneNumber()) {
                $_SESSION['user']['phoneNumber'] = $user->phoneNumber;
                $success = USERS_UPDATE_SUCCESS;
            } else {
                $errors['update'] = USERS_UPDATE_ERROR;
            }
        }
    }


    // UPDATE EMAIL
    if (isset($_POST['email'])) {

        if (!empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user->email = clean($_POST['email']);
                if ($user->checkIfExistsByEmail() == 1 && $user->email != $_SESSION['user']['email']) {
                    $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
                }
            } else {
                $errors['email'] = USERS_EMAIL_ERROR_INVALID;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
        }

        if (empty($errors)) {
            if ($user->updateEmail()) {
                $_SESSION['user']['email'] = $user->email;
                $success = USERS_UPDATE_SUCCESS;
            } else {
                $errors['update'] = USERS_UPDATE_ERROR;
            }
        }
    }


    // UPDATE PASSWORD
    if (isset($_POST['updatePassword'])) {

        if (!empty($_POST['password'])) {
            if (preg_match($regex['password'], $_POST['password'])) {
                if (!empty($_POST['password_confirm'])) {
                    if ($_POST['password'] == $_POST['password_confirm']) {
                        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    } else {
                        $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_INVALID;
                    }
                } else {
                    $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_EMPTY;
                }
            } else {
                $errors['password'] = USERS_PASSWORD_ERROR_INVALID;
            }
        } else {
            $errors['password'] = USERS_PASSWORD_ERROR_EMPTY;
        }

        if (empty($errors)) {
            if ($user->updatePassword()) {
                $success = USERS_PASSWORD_UPDATE_SUCCESS;
            } else {
                $errors['update'] = USERS_PASSWORD_UPDATE_ERROR;
            }
        }
    }
}

/**
 * Pour supprimer l'utilisateur, je supprime la variable user avec la fonction delete (méthode créée dans le  usersModel) et je redirige l'utilisateur vers la page de connexion.
 * Je détruis ma variable $_SESSION avec unset($_SESSION)
 * Je détruis la session avec session_destroy()
 * Je redirige l'utilisateur vers la page de connexion avec header('Location: /connexion')
 * Je termine le script avec exit
 */
if (isset($_POST['deleteAccount'])) {
    if ($user->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /compte-supprime');
        exit;
    }
}

//Les 3 require des vues ou parties de vue sont inséparables et toujours à la fin parce que c'est l'affichage du résultat final des actions du contrôleur

require_once '../../views/parts/header.php';
require_once '../../views/users/updateAccount.php';
require_once '../../views/parts/footer.php';
