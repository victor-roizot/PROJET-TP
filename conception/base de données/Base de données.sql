#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE projet_tp CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci';
USE projet_tp;


#------------------------------------------------------------
# Table: HuBX02_categories
#------------------------------------------------------------

CREATE TABLE HuBX02_categories(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (25) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

/*
rajout de la population
USE `projet_tp`;
INSERT INTO `HuBX02_categories` (`id`, `name`) VALUES 
(1,'Couple'),
(2,'Famille');
*/

#------------------------------------------------------------
# Table: HuBX02_items
#------------------------------------------------------------

CREATE TABLE HuBX02_items(
        id                   Int  Auto_increment  NOT NULL ,
        hut                  Varchar (25) NOT NULL ,
        image                Varchar (255) NOT NULL ,
        description          Text NOT NULL ,
        id_categories Int NOT NULL
	,CONSTRAINT items_PK PRIMARY KEY (id)

	,CONSTRAINT items_categories_FK FOREIGN KEY (id_categories) REFERENCES HuBX02_categories(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: HuBX02_usersRoles
#------------------------------------------------------------

CREATE TABLE HuBX02_usersRoles(
        id   Int  Auto_increment  NOT NULL ,
        name Char (255) NOT NULL
	,CONSTRAINT usersroles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

/*
rajout de la population
USE `projet_tp`;
INSERT INTO `hubx02_usersRoles` (`id`, `name`)VALUES 
(1,'Utilisateur'),
(125,'Modérateur'),
(255,'Administrateur');
*/

#------------------------------------------------------------
# Table: HuBX02_users
#------------------------------------------------------------

CREATE TABLE HuBX02_users(
        id                   Int  Auto_increment  NOT NULL ,
        lastname             Varchar (50) NOT NULL ,
        firstname            Varchar (50) NOT NULL ,
        address              Varchar (255) NOT NULL ,
        zipCode              Int NOT NULL ,
        city                 Varchar (50) NOT NULL ,
        phoneNumber          Varchar (15) NOT NULL ,
        email                Varchar (100) NOT NULL ,
        password             Varchar (255) NOT NULL ,
        id_usersRoles Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_usersRoles_FK FOREIGN KEY (id_usersRoles) REFERENCES HuBX02_usersroles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: HuBX02_reservations
#------------------------------------------------------------

CREATE TABLE HuBX02_reservations(
        id              Int  Auto_increment  NOT NULL ,
        startingDate    Date NOT NULL ,
        endingDate      Date NOT NULL ,
        personsNumber   Int NOT NULL ,
        lunch           Bool NOT NULL ,
        `condition`       Bool NOT NULL ,
        id_items Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT reservations_PK PRIMARY KEY (id)

	,CONSTRAINT reservations_items_FK FOREIGN KEY (id_items) REFERENCES HuBX02_items(id)
	,CONSTRAINT reservations_users0_FK FOREIGN KEY (id_users) REFERENCES HuBX02_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: HuBX02_comments
#------------------------------------------------------------

CREATE TABLE HuBX02_comments(
        id              Int  Auto_increment  NOT NULL ,
        title           Varchar (50) NOT NULL ,
        image           Varchar (255) NOT NULL ,
        content         Text NOT NULL ,
        rating          Int NOT NULL ,
        id_items Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT comments_PK PRIMARY KEY (id)

	,CONSTRAINT comments_items_FK FOREIGN KEY (id_items) REFERENCES HuBX02_items(id)
	,CONSTRAINT comments_users0_FK FOREIGN KEY (id_users) REFERENCES HuBX02_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: HuBX02_activities
#------------------------------------------------------------

CREATE TABLE HuBX02_activities(
        id              Int  Auto_increment  NOT NULL ,
        title           Varchar (50) NOT NULL ,
        image           Varchar (255) NOT NULL ,
        content         Text NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT activities_PK PRIMARY KEY (id)

	,CONSTRAINT activities_users_FK FOREIGN KEY (id_users) REFERENCES HuBX02_users(id)
)ENGINE=InnoDB;
