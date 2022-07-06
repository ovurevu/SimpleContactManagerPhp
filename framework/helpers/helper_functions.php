<?php


function redirectToIndex($session_status, $session_message){
    $_SESSION[$session_status] = $session_message;
    //Redirect to index
    header('location:home');
    exit();
}

function view($view, $data){
    extract($data);
    return require "views/{$view}.view.php";
}