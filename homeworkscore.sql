create database homeworkscore; /*id = root*/ 
use homeworkscore;
create table yes (
	namw	char(32)	character set utf8,
	childticket int(10),
    adultticket	int(10),
	childbig3	int(10),
    adultbig3	int(10),
	childfree 	int(10),
    adultfree	int(10),
	child1year  int(10),
    adult1year 	int(10),
    total       int(10)
);

/* INSERT INTO yes VALUES ('jasseung',0,1,2,3,4,5,6,7,8); <- how to save db */