<?php
class Contact
{
    public $first_name;
    public $last_name;
    public $phone_number;

    //Create contact function
    public static function createContact($pdo, $first_name, $last_name, $phone_number){
        //Prepare SQL query
        $sql = "insert into contacts (first_name, last_name, phone_number) values ('$first_name','$last_name','$phone_number')";

        //Prepare Query
        $statement = $pdo->prepare($sql);
        return $statement->execute(); //would return true(success) or false(failure)
    }

    //A static function to get all contacts. Takes a PDO object as parameter
    public static function fetchAllContacts($pdo) {
        // Write SQL query
        $sql = "SELECT * FROM contacts";
        //Prepare Query
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Contact');
    }

    //A static function to get a contact by id. Takes a PDO object and contact id as parameters
    public static function fetchContactById($pdo, $id){
        // Prepare a select statement
        $sql = "SELECT * FROM contacts WHERE id = " . $id;
        //Prepare Query
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    //Edit contact function
    public static function editContact($pdo, $id, $first_name, $last_name, $phone_number){
        //Prepare SQL query
        $sql = "update contacts set first_name = '".$first_name."', last_name='".$last_name."', phone_number='".$phone_number."' where id = ".$id;

        //Prepare Query
        $statement = $pdo->prepare($sql);
        return $statement->execute(); //would return true(success) or false(failure)
    }

    //Delete contact function
    public static function deleteContact($pdo, $id){
        //Prepare SQL query
        $sql = 'delete from contacts where id = '.$id;

        //Prepare Query
        $statement = $pdo->prepare($sql);

        //Prepare Query
        $statement = $pdo->prepare($sql);
        return $statement->execute(); //would return true(success) or false(failure)
    }
}
