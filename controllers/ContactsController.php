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
}