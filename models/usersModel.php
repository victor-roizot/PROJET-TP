<?php
class Users
{
    private $pdo;
    public int $id;
    public string $lastname;
    public string $firstname;
    public string $address;
    public int $zipCode;
    public string $city;
    public string $phoneNumber;
    public string $email;
    public string $password;
    public int $id_usersroles;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projettp;charset=utf8', 'maT512Mo', '6qJq2Sqb=28C[');
        } catch (PDOException $e) {
            header('Location: /index.php');
        }
    }

    /**
     * Vérifie si un utilisateur existe dans la base de données avec le numéro de téléphone
     * @param string $phoneNumber le numéro de téléphone
     * @return bool
     */
    public function checkIfExistsByPhoneNumber()
    {
        $sql = 'SELECT COUNT(`phoneNumber`) FROM `HuBX02_users` WHERE `phoneNumber` = :phoneNumber';
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
        $sql = 'SELECT COUNT(`email`) FROM `HuBX02_users` WHERE `email` = :email';
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
     * @param string $id_usersroles Role de l'utilisateur
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `HuBX02_users` (`lastname`,`firstname`,`address`,`zipCode`,`city`,`phoneNumber`,`email`,`password`,`id_usersroles`) 
        VALUES (:lastname,:firstname,:address,:zipCode,:city,:phoneNumber,:email,:password,:id_usersroles,)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':address', $this->address, PDO::PARAM_STR);
        $req->bindValue(':zipCode', $this->zipCode, PDO::PARAM_INT);
        $req->bindValue(':city', $this->city, PDO::PARAM_STR);
        $req->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':id_usersroles', $this->id_usersroles, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getPassword() {
        $sql = 'SELECT `password` FROM `HuBX02_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function getInfosByEmail() {
        $sql = 'SELECT `id`, `username`, `id_usersroles` FROM `HuBX02_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
    }

    public function getById()
    {
    }

    public function getList()
    {
    }

    public function update()
    {
    }
}
