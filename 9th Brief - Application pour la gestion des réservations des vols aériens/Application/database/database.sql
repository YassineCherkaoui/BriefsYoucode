DROP DATABASE gestion_reservations;
CREATE DATABASE gestion_reservations;
USE gestion_reservations;

create table vols
(
   id                       int PRIMARY KEY NOT NULL AUTO_INCREMENT,
   depart                   varchar(254),
   destination              varchar(254),
   date_depart              datetime,
   num_place                int,
   prix                     int
);


create table reservation
(
   id                    int PRIMARY KEY NOT NULL AUTO_INCREMENT, 
   vol_id                int,
   passager_id           int,
   date_reservation      timestamp
);



create table passager
(
   id                   int PRIMARY KEY NOT NULL AUTO_INCREMENT, 
   nom                  varchar(254),
   prenom               varchar(254),
   age                  int,
   pays                 varchar(254),
   adresse              varchar(254),
   tele                 int,
   email                varchar(254), 
   num_passport         int
  
);




alter table reservation add constraint FK_Association_1 foreign key (vol_id)
      references vols (id) on delete restrict on update restrict;

alter table reservation add constraint FK_Association_2 foreign key (passager_id)
      references passager (id) on delete restrict on update restrict;



insert into vols(depart,destination,date_depart,num_place,prix)
values ("Agadir","Paris",'2020-05-26 11:45:00',200,3000);
insert into vols(depart,destination,date_depart,num_place,prix)
values ("Marrakech","Paris",'2020-05-26 06:15:00',300,5000);
insert into vols(depart,destination,date_depart,num_place,prix)
values ("Agadir","Londres",'2020-05-26 20:45:00',250,4000);
insert into vols(depart,destination,date_depart,num_place,prix)
values ("Marrakech","Londres",'2020-05-26 11:30:00',150,3000);
insert into vols(depart,destination,date_depart,num_place,prix)
values ("Casablanca","Paris",'2020-05-26 00:50:00',250,2500);
insert into vols(depart,destination,date_depart,num_place,prix)
values ("Casablanca","Londres",'2020-05-26 05:00:00',200,5500);

use gestion_reservations;
DELIMITER $$

CREATE TRIGGER OR REPLACE decrementer AFTER INSERT ON reservation
FOR EACH ROW
BEGIN
 DECLARE SELECTED INT;
   set SELECTED=NEW.vol_id;
    UPDATE vols
        SET num_place=num_place - 1
        WHERE id = SELECTED;
END;$$

DELIMITER ;





