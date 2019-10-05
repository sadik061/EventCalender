create table institute(
    institute_id int AUTO_INCREMENT,
    name	varchar(100),
	location	varchar(30),
	primary key (institute_id)
);
create table instructor(
    instructor_id int AUTO_INCREMENT,
    institute_id int,
	type	varchar(30),
	primary key (instructor_id),
    FOREIGN key ( institute_id ) references institute (institute_id)
		on delete cascade
);
create table participents(
    instructor_id int,
    event_id int,
	present int,
    PRIMARY KEY (instructor_id,event_id),
    FOREIGN key ( instructor_id ) references instructor (instructor_id)
		on delete cascade,
    FOREIGN key ( event_id ) references events (event_id)
		on delete cascade
);
