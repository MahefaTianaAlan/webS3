 use db_p16_ETU002359;
---use the;

create table The_user(
idUser int primary Key auto_increment,
email VARCHAR(200) not null,
mdp VARCHAR(200) not null,
nom VARCHAR(200) not null,
dtn date not null,
sexe char(1) NOT NULL CHECK (sexe IN ('M', 'F')),
isAdmin int not null CHECK (isAdmin IN (-1, 1))
);

create table The_ceuilleurs(
idCeuil int primary Key auto_increment,
nom VARCHAR(200) not null,
sexe char(1) NOT NULL CHECK (sexe IN ('M', 'F')),
dtn date not null
);


create table The_varietyTea(
idVar int primary Key auto_increment,
nomVar VARCHAR(200) not null,
occupation decimal(12,3) not null,
rendement decimal(12,3) not null, ---kg de feuille par mois
prixKg decimal(12,3) --apina salaire
);

---sum(prixKg*poid ceuillit par Ceuilleur)/sum (qut collecte) 

create table The_parcelles(
numero int primary Key auto_increment,
surfaceH decimal(12,3) not null,
idVar int REFERENCES The_varietyTea(idVar) 
);

create table The_catDepense(
idCatDep int primary Key auto_increment,
descriptif VARCHAR(200) not null
);

create table The_ceuillir(
id int primary Key auto_increment,
idCeuil int REFERENCES The_ceuilleurs(idCeuil),
daty date not null,
idParc int REFERENCES The_parcelles(numero),
poids decimal(12,3) not null
);

create table The_depenser(
idDep int primary Key auto_increment,
idUser int REFERENCES The_user(idUser),
idCatDep int REFERENCES The_catDepense(idCatDep),
montant decimal(12,3) not null,
daty date not null
);



