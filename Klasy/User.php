<?php

class User {
const STATUS_USER = 1;
const STATUS_ADMIN = 2;
protected $password;
protected $user_id;
//pozostale pola klasy:
//...
//metody klasy:
function __construct($user_id, $password ){
//implementacja konstruktora
$this->status=User::STATUS_USER;
$this->user_id=$user_id;
$this->password=$password;

}
function show() {
    echo(", Hasło: " .password_hash($this->password , PASSWORD_DEFAULT)
         .", UserId: " .$this->user_id );
}
function save() {
    $xml = simplexml_load_file('users.xml');
    //dodajemy nowy element user (jako child)
    $xmlCopy=$xml->addChild("user");
    //do elementu dodajemy jego właściwości o określonej nazwie i treści
    $xmlCopy->addChild("passwd", $this->password);
    //uzupełnij pozostałe właściwości
    $xmlCopy->addChild("fullName", $this->user_id);
    //zapisujemy zmodyfikowany XML do pliku:
    $xml->asXML('users.xml'); 

}



public static function getAllUsers()
{
    $allUsers = simplexml_load_file('users.xml');
    echo "<ul>";
    foreach ($allUsers as $user):
    $password=$user->password;
    $user_id=$user->user_id;
    echo "<li>$password, $user_id</li>";
    endforeach;
    echo "</ul>";
}

function getPassword() {
    return $this->password;
}

function getUser_id() {
    return $this->user_id;
}

function setPassword($password) {
    $this->password = $password;
}

function setUser_id($user_id) {
    $this->user_id = user_id;
}



}