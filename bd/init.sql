DROP SCHEMA IF EXISTS `pratica_form_test` ;
CREATE DATABASE pratica_form_test;

use pratica_form_test;

CREATE TABLE users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	sex INT(1) NOT NULL,
	email VARCHAR(50) NOT NULL,
	type_doc VARCHAR(3) NOT NULL,
	doc VARCHAR(50),
	date TIMESTAMP
);
