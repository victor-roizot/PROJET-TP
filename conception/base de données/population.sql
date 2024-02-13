USE `projet_tp`;


INSERT INTO `hubx02_usersRoles` (`id`, `name`)VALUES 
(1,'Utilisateur'),
(125,'Modérateur'),
(255,'Administrateur');


INSERT INTO `hubx02_users` (`id`, `lastname`, `firstname`, `address`, `zipCode`, `city`, `phoneNumber`, `email`, `password`, `id_usersroles`) VALUES
(1, 'DUPONT', 'Jean', '5 rue de paris', 75000, 'PARIS', '06 12 34 56 78', 'jean.dupont@gmail.com', '$2y$10$8bpxdFBdMSdLeAgc4DyPvOwyXloAFD2.6DWZb9gijC6pi/.MqtQNi', 255),
(2, 'testun', 'testun', '5 rue de paris', 75000, 'PARIS', '06 00 00 00 01', 'test1@gmail.com', '$2y$10$3lapuUH4YKz/jPzKadTAVusmzVP5pRdknTfxJG2hCwXUZb5OJmCRu', 1),
(3, 'testdeux', 'testdeux', '5 rue de paris', 75000, 'PARIS', '06 00 00 00 02', 'test2@gmail.com', '$2y$10$Qw22m.0weKepNRyShwmdIOV1VVk.eXuuMs3P3uiViI3iUG5C0p53i', 1),
(4, 'testtrois', 'testtrois', '10 rue de paris', 75001, 'PARISS', '06 00 00 00 04', 'testquatre@gmail.com', 'Pizza123!!', 1);


INSERT INTO `HuBX02_categories` (`id`, `name`) VALUES 
(1,'Couple'),
(2,'Famille');