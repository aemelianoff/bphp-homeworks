<?php
class User extends DataRecordModel {
    public $name;
    public $email;
    public $password;
    public $rate;

    public function __construct() {
        $this->$name = $_POST['name'];
        $this->$name = $_POST['email'];
        $this->$name = $_POST['password'];
        $this->$name = $_POST['rate'];
    }

    public function addUserFromForm() {
        
    }
}