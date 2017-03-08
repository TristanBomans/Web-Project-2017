<?php
class Util{
	static function compareByName(&$unsortedA,$order){
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				$at = strtolower($a->naam);
				$bt = strtolower($b->naam);
				return strcmp($at, $bt);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				$at = strtolower($a->naam);
				$bt = strtolower($b->naam);
				return strcmp($bt, $at);
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