<?php
class Users
{
    private $pdo;
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $birthdate;
    public string $registerDate;
    public int $id_usersRoles;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=corrections_pdo_la-manu-post;charset=utf8', 'lk85m_admin', 'RFjM6KaM$fDaqX9M');
        } catch(PDOException $e){
            header('Location: /index.php');
        }
    }

    /**
     * Vérifie si un utilisateur existe dans la base de données avec l'email
     * @param string $email L'adresse email
     * @return bool
     */
    public function checkIfExistsByEmail() {
        $sql = 'SELECT COUNT(`email`) FROM `pab7o_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

        /**
     * Vérifie si un utilisateur existe dans la base de données avec le nom d'utilisateur
     * @param string $username Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByUsername() {
        $sql = 'SELECT COUNT(`username`) FROM `pab7o_users` WHERE `username` = :username';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param string $password Le mot de passe hashé
     * @param string $birthdate La date de naissance au format YYYY-MM-DD
     * @return bool
     */
    public function create() {
        $sql = 'INSERT INTO `pab7o_users` (`username`,`email`,`password`,`birthdate`,`registerDate`,`id_usersRoles`) 
        VALUES (:username,:email,:password,:birthdate, NOW(), 1)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        return $req->execute();
    }

    public function delete() {

    }
     
    public function getById() {

    }

    public function getList() {

    }

    public function update() {

    }
}
