<?php

class ContactEntity
{
    public $id;
    public $username;
    public $subject;
    public $message;
    public $datum;

    
    function __construct($id, $username, $subject, $message, $datum) {
        $this->id = $id;
        $this->username = $username;
        $this->subject = $subject;
        $this->message = $message;
        $this->datum = $datum;
    }
}

?>