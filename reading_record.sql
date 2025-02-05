USE Tineil200299153;
# create a table to capture the input from assignment_01/index.php
# 
CREATE TABLE reading_record
	(
    entry_id INT AUTO_INCREMENT NOT NULL,
	authorFirstName VARCHAR (25) NOT NULL,
    authorLastName VARCHAR (25) NOT NULL,
    bookTitle VARCHAR (70) NOT NULL,
    genre INT,
    progress INT,
    completed BOOL,
    PRIMARY KEY (entry_id)
	);
# create a table for different literary genres
CREATE TABLE genre_list
	(
	genre_id INT NOT NULL AUTO_INCREMENT,
    genre VARCHAR(30) NOT NULL,
    PRIMARY KEY (genre_id)
    );
BEGIN;
#input genre list into table
INSERT INTO genre_list 
	(genre)
VALUES
	('Romance'),
    ('Fantasy'),
    ('Science Fiction'),
    ('Mystery'),
    ('Horror'),
    ('Thriller'),
    ('Action Adventure'),
    ('Historical Fiction'),
    ('Autobiography'),
    ('Fiction'),
    ('Non-Fiction'),
    ('Other');
