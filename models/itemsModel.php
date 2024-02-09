<?php

/** Items est une classe.
 * Je cree l'Items avec des attributs 
 **/
class Items
{
    public int $id;
    public string $hut;
    public string $image;
    public string $description;
    public int $id_categories;
    private $pdo;

    /** construct est une  methode.
     * Il est appelé automatiquement lorsqu'on instancie la classe.
     * Il permet de lancer une action automatiquement lorsqu'on instancie la classe
     **/
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projet_tp;charset=utf8', 'Neo512Mo', '26qJq2Sqb=28C[');
        } catch (PDOException $e) {
            header('Location: /erreur-connexion');
            exit;
        } $this->id = 0;
    }


    /**
     * Ajoute un item (cabane a loué) dans la base de données
     * @param string $hut Le titre de la cabane
     * @param string $image L'image de la cabane
     * @param string $description La description de la cabane
     * @param int $id_categories L' id de la catégorie
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `hubx02_items` (`hut`, `image`, `description`, `id_categories`)
        VALUES (:hut, :image, :description, :id_categories)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':hut', $this->hut, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':description', $this->description, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * INSERT INTO `hubx02_items` (`hut`, `image`, `description`, `id_categories`)
     *     VALUES ('cabane test', 'image de la cabane', 'Ceci est un la 1er cabane test ajouter pour être loué ', 2);
     */


    /**
     * Supprime un item selon son id
     * @param int $id L'id de l'item (cabane) à supprimer
     * @return bool
     */
    public function delete()
    {
        $sql =  'DELETE FROM `hubx02_items` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /**  requete test dans PHP MySQL
     * DELETE FROM `hubx02_items` WHERE `id` = 2;
     */


    /**
     * Récupère un item (cabane) par un son id
     * @param int $id id de l'item
     * @return object 
     */
    public function getById()
    {
        $sql = 'SELECT `hut`, `image`, `description`, `name` AS `categorie`
            FROM `hubx02_items` AS `i`
            INNER JOIN `hubx02_categories` AS `c` ON `id_categories` = `c`.`id`
            WHERE `i`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }
    /** requete test dans PHP MySQL
     * SELECT `hut`, `image`, `description`, `name` AS `categorie`
     *  FROM `hubx02_items` AS `i`
     *  INNER JOIN `hubx02_categories` AS `c` ON `id_categories` = `c`.`id`
     *  WHERE `i`.`id` = 1;
     */


    /**
     * Récupère la liste de tous les Items (cabanes)
     * @return array
     */
    public function getList()
    {
        $sql = 'SELECT `i`.`id`, `hut`, `image`, SUBSTR(`description`, 1, 500) AS `description`, `name` AS `categorie`
        FROM `hubx02_items` AS `i`
        INNER JOIN `hubx02_categories` AS `c` ON `id_categories` = `c`.`id`
    ORDER BY `i`.`id` ASC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    /** requete test dans PHP MySQL
     * SELECT `i`.`id`, `hut`, `image`, SUBSTR(`description`, 1, 10) AS `description`, `name` AS `categorie`
     * FROM `hubx02_items` AS `i`
     * INNER JOIN `hubx02_categories` AS `c` ON `id_categories` = `c`.`id`
     * ORDER BY `i`.`id` ASC;
     */


    /**
     * Vérifie si un item existe dans la base de données avec son id
     * @param string $id le id de l'item
     * @return bool
     */
    public function checkIfExists()
    {
        $sql = 'SELECT COUNT(`id`) FROM `hubx02_Items` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    /** requete test dans PHP MySQL
     * SELECT COUNT(`id`) FROM `hubx02_Items` WHERE `id` = 2;
     */


    /**
     * Met à jour  le titre, l'image et la description d'une item (cabane) 
     * @param string $hut Le titre de la cabane
     * @param string $image L'image de la cabane
     * @param string $description La description de la cabanr
     * @param int $id L'id de l'item à modifier
     * @return bool
     */
    public function updateItem()
    {
        $sql = 'UPDATE `hubx02_items` SET `hut` = :hut, `image` = :image, `description` = :description, `id_categories` = :id_categories WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':hut', $this->hut, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':description', $this->description, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * UPDATE `hubx02_items` SET `hut` = 'cabane test update2', `image` = 'image test update2', `description` = 'description test update2', `id_categories` = 1 WHERE `id`= 2;
     */
}
