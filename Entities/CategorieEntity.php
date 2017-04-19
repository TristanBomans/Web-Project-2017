<?php
class CategorieEntity
{
	public $naam;
	public $active;

	function __construct($naam, $active) {
	    $this->naam = $naam;
	    $this->active = $active;

	}
}

?>