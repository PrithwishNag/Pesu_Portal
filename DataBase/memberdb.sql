CREATE TABLE member_table(
	id int(11) auto_increment,
	name varchar(20) NOT NULL,
	srn varchar(13) NOT NULL,
	cgpa float NOT NULL,
	program varchar(100) NOT NULL,
	sem int(1) NOT NULL,
	section char(1) NOT NULL,
	contact bigint(10) NOT NULL,
	email varchar(100) NOT NULL,
	password varchar(15) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE attendance(
	id int(11) auto_increment,
	Subject_Code varchar(100),
	Claim int(11),
	memberid int(11) NOT NULL,
	CONSTRAINT MEM_ATT_FK FOREIGN KEY (memberid)
    REFERENCES member_table(id),
    PRIMARY KEY(id)
);

CREATE TABLE club_list(
	id int(11) auto_increment,
	Club_Name varchar(100) NOT NULL,
	Club_Head varchar(20) NOT NULL,
	Club_Head_Contact bigint(20) NOT NULL,
	Club_Head_Email varchar(100) NOT NULL,
	Number_Of_Members int(11),
    PRIMARY KEY(id)
);

CREATE TABLE club_details(
	id int(11) auto_increment,
	core1_name varchar(100) NOT NULL,
	core1_contact bigint(20) NOT NULL,
	core1_email varchar(100) NOT NULL,
	core2_name varchar(100) NOT NULL,
	core2_contact bigint(20) NOT NULL,
	core2_email varchar(100) NOT NULL,
	Description text,
	clubid int(11),
	CONSTRAINT CD_CL_FK FOREIGN KEY (clubid)
	REFERENCES club_list(id),
    PRIMARY KEY(id)
);

CREATE TABLE club_members(
	id int(11) auto_increment,
	memberid int(11),
	Clubid int(11),
	CONSTRAINT CM_MT_FK FOREIGN KEY (memberid)
    REFERENCES member_table(id),
    CONSTRAINT CM_CL_FK FOREIGN KEY (Clubid)
    REFERENCES club_list(id),
    PRIMARY KEY(id)
);

CREATE TABLE achievements(
	id int(11) auto_increment,
	event varchar(100),
	remark varchar(100),
	ClubMemberid int(11),
	CONSTRAINT AC_CM_FK FOREIGN KEY (ClubMemberid)
	REFERENCES club_members(id),
    PRIMARY KEY(id)
);

CREATE TABLE admin_table(
	id int(11) auto_increment,
	name varchar(20) NOT NULL,
	email varchar(100) NOT NULL,
	password varchar(20) NOT NULL,
    PRIMARY KEY(id)
);