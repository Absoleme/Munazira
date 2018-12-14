drop database if exists munazira;

create database munazira;

use munazira;

create table membre(
    
    idMembre int(50) auto_increment not null,
    pseudo varchar(50),
    mdp varchar(50),
    primary key (idMembre)
);


insert into membre values(null, "gromumu", "1234");
insert into membre values(null, "amine", "5678");

select * from membre;