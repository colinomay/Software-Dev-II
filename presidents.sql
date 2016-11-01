#Presidents of the United States
#Authors: Claudia Rojas, Nicholas Bradford, Colin May

Drop database if exists site_db;
Create database if not exists site_db;
Use site_db;

Drop table if exists presidents;
Create table if not exists presidents(
	id INT primary key auto_increment,
	fName TEXT NOT NULL,
	lName TEXT NOT NULL,
	number INT unique NOT NULL,
	dob DATETIME 
);

explain presidents;

Insert into presidents(fName, lName, number, dob)
	VALUES("Franklin", "Roosevelt", 32, "1882-1-30 00:00:00"),
		("Ulysses", "Grant", 18, "1822-3-27 00:00:00"),
		("James", "Buchanan", 15, "1791-3-23 00:00:00"),
		("Martin", "Van Buren", 8, "1782-12-5 00:00:00"),
		("William", "Howard Taft", 27, "1857-9-15 00:00:00");

#Franklin D Roosevelt. 32 January 30, 1882
#Ulysses S. Grant 18 April 27, 1822
#James Buchanan 15 April 23, 1791
#Martin Van Buren 8 December 5, 1782
#William Howard Taft 27 September 15, 1857

SELECT * from presidents;

#order by number ascending
SELECT lName, number, dob FROM presidents
ORDER BY number ASC;

#order by last name ascending
SELECT lName, number, dob FROM presidents
ORDER BY lName ASC;

#order by dob descending
SELECT lName, number, dob FROM presidents
ORDER BY dob DESC;
