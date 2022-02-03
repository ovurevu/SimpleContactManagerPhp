<?php
class Connection {
    public static function connect(){
        try {
            return new PDO("mysql:host=localhost;dbname=contact_manager", 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}