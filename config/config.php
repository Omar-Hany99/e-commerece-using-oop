<?php

define('DEV', true);  // In development or live? Development = true | Live = false

// DOC_ROOT is created because the download code has several versions of the sample site
// On a live site a single forward slash / would indicate the document root folder
// The book just used a path, but these lines allow your code to run if they are in a different folder
//$this_folder = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])); // Folder this file is in
//$parent_folder = dirname($this_folder);                      // Parent of this folder
//define("DOC_ROOT", $parent_folder . '/public/');             // Document root


// Database settings
$type = 'mysql';                 // Type of database
$server = 'localhost';             // Server the database is on
$db = 'ecommerce';             // Name of the database
$port = '3307';                      // Port is usually 8889 in MAMP and 3306 in XAMPP
$charset = 'utf8mb4';               // UTF-8 encoding using 4 bytes of data per character
$username = 'omar';         // Enter YOUR username here
$password = 'Mimo7alawani12';         // Enter YOUR password here

// DO NOT CHANGE NEXT LINE
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN

