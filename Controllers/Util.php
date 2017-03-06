<?php
class Util{
	static function compareByName(&$unsortedA,$order){
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return strcmp($a->naam, $b->naam);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return strcmp($b->naam, $a->naam);
			});
		}
	}

	static function compareByPrijs(&$unsortedA,$order){
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return $a->prijs > $b->prijs;
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return $b->prijs > $a->prijs;
			});
		}
	}

	static function compareByDatum(&$unsortedA,$order){	
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($a->datum_toegevoegd) - strtotime($b->datum_toegevoegd);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($b->datum_toegevoegd) - strtotime($a->datum_toegevoegd);
			});
		}
	}

	static function compareByCat(&$unsortedA,$order){
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($a->datum_toegevoegd) - strtotime($b->datum_toegevoegd);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($b->datum_toegevoegd) - strtotime($a->datum_toegevoegd);
			});
		}
	}
}
?>