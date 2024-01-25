<?php
class Users
{
    public int $id;
    public string $lastname;
    public string $firstname;
    public string $address;
    public int $zipCode;
    public string $city;
    public string $phoneNumber;
    public string $email;
    public string $password;
    public int $id_usersRoles;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projet_tp;charset=utf8', 'Neo512Mo', '26qJq2Sqb=28C[');
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }


    /**
     * Vérifie si un utilisateur existe dans la base de données avec l'adresse
     * @param string $address l'adresse'
     * @return bool
     */
    public function checkIfExistsByUserAddress()
    {
        $sql = 'SELECT COUNT(`address`) FROM `hubx02_users` WHERE `address` = :address';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':address', $this->address, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    

        /**
     * Vérifie si un utilisateur existe dans la base de données avec le code postal
     * @param string $ZipCode le code postal
     * @return bool
     */
    public function checkIfExistsByUserZipCode()
    {
        $sql = 'SELECT COUNT(`zipCode`) FROM `hubx02_users` WHERE `zipCode` = :zipCode';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':zipCode', $this->zipCode, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    

    /**
     * Vérifie si un utilisateur existe dans la base de données avec la ville
     * @param string $city la ville
     * @return bool
     */
    public function checkIfExistsByUserCity()
    {
        $sql = 'SELECT COUNT(`city`) FROM `hubx02_users` WHERE `city` = :city';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':city', $this->city, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }


    /**
 * Vérifie si un utilisateur existe dans la base de données avec le numéro de téléphone
 * @param string $phoneNumber le numéro de téléphone
 * @return bool
 */
public function checkIfExistsByPhoneNumber()
{
    $sql = 'SELECT COUNT(`phoneNumber`) FROM `hubx02_users` WHERE `phoneNumber` = :phoneNumber';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_COLUMN);
}


    /**
     * Vérifie si un utilisateur existe dans la base de données avec l'email
     * @param string $email L'adresse email
     * @return bool
     */
    public function checkIfExistsByEmail()
    {
        $sql = 'SELECT COUNT(`email`) FROM `hubx02_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }


    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $lastname Le nom d'utilisateur
     * @param string $firstname Le prénom d'utilisateur
     * @param string $address L'adresse de l'utilisateur
     * @param int $zipCode Le code postal de l'utilisateur
     * @param string $city La ville de l'utilisateur
     * @param string $phoneNumber Le numéro de téléphone de l'utilisateur
     * @param string $email L'adresse email de l'utilisateur
     * @param string $password Le mot de passe hashé de l'utilisateur
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `hubx02_users` (`lastname`,`firstname`,`address`,`zipCode`,`city`,`phoneNumber`,`email`,`password`,`id_usersRoles`) 
        VALUES (:lastname,:firstname,:address,:zipCode,:city,:phoneNumber,:email,:password,1)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':address', $this->address, PDO::PARAM_STR);
        $req->bindValue(':zipCode', $this->zipCode, PDO::PARAM_INT);
        $req->bindValue(':city', $this->city, PDO::PARAM_STR);
        $req->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * INSERT INTO `hubx02_users` (`lastname`,`firstname`,`address`,`zipCode`,`city`,`phoneNumber`,`email`,`password`,`id_usersRoles`) 
     *VALUES ('lastname','firstname','50 rue de paris',75000,'PARIS','06 00 00 00 00','test@gmail.com','Pizza123!', 1);
     */


    /**
     * Supprime un utilisateur selon son id
     * @param int $id L'id de l'utilisateur à supprimer
     * @return bool
     */
    public function delete()
    {
        $sql =  'DELETE FROM `hubx02_users` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /**  requete test dans PHP MySQL
     * DELETE FROM `hubx02_users` WHERE `id` = 3;
     */


    /**
     * Récupère les informations d'un utilisateur dans la base de données avec son id
     * @param int $id L'id de l'utilisateur qui nous permettra de récupérer ses informations
     * @return object Les informations de l'utilisateur
     */
    public function getById()
    {
        $sql = 'SELECT `lastname`, `firstname`, `email`, `phoneNumber`, `name` AS `roleName`
            FROM `hubx02_users`
            INNER JOIN `hubx02_usersRoles` ON `id_usersRoles` = `hubx02_usersRoles`.`id`
            WHERE`hubx02_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }
    /** requete test dans PHP MySQL
     * SELECT `lastname`, `firstname`, `email`, `phoneNumber`, `name` AS `roleName`
     *  FROM `hubx02_users`
     * INNER JOIN `hubx02_usersRoles` ON `id_usersRoles` = `hubx02_usersRoles`.`id`
     * WHERE`hubx02_users`.`id` = 1;
     */


    /**
     * Récupère les informations d'un utilisateur dans la base de données avec son adresse email
     * @param string $email L'adresse email de l'utilisateur qui nous permettra de récupérer ses informations
     * @return array Les informations de l'utilisateur
     */
    public function getInfosByEmail()
    {
        $sql = 'SELECT `id`, `lastname`, `firstname`, `address`, `id_usersRoles` FROM `hubx02_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    /** requete test dans PHP MySQL
     * SELECT `id`, `lastname`, `firstname`, `id_usersRoles` FROM `hubx02_users` WHERE `email` = 'jean.dupont@gmail.com';
     */


    /**
     * Récupère le mot de passe hashé d'un utilisateur dans la base de données. 
     * On l'utilisera pour vérifier avec la fonction password_verify que le mot de passe saisi par l'utilisateur correspond bien à celui stocké dans la base de données.
     * @param string $email L'adresse email de l'utilisateur qui nous permettra de récupérer son mot de passe
     * @return string Le mot de passe hashé
     */
    public function getPassword()
    {
        $sql = 'SELECT `password` FROM `hubx02_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

// REFAIRE LES COMMENTAIRES DES UPDATES
    /**
     * Met à jour le nom de l'utilisateur, l'adresse email et la date de naissance
     * @param string $username Le nom de l'utilisateur
     * @param string $email L'adresse email de l'utilisateur
     * @param string $birthda La date de naissance de l'utilisateur
     * @param int $id L'id de l'utilisateur à modifier
     * @return bool
     */
    public function updateAddress()
    {
        $sql = 'UPDATE `hubx02_users` SET `address` = :address, `zipCode` = :zipCode, `city` = :city WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':address', $this->address, PDO::PARAM_STR);
        $req->bindValue(':zipCode', $this->zipCode, PDO::PARAM_INT);
        $req->bindValue(':city', $this->city, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * UPDATE `hubx02_users` SET `address` = '10 rue de paris', `zipCode` = 75001, `city` = 'PARISS' WHERE `id`= 4;
     */


    /**
     * Met à jour le mot de passe de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @param int $id L'id de l'utilisateur à modifier
     * @return bool
     */
    public function updatePhoneNumber()
    {
        $sql = 'UPDATE `hubx02_users` SET `phoneNumber` = :phoneNumber WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * UPDATE `hubx02_users` SET `phoneNumber` = '06 00 00 00 04' WHERE `id`= 4;
     */


    /**
     * Met à jour le mot de passe de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @param int $id L'id de l'utilisateur à modifier
     * @return bool
     */
    public function updateEmail()
    {
        $sql = 'UPDATE `hubx02_users` SET `email` = :email WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * UPDATE `hubx02_users` SET `email` = 'testquatre@gmail.com' WHERE `id`= 4;
     */


    /**
     * Met à jour le mot de passe de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @param int $id L'id de l'utilisateur à modifier
     * @return bool
     */
    public function updatePassword()
    {
        $sql = 'UPDATE `hubx02_users` SET `password` = :password WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /**
     * UPDATE `hubx02_users` SET `password` = 'Pizza123!!' WHERE `id`= 4;
     */
}
