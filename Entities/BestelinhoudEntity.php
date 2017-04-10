<?php
class BestelinhoudEntity
{
public $id;
public $bestelling_id;
public $product_id;
public $aantal;


 function __construct($id, $bestelling_id, $product_id, $aantal) {
        $this->id = $id;
        $this->bestelling_id = $bestelling_id;
		$this->product_id = $product_id;
		$this->aantal = $aantal;
	}
}
?>