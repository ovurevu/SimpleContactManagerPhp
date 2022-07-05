<?php

class ContactsController {

    public function index(){
        $zeroContacts = true; //Variable to determine if there are contacts or not

        $contacts = App::get('database')->selectAll('contacts'); //get all contacts

        if($contacts) {
            $zeroContacts = false;
        }

        require 'views/index.view.php'; //Load the view file
    }

    public function create(){
        require 'views/create.view.php'; //Load the view file
    }

    public function store(){
        // Define variables and initialize with empty values
        $first_name = $last_name = $phone_number = "";

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
            $first_name = trim($_POST['first-name']);
            $last_name = trim($_POST['last-name']);
            $phone_number = trim($_POST['phone-number']);

            $create = App::get('database')->insert('contacts', [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_number' => $phone_number
            ]);

            //Create contact
            if($create){
                redirectToIndex('success', 'Contact saved successfully');
            } else {
                $error_msg = 'Unable to save this contact!';
            }
        }
    }

    public function show(){

    }

    public function edit(){
        // Check existence of id parameter before processing further
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            // Get URL parameter
            $id = trim($_GET["id"]);
            $contact = App::get('database')->selectById('contacts', 'id', $id);
        } else {
            redirectToIndex('error', 'Something went horribly wrong with the last action!');
        }
        require 'views/edit.view.php'; //Load the view file
    }

    public function update(){
        // Define variables and initialize with empty values
        $first_name = $last_name = $phone_number = "";

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
            // Get hidden input value
            $id = $_POST["id"];

            $first_name = trim($_POST['first-name']);
            $last_name = trim($_POST['last-name']);
            $phone_number = trim($_POST['phone-number']);

            $update = App::get('database')->update('contacts', 'id', $id, [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_number' => $phone_number
            ]);

            //Edit contact
            if($update){
                redirectToIndex('success', 'Contact updated successfully');
            } else {
                $error_msg = 'Unable to update this contact!';
            }
        }
    }

    public function delete(){
        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
            // Get hidden input value
            $id = $_POST["id"];

            //Delete Contact
            if(App::get('database')->delete('contacts', 'id', $id)){
                redirectToIndex('success', 'Contact deleted successfully!');
            } else {
                redirectToIndex('error', 'Unable to delete the contact. You could try again.');
            }
        } else {
            // Check existence of id parameter before processing further
            if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                // Get URL parameter
                $id = trim($_GET["id"]);

                //Get the contact
                $contact = App::get('database')->selectById('contacts', 'id', $id);
            } else {
                redirectToIndex('error', 'Something went horribly wrong with the last action!');
            }
        }

        require 'views/delete.view.php'; //Load the view file
    }

}