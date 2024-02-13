--1 oui // -1 non
insert into The_user (email,mdp,nom,dtn,isAdmin) values ("rabe@gmail.com","mdpRabe","rabe","2004-11-04",1);
insert into The_user (email,mdp,nom,dtn,isAdmin) values ("rabo@gmail.com","mpdRabo","rabo","2005-12-04",-1);

create table The_ceuilleurs(
idCeuil int primary Key auto_increment,
nom VARCHAR(200) not null,
sexe char(1) not NULL,
dtn date not null
);

insert into The_ceuilleurs (nom,sexe,dtn) values ("loic","M","2005-12-04");
insert into The_ceuilleurs (nom,sexe,dtn) values ("lucy","F","2024-12-04");