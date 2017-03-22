/***************************

projects

***************************/
/* 
prevent characters like & in strings to be interpreted  by Oracle 
remove in PostfreSQL
*/
set define off
/*
ALTER SESSION modifies the date format YYYY-MM-DD in Oracle
the default date format is '01-Jan-07' (DD-MON-YY)
remove for PostgreSQL
*/
alter session set NLS_DATE_FORMAT='YYYY-MM-DD';

insert into projects values ('GRINder','The unique columbia coffee grinder','2013-02-25','2017-08-21','kkkht0023','10252','0','Food','image/company/grinder.jpg');
insert into projects values ('DoggyGo','Smartest dog tracker for dog collar','2013-04-11','2018-09-07','kkkht0021','12309','0','Technology','image/company/doggygo.gif');
insert into projects values ('Ferro Watch','Swiss Watches Inspired by Vintage Aircrafts','2013-08-02','2017-11-14','kkkht0018','23450','0','Fashion','image/company/ferro.png');
insert into projects values ('PLEN Cube','Portable Personal Assistant Robot','2014-12-24','2018-09-05','kkkht0017','560911','0','Productivity','image/company/plen.jpg');
insert into projects values ('Jollylook','The first cardboard vintage instant camera','2014-02-11','2018-08-06','kkkht0013','12090','0','Fashion','image/company/jolly.png');
insert into projects values ('EAROS','In-Ear Protection Solution for Music Enthusiasts','2015-08-13','2018-03-01','kkkht0011','2000','0','Fashion','image/company/earos.jpg');
insert into projects values ('Macchina','The ultimate tool for taking control of your car','2013-03-16','2018-11-23','kkkht0010','6780','0','Technology','image/company/macchina.jpg');
insert into projects values ('Intelligent Security','Camera Cover for Webcam','2013-05-31','2018-10-04','kkkht0008','200','0','Technology','image/company/secure.jpg');
insert into projects values ('Campy Creatures','Card game for filthy casual mortals','2013-06-10','2018-10-22','kkkht0019','111','0','Game','image/company/creature.png');
insert into projects values ('Pixelvar','Smartphone Controlled Handheld Light Painting','2015-06-24','2018-09-09','kkkht0015','1234','0','Toy','image/company/pixel.jpg');
insert into projects values ('Senstone','Intelligent Wearable Voice Recorder','2015-10-10','2018-07-04','kkkht0012','5600','0','Technology','image/company/senstone.jpg');
insert into projects values ('Gravity XL','High performance grappling hook','2013-03-18','2017-09-02','kkkht0022','20099','0','Sports','image/company/gravity.jpg');
insert into projects values ('Steadicam','Smartphone Stabilizer','2015-05-27','2018-09-15','kkkht0009','15310','0','Technology','image/company/steadi.gif');
insert into projects values ('Mastery Journal','Master productivity discipline and focus in 100 days','2015-04-22','2017-07-21','kkkht0020','4560','0','Productivity','image/company/mastery.jpg');
insert into projects values ('REFYNE','The first modular titanium EDC pen and flashlight','2014-11-27','2017-10-26','kkkht0016','20030','0','Productivity','image/company/refyne.jpg');
insert into projects values ('TAB','The bag that grows with your needs','2013-10-03','2018-12-14','kkkht0007','22201','0','Travel','image/company/tab.jpg');
insert into projects values ('KAI','Turn any pair of glasses into smart glasses!','2013-03-18','2017-09-15','kkkht0014','45002','0','Technology','image/company/kai.jpg');
insert into projects values ('The Last Garden','Robotanists in the Post-Apocalypse','2013-10-16','2018-07-09','kkkht0006','12345','0','Game','image/company/garden.jpg');
insert into projects values ('UNO II','The First Interchangeable Backpack','2014-11-13','2018-08-07','kkkht0005','20080','0','Travel','image/company/uno.jpg');
insert into projects values ('selfly camera','The smart flying phone case camera','2014-09-08','2018-08-03','kkkht0004','540010','0','Technology','image/company/selfly.jpg');
insert into projects values ('JACK','Make any headphones wireless','2014-06-14','2018-09-30','kkkht0003','2000','0','Technology','image/company/jack.png');
insert into projects values ('Acteon Compression Packing Cubes',' Pack More Carry Less','2013-12-16','2017-09-03','kkkht0002','67800','0','Travel','image/company/acteon.png');
insert into projects values ('Bullet 02','Worlds Smallest Flashlight Even Smaller','2014-12-13','2018-02-01','kkkht0001','1500','0','Technology','image/company/bullet.gif');

