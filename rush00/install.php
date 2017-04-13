<?php
	$DB = database_connect();
	$REQ = mysqli_query($DB, "CREATE DATABASE IF NOT EXISTS rush00");
	$DB = database_connect_to_rush00();

	/*----------- Creation de la table : categories -----------------------*/
	$REQ = mysqli_query($DB, "CREATE TABLE categories(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, name varchar(100) NOT NULL, PRIMARY KEY(id), UNIQUE KEY (id), UNIQUE KEY (name))");

	mysqli_query($DB, "INSERT INTO categories(name) VALUES ('All')");
	mysqli_query($DB, "INSERT INTO categories(name) VALUES ('Pour seduire les femmes')");
	mysqli_query($DB, "INSERT INTO categories(name) VALUES ('Pour seduire les hommes')");
	mysqli_query($DB, "INSERT INTO categories(name) VALUES ('Pour detecter les objets en or')");
	mysqli_query($DB, "INSERT INTO categories(name) VALUES ('Pour voler comme un oiseau')");
	mysqli_query($DB, "INSERT INTO categories(name) VALUES ('Pour ressembler a Thor')");

	/*----------- Creation de la table : liste -----------------------*/

	$REQ = mysqli_query($DB, "CREATE TABLE liste(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, name_product varchar(30) NOT NULL, name_cat varchar(30) NOT NULL, PRIMARY KEY(id), UNIQUE KEY (id))");
	if (valid_insert('L\'alsacienne', 'Pour seduire les femmes'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'alsacienne', 'Pour seduire les femmes')");
	}
	if (valid_insert('L\'alsacienne', 'Pour ressembler a Thor'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'alsacienne', 'Pour ressembler a Thor')");
	}
	if (valid_insert('La chinoise', 'Pour voler comme un oiseau'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La chinoise', 'Pour voler comme un oiseau')");
	}
	if (valid_insert('La parisienne', 'Pour seduire les femmes'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La parisienne', 'Pour seduire les femmes')");
	}
	if (valid_insert('La walrus', 'Pour seduire les hommes'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La walrus', 'Pour seduire les hommes')");
	}
	if (valid_insert('L\'impériale', 'Pour seduire les hommes'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'impériale', 'Pour seduire les hommes')");
	}
	if (valid_insert('La polonaise', 'Pour detecter les objets en or'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La polonaise', 'Pour detecter les objets en or')");
	}
	if (valid_insert('L\'astérix', 'Pour detecter les objets en or'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'astérix', 'Pour detecter les objets en or')");
	}
	if (valid_insert('L\'astérix', 'Pour seduire les femmes'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'astérix', 'Pour seduire les femmes')");
	}



	if (valid_insert('L\'astérix', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'astérix', 'All')");
	}
	if (valid_insert('L\'alsacienne', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'alsacienne', 'All')");
	}
	if (valid_insert('La chinoise', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La chinoise', 'All')");
	}
	if (valid_insert('La parisienne', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La parisienne', 'All')");
	}
	if (valid_insert('La walrus', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La walrus', 'All')");
	}
	if (valid_insert('La polonaise', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La polonaise', 'All')");
	}
	if (valid_insert('L\'impériale', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('L\'impériale', 'All')");
	}
	if (valid_insert('La française', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('La française', 'All')");
	}
	if (valid_insert('En crocs', 'All'))
	{
		mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('En crocs', 'All')");
	}


	/*----------- Creation de la table : users -----------------------*/
	$REQ = mysqli_query($DB, "CREATE TABLE users(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, isadmin SMALLINT DEFAULT 0, pseudo varchar(30) NOT NULL, email varchar(200) NOT NULL, password varchar(128) NOT NULL, firstname varchar(30) NOT NULL, lastname varchar(30) NOT NULL, address varchar(30) NOT NULL, zipcode varchar(5) NOT NULL, PRIMARY KEY(id), UNIQUE KEY (id), UNIQUE KEY (pseudo), UNIQUE KEY (email))");
	mysqli_query($DB, "INSERT INTO users(id, isadmin, pseudo, email, password, firstname, lastname, address, zipcode) VALUES (NULL, 1, 'admin', 'admin@moustache.fr', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 'Etienne', 'Pillot', 'cloud', '75017')");
	// var_dump(mysqli_error($DB));

	/*----------- Creation de la table : products -----------------------*/
	$REQ = mysqli_query($DB, "CREATE TABLE products(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, name varchar(30) NOT NULL, price FLOAT NOT NULL, description varchar(200) NOT NULL, img varchar(50) NOT NULL DEFAULT 'articles/default.png', PRIMARY KEY(id), UNIQUE KEY (id), UNIQUE KEY (name))");

	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'La française', '2.20', 'blablabla', 'articles/moustache1.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'L\'alsacienne', '3.45', 'blablabla', 'articles/moustache2.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'La chinoise', '4.10', 'blablabla', 'articles/moustache3.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'La parisienne', '3.90', 'blablabla', 'articles/moustache4.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'La walrus', '2.60', 'blablabla', 'articles/moustache5.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'L\'impériale', '2.45', 'blablabla', 'articles/moustache6.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'La polonaise', '3.3', 'blablabla', 'articles/moustache7.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'L\'astérix', '3.75', 'blablabla', 'articles/moustache8.png')");
	mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, 'En crocs', '4.40', 'blablabla', 'articles/moustache9.png')");


/*----------- Creation de la table : commands -----------------------*/
	$REQ = mysqli_query($DB, "CREATE TABLE commands(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, pseudo varchar(30) NOT NULL, product varchar(30) NOT NULL, price FLOAT NOT NULL, quantite SMALLINT UNSIGNED NOT NULL, id_command SMALLINT UNSIGNED NOT NULL, PRIMARY KEY(id), UNIQUE KEY (id))");
?>
