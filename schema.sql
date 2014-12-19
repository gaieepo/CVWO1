CREATE TABLE groups (
	id INT AUTO_INCREMENT,
	name VARCHAR(20),
	permissions TEXT,
	PRIMARY KEY (id)
);

CREATE TABLE scripts (
	id INT AUTO_INCREMENT,
	author INT,
	title VARCHAR(50),
	content TEXT,
	date DATETIME,
	PRIMARY KEY (id)
);

CREATE TABLE users (
	id INT AUTO_INCREMENT,
	username VARCHAR(20),
	password VARCHAR(64),
	salt VARCHAR(32),
	name VARCHAR(50),
	joined DATETIME,
	group INT,
	PRIMARY KEY (id)
);

CREATE TABLE users_session (
	id INT AUTO_INCREMENT,
	user_id INT,
	hash VARCHAR(64)
);