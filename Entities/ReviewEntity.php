<?php

class ReviewEntity
{
    public $id;
    public $username;
    public $product_id;
    public $comment;
    public $rating;
    
    function __construct($id, $username, $product_id, $comment, $rating) {
        $this->id = $id;
        $this->username = $username;
        $this->product_id = $product_id;
        $this->comment = $comment;
        $this->rating = $rating;
    }
}

?>