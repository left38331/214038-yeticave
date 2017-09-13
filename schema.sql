CREATE DATABASE yeticave;
USE yeticave;

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_registration DATETIME,
	email CHAR(128),
	name CHAR(128),
	user_password CHAR(32),
	avatar CHAR(128),
	contacts CHAR(128)
);


CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	category CHAR(32)
);

CREATE TABLE lots (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_creat DATETIME,
	lot_name CHAR(128),
	description TEXT(1000),
	image CHAR(128),
	bet_start INT(10),
	date_end DATETIME,
	bet_step INT(10),
	number_add_favorits INT,
	category_id	INT,
	author_id	INT,
	winner_id	INT
);

CREATE TABLE bets (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_add DATETIME,
	cost INT,
	user_id	INT,
	lot_id INT
);

insert into categories set category = 'Доски и лыжи';
insert into categories set category = 'Крепления';
insert into categories set category = 'Ботинки';
insert into categories set category = 'Одежда';
insert into categories set category = 'Инструменты';
insert into categories set category = 'Разное';

CREATE UNIQUE INDEX email ON users(email);

CREATE INDEX category_name ON categories(category);
CREATE INDEX lot_category_id_index ON lots(category_id);
CREATE INDEX lot_author_id_index ON lots(author_id);
CREATE INDEX lot_winner_id_index ON lots(winner_id);
CREATE INDEX lot_title_index ON lots(lot_name);

CREATE INDEX bet_user_id_index ON bets(user_id);
CREATE INDEX bet_lot_id_index ON bets(lot_id);

CREATE INDEX user_name_index ON users(name);
CREATE INDEX user_email_index ON users(email);