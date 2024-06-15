create table jeu
(
    id SERIAL primary key not null,
    nom varchar(255),
    idcatégorie INT REFERENCES catégorie(id),
    lienimage varchar(255),
    trancheage varchar(255),
    nbPoints int,
    disponibilite boolean DEFAULT 'True' not null
);

create table catégorie
(
    id SERIAL primary key not null,
    type_de_catégorie varchar(255)
);

create table utilisateurs
(
    id SERIAL primary key not null,
    prenom (255),
    nom varchar(255),
    email varchar(255),
    mdp varchar(255)
);

create table horaire
(
    id SERIAL primary key not null,
    jour varchar(8),
    horaire varchar(255)
);

create table tarif
(
    individuelle int,
    familial int,
    assist_mater int,
    structure int
);

create table information
(
    adresse varchar(255),
    email varchar(255),
    numero char(14)
);
