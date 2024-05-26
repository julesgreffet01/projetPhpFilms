INSERT INTO Acteur (nom_Act, pre_Act, nat_Act, dat_nai_Act) VALUES
('Doe', 'John', 'Américaine', '1990-05-20'),
('Smith', 'Jane', 'Britannique', '1985-10-15'),
('Garcia', 'Pedro', 'Espagnole', '1982-03-25');

INSERT INTO Realisateur (nom_Real, pre_Real, nat_Real, rec_Real) VALUES
('Nolan', 'Christopher', 'Américaine', 0),
('Tarantino', 'Quentin', 'Américaine', 0),
('Scorsese', 'Martin', 'Américaine', 0);

INSERT INTO Classification (lib_Cla) VALUES
('Films'),
('Séries'),
('Anime');

INSERT INTO Genre (lib_Gen) VALUES
('Action'),
('Comédie'),
('Drame'),
('Science-fiction');

INSERT INTO Administrateur (nom_Admin, pre_Admin, mdp_Admin) VALUES
('greffet', 'jules', '1234'),
('laffi', 'wissem', '1234'),
('gharbi', 'aymen', '1234');

INSERT INTO Oeuvre (tit_ori_Oeuvre, tit_fr_Oeuvre, anne_sort_Oeuvre, res_Oeuvre, nb_ep_Oeuvre, img_Oeuvre, id_Cla) VALUES
('Inception', 'Inception', 2010, 'Résumé : Inception', 1, 'Inception', 1),
('Pulp Fiction', 'Pulp Fiction', 1994, 'Résumé : Pulp Fiction', 1, 'Pulp_Fiction', 1),
('The Shawshank Redemption', 'Les Évadés', 1994, 'Résumé : Les Évadés', 1, 'Shawshank_Redemption', 1),
('The Godfather', 'Le Parrain', 1972, 'Résumé : Le Parrain', 1, 'The_Godfather', 1),
('The Dark Knight', 'The Dark Knight : Le Chevalier noir', 2008, 'Résumé : The Dark Knight', 1, 'The_Dark_Knight', 1),
('Forrest Gump', 'Forrest Gump', 1994, 'Résumé : Forrest Gump', 1, 'Forrest_Gump', 1),
('The Matrix', 'Matrix', 1999, 'Résumé : Matrix', 1, 'The_Matrix', 1),
('Fight Club', 'Fight Club', 1999, 'Résumé : Fight Club', 1, 'Fight_Club', 1),
('The Lord of the Rings: The Fellowship of the Ring', 'Le Seigneur des anneaux : La Communauté de l\'anneau', 2001, 'Résumé : Le Seigneur des anneaux : La Communauté de l\'anneau', 1, 'The_Lord_of_the_Rings_Fellowship', 1),
('Interstellar', 'Interstellar', 2014, 'Résumé : Interstellar', 1, 'Interstellar', 1),
('Stranger Things', 'Stranger Things', 2016, 'Résumé : Stranger Things', 3, 'Stranger_Things', 2),
('Game of Thrones', 'Game of Thrones', 2011, 'Résumé : Game of Thrones', 8, 'Game_of_Thrones', 2),
('Breaking Bad', 'Breaking Bad', 2008, 'Résumé : Breaking Bad', 5, 'Breaking_Bad', 2),
('The Crown', 'The Crown', 2016, 'Résumé : The Crown', 4, 'The_Crown', 2),
('Black Mirror', 'Black Mirror', 2011, 'Résumé : Black Mirror', 5, 'Black_Mirror', 2),
('Death Note', 'Death Note', 2006, 'Résumé : Death Note', 37, 'Death_Note', 3),
('Attack on Titan', 'Attack on Titan', 2013, 'Résumé : Attack on Titan', 75, 'Attack_on_Titan', 3),
('Naruto', 'Naruto', 2002, 'Résumé : Naruto', 220, 'Naruto', 3),
('One Piece', 'One Piece', 1999, 'Résumé : One Piece', 1017, 'One_Piece', 3),
('Fullmetal Alchemist: Brotherhood', 'Fullmetal Alchemist: Brotherhood', 2009, 'Résumé : Fullmetal Alchemist: Brotherhood', 64, 'Fullmetal_Alchemist_Brotherhood', 3),
('Friends', 'Friends', 1994, 'Résumé : Friends', 10, 'Friends', 2),
('Skins', 'Skins', 2007, 'Résumé : Skins', 61, 'Breaking_Bad', 2),
('The Office', 'The Office', 2005, 'Résumé : The Office', 9, 'The_Office', 2),
('Dragon Ball Z', 'Dragon Ball Z', 1989, 'Résumé : Dragon Ball Z', 291, 'Dragon_Ball_Z', 3),
('My Hero Academia', 'My Hero Academia', 2016, 'Résumé : My Hero Academia', 117, 'My_Hero_Academia', 3),
('Hunter x Hunter', 'Hunter x Hunter', 2011, 'Résumé : Hunter x Hunter', 148, 'Hunter_x_Hunter', 3);


   INSERT INTO Realiser (id_Oeuvre, id_Real) VALUES
   (1, 1),
   (2, 1),
   (3, 1),
   (4, 1),
   (5, 1),
   (6, 2),
   (7, 2),
   (8, 2),
   (9, 2),
   (10, 2),
   (1,3),
   (2,3);

   INSERT INTO Jouer (id_Act, id_Oeuvre, prem_role) VALUES
(1, 1, 0),
(2, 1, 0),
(3, 1, 0),
(3, 2, 0),
(1, 4, 0);


INSERT INTO Appartenir (id_Oeuvre, id_Gen) VALUES
(1, 2), (1, 3), 
(2, 2), (2, 3),
(3, 2), (3, 3),
(4, 2), (4, 3),
(5, 2), (5, 3),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11,2),
(11,3);