
insert into The_user (email,mdp,nom,dtn,sexe,isAdmin) values ("rabe@gmail.com","mdpRabe","rabe","2004-11-04","M",1);
insert into The_user (email,mdp,nom,dtn,sexe,isAdmin) values ("rabo@gmail.com","mpdRabo","rabo","2005-12-04","M",-1);

insert into The_ceuilleurs (nom,sexe,dtn) values ("loic","M","2005-12-04");
insert into The_ceuilleurs (nom,sexe,dtn) values ("lucy","F","2024-12-04");

insert into The_ceuilleurs (nom,sexe,dtn) values ("loic","M","2005-12-04");
insert into The_ceuilleurs (nom,sexe,dtn) values ("lucy","F","2024-12-04");


-- Insertion de données dans la table The_user
INSERT INTO The_user (email, mdp, nom, dtn, sexe, isAdmin) 
VALUES 
('john.doe@example.com', 'motdepasse123', 'John Doe', '1995-03-20', 'M', 1),
('jane.smith@example.com', 'password456', 'Jane Smith', '1992-09-10', 'F', -1);

-- Insertion de données dans la table The_ceuilleurs
INSERT INTO The_ceuilleurs (nom, sexe, dtn) 
VALUES 
('Pierre Dupont', 'M', '1988-12-05'),
('Marie Leblanc', 'F', '1990-06-15');

-- Insertion de données dans la table The_varietyTea
INSERT INTO The_varietyTea (nomVar, occupation, rendement, prixKg) 
VALUES 
('Thé vert', 5.3, 120.5, 10.50),
('Thé noir', 6.2, 110.8, 12.75);

-- Insertion de données dans la table The_parcelles
INSERT INTO The_parcelles (surfaceH, idVar) 
VALUES 
(15.75, 1),
(12.50, 2);

-- Insertion de données dans la table The_catDepense
INSERT INTO The_catDepense (descriptif) 
VALUES 
('Achat de matériel agricole'),
('Frais de transport');

-- Insertion de données dans la table The_ceuillir
INSERT INTO The_ceuillir (idCeuil, daty, idParc, poids) 
VALUES 
(1, '2023-07-10', 1, 15.75),
(2, '2023-07-12', 2, 20.00);

-- Insertion de données dans la table The_depenser
INSERT INTO The_depenser (idCatDep, montant, daty) 
VALUES 
(1, 250.75, '2023-07-15'),
(2, 120.00, '2023-07-20');
