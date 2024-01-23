<?php
// Requires
require_once '../../models/usersModel.php';
require_once '../../utils/messages.php';
require_once '../../utils/regex.php';
require_once '../../utils/functions.php';

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}
// Affichage du profil des utilisateurs
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

// modif infos
if (isset($_POST['updateAdress'])) {

    if (!empty($_POST['address'])) {
        if (preg_match($regex['address'], $_POST['address'])) {
            $user->address = clean($_POST['address']);
            if ($user->checkIfExistsByUserAddress() == 1 && $user->address != $_SESSION['user']['address']) {
                $errors['address'] = USERS_ADDRESS_ERROR_EXISTS;
            }
        } else {
            $errors['address'] = USERS_ADDRESS_ERROR_INVALID;
        }
    } else {
        $errors['address'] = USERS_ADDRESS_ERROR_EMPTY;
    }

    if (!empty($_POST['zipCode'])) {
        if (preg_match($regex['zipCode'], $_POST['zipCode'])) {
            $user->zipCode = strip_tags($_POST['zipCode']);
            if ($user->checkIfExistsByUserZipCode() == 1 && $user->zipCode != $_SESSION['user']['zipCode']) {
                $errors['zipCode'] = USERS_ZIPCODE_ERROR_EXISTS;
            }
        } else {
            $errors['zipCode'] = USERS_ZIPCODE_ERROR_INVALID;
        }
    } else {
        $errors['zipCode'] = USERS_ZIPCODE_ERROR_EMPTY;
    }

    if (!empty($_POST['city'])) {
        if (preg_match($regex['city'], $_POST['city'])) {
            $user->city = clean($_POST['city']);
            if (
                $user->checkIfExistsByUserCity() == 1 &&
                $user->city != $_SESSION['user']['city']
            ) {
                $errors['city'] = USERS_CITY_ERROR_EXISTS;
            }
        } else {
            $errors['city'] = USERS_CITY_ERROR_INVALID;
        }
    } else {
        $errors['city'] = USERS_CITY_ERROR_EMPTY;
    }

    if (empty($errors)) {
        if ($user->updateAdress()) {
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
if (isset)
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


if (isset($_POST['deleteAccount'])) {
    if ($user->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /compte-supprime');
        exit;
    }
}


require_once '../../views/parts/header.php';
require_once '../../views/users/updateAccount.php';
require_once '../../views/parts/footer.php';
