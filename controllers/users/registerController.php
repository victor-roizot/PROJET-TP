<?php
require_once '../../models/usersModel.php';
require_once '../errors/errors_users.php';
require_once '../functions.php';

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new Users();

    if (!empty($_POST['lastname'])) {
        if (preg_match($regex['name'], $_POST['lastname'])) {
            $user->lastname = clean($_POST['lastname']);
            if ($user->checkIfExistsByLastname() == 1) {
                $errors['lastname'] = USERS_LASTNAME_ERROR_EXISTS;
            }
        } else {
            $errors['lastname'] = USERS_LASTNAME_ERROR_INVALID;
        }
    } else {
        $errors['lastname'] = USERS_LASTNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($regex['name'], $_POST['firstname'])) {
            $user->firstname = clean($_POST['firsname']);
        } else {
            $errors['firstname'] = USERS_FIRSTNAME_ERROR_INVALID;
        }
    } else {
        $errors['firsname'] = USERS_FIRSTNAME_ERROR_EMPTY;
    }


    //rajout  address zipCode city

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = clean($_POST['email']);
            if ($user->checkIfExistsByEmail() == 1) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

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

    /*    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['date'], $_POST['birthdate'])) {
            if (checkDateValidity($_POST['birthdate'])) {
                $user->birthdate = $_POST['birthdate'];
            } else {
                $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
            }
        } else {
            $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
        }
    } else {
        $errors['birthdate'] = USERS_BIRTHDATE_ERROR_EMPTY;
    }
    */
    if (empty($errors)) {
        if ($user->createUser()) {
            $success = 'L\'utilisateur a bien été créé';
        }
    }
}

require_once '../../views/parts/header.php';
require_once '../../views/users/register.php';
require_once '../../views/parts/footer.php';
