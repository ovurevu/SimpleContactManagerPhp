<?php
/* Database credentials */
const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'contact_manager';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=contact_manager", 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
}