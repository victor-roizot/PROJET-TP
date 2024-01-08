<?php
// REGEX
$regex = [
    'name' => '/^[A-zÄ-ÿ]{1,}([ \'-]{1}[A-zÄ-ÿ]{1,}){0,}$/',
    'address' => '/^([0-9]{1,4}( ?[a-z]{1,})?, )?([A-zÄ-ÿ0-9]){2,}([- ]{1}[A-zÄ-ÿ0-9]{1,}){1,}$/',
    'zipCode' => '/^(([0-8]{1}[0-9]{1})|(9[0-5]{1}))[0-9]{3}$/',
    'city' => '/^[A-zÄ-ÿ]{1,}([ \'-]{1}[A-zÄ-ÿ]{1,}){0,}$/',
    'phoneNumber' => '/(^0[1-79]){1}( [0-9]{2}){4}$/',
    'date' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/',
];

// MESSAGES D'ERREUR
define('USERS_LASTNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est requis');
define('USERS_LASTNAME_ERROR_INVALID', 'Le nom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');

define('USERS_FIRSTNAME_ERROR_EMPTY', 'Le prénom de l\'utilisateur est requis');
define('USERS_FIRSTNAME_ERROR_INVALID', 'Le prénom de l\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');

define('USERS_ADDRESS_ERROR_EMPTY', 'L\'adresse de l\'utilisateur est requis');
define('USERS_ADDRESS_ERROR_INVALID', 'L\'adresse de l\'utilisateur est invalide. Il ne peut contenir que des lettres,des chiffres, des espaces, des tirets et des lettres accentuées');

define('USERS_ZIPCODE_ERROR_EMPTY', 'Le code postal de l\'utilisateur est requis');
define('USERS_ZIPCODE_ERROR_INVALID', 'Le code postal de l\'utilisateur est invalide. Il ne peut contenir que des chiffres');

define('USERS_CITY_ERROR_EMPTY', 'La ville de l\'utilisateur est requis');
define('USERS_CITY_ERROR_INVALID', 'La ville de l\'utilisateur est invalide. Il ne peut contenir que des lettres,des chiffres, des espaces, des tirets et des lettres accentuées');

define('USERS_PHONENUMBER_ERROR_EMPTY', 'Le numéro de l\'utilisateur est requis');
define('USERS_PHONENUMBER_ERROR_INVALID', 'Le numéro de l\'utilisateur est invalide. Il ne peut contenir que des chiffres, des tirets et des caractères spéciaux');
define('USERS_PHONENUMBER_ERROR_EXISTS', 'Le numéro de téléphone existe déjà');

define('USERS_EMAIL_ERROR_EMPTY', 'L\'adresse email est requise');
define('USERS_EMAIL_ERROR_INVALID', 'L\'adresse email est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_EMAIL_ERROR_EXISTS', 'L\'adresse email existe déjà');

define('USERS_PASSWORD_ERROR_EMPTY', 'Le mot de passe est requis');
define('USERS_PASSWORD_ERROR_INVALID', 'Le mot de passe est invalide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');
define('USERS_PASSWORD_CONFIRM_ERROR_INVALID', 'La confirmation du mot de passe est invalide. Les mots de passe ne correspondent pas');
define('USERS_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est requise');
