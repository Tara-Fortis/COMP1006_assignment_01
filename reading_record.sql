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
    