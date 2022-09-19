<?php
/*
 * SETTINGS!
 */
$databaseName = 'rei';
$databaseUser = 'root';
$databasePassword = '';
/*
 * CREATE THE DATABASE
 */
$pdoDatabase = new PDO('mysql:host=localhost', $databaseUser, $databasePassword);
$pdoDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdoDatabase->exec('CREATE DATABASE IF NOT EXISTS rei');
/*
 * CREATE THE tables
 */
$pdo = new PDO('mysql:host=localhost;dbname='.$databaseName, $databaseUser, $databasePassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec('drop table if exists user');

$pdo->exec('CREATE TABLE `user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `repeatPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

$pdo->exec('INSERT INTO user
    (name, username, email, password, repeatPassword) VALUES
    ("reees", "rei7", "rh@gmail.com", "123", "123")'
);
$pdo->exec('INSERT INTO user
    (name, username, email, password, repeatPassword) VALUES
   ("genti", "gh5", "gh@gmail.com", "1234", "1234")'
);



//$pdo->exec('CREATE TABLE `books` (
// `id` int(11) NOT NULL AUTO_INCREMENT,
// `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
// `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
// `pages` int(5) not null,
// `isbn` int(9) NOT NULL,
// `productionDate` date NOT NULL,
// PRIMARY KEY (`id`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

$pdo->exec('INSERT INTO books
    (title, author, pages, isbn, productionDate) VALUES
    ("hp", "j k r", 456, 12345678, "2008-10-04")'
);
$pdo->exec('INSERT INTO books
    (title, author, pages, isbn, productionDate) VALUES
      ("hp2", "j k r", 556, 32345678, "2009-10-04")'
);
