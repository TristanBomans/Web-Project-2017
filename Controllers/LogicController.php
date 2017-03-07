<?php
require_once ("../Entities/ProductEntity.php");
require_once ("../Models/MainDAO.php");
require_once("../Controllers/Util.php");

class LogicController
{
	static function getAlleProducten(){
		$alleProducten = MainDAO::getAll();
		Util::compareByDatum($alleProducten,"desc");
		return $alleProducten;

	}
	static function getAlleUitgelichteProducten(){
		$alleProducten = MainDAO::getAllUitgelichte();
		return $alleProducten;
	}

	static function getProduct($id){
		$product = MainDAO::getProduct($id);
		return $product;	
	}

}
?>