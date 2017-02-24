/***************************

ownership

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

insert into ownership values ('racccoon@gmail.com','kkkht0001');
insert into ownership values ('elle093@gmail.com','kkkht0002');
insert into ownership values ('kittykat111@dogmail.com','kkkht0003');
insert into ownership values ('jonnyboy123@zmail.com','kkkht0004');
insert into ownership values ('doe@doe.com','kkkht0005');
insert into ownership values ('doe@doe.com','kkkht0006');
insert into ownership values ('michelleng@nus.edu.sg','kkkht0007');
insert into ownership values ('gabbi@hotmail.com','kkkht0008');
insert into ownership values ('howtotrainyourtrain@movie.com.usa','kkkht0009');
insert into ownership values ('jonnyboy@zmail.com','kkkht0010');
insert into ownership values ('dennyboy@ymail.com','kkkht0011');
insert into ownership values ('gabbi@hotmail.com','kkkht0012');
insert into ownership values ('tommytrain@yahoo.com.sg','kkkht0013');
insert into ownership values ('sevendeadlysins@anime.com','kkkht0014');
insert into ownership values ('racccoon@gmail.com','kkkht0015');
insert into ownership values ('robert234@nus.edu.sg','kkkht0016');
insert into ownership values ('robert123@nus.edu.sg','kkkht0017');
insert into ownership values ('dennyboy@ymail.com','kkkht0018');
insert into ownership values ('howtotrainyourtrain@movie.com.usa','kkkht0019');
insert into ownership values ('susie@gmail.com','kkkht0020');
insert into ownership values ('jonathanclone@clone.com','kkkht0021');
insert into ownership values ('alvinator@gmail.com','kkkht0022');
insert into ownership values ('allllllmight@anime.com','kkkht0023');

