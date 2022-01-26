<?php
class Contact
{
    public $first_name;
    public $last_name;
    public $phone_number;

    //A static function to get all contacts
    public static function fetchAllContacts($pdo) {
        // Write SQL query
        $sql = "SELECT * FROM contacts";
        //Prepare Query
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Contact');
    }

    //A static function to get a contact by id
    public static function fetchContactById($pdo, $id){
        // Prepare a select statement
        $sql = "SELECT * FROM contacts WHERE id = " . $id;
        //Prepare Query
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}
